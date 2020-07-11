<?php

namespace ProductDiscounter\Tests\Integration\User;

use ProductDiscounter\Password\Password;
use ProductDiscounter\Tests\ContainerAwareTest;
use ProductDiscounter\User\Repository;
use ProductDiscounter\User\User;

class RepositoryTest extends ContainerAwareTest
{
    /** @var Repository */
    private $repository;

    public function setUp()
    {
        parent::setUp();

        $this->repository = $this->container->get('User/Repository');
    }

    /** @test */
    public function users_can_be_fetched_by_username_and_password()
    {
        $user = $this->repository->findUserByUsernameAndPassword('admin', new Password('admin'));

        $this->assertInstanceOf(User::class, $user);
    }
}
