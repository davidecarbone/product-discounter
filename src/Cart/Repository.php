<?php

namespace ProductDiscounter\Cart;

use MongoDB\BSON\ObjectID;
use MongoDB\Collection;
use MongoDB\UpdateResult;
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
     * @return UpdateResult
     */
    public function addProduct(Product $product, UserId $userId): UpdateResult
    {
        $cart = $this->findByUserId($userId);

        (null === $cart)
            ? $cart = Cart::withUserIdAndProducts($userId, [$product])
            : $cart->addProduct($product);

        return $this->collection->updateOne(
            ['userId' => (string)$userId],
            ['$set' => ['products' => $cart->exportProductsToArray()]],
            ['upsert' => true]
        );
    }

    /**
     * @param string $id
     */
    public function removeById(string $id)
    {
        $this->collection->deleteOne(['_id' => new ObjectID($id)]);
    }
}
