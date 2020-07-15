<?php

namespace ProductDiscounter\Tests\Integration\Bundle;

use ProductDiscounter\Tests\ContainerAwareTest;
use ProductDiscounter\Bundle\Repository;

class RepositoryTest extends ContainerAwareTest
{
    /** @var Repository */
    private $repository;

    public function setUp()
    {
        parent::setUp();

        $this->repository = $this->container->get('Bundle/Repository');
    }

    /** @test */
    public function can_find_all_bundles()
    {
        $bundles = $this->repository->findAll();

        $this->assertCount(6, $bundles);
    }
}
