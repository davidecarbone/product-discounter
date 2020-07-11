<?php

use ProductDiscounter\User\Repository;

$container['User/Repository'] = function($container) {
    $database = $container['MongoDB'];
    assert($database instanceof MongoDB\Database);

    $collection = $database->selectCollection(Repository::COLLECTION_NAME);

    return new Repository($collection);
};
