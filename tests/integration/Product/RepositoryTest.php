<?php

namespace ProductDiscounter\Tests\Integration\Product;

use ProductDiscounter\Tests\ContainerAwareTest;
use ProductDiscounter\Product\Repository;
use ProductDiscounter\Product\Product;

class RepositoryTest extends ContainerAwareTest
{
    /** @var Repository */
    private $repository;

    public function setUp()
    {
        parent::setUp();

        $this->repository = $this->container->get('Product/Repository');
    }

	/** @test */
	public function can_find_all_products()
	{
		$products = $this->repository->findAll();

		$this->assertIsArray($products);
		$this->assertInstanceOf(Product::class, $products[0]);
	}

    /** @test */
    public function can_find_a_single_product_by_id()
    {
        $product = $this->repository->findById('ffe089af-3ffc-4ac1-a7da-db4e09ad20b7');

        $this->assertInstanceOf(Product::class, $product);
    }
}
