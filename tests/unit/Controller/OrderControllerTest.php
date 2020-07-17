<?php

namespace ProductDiscounter\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use ProductDiscounter\Cart\Cart;
use ProductDiscounter\Configuration\Configuration;
use ProductDiscounter\DiscounterEngine\DiscounterEngine;
use ProductDiscounter\Order\Order;
use ProductDiscounter\Order\OrderId;
use ProductDiscounter\Product\Product;
use ProductDiscounter\Product\ProductId;
use ProductDiscounter\User\User;
use Slim\Http\Environment;
use Slim\Http\Request;
use Slim\Http\Response;
use ProductDiscounter\Authentication\JWT;
use ProductDiscounter\Controller\OrderController;
use ProductDiscounter\User\UserId;
use ProductDiscounter\Cart\Repository as CartRepository;
use ProductDiscounter\Order\Repository as OrderRepository;

class OrderControllerTest extends TestCase
{
    /** @var OrderController */
    private $orderController;

	/** @var OrderRepository | MockObject */
	private $orderRepositoryMock;

    /** @var CartRepository | MockObject */
    private $cartRepositoryMock;

	/** @var DiscounterEngine | MockObject */
	private $discounterEngineMock;

	/** @var JWT | MockObject */
	private $jwtMock;

	/** @var Configuration */
	private $configuration;

    public function setUp()
    {
        parent::setUp();

	    $this->orderRepositoryMock = $this->createMock(OrderRepository::class);
	    $this->cartRepositoryMock = $this->createMock(CartRepository::class);
	    $this->discounterEngineMock = $this->createMock(DiscounterEngine::class);
        $this->jwtMock = $this->createMock(JWT::class);
        $this->configuration = new Configuration(['API_BASE_URL' => 'test']);
	    $this->orderController = new OrderController($this->orderRepositoryMock, $this->cartRepositoryMock,
		    $this->discounterEngineMock, $this->jwtMock, $this->configuration);
    }

	/** @test */
	public function get_orders_should_respond_200_with_an_array_of_orders()
	{
		$response = new Response();
		$userId = new UserId();
		$product = Product::fromPersistence([
			"id" => new ProductId(),
			"sku" => 'DZ7SL-92XNB',
			"price" => 10.12
		]);
		$cart = Cart::withUserIdAndProducts($userId, [$product]);
		$user = User::fromArray([
			'id' => $userId,
			'username' => 'test',
			'password' => 'test',
			'fullName' => 'test test',
			'address' => 'Via test',
			'email' => 'test@test.com'
		]);
		$orders = [Order::fromCartAndUser($cart, $user)];

		$this->jwtMock
			->expects($this->once())
			->method('decode')
			->willReturn(['id' => (string)$userId, 'username' => 'test', 'password' => 'test']);

		$this->orderRepositoryMock
			->expects($this->once())
			->method('findAllByUserId')
			->with($userId)
			->willReturn($orders);

		$environment = Environment::mock([
			'REQUEST_METHOD' => 'GET',
			'REQUEST_URI' => "/orders",
			'QUERY_STRING' => ''
		]);
		$request = Request::createFromEnvironment($environment);

		$response = $this->orderController->getOrders($request, $response);
		$responseContent = $this->getResponseContent($response);

		$this->assertEquals(200, $response->getStatusCode());
		$this->assertIsArray($responseContent);
		$this->assertArrayHasKey('id', $responseContent[0]);
		$this->assertArrayHasKey('userId', $responseContent[0]);
		$this->assertArrayHasKey('userFullName', $responseContent[0]);
		$this->assertArrayHasKey('userAddress', $responseContent[0]);
		$this->assertArrayHasKey('userEmail', $responseContent[0]);
		$this->assertArrayHasKey('cart', $responseContent[0]);
		$this->assertArrayHasKey('id', $responseContent[0]['cart']);
		$this->assertArrayHasKey('userId', $responseContent[0]['cart']);
		$this->assertArrayHasKey('products', $responseContent[0]['cart']);
		$this->assertArrayHasKey('paymentType', $responseContent[0]);
	}

	/** @test */
	public function post_orders_with_valid_cart_should_respond_201_with_order_id_and_message()
	{
		$response = new Response();
		$userId = new UserId();
		$cart = Cart::fromPersistence([
			"id" => '17899aa6-07d8-4f18-bb1e-e574bc08164e',
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
			->method('findById')
			->with('17899aa6-07d8-4f18-bb1e-e574bc08164e')
			->willReturn($cart);

		$this->orderRepositoryMock
			->expects($this->once())
			->method('insertOrder')
			->willReturn(new OrderId());

		$this->cartRepositoryMock
			->expects($this->once())
			->method('removeById')
			->with('17899aa6-07d8-4f18-bb1e-e574bc08164e');

		$this->discounterEngineMock
			->expects($this->once())
			->method('applyDiscountToCart')
			->with($cart);

		$environment = Environment::mock([
			'REQUEST_METHOD' => 'POST',
			'REQUEST_URI' => "/orders",
			'QUERY_STRING' => ''
		]);
		$request = Request::createFromEnvironment($environment);
		$request = $request->withHeader('JWT', 'abc123');
		$request = $request->withParsedBody([
			'cartId' => '17899aa6-07d8-4f18-bb1e-e574bc08164e',
		]);

		$response = $this->orderController->postOrders($request, $response);
		$responseContent = $this->getResponseContent($response);

		$this->assertEquals(201, $response->getStatusCode());
		$this->assertIsArray($responseContent);
		$this->assertArrayHasKey('orderId', $responseContent);
		$this->assertArrayHasKey('message', $responseContent);
	}

	/** @test */
	public function post_orders_with_non_existing_cart_should_respond_422_with_an_error()
	{
		$response = new Response();
		$userId = new UserId();

		$this->jwtMock
			->expects($this->once())
			->method('decode')
			->willReturn(['id' => (string)$userId, 'username' => 'test', 'password' => 'test']);

		$this->cartRepositoryMock
			->expects($this->once())
			->method('findById')
			->with('17899aa6-07d8-4f18-bb1e-e574bc08164e')
			->willReturn(null);

		$this->orderRepositoryMock
			->expects($this->never())
			->method('insertOrder');

		$this->cartRepositoryMock
			->expects($this->never())
			->method('removeById');

		$this->discounterEngineMock
			->expects($this->never())
			->method('applyDiscountToCart');

		$environment = Environment::mock([
			'REQUEST_METHOD' => 'POST',
			'REQUEST_URI' => "/orders",
			'QUERY_STRING' => ''
		]);
		$request = Request::createFromEnvironment($environment);
		$request = $request->withHeader('JWT', 'abc123');
		$request = $request->withParsedBody([
			'cartId' => '17899aa6-07d8-4f18-bb1e-e574bc08164e',
		]);

		$response = $this->orderController->postOrders($request, $response);
		$responseContent = $this->getResponseContent($response);

		$this->assertEquals(422, $response->getStatusCode());
		$this->assertIsArray($responseContent);
		$this->assertArrayHasKey('error', $responseContent);
	}

	/** @test */
	public function post_orders_with_cart_not_belonging_to_user_should_respond_422_with_an_error()
	{
		$response = new Response();
		$userId = new UserId();
		$anotherUserId = new UserId();
		$cart = Cart::fromPersistence([
			"id" => '17899aa6-07d8-4f18-bb1e-e574bc08164e',
			"userId" => $anotherUserId,
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
			->method('findById')
			->with('17899aa6-07d8-4f18-bb1e-e574bc08164e')
			->willReturn($cart);

		$this->orderRepositoryMock
			->expects($this->never())
			->method('insertOrder');

		$this->cartRepositoryMock
			->expects($this->never())
			->method('removeById');

		$this->discounterEngineMock
			->expects($this->never())
			->method('applyDiscountToCart');

		$environment = Environment::mock([
			'REQUEST_METHOD' => 'POST',
			'REQUEST_URI' => "/orders",
			'QUERY_STRING' => ''
		]);
		$request = Request::createFromEnvironment($environment);
		$request = $request->withHeader('JWT', 'abc123');
		$request = $request->withParsedBody([
			'cartId' => '17899aa6-07d8-4f18-bb1e-e574bc08164e',
		]);

		$response = $this->orderController->postOrders($request, $response);
		$responseContent = $this->getResponseContent($response);

		$this->assertEquals(422, $response->getStatusCode());
		$this->assertIsArray($responseContent);
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
