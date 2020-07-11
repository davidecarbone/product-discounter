<?php
/**
 * @var Slim\Container $container
 */

use Slim\Http\Request;
use Slim\Http\Response;
use ProductDiscounter\Controller\ProductController;

$app->get('/products', function (Request $request, Response $response) {

	$productRepository = $this->get('Product/Repository');
	$controller = new ProductController($productRepository);

	return $controller->getProducts($request, $response);
});

$app->get('/products/{productId}', function (Request $request, Response $response) {

    $productRepository = $this->get('Product/Repository');
    $controller = new ProductController($productRepository);

    return $controller->getProductById($request, $response);
});
