<?php

namespace ProductDiscounter\Tests\End2End;

use GuzzleHttp\Client;
use ProductDiscounter\Tests\ContainerAwareTest;

class LoginTest extends ContainerAwareTest
{
    /** @var Client */
    private $client;

    public function setUp()
    {
        parent::setUp();
        $this->client = $this->container->get('HttpClient');
    }

    /** @test */
    public function post_login_should_respond_with_a_jwt_token()
    {
        $response = $this->client->post('login', [
            'json' => ['username' => 'user', 'password' => 'user']
        ]);

        $responseBody = json_decode($response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertArrayHasKey('JWT', $responseBody);
    }
}
