<?php

namespace ProductDiscounter\Tests\Unit\User;

use PHPUnit\Framework\TestCase;
use ProductDiscounter\User\User;
use ProductDiscounter\User\UserId;

class UserTest extends TestCase
{
    /** @test */
    public function can_be_built_from_array_and_exported_to_array()
    {
        $userId = new UserId();

        $user = User::fromArray([
            'id' => $userId,
            'username' => 'test',
            'password' => 'test',
	        'fullName' => 'test test',
	        'address' => 'Via test',
	        'email' => 'test@test.com'
        ]);

        $userArray = $user->toArray();

        $this->assertEquals($userId, $userArray['id']);
        $this->assertEquals('test', $userArray['username']);
        $this->assertEquals('test test', $userArray['fullName']);
        $this->assertEquals('Via test', $userArray['address']);
        $this->assertEquals('test@test.com', $userArray['email']);
        $this->assertArrayHasKey('password', $userArray);
    }
}
