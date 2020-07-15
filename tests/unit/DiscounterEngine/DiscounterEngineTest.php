<?php

namespace ProductDiscounter\Tests\Unit\DiscounterEngine;

use PHPUnit\Framework\TestCase;
use ProductDiscounter\Bundle\Bundle;
use ProductDiscounter\Bundle\Repository as BundleRepository;
use ProductDiscounter\Product\Product;
use ProductDiscounter\Product\ProductId;
use ProductDiscounter\Product\Repository as ProductRepository;
use ProductDiscounter\Cart\Cart;
use ProductDiscounter\DiscounterEngine\DiscounterEngine;

class DiscounterEngineTest extends TestCase
{
	/** @var DiscounterEngine */
	private $discounterEngine;

	/** @var BundleRepository */
	private $bundleRepositoryMock;

	/** @var ProductRepository */
	private $productRepositoryMock;

	public function setUp()
	{
		parent::setUp();

		$this->bundleRepositoryMock = $this->createMock(BundleRepository::class);
		$this->productRepositoryMock = $this->createMock(ProductRepository::class);
		$this->discounterEngine = new DiscounterEngine($this->bundleRepositoryMock, $this->productRepositoryMock);
	}

	/** @test */
	public function can_calculate_total_discount_of_bundles()
	{
		$this->productRepositoryMock
			->expects($this->once())
			->method('findMultipleBySkus')
			->with(['TEST-1', 'TEST-2', 'TEST-3'])
			->willReturn([
				Product::fromPersistence([
					"id" => new ProductId(),
					"sku" => 'TEST-1',
					"price" => 10
				]),
				Product::fromPersistence([
					"id" => new ProductId(),
					"sku" => 'TEST-2',
					"price" => 15
				]),
				Product::fromPersistence([
					"id" => new ProductId(),
					"sku" => 'TEST-3',
					"price" => 20
				])
			]);

		$bundle = Bundle::fromPersistence([
			'id' => '1',
			'productSkus' => ['TEST-1', 'TEST-2', 'TEST-3'],
			'discountPercentage' => 10
		]);

		$discount = $this->discounterEngine->calculateBundleTotalDiscount($bundle);

		$this->assertEquals(4.5, $discount);
	}

	/** @test */
	public function applies_discount_if_cart_contains_all_products_included_in_a_bundle()
	{
		$this->bundleRepositoryMock
			->expects($this->once())
			->method('findAll')
			->willReturn([
				Bundle::fromPersistence([
					'id' => '1',
					'productSkus' => ['TEST-1', 'TEST-2', 'TEST-3'],
					'discountPercentage' => 10
				]),
				Bundle::fromPersistence([
					'id' => '1',
					'productSkus' => ['TEST-3', 'TEST-5'],
					'discountPercentage' => 15
				])
			]);

		$this->productRepositoryMock
			->expects($this->once())
			->method('findMultipleBySkus')
			->with(['TEST-1', 'TEST-2', 'TEST-3'])
			->willReturn([
				Product::fromPersistence([
					"id" => new ProductId(),
					"sku" => 'TEST-1',
					"price" => 100
				]),
				Product::fromPersistence([
					"id" => new ProductId(),
					"sku" => 'TEST-2',
					"price" => 50
				]),
				Product::fromPersistence([
					"id" => new ProductId(),
					"sku" => 'TEST-3',
					"price" => 200
				])
			]);

		$cart = Cart::fromPersistence([
			'_id' => '5e2b2458d68a0ef028767cbc',
			'userId' => "4d8f38dc-05d4-42a6-93fe-69a72fc533b1",
			'products' => [
				['id' => 'ffe089af-3ffc-4ac1-a7da-db4e09ad20b7', 'sku' => 'TEST-1', 'price' => 100],
				['id' => '294786ac-8306-4e85-adb4-3c328727660f', 'sku' => 'TEST-2', 'price' => 50],
				['id' => '748112ab-0e2c-4060-919a-8c4c069386fb', 'sku' => 'TEST-3', 'price' => 200],
				['id' => '748112ab-0e2c-4060-919a-8c4c069386fb', 'sku' => 'TEST-4', 'price' => 150],
			]
		]);

		$this->discounterEngine->applyDiscountToCart($cart);

		// we expect a 10% discount to be applied on products TEST-1, TEST-2 and TEST-3
		// so 90 + 45 + 180 + 150 = 465
		$this->assertEquals(465 ,$cart->totalPrice());
	}

	/** @test */
	public function if_cart_contains_all_products_included_in_more_bundles_only_consider_the_bundle_having_largest_discount()
	{
		$this->bundleRepositoryMock
			->expects($this->once())
			->method('findAll')
			->willReturn([
				Bundle::fromPersistence([
					'id' => '1',
					'productSkus' => ['TEST-1', 'TEST-2', 'TEST-3'],
					'discountPercentage' => 10
				]),
				Bundle::fromPersistence([
					'id' => '1',
					'productSkus' => ['TEST-3', 'TEST-5'],
					'discountPercentage' => 15
				])
			]);

		$this->productRepositoryMock
			->expects($this->at(0))
			->method('findMultipleBySkus')
			->with(['TEST-1', 'TEST-2', 'TEST-3'])
			->willReturn([
				Product::fromPersistence([
					"id" => new ProductId(),
					"sku" => 'TEST-1',
					"price" => 100
				]),
				Product::fromPersistence([
					"id" => new ProductId(),
					"sku" => 'TEST-2',
					"price" => 50
				]),
				Product::fromPersistence([
					"id" => new ProductId(),
					"sku" => 'TEST-3',
					"price" => 200
				])
			]);

		$this->productRepositoryMock
			->expects($this->at(1))
			->method('findMultipleBySkus')
			->with(['TEST-3', 'TEST-5'])
			->willReturn([
				Product::fromPersistence([
					"id" => new ProductId(),
					"sku" => 'TEST-3',
					"price" => 200
				]),
				Product::fromPersistence([
					"id" => new ProductId(),
					"sku" => 'TEST-5',
					"price" => 100
				])
			]);

		$cart = Cart::fromPersistence([
			'_id' => '5e2b2458d68a0ef028767cbc',
			'userId' => "4d8f38dc-05d4-42a6-93fe-69a72fc533b1",
			'products' => [
				['id' => 'ffe089af-3ffc-4ac1-a7da-db4e09ad20b7', 'sku' => 'TEST-1', 'price' => 100],
				['id' => '294786ac-8306-4e85-adb4-3c328727660f', 'sku' => 'TEST-2', 'price' => 50],
				['id' => '748112ab-0e2c-4060-919a-8c4c069386fb', 'sku' => 'TEST-3', 'price' => 200], // 170
				['id' => '748112ab-0e2c-4060-919a-8c4c069386fb', 'sku' => 'TEST-4', 'price' => 150],
				['id' => '748112ab-0e2c-4060-919a-8c4c069386fb', 'sku' => 'TEST-5', 'price' => 100] // 85
			]
		]);

		$this->discounterEngine->applyDiscountToCart($cart);

		// we expect a 15% discount to be applied on products TEST-3 and TEST-5
		// so 100 + 50 + 170 + 150 + 85 = 555
		$this->assertEquals(555 ,$cart->totalPrice());
	}
}
