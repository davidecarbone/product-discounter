<?php

namespace ProductDiscounter\Product;

use MongoDB\Collection;

class Repository
{
    public const COLLECTION_NAME = 'Product';

    /** @var Collection */
    private $collection;

    /**
     * @param Collection $collection
     */
    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

	/**
	 * @return Product[]
	 */
	public function findAll(): array
	{
		$results = $this->collection->find();
		$products = [];

		foreach ($results as $result) {
			$products[] = Product::fromPersistence([
				"id" => new ProductId($result['id']),
				"sku" => $result['sku'],
				"price" => $result['price']
			]);
		}

		return $products;
	}

    /**
     * @param ProductId $productId
     *
     * @return Product|null
     */
    public function findById(ProductId $productId): ?Product
    {
        $result = $this->collection->findOne([
            'id' => (string)$productId
        ]);

        if (!$result) {
            return null;
        }

        return Product::fromPersistence([
	        "id" => new ProductId($result['id']),
	        "sku" => $result['sku'],
	        "price" => $result['price']
        ]);
    }

	/**
	 * @param array $productSkus
	 *
	 * @return Product[]
	 */
	public function findMultipleBySkus(array $productSkus)
	{
		$results = $this->collection->find([
			'sku' => ['$in' => $productSkus]
		]);

		$products = [];

		foreach ($results as $result) {
			$products[] = Product::fromPersistence([
				"id" => new ProductId($result['id']),
				"sku" => $result['sku'],
				"price" => $result['price']
			]);
		}

		return $products;
	}
}
