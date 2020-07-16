<?php

use Slim\Http\Request;
use Slim\Http\Response;
use ProductDiscounter\Authentication\JWT;
use ProductDiscounter\Configuration\Configuration;
use ProductDiscounter\Controller\OrderController;

$app->post('/orders', function (Request $request, Response $response) {

	$orderRepository = $this->get('Order/Repository');
	$cartRepository = $this->get('Cart/Repository');

    /** @var Configuration */
    $configuration = $this->get('Configuration');

    $jwt = new JWT($configuration->get('JWT_SECRET'));
    $controller = new OrderController($orderRepository, $cartRepository, $jwt, $configuration);

    return $controller->postOrders($request, $response);
})
->add($container->get('JWTMiddleware'));
