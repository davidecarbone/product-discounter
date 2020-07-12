<?php

namespace ProductDiscounter\Cart;

use ProductDiscounter\Product\Product;
use ProductDiscounter\Product\ProductId;
use ProductDiscounter\User\UserId;

final class Cart
{
    /** @var string */
    private $id;

    /** @var UserId */
    private $userId;

    /** @var Product[] */
    private $products = [];

    private function __construct()
    {
    }

    /**
     * @param UserId $userId
     * @param Product[] $products
     *
     * @return Cart
     */
    public static function withUserIdAndProducts(UserId $userId, array $products): Cart
    {
        $cart = new self();
        $cart->userId = $userId;

        foreach ($products as $product) {
            $cart->addProduct($product);
        }

        return $cart;
    }

    /**
     * @param array $cartData
     *
     * @return Cart
     */
    public static function fromPersistence(array $cartData): Cart
    {
        $cart = new self();
        $cart->id = (string)$cartData['_id'];
        $cart->userId = new UserId($cartData['userId']);

        foreach ($cartData['products'] as $productData) {
            $product = Product::fromPersistence([
            	"id" => new ProductId($productData['id']),
	            "sku" => $productData['sku'],
	            "price" => $productData['price']
            ]);

            $cart->addProduct($product);
        }

        return $cart;
    }

    /**
     * @return array
     */
    public function exportProductsToArray(): array
    {
        $productArray = [];

        foreach ($this->products as $product) {
            $productArray[] = $product->toArray();
        }

        return $productArray;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'userId' => (string) $this->userId,
            'products' => $this->exportProductsToArray()
        ];
    }

    /**
     * @param Product $product
     *
     * @return bool
     */
    public function containsProduct(Product $product): bool
    {
        if ($this->numberOfProducts() === 0) {
            return false;
        }

        foreach ($this->products as $savedProduct) {
            if ($savedProduct->isEqualTo($product)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return int
     */
    public function numberOfProducts(): int
    {
        return count($this->products);
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product)
    {
        if (!$this->containsProduct($product)) {
            $this->products[] = $product;
        }
    }
}
