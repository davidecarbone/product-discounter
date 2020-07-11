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
            'id' => '4d8f38dc-05d4-42a6-93fe-69a72fc533b1',
            'username' => 'admin',
            'password' => '$2y$12$S3RahWt0Uh7DsjOXaiOhceqwy2Ryi.rc/ptYpUCKgK4Fsm1hX9jMS'
        ]);

        $collection->insert([
            'id' => '721d5112-e477-419c-9928-acfbb965c761',
            'username' => 'user',
            'password' => '$2y$12$9QIS/MiyyIap1d0ueI6iWuMO5Kmx485kLDmBMOTH.Y.sHoBWjRWJu'
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
