<?php

namespace ProductDiscounter\Tests\Integration\Cart;

use ProductDiscounter\Cart\CartId;
use ProductDiscounter\Product\ProductId;
use ProductDiscounter\Tests\ContainerAwareTest;
use ProductDiscounter\User\UserId;
use ProductDiscounter\Cart\Repository;
use ProductDiscounter\Product\Product;
use ProductDiscounter\Cart\Cart;

class RepositoryTest extends ContainerAwareTest
{
    /** @var Repository */
    private $repository;

    /** @var CartId */
    private $insertedId;

    public function setUp()
    {
        parent::setUp();

        $this->repository = $this->container->get('Cart/Repository');
    }

    public function tearDown()
    {
        parent::tearDown();

        if ($this->insertedId) {
            $this->repository->removeById($this->insertedId);
        }
    }

    /** @test */
    public function can_insert_carts()
    {
        $userId = new UserId();

        $this->insertedId = $this->repository
            ->addProduct(Product::fromPersistence([
	            "id" => new ProductId(),
	            "sku" => 'DZ7SL-92XNB',
	            "price" => 10.12
            ]), $userId);

        $cart = $this->repository->findByUserId($userId);

        $this->assertInstanceOf(Cart::class, $cart);
    }
}
