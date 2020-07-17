<?php

namespace ProductDiscounter\Controller;

use MongoDB\Driver\Exception\InvalidArgumentException;
use ProductDiscounter\Authentication\JWT;
use ProductDiscounter\Cart\Cart;
use ProductDiscounter\Cart\CartNotFoundException;
use ProductDiscounter\Cart\CartOwnershipException;
use ProductDiscounter\Cart\Repository as CartRepository;
use ProductDiscounter\Configuration\Configuration;
use ProductDiscounter\DiscounterEngine\DiscounterEngine;
use ProductDiscounter\Order\Order;
use ProductDiscounter\Order\Repository as OrderRepository;
use ProductDiscounter\User\User;
use ProductDiscounter\User\UserId;
use Slim\Http\Request;
use Slim\Http\Response;

class OrderController
{
    /** @var OrderRepository */
    private $orderRepository;

	/** @var CartRepository */
    private $cartRepository;

	/** @var DiscounterEngine */
	private $discounterEngine;

    /** @var JWT */
    private $jwt;

    /** @var Configuration */
	private $configuration;

	/**
	 * @param OrderRepository  $orderRepository
	 * @param CartRepository   $cartRepository
	 * @param DiscounterEngine $discounterEngine
	 * @param JWT              $jwt
	 * @param Configuration    $configuration
	 */
	// TODO introduce OrderService
    public function __construct(OrderRepository $orderRepository, CartRepository $cartRepository,
                                DiscounterEngine $discounterEngine, JWT $jwt, Configuration $configuration)
    {
        $this->orderRepository = $orderRepository;
        $this->cartRepository = $cartRepository;
        $this->discounterEngine = $discounterEngine;
        $this->jwt = $jwt;
        $this->configuration = $configuration;
    }

	/**
	 * @param Request  $request
	 * @param Response $response
	 *
	 * @return Response
	 */
    public function getOrders(Request $request, Response $response)
    {
	    $userData = $this->retrieveUserDataFromRequest($request);
	    $user = User::fromArray($userData);
	    $userId = new UserId($user->toArray()['id']);

	    $orders = $this->orderRepository->findAllByUserId($userId);

	    return $response->withJson($orders, 200);
    }

	/**
	 * @param Request  $request
	 * @param Response $response
	 *
	 * @return Response
	 */
	public function postOrders(Request $request, Response $response)
	{
		$userData = $this->retrieveUserDataFromRequest($request);
		$user = User::fromArray($userData);
		$requestContent = $request->getParsedBody();
		$cartId = $requestContent['cartId'] ?? null;

		try {
			$cart = $this->cartRepository->findById($cartId);

			$this->assertCartExists($cart);
			$this->assertCartBelongsToUser($cart, $user);

			$this->discounterEngine->applyDiscountToCart($cart);

		} catch (InvalidArgumentException $e) {
			return $response->withJson([
				'error' => 'Error while processing order: cart is not valid.',
			], 400);
		} catch (CartNotFoundException | CartOwnershipException $e) {
			return $response->withJson([
				'error' => 'Error while processing order: cart is not valid.',
			], 422);
		}

		$order = Order::fromCartAndUser($cart, $user);
		$orderId = (string)$this->orderRepository->insertOrder($order);

		$this->cartRepository->removeById($cartId);

		return $response
			->withHeader('Location', $this->configuration->get('API_BASE_URL') . "orders/$orderId")
			->withJson([
				'orderId' => $orderId,
				'message' => 'Order processed successfully.',
			], 201);
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

	/**
	 * @param Cart|null $cart
	 *
	 * @throws CartNotFoundException
	 */
	private function assertCartExists(?Cart $cart)
	{
		if (null === $cart) {
			throw new CartNotFoundException("Cart not found while processing order.");
		}
	}

	/**
	 * @param Cart|null $cart
	 * @param User      $user
	 *
	 * @throws CartOwnershipException
	 */
	private function assertCartBelongsToUser(?Cart $cart, User $user)
	{
		if ($cart->toArray()['userId'] !== $user->toArray()['id']) {
			throw new CartOwnershipException("Cart does not not belong to user");
		}
	}
}
