<?php

namespace ProductDiscounter\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use ProductDiscounter\Cart\Cart;
use Slim\Http\Environment;
use Slim\Http\Request;
use Slim\Http\Response;
use ProductDiscounter\Authentication\JWT;
use ProductDiscounter\Controller\CartController;
use ProductDiscounter\Product\Product;
use ProductDiscounter\Product\ProductId;
use ProductDiscounter\User\UserId;
use ProductDiscounter\Cart\Repository as CartRepository;
use ProductDiscounter\Product\Repository as ProductRepository;

class CartControllerTest extends TestCase
{
    /** @var CartController */
    private $cartController;

    /** @var JWT | MockObject */
    private $jwtMock;

    /** @var CartRepository | MockObject */
    private $cartRepositoryMock;

    /** @var ProductRepository | MockObject */
    private $productRepositoryMock;

    public function setUp()
    {
        parent::setUp();

        $this->cartRepositoryMock = $this->createMock(CartRepository::class);
        $this->productRepositoryMock = $this->createMock(ProductRepository::class);
        $this->jwtMock = $this->createMock(JWT::class);
        $this->cartController = new CartController($this->cartRepositoryMock, $this->productRepositoryMock, $this->jwtMock);
    }

	/** @test */
	public function get_products_should_respond_200_with_array_of_products()
	{
		$response = new Response();
		$userId = new UserId();
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

		$this->jwtMock
			->expects($this->once())
			->method('decode')
			->willReturn(['id' => (string)$userId, 'username' => 'test', 'password' => 'test']);

		$this->cartRepositoryMock
			->expects($this->once())
			->method('findByUserId')
			->with($userId)
			->willReturn($cart);

		$environment = Environment::mock([
			'REQUEST_METHOD' => 'GET',
			'REQUEST_URI' => "/carts/products",
			'QUERY_STRING' => ''
		]);
		$request = Request::createFromEnvironment($environment);
		$request = $request->withHeader('JWT', 'abc123');

		$response = $this->cartController->getProducts($request, $response);
		$responseContent = $this->getResponseContent($response);

		$this->assertEquals(200, $response->getStatusCode());
		$this->assertIsArray($responseContent);
		$this->assertCount(1, $responseContent);
	}

    /** @test */
    public function put_products_with_a_valid_product_should_respond_200_with_message_and_cart_id()
    {
        $response = new Response();
        $productId = new ProductId();
        $product = Product::fromPersistence([
	        "id" => $productId,
	        "sku" => 'DZ7SL-92XNB',
	        "price" => 10.12
        ]);

        $this->jwtMock
            ->expects($this->once())
            ->method('decode')
            ->willReturn(['id' => (string) new UserId(), 'username' => 'test', 'password' => 'test']);

        $this->productRepositoryMock
            ->expects($this->once())
            ->method('findById')
            ->with($productId)
            ->willReturn($product);

        $this->cartRepositoryMock
            ->expects($this->once())
            ->method('addProduct')
            ->with($product);

        $environment = Environment::mock([
            'REQUEST_METHOD' => 'PUT',
            'REQUEST_URI' => "/carts/products",
            'QUERY_STRING' => ''
        ]);
        $request = Request::createFromEnvironment($environment);
        $request = $request->withHeader('JWT', 'abc123');
        $request = $request->withAttribute('productId', $productId);

        $response = $this->cartController->putProducts($request, $response);
        $responseContent = $this->getResponseContent($response);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertArrayHasKey('message', $responseContent);
	    $this->assertArrayHasKey('cartId', $responseContent);
    }

    /** @test */
    public function put_products_with_non_existing_product_should_respond_422_with_an_error()
    {
        $response = new Response();
        $productId = new ProductId();

        $this->jwtMock
            ->expects($this->once())
            ->method('decode')
            ->willReturn(['id' => 1, 'username' => 'test', 'password' => 'test']);

        $this->productRepositoryMock
            ->expects($this->once())
            ->method('findById')
            ->with($productId)
            ->willReturn(null);

        $this->cartRepositoryMock
            ->expects($this->never())
            ->method('addProduct');

        $environment = Environment::mock([
            'REQUEST_METHOD' => 'PUT',
            'REQUEST_URI' => "/carts/products",
            'QUERY_STRING' => ''
        ]);
        $request = Request::createFromEnvironment($environment);
        $request = $request->withHeader('JWT', 'abc123');
        $request = $request->withAttribute('productId', $productId);

        $response = $this->cartController->putProducts($request, $response);
        $responseContent = $this->getResponseContent($response);

        $this->assertEquals(422, $response->getStatusCode());
        $this->assertArrayHasKey('error', $responseContent);
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
