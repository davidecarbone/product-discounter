<?php

namespace ProductDiscounter\User;

use ProductDiscounter\Password\Password;

final class User
{
    /** @var UserId */
    private $id;

    /** @var string */
    private $username;

    /** @var Password */
    private $password;

    /**
     * @param array $data
     *
     * @return User
     */
    public static function fromArray(array $data): User
    {
        $user = new self();

        $user->id = new UserId($data['id']);
        $user->username = $data['username'];
        $user->password = new Password($data['password']);

        return $user;
    }

    private function __construct()
    {
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => (string) $this->id,
            'username' => $this->username,
            'password' => $this->password->getHash(),
        ];
    }
}
