<?php

namespace ProductDiscounter\Tests\End2End;

use GuzzleHttp\Client;
use ProductDiscounter\Tests\ContainerAwareTest;

class ProductsTest extends ContainerAwareTest
{
    /** @var Client */
    private $client;

    public function setUp()
    {
        parent::setUp();
        $this->client = $this->container->get('HttpClient');
    }

    /** @test */
    public function get_products_should_respond_200_with_an_array_of_products()
    {
        $response = $this->client->get('products');
        $responseBody = json_decode($response->getBody(), true);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertIsArray($responseBody);
	    $this->assertArrayHasKey('id', $responseBody[0]);
	    $this->assertArrayHasKey('sku', $responseBody[0]);
	    $this->assertArrayHasKey('price', $responseBody[0]);
    }

	/** @test */
	public function get_products_id_should_respond_200_with_a_product()
	{
		$response = $this->client->get('products/ffe089af-3ffc-4ac1-a7da-db4e09ad20b7');
		$responseBody = json_decode($response->getBody(), true);

		$this->assertEquals(200, $response->getStatusCode());
		$this->assertArrayHasKey('id', $responseBody);
		$this->assertArrayHasKey('sku', $responseBody);
		$this->assertArrayHasKey('price', $responseBody);
	}
}
