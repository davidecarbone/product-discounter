<?php

namespace ProductDiscounter\User;

use MongoDB\Collection;
use ProductDiscounter\Password\Password;

class Repository
{
    public const COLLECTION_NAME = 'User';

    /** @var Collection */
    private $collection;

    /**
     * @param Collection $collection
     */
    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * @param string $userId
     *
     * @return User|null
     */
    public function findUserById(string $userId): ?User
    {
        $userData = $this->collection->findOne([
            'id' => $userId
        ]);

        return $userData ? User::fromArray($userData) : null;
    }

    /**
     * @param string $username
     * @param Password $password
     *
     * @return User | null
     */
    public function findUserByUsernameAndPassword(string $username, Password $password): ?User
    {
        $userData = $this->findUserDataByUsername($username);

        if ( ! $userData || ! $password->validateAgainstHash($userData['password'])) {
            return null;
        };

        return User::fromArray($userData);
    }

    /**
     * @param string $username
     *
     * @return array|null
     */
    private function findUserDataByUsername(string $username): ?array
    {
        return $this->collection->findOne([
            'username' => $username
        ]);
    }
}
