<?php

namespace ProductDiscounter\Controller;

use ProductDiscounter\Product\ProductId;
use Slim\Http\Request;
use Slim\Http\Response;
use ProductDiscounter\Product\Product;
use ProductDiscounter\Product\ProductNotFoundException;
use ProductDiscounter\Product\Repository;

class ProductController
{
    /** @var Repository */
    private $repository;

    /**
     * @param Repository $repository
     */
    public function __construct(Repository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request  $request
     * @param Response $response
     *
     * @return Response
     */
    public function getProducts(Request $request, Response $response)
    {
    	$products = $this->repository->findAll();

        return $response->withJson($products, 200);
    }

	/**
	 * @param Request  $request
	 * @param Response $response
	 *
	 * @return Response
	 */
	public function getProductById(Request $request, Response $response)
	{
		$productId = $request->getAttribute('productId');

		try {
			$product = $this->repository->findById(new ProductId($productId));

			$this->assertProductExists($product);

		} catch (\InvalidArgumentException $exception) {
			return $response->withJson([
				'error' => 'Invalid product id'
			], 400);
		} catch (ProductNotFoundException $exception) {
			return $response->withJson([
				'error' => $exception->getMessage()
			], 404);
		}

		return $response->withJson($product, 200);
	}

    /**
     * @param Product|null $product
     *
     * @throws ProductNotFoundException
     */
    private function assertProductExists(?Product $product)
    {
        if (empty($product)) {
            throw new ProductNotFoundException('Product does not exist.');
        }
    }
}
