<?php

namespace ProductDiscounter\Controller;

use InvalidArgumentException;
use Slim\Http\Request;
use Slim\Http\Response;
use ProductDiscounter\Authentication\AuthenticationException;
use ProductDiscounter\Authentication\JWT;
use ProductDiscounter\Password\Password;
use ProductDiscounter\User\Repository;
use ProductDiscounter\User\User;

class LoginController
{
    /** @var JWT */
    private $jwt;

    /** @var Repository */
    private $repository;

    /**
     * @param JWT        $jwt
     * @param Repository $repository
     */
    public function __construct(JWT $jwt, Repository $repository)
    {
        $this->jwt = $jwt;
        $this->repository = $repository;
    }

    /**
     * @param Request  $request
     * @param Response $response
     *
     * @return Response
     */
    public function login(Request $request, Response $response)
    {
        $requestContent = $request->getParsedBody();
        $usernameFromRequest = $requestContent['username'] ?? null;
        $passwordFromRequest = $requestContent['password'] ?? null;

        try {
            $this->assertRequestIsValid($request);

            $password = new Password($passwordFromRequest);
            $user = $this->repository->findUserByUsernameAndPassword($usernameFromRequest, $password);

            $this->assertUserIsValid($user);

        } catch (InvalidArgumentException $exception) {
            return $response->withJson([
                'error' => $exception->getMessage()
            ], 400);
        } catch (AuthenticationException $exception) {
            return $response->withJson([
                'error' => $exception->getMessage()
            ], 401);
        }

        $token = $this->jwt->encode($user->toArray());

        return $response->withJson([
            'JWT' => $token
        ], 200);
    }

    /**
     * @param Request $request
     *
     * @throws InvalidArgumentException
     */
    private function assertRequestIsValid(Request $request)
    {
        $requestContent = $request->getParsedBody();

        if (empty($requestContent['username']) || empty($requestContent['password'])) {
            throw new InvalidArgumentException('Username and password are required.');
        }
    }

    /**
     * @param User|null $user
     *
     * @throws AuthenticationException
     */
    private function assertUserIsValid(?User $user)
    {
        if (null === $user) {
            throw new AuthenticationException('Username and password are not valid.');
        }
    }
}
