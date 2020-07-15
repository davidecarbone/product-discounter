<?php

namespace ProductDiscounter\Bundle;

use MongoDB\Collection;

class Repository
{
    public const COLLECTION_NAME = 'Bundle';

    /** @var Collection */
    private $collection;

    /**
     * @param Collection $collection
     */
    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

	/**
	 * @return Bundle[]
	 */
	public function findAll(): array
	{
		$results = $this->collection->find();
		$bundles = [];

		foreach ($results as $bundleId => $result) {
			$bundles[] = Bundle::fromPersistence([
				'id' => $bundleId,
				'productSkus' => $result['products'],
				'discountPercentage' => $result['discount']
			]);
		}

		return $bundles;
	}
}
