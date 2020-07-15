<?php

namespace ProductDiscounter\Bundle;

final class Bundle
{
    /** @var string */
    private $id;

    /** @var string[] */
    private $productSkus = [];

    /** @var int */
    private $discountPercentage;

    private function __construct()
    {
    }

    /**
     * @param array $bundleData
     *
     * @return Bundle
     */
    public static function fromPersistence(array $bundleData): Bundle
    {
	    $bundle = new self();
	    $bundle->id = (string)$bundleData['id'];
		$bundle->productSkus = $bundleData['productSkus'];
	    $bundle->discountPercentage = $bundleData['discountPercentage'];

        return $bundle;
    }

	/**
	 * @return string[]
	 */
    public function productSkus(): array
    {
    	return $this->productSkus;
    }

	/**
	 * @return int
	 */
	public function discountPercentage(): int
	{
		return $this->discountPercentage;
	}
}
