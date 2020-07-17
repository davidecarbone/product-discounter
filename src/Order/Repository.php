<?php

namespace ProductDiscounter\Order;

use MongoDB\Collection;
use MongoDB\InsertOneResult;
use ProductDiscounter\User\UserId;

class Repository
{
    public const COLLECTION_NAME = 'Order';

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
	 * @param UserId $userId
	 *
	 * @return Order[]
	 */
	public function findAllByUserId(UserId $userId): array
	{
		$results = $this->collection->find([
			'userId' => (string)$userId
		]);

		if (!$results) {
			return [];
		}

		$orders = [];
		foreach ($results as $result) {
			$orders[] = Order::fromPersistence($result);
		}

		return $orders;
	}

	/**
	 * @param Order $order
	 *
	 * @return InsertOneResult
	 */
    public function insertOrder(Order $order): OrderId
    {
	    $orderData = $order->toPersistence();

        $this->collection->insertOne($orderData);

        return new OrderId($orderData['id']);
    }

	/**
	 * @param OrderId $id
	 */
	public function removeById(OrderId $id)
	{
		$this->collection->deleteOne(['id' => (string)$id]);
	}
}
