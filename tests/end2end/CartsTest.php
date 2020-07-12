<?php

namespace ProductDiscounter\Tests\End2End;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use ProductDiscounter\Tests\ContainerAwareTest;

class CartsTest extends ContainerAwareTest
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
    public function put_products_with_a_valid_product_should_respond_200_with_a_message()
    {
        $response = $this->client->put('carts/products/ffe089af-3ffc-4ac1-a7da-db4e09ad20b7', [
            'headers' => ['JWT' => self::TEST_VALID_JWT],
        ]);

        $responseBody = json_decode($response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertArrayHasKey('message', $responseBody);
    }

	/** @test */
	public function put_products_with_a_non_existing_products_hould_respond_422_with_an_error()
	{
		$statusCode = null;
		$responseBody = [];

		try {
			$this->client->put('carts/products/ffe089af-3ffc-4ac1-a7da-db4e09ad2123', [
				'headers' => ['JWT' => self::TEST_VALID_JWT],
			]);
		} catch (ClientException $e) {
			if ($e->hasResponse()) {
				$statusCode = $e->getResponse()->getStatusCode();
				$responseBody = json_decode($e->getResponse()->getBody()->getContents(), true);
			}
		}

		$this->assertEquals(422, $statusCode);
		$this->assertArrayHasKey('error', $responseBody);
	}

	/** @test */
	public function put_products_with_invalid_jwt_should_respond_401_with_an_error()
	{
		$statusCode = null;
		$responseBody = [];

		try {
			$this->client->put('carts/products/ffe089af-3ffc-4ac1-a7da-db4e09ad20b7', [
				'headers' => ['JWT' => self::TEST_INVALID_JWT],
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
