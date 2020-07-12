<?php

namespace ProductDiscounter\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use ProductDiscounter\Controller\ProductController;
use Slim\Http\Environment;
use Slim\Http\Request;
use Slim\Http\Response;
use ProductDiscounter\Product\Product;
use ProductDiscounter\Product\ProductId;
use ProductDiscounter\Product\Repository;

class ProductControllerTest extends TestCase
{
    /** @var ProductController */
    private $productController;

    /** @var Repository | MockObject */
    private $repositoryMock;

    public function setUp()
    {
        parent::setUp();

        $this->repositoryMock = $this->createMock(Repository::class);
        $this->productController = new ProductController($this->repositoryMock);
    }

    /** @test */
    public function get_products_should_respond_200_with_an_array_of_products()
    {
        $response = new Response();
        $productId = new ProductId();
        $products = [
            Product::fromPersistence([
		        "id" => $productId,
		        "sku" => 'DZ7SL-92XNB',
		        "price" => 10.12
	        ])
        ];

        $this->repositoryMock
            ->expects($this->once())
            ->method('findAll')
            ->willReturn($products);

        $environment = Environment::mock([
            'REQUEST_METHOD' => 'GET',
            'REQUEST_URI' => "/products",
            'QUERY_STRING' => ''
        ]);
        $request = Request::createFromEnvironment($environment);

        $response = $this->productController->getProducts($request, $response);
        $responseContent = $this->getResponseContent($response);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertIsArray($responseContent);
        $this->assertArrayHasKey('id', $responseContent[0]);
        $this->assertArrayHasKey('sku', $responseContent[0]);
        $this->assertArrayHasKey('price', $responseContent[0]);
    }

	/** @test */
	public function get_products_by_id_should_respond_200_with_a_product()
	{
		$response = new Response();
		$productId = new ProductId();
		$product = Product::fromPersistence([
			"id" => $productId,
			"sku" => 'DZ7SL-92XNB',
			"price" => 10.12
		]);

		$this->repositoryMock
			->expects($this->once())
			->method('findById')
			->willReturn($product);

		$environment = Environment::mock([
			'REQUEST_METHOD' => 'GET',
			'REQUEST_URI' => "/products/$productId",
			'QUERY_STRING' => ''
		]);
		$request = Request::createFromEnvironment($environment);
		$request = $request->withAttribute('productId', $productId);

		$response = $this->productController->getProductById($request, $response);
		$responseContent = $this->getResponseContent($response);

		$this->assertEquals(200, $response->getStatusCode());
		$this->assertArrayHasKey('id', $responseContent);
		$this->assertArrayHasKey('sku', $responseContent);
		$this->assertArrayHasKey('price', $responseContent);
	}

    /**
     * @param Response $response
     *
     * @return array
     */
    private function getResponseContent(Response $response): array
    {
        $body = $response->getBody();
        $body->rewind();

        return json_decode($body->getContents(), true);
    }
}
