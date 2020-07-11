<?php

use GuzzleHttp\Client;
use Slim\Container;
use ProductDiscounter\Authentication\JWT;
use ProductDiscounter\Authentication\JWTMiddleware;
use ProductDiscounter\Configuration\Configuration;

$container['Configuration'] = function() {
    $configuration = include_once(__DIR__ . '/../config/config.php');

    return new Configuration($configuration);
};

$container['MongoDB'] = function () {
    $host = getenv('MONGODB_HOST') ?: 'localhost';
    $client = new MongoDB\Client("mongodb://$host");

    return $client->selectDatabase('local', [
        'typeMap' => [
            'root' => 'array',
            'document' => 'array',
            'array' => 'array',
        ]
    ]);
};

$container['JWTMiddleware'] = function(Container $container) {
    /** @var Configuration */
    $configuration = $container['Configuration'];

    $jwt = new JWT($configuration->get('JWT_SECRET'));

    return new JWTMiddleware($jwt);
};

$container['HttpClient'] = function($container) {
    /** @var Configuration */
    $configuration = $container['Configuration'];

    return new Client([
        'base_uri' => $configuration->get('API_BASE_URL'),
        'timeout' => 10.0,
        'allow_redirects' => false,
    ]);
};
