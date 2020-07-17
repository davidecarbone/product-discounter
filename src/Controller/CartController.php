<?php

namespace ProductDiscounter\Controller;

use ProductDiscounter\Product\ProductId;
use Slim\Http\Request;
use Slim\Http\Response;
use ProductDiscounter\Authentication\JWT;
use ProductDiscounter\Product\Product;
use ProductDiscounter\Product\ProductNotFoundException;
use ProductDiscounter\User\UserId;
use ProductDiscounter\Cart\Repository as CartRepository;
use ProductDiscounter\Product\Repository as ProductRepository;

class CartController
{
    /** @var CartRepository */
    private $cartRepository;

    /** @var ProductRepository */
    private $productRepository;

    /** @var JWT */
    private $jwt;

    /**
     * @param CartRepository    $cartRepository
     * @param ProductRepository $productRepository
     * @param JWT               $jwt
     */
    public function __construct(CartRepository $cartRepository, ProductRepository $productRepository, JWT $jwt)
    {
        $this->cartRepository = $cartRepository;
        $this->productRepository = $productRepository;
        $this->jwt = $jwt;
    }

	/**
	 * @param Request  $request
	 * @param Response $response
	 *
	 * @return Response
	 */
	public function getProducts(Request $request, Response $response)
	{
		$userData = $this->retrieveUserDataFromRequest($request);
		$cart = $this->cartRepository->findByUserId(new UserId($userData['id']));

		return $response->withJson(
			empty($cart) ? [] : $cart->exportProductsToArray(),
			200
		);
	}

    /**
     * @param Request  $request
     * @param Response $response
     *
     * @return Response
     */
    public function putProducts(Request $request, Response $response)
    {
        $productId = $request->getAttribute('productId');

	    try {
		    $userData = $this->retrieveUserDataFromRequest($request);
		    $product = $this->productRepository->findById(new ProductId($productId));

            $this->assertProductExists($product);
            $cartId = $this->cartRepository->addProduct($product, new UserId($userData['id']));

        } catch (ProductNotFoundException $exception) {
            return $response->withJson([
                'error' => $exception->getMessage()
            ], 422);
        }

        return $response->withJson([
        	'cartId' => (string)$cartId
        ], 200);
    }

    /**
     * @param Product|null $product
     *
     * @throws ProductNotFoundException
     */
    private function assertProductExists(?Product $product)
    {
        if (empty($product)) {
            throw new ProductNotFoundException('Could not add the product to your cart: product does not exist.');
        }
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    private function retrieveUserDataFromRequest(Request $request): array
    {
        $token = $request->getHeader('JWT')[0];
        $userData = json_decode(json_encode($this->jwt->decode($token)), true);

        return $userData;
    }
}
