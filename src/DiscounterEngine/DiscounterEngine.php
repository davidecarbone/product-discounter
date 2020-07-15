<?php

namespace ProductDiscounter\DiscounterEngine;

use ProductDiscounter\Bundle\Bundle;
use ProductDiscounter\Bundle\Repository as BundleRepository;
use ProductDiscounter\Product\Repository as ProductRepository;
use ProductDiscounter\Cart\Cart;

class DiscounterEngine
{
	/** @var BundleRepository */
	private $bundleRepository;

	/** @var ProductRepository */
	private $productRepository;

	/**
	 * @param BundleRepository  $bundleRepository
	 * @param ProductRepository $productRepository
	 */
	public function __construct(BundleRepository $bundleRepository, ProductRepository $productRepository)
	{
		$this->bundleRepository = $bundleRepository;
		$this->productRepository = $productRepository;
	}

	/**
	 * @param Cart $cart
	 */
	public function applyDiscountToCart(Cart $cart)
	{
		$bundles = $this->bundleRepository->findAll();
		$selectedBundle = $this->selectBundleWithMaximumDiscount($bundles, $cart);

		if (null !== $selectedBundle) {
			$cart->applyDiscountPercentageToProductsBySku(
				$selectedBundle->discountPercentage(),
				$selectedBundle->productSkus()
			);
		}
	}

	/**
	 * @param Bundle[] $bundles
	 * @param Cart  $cart
	 *
	 * @return Bundle|null
	 */
	private function selectBundleWithMaximumDiscount(array $bundles, Cart $cart): ?Bundle
	{
		$maximumAppliedDiscount = 0;
		$selectedBundle = null;

		foreach ($bundles as $bundle) {
			if ($this->cartContainsBundle($cart, $bundle)) {
				$bundleTotalDiscount = $this->calculateBundleTotalDiscount($bundle);

				if ($bundleTotalDiscount > $maximumAppliedDiscount) {
					$maximumAppliedDiscount = $bundleTotalDiscount;
					$selectedBundle = $bundle;
				}
			}
		}

		return $selectedBundle;
	}

	/**
	 * @param Cart $cart
	 * @param Bundle $bundle
	 *
	 * @return bool
	 */
	private function cartContainsBundle(Cart $cart, Bundle $bundle): bool
	{
		$skuIntersection = array_intersect($cart->allProductSkus(), $bundle->productSkus());

		return
			count(array_diff($bundle->productSkus(), $skuIntersection)) == 0
			&& count(array_diff($skuIntersection, $bundle->productSkus())) == 0;
	}

	/**
	 * @param Bundle $bundle
	 *
	 * @return float
	 */
	public function calculateBundleTotalDiscount(Bundle $bundle): float
	{
		$products = $this->productRepository->findMultipleBySkus($bundle->productSkus());
		$totalDiscount = 0;

		foreach ($products as $product) {
			$productPrice = $product->toArray()['price'];
			$totalDiscount += ($productPrice * $bundle->discountPercentage()) / 100;
		}

		return $totalDiscount;
	}
}
