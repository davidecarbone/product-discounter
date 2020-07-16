<?php

use ProductDiscounter\DiscounterEngine\DiscounterEngine;
use ProductDiscounter\Order\Repository;

$container['Order/Repository'] = function($container) {
    $database = $container['MongoDB'];
    assert($database instanceof MongoDB\Database);

    $collection = $database->selectCollection(Repository::COLLECTION_NAME);

    return new Repository($collection);
};

$container['DiscounterEngine'] = function($container) {
	$bundleRepository = $container['Bundle/Repository'];
	$productRepository = $container['Product/Repository'];

	return new DiscounterEngine($bundleRepository, $productRepository);
};
