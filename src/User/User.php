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

	/** @var string */
    private $fullName;

	/** @var string */
    private $address;

	/** @var string */
    private $email;

    /**
     * @param array $data
     *
     * @return User
     */
    public static function fromArray(array $data): User
    {
        $user = new self();

        $user->id = new UserId($data['id']);
        $user->username = $data['username'] ?? null;
        $user->password = $data['password'] ? new Password($data['password']) : null;
	    $user->fullName = $data['fullName'];
	    $user->address = $data['address'];
	    $user->email = $data['email'];

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
            'id' => (string)$this->id,
            'username' => $this->username,
            'password' => $this->password ? $this->password->getHash() : null,
	        'fullName' => $this->fullName,
	        'address' => $this->address,
	        'email' => $this->email,
        ];
    }
}
