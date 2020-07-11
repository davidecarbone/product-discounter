<?php

namespace ProductDiscounter\Tests\Unit\Password;

use PHPUnit\Framework\TestCase;
use ProductDiscounter\Password\Password;

class PasswordTest extends TestCase
{
    public function testPasswordValidateAgainstHash()
    {
        $password = new Password('$fV1v!-_er');
        $hash = '$2y$10$Ps8vHqsLl9NizqEn64fr1uAWd..uxLDJF2u.8VW97FU7zlg8xBS8O';

        $this->assertTrue($password->validateAgainstHash($hash));
    }
}
