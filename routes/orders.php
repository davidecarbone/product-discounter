<?php

use Slim\Http\Request;
use Slim\Http\Response;
use ProductDiscounter\Authentication\JWT;
use ProductDiscounter\Configuration\Configuration;
use ProductDiscounter\Controller\OrderController;

$app->get('/orders', function (Request $request, Response $response) {

	$orderRepository = $this->get('Order/Repository');
	$cartRepository = $this->get('Cart/Repository');
	$discounterEngine = $this->get('DiscounterEngine');

	/** @var Configuration */
	$configuration = $this->get('Configuration');

	$jwt = new JWT($configuration->get('JWT_SECRET'));
	$controller = new OrderController($orderRepository, $cartRepository, $discounterEngine, $jwt, $configuration);

	return $controller->getOrders($request, $response);
})
->add($container->get('JWTMiddleware'));

$app->post('/orders', function (Request $request, Response $response) {

	$orderRepository = $this->get('Order/Repository');
	$cartRepository = $this->get('Cart/Repository');
	$discounterEngine = $this->get('DiscounterEngine');

    /** @var Configuration */
    $configuration = $this->get('Configuration');

    $jwt = new JWT($configuration->get('JWT_SECRET'));
    $controller = new OrderController($orderRepository, $cartRepository, $discounterEngine, $jwt, $configuration);

    return $controller->postOrders($request, $response);
})
->add($container->get('JWTMiddleware'));
