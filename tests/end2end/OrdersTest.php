<?php

namespace ProductDiscounter\Tests\End2End;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use ProductDiscounter\Tests\ContainerAwareTest;

class OrdersTest extends ContainerAwareTest
{
	private const TEST_VALID_JWT = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjRkOGYzOGRjLTA1ZDQtNDJhNi05M2ZlLTY5YTcyZmM1MzNiMSIsInVzZXJuYW1lIjoiYWRtaW4iLCJwYXNzd29yZCI6IiQyeSQxMCRBeTcxZEJuSEtCTkVFYkp1MTJFN1R1b2J2WUplM0VPR3d3OWhFMUZUSHdPVlVrZW50ZEY0UyIsImV4cCI6MTU5NTE0OTM1Mn0.LtcHTIYgTuRa8oZizLuqYg5RhXTZHrE8ns7JehCQDv4';
	private const TEST_INVALID_JWT = 'ajskhf.eyJpZCI6IjRkOGYzOGRjLTA1ZDQtNDJhNi05M2ZlLTY5YTcyZmM1MzNiMSIsInVzZXJuYW1lIjoiYWRtaW4iLCJwYXNzd29yZCI6IiQyeSQxMCRBeTcxZEJuSEtCTkVFYkp1MTJFN1R1b2J2WUplM0VPR3d3OWhFMUZUSHdPVlVrZW50ZEY0UyIsImV4cCI6MTU5NTE0OTM1Mn0.LtcHTIYgTuRa8oZizLuqYg5RhXTZHrE8ns7JehCQDv4';

    /** @var Client */
    private $client;

    public function setUp()
    {
        parent::setUp();
        $this->client = $this->container->get('HttpClient');
    }

	/** @test */
	public function post_orders_with_formally_invalid_cartId_should_respond_400()
	{
		$statusCode = null;
		$responseBody = [];

		try {
			$this->client->post('orders', [
				'headers' => ['JWT' => self::TEST_VALID_JWT],
				'json' => ['cartId' => '121231231']
			]);
		} catch (ClientException $e) {
			if ($e->hasResponse()) {
				$statusCode = $e->getResponse()->getStatusCode();
				$responseBody = json_decode($e->getResponse()->getBody()->getContents(), true);
			}
		}

		$this->assertEquals(400, $statusCode);
		$this->assertIsArray($responseBody);
	}

	/** @test */
	public function post_orders_with_nonexistent_cartId_should_respond_422()
	{
		$statusCode = null;
		$responseBody = [];

		try {
			$this->client->post('orders', [
				'headers' => ['JWT' => self::TEST_VALID_JWT],
				'json' => ['cartId' => '5f1061660a402863046ffc6a']
			]);
		} catch (ClientException $e) {
			if ($e->hasResponse()) {
				$statusCode = $e->getResponse()->getStatusCode();
				$responseBody = json_decode($e->getResponse()->getBody()->getContents(), true);
			}
		}

		$this->assertEquals(422, $statusCode);
		$this->assertIsArray($responseBody);
	}

	/** @test */
	public function post_orders_with_invalid_jwt_should_respond_401_with_an_error()
	{
		$statusCode = null;
		$responseBody = [];

		try {
			$this->client->post('orders', [
				'headers' => ['JWT' => self::TEST_INVALID_JWT],
				'json' => ['cartId' => '5f1061660a402863046ffc6c']
			]);
		} catch (ClientException $e) {
			if ($e->hasResponse()) {
				$statusCode = $e->getResponse()->getStatusCode();
				$responseBody = json_decode($e->getResponse()->getBody()->getContents(), true);
			}
		}

		$this->assertEquals(401, $statusCode);
		$this->assertArrayHasKey('error', $responseBody);
	}
}
