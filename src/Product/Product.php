<?php

namespace ProductDiscounter\Product;

class Product implements \JsonSerializable
{
    /** @var ProductId */
    private $id;

    /** @var string */
    private $sku;

	/** @var float */
	private $price;

    /**
     * @param array $productData
     *
     * @return Product
     */
    public static function fromArray(array $productData): Product
    {
        $product = new self();

        $product->id = $productData['id'];
        $product->sku = $productData['sku'];
        $product->price = $productData['price'];

        return $product;
    }

    private function __construct()
    {
    }

    /**
     * @param Product $product
     *
     * @return bool
     */
    public function isEqualTo(Product $product): bool
    {
        return $this == $product; // non-strict comparison is intended
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => (string) $this->id,
            'sku' => $this->sku,
            'price' => $this->price,
        ];
    }

    public function jsonSerialize(): array
    {
	    return $this->toArray();
    }
}
