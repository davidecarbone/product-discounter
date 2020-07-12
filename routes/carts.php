<?php
/**
 * @var Slim\Container $container
 */

use Slim\Http\Request;
use Slim\Http\Response;
use ProductDiscounter\Authentication\JWT;
use ProductDiscounter\Configuration\Configuration;
use ProductDiscounter\Controller\CartController;

$app->put('/carts/products/{productId}', function (Request $request, Response $response) {

    $cartRepository = $this->get('Cart/Repository');
    $productRepository = $this->get('Product/Repository');

    /** @var Configuration */
    $configuration = $this->get('Configuration');

    $jwt = new JWT($configuration->get('JWT_SECRET'));

    $controller = new CartController($cartRepository, $productRepository, $jwt);

    return $controller->putProducts($request, $response);
})
->add($container->get('JWTMiddleware'));
