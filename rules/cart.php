<?php

use ProductDiscounter\Cart\Repository;

$container['Cart/Repository'] = function($container) {
    $database = $container['MongoDB'];
    assert($database instanceof MongoDB\Database);

    $collection = $database->selectCollection(Repository::COLLECTION_NAME);

    return new Repository($collection);
};
