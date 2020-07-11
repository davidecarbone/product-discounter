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
			$products[] = Product::fromArray([
				"id" => new ProductId($result['id']),
				"sku" => $result['sku'],
				"price" => $result['price']
			]);
		}

		return $products;
	}

    /**
     * @param string $productId
     *
     * @return Product|null
     */
    public function findById(string $productId): ?Product
    {
        $result = $this->collection->findOne([
            'id' => $productId
        ]);

        if (! $result) {
            return null;
        }

        return Product::fromArray([
	        "id" => new ProductId($result['id']),
	        "sku" => $result['sku'],
	        "price" => $result['price']
        ]);
    }
}
