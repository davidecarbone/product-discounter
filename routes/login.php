<?php

use Slim\Http\Request;
use Slim\Http\Response;
use ProductDiscounter\Authentication\JWT;
use ProductDiscounter\Configuration\Configuration;
use ProductDiscounter\Controller\LoginController;

$app->post('/login', function (Request $request, Response $response) {

    $userRepository = $this->get('User/Repository');

    /** @var Configuration */
    $configuration = $this->get('Configuration');

    $jwt = new JWT($configuration->get('JWT_SECRET'));
    $controller = new LoginController($jwt, $userRepository);

    return $controller->login($request, $response);
});
