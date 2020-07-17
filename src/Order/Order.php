<?php

namespace ProductDiscounter\Order;

use ProductDiscounter\Cart\Cart;
use ProductDiscounter\PaymentType\FakePaymentType;
use ProductDiscounter\PaymentType\PaymentType;
use ProductDiscounter\User\User;

final class Order implements \JsonSerializable
{
	/** @var OrderId */
	private $id;

	/** @var Cart */
	private $cart;

	/** @var User */
	private $user;

	/** @var PaymentType */
	private $paymentType;

	private function __construct()
	{
	}

	/**
	 * @param Cart  $cart
	 * @param User $user
	 *
	 * @return Order
	 */
	public static function fromCartAndUser(Cart $cart, User $user): Order
	{
		$order = new self();
		$order->id = new OrderId();
		$order->cart = $cart;
		$order->user = $user;
		$order->paymentType = new FakePaymentType();

		return $order;
	}

	/**
	 * @param array $orderData
	 *
	 * @return Order
	 */
	public static function fromPersistence(array $orderData): Order
	{
		$order = new self();
		$order->id = new OrderId($orderData['id']);
		$order->cart = Cart::fromPersistence([
			'id' => $orderData['cart']['id'],
			'userId' => $orderData['userId'],
			'products' => $orderData['cart']['products']
		]);
		$order->user = User::fromArray([
			'id' => $orderData['cart']['userId'],
			'fullName' => $orderData['userFullName'],
			'address' => $orderData['userAddress'],
			'email' => $orderData['userEmail'],
		]);
		$order->paymentType = new FakePaymentType();

		return $order;
	}

	/**
	 * @return array
	 */
	public function toPersistence(): array
	{
		$userData = $this->user->toArray();

		return [
			'id' => (string)$this->id,
			'userId' => $userData['id'],
			'userFullName' => $userData['fullName'],
			'userAddress' => $userData['address'],
			'userEmail' => $userData['email'],
			'cart' => $this->cart->toArray(),
			'paymentType' => (string)$this->paymentType
		];
	}

	/**
	 * @return array
	 */
	public function jsonSerialize(): array
	{
		return $this->toPersistence();
	}
}
