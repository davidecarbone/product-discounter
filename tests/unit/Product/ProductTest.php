<?php

namespace ProductDiscounter\Tests\Unit\Product;

use PHPUnit\Framework\TestCase;
use ProductDiscounter\Product\Product;
use ProductDiscounter\Product\ProductId;

class ProductTest extends TestCase
{
    /** @test */
    public function can_be_built_from_id_and_name_and_exported_to_array()
    {
		$productId = new ProductId();
	    $product = $this->createProductWithId($productId);
	    $productData = $product->toArray();

        $this->assertEquals($productId, $productData['id']);
        $this->assertEquals('DZ7SL-92XNB', $productData['sku']);
        $this->assertEquals(10.12, $productData['price']);
    }

	/** @test */
	public function is_serializable_to_json()
	{
		$product = $this->createProductWithId(new ProductId('a3639e83-8d33-4dc9-9917-07017029fc14'));

		$this->assertEquals('{"id":"a3639e83-8d33-4dc9-9917-07017029fc14","sku":"DZ7SL-92XNB","price":10.12}', json_encode($product));
	}

    /** @test */
    public function is_equal_to_another_product_with_same_properties()
    {
        $productId = new ProductId();
	    $product1 = $this->createProductWithId($productId);
	    $product2 = $this->createProductWithId($productId);

        $this->assertTrue($product1->isEqualTo($product2));
    }

	/**
	 * @param ProductId $productId
	 *
	 * @return Product
	 */
	private function createProductWithId(ProductId $productId): Product
	{
		return Product::fromArray([
			"id" => $productId,
			"sku" => 'DZ7SL-92XNB',
			"price" => 10.12
		]);
	}
}
