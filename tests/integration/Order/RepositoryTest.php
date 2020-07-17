<?php

namespace ProductDiscounter\Tests\Integration\Order;

use ProductDiscounter\Order\Order;
use ProductDiscounter\Order\OrderId;
use ProductDiscounter\Tests\ContainerAwareTest;
use ProductDiscounter\User\User;
use ProductDiscounter\User\UserId;
use ProductDiscounter\Order\Repository;
use ProductDiscounter\Cart\Cart;

class RepositoryTest extends ContainerAwareTest
{
    /** @var Repository */
    private $repository;

    /** @var OrderId */
    private $insertedId;

    public function setUp()
    {
        parent::setUp();

        $this->repository = $this->container->get('Order/Repository');
    }

    public function tearDown()
    {
        parent::tearDown();

        if ($this->insertedId) {
            $this->repository->removeById(new OrderId($this->insertedId));
        }
    }

	/** @test */
	public function can_find_all_orders_by_user_id()
	{
		$userId = new UserId();
		$this->insertOrderWithUserId($userId);

		$orders = $this->repository->findAllByUserId($userId);

		$this->assertIsArray($orders);
		$this->assertInstanceOf(Order::class, $orders[0]);
	}

    /** @test */
    public function can_insert_orders()
    {
	    $userId = new UserId();
	    $this->insertOrderWithUserId($userId);

        $this->assertInstanceOf(OrderId::class, $this->insertedId);
    }

	/**
	 * @param UserId $userId
	 */
	private function insertOrderWithUserId(UserId $userId)
	{
		$cart = Cart::fromPersistence([
			"_id" => '123',
			"userId" => $userId,
			"products" => [
				[
					'id' => '294786ac-8306-4e85-adb4-3c328727660f',
					'sku' => 'DZ7SL-92XNB',
					'price' => 10.12
				]
			]
		]);
		$user = User::fromArray([
			'id' => $userId,
			'username' => 'test',
			'password' => 'test',
			'fullName' => 'test test',
			'address' => 'Via test',
			'email' => 'test@test.com'
		]);

		$order = Order::fromCartAndUser($cart, $user);
		$this->insertedId = $this->repository->insertOrder($order);
	}
}
