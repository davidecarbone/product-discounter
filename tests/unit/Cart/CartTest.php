<?php

namespace ProductDiscounter\Tests\Unit\Cart;

use PHPUnit\Framework\TestCase;
use ProductDiscounter\Product\Product;
use ProductDiscounter\Product\ProductId;
use ProductDiscounter\User\UserId;
use ProductDiscounter\Cart\Cart;

class CartTest extends TestCase
{
	private const TEST_PRODUCT_SKU = 'DZ7SL-92XNB';
	private const TEST_PRODUCT_SKU_2 = 'DZ7SL-92XNC';
	private const TEST_PRODUCT_PRICE = 10.12;

	/** @test */
    public function can_be_built_with_user_id_and_products_and_exported_to_array()
    {
        $productId = new ProductId();
        $userId = new UserId();
        $product = $this->createProductWithIdAndSku($productId);
        $cart = Cart::withUserIdAndProducts($userId, [$product]);
        $cartData = $cart->toArray();

        $this->assertEquals($userId, $cartData['userId']);
        $this->assertEquals([
        	0 => [
	            'id' => $productId,
		        'sku' => self::TEST_PRODUCT_SKU,
		        'price' => self::TEST_PRODUCT_PRICE
	        ]
        ], $cartData['products']);
    }

    /** @test */
    public function can_be_built_from_persistence_and_exported_to_array()
    {
        $productId = new ProductId();
        $userId = new UserId("4d8f38dc-05d4-42a6-93fe-69a72fc533b1");
        $cartData = [
            '_id' => '5e2b2458d68a0ef028767cbc',
            'userId' => "4d8f38dc-05d4-42a6-93fe-69a72fc533b1",
            'products' => [['id' => $productId, 'sku' => self::TEST_PRODUCT_SKU, 'price' => self::TEST_PRODUCT_PRICE]]
        ];

        $cart = Cart::fromPersistence($cartData);
        $cartData = $cart->toArray();

        $this->assertEquals((string)$userId, $cartData['userId']);
	    $this->assertEquals([
		    0 => [
			    'id' => $productId,
			    'sku' => self::TEST_PRODUCT_SKU,
			    'price' => self::TEST_PRODUCT_PRICE
		    ]
	    ], $cartData['products']);
    }

    /** @test */
    public function products_can_be_added_to_it()
    {
        $productId1 = new ProductId();
        $productId2 = new ProductId();
        $product1 = $this->createProductWithIdAndSku($productId1);
        $product2 = $this->createProductWithIdAndSku($productId2, self::TEST_PRODUCT_SKU_2);

        $cart = Cart::withUserIdAndProducts(new UserId(), [$product1]);
        $cart->addProduct($product2);

        $cartData = $cart->toArray();
        $expectedCartData = [
	        ['id' => $productId1, 'sku' => self::TEST_PRODUCT_SKU, 'price' => self::TEST_PRODUCT_PRICE],
	        ['id' => $productId2, 'sku' => self::TEST_PRODUCT_SKU_2, 'price' => self::TEST_PRODUCT_PRICE],
        ];

        $this->assertEquals($expectedCartData, $cartData['products']);
    }

    /** @test */
    public function adding_a_product_already_added_before_will_be_ignored()
    {
        $productId = new ProductId();
	    $product1 = $this->createProductWithIdAndSku($productId);
	    $product2 = $this->createProductWithIdAndSku($productId);

        $cart = Cart::withUserIdAndProducts(new UserId(), [$product1]);
        $cart->addProduct($product2);

        $cartData = $cart->toArray();

	    $this->assertEquals([
		    0 => [
			    'id' => $productId,
			    'sku' => self::TEST_PRODUCT_SKU,
			    'price' => self::TEST_PRODUCT_PRICE
		    ]
	    ], $cartData['products']);
    }

	/**
	 * @param ProductId $productId
	 * @param string    $sku
	 *
	 * @return Product
	 */
	private function createProductWithIdAndSku(ProductId $productId, string $sku = self::TEST_PRODUCT_SKU): Product
	{
		return Product::fromPersistence([
			"id" => $productId,
			"sku" => $sku,
			"price" => self::TEST_PRODUCT_PRICE
		]);
	}
}
