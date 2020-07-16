<?php

namespace ProductDiscounter\Cart;

use MongoDB\BSON\ObjectID;
use MongoDB\Collection;
use ProductDiscounter\Product\Product;
use ProductDiscounter\User\UserId;

class Repository
{
    public const COLLECTION_NAME = 'Cart';

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
	 * @param string $cartId
	 *
	 * @return Cart|null
	 */
	public function findById(string $cartId): ?Cart
	{
		$result = $this->collection->findOne([
			'_id' => new ObjectId($cartId)
		]);

		if (!$result) {
			return null;
		}

		return Cart::fromPersistence($result);
	}

    /**
     * @param UserId $userId
     *
     * @return Cart|null
     */
    public function findByUserId(UserId $userId): ?Cart
    {
        $result = $this->collection->findOne([
            'userId' => (string)$userId
        ]);

        if (!$result) {
            return null;
        }

        return Cart::fromPersistence($result);
    }

    /**
     * @param Product $product
     * @param UserId  $userId
     *
     * @return string
     */
    public function addProduct(Product $product, UserId $userId): string
    {
        $cart = $this->findByUserId($userId);

        (null === $cart)
            ? $cart = Cart::withUserIdAndProducts($userId, [$product])
            : $cart->addProduct($product);

        $result = $this->collection->updateOne(
            ['userId' => (string)$userId],
            ['$set' => ['products' => $cart->exportProductsToArray()]],
            ['upsert' => true]
        );

        return (string)$result->getUpsertedId();
    }

    /**
     * @param string $id
     */
    public function removeById(string $id)
    {
        $this->collection->deleteOne(['_id' => new ObjectID($id)]);
    }
}
