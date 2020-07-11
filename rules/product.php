<?php

use ProductDiscounter\Product\Repository;

$container['Product/Repository'] = function($container) {
    $database = $container['MongoDB'];
    assert($database instanceof MongoDB\Database);

    $collection = $database->selectCollection(Repository::COLLECTION_NAME);

    return new Repository($collection);
};
