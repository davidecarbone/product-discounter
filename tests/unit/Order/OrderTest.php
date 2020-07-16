<?php

namespace ProductDiscounter\Tests\Unit\Order;

use PHPUnit\Framework\TestCase;
use ProductDiscounter\Order\Order;
use ProductDiscounter\Product\Product;
use ProductDiscounter\Product\ProductId;
use ProductDiscounter\User\User;
use ProductDiscounter\User\UserId;
use ProductDiscounter\Cart\Cart;

class OrderTest extends TestCase
{
	/** @test */
    public function can_be_built_with_cart_and_user()
    {
        $productId = new ProductId();
        $userId = new UserId();
        $product = $this->createProductWithIdAndSku($productId);
        $cart = Cart::withUserIdAndProducts($userId, [$product]);
	    $user = User::fromArray([
		    'id' => $userId,
		    'username' => 'test',
		    'password' => 'test',
		    'fullName' => 'test test',
		    'address' => 'Via test',
		    'email' => 'test@test.com'
	    ]);
	    $order = Order::fromCartAndUser($cart, $user);

        $this->assertInstanceOf(Order::class, $order);
    }

	/**
	 * @param ProductId $productId
	 * @param string    $sku
	 *
	 * @return Product
	 */
	private function createProductWithIdAndSku(ProductId $productId): Product
	{
		return Product::fromPersistence([
			"id" => $productId,
			"sku" => 'DZ7SL-92XNB',
			"price" => 10.12
		]);
	}
}
