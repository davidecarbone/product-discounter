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
	 * @param CartId $cartId
	 *
	 * @return Cart|null
	 */
	public function findById(CartId $cartId): ?Cart
	{
		$result = $this->collection->findOne([
			'id' => (string)$cartId
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
     * @return CartId
     */
    public function addProduct(Product $product, UserId $userId): CartId
    {
        $cart = $this->findByUserId($userId);

        (null === $cart)
            ? $cart = Cart::withUserIdAndProducts($userId, [$product])
            : $cart->addProduct($product);

        $this->collection->updateOne(
            [
            	'id' => (string)$cart->id(),
	            'userId' => (string)$userId
            ],
            ['$set' => ['products' => $cart->exportProductsToArray()]],
            ['upsert' => true]
        );

        return $cart->id();
    }

    /**
     * @param CartId $cartId
     */
    public function removeById(CartId $cartId)
    {
        $this->collection->deleteOne(['id' => $cartId]);
    }
}
