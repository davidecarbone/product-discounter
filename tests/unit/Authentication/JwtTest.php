<?php

namespace ProductDiscounter\Tests\Unit\Authentication;

use ProductDiscounter\Authentication\JWT;
use ProductDiscounter\Password\Password;
use ProductDiscounter\Tests\ContainerAwareTest;

class JwtTest extends ContainerAwareTest
{
    public function testPasswordValidateAgainstHash()
    {
        $password = new Password('$fV1v!-_er');
        $hash = '$2y$10$Ps8vHqsLl9NizqEn64fr1uAWd..uxLDJF2u.8VW97FU7zlg8xBS8O';

        $this->assertTrue($password->validateAgainstHash($hash));
    }

    public function testJwtEncodeAndDecode()
    {
        $jwtSecret = $this->container->get('Configuration')->get('JWT_SECRET');
        $jwt = new JWT($jwtSecret);

        $expectedUser = [
            'id' => "1",
            'username' => "admin",
            'password' => "test"
        ];

        $token = $jwt->encode($expectedUser);

        $user = $jwt->decode($token);
        $userArray = json_decode(json_encode($user), true);
        unset($userArray['exp']);

        $this->assertEquals($expectedUser, $userArray);
    }
}
