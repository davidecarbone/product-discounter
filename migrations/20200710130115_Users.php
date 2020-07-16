<?php

use Sokil\Mongo\Migrator\AbstractMigration;

class Users extends AbstractMigration
{
    public function up()
    {
        $collection = $this
            ->getDatabase('local')
            ->getCollection('User');

        $collection->insert([
            'id' => '721d5112-e477-419c-9928-acfbb965c761',
            'username' => 'user',
            'password' => '$2y$12$9QIS/MiyyIap1d0ueI6iWuMO5Kmx485kLDmBMOTH.Y.sHoBWjRWJu',
	        'fullName' => 'Guest',
	        'address' => 'Via Roma 1',
	        'email' => 'guest@email.it'
        ]);
    }
    
    public function down()
    {
        $collection = $this
            ->getDatabase('local')
            ->getCollection('User');

        $collection->delete();
    }
}
