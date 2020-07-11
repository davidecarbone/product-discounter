<?php

namespace ProductDiscounter\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Slim\Http\Environment;
use Slim\Http\Request;
use Slim\Http\Response;
use ProductDiscounter\Authentication\JWT;
use ProductDiscounter\Controller\LoginController;
use ProductDiscounter\User\Repository;
use ProductDiscounter\User\User;

class LoginControllerTest extends TestCase
{
    /** @var LoginController */
    private $loginController;

    /** @var JWT | MockObject */
    private $jwtMock;

    /** @var Repository | MockObject */
    private $userRepositoryMock;

    public function setUp()
    {
        parent::setUp();

        $this->userRepositoryMock = $this->createMock(Repository::class);
        $this->jwtMock = $this->createMock(JWT::class);
        $this->loginController = new LoginController($this->jwtMock, $this->userRepositoryMock);
    }

    /** @test */
    public function post_login_successful_should_respond_200_with_jwt()
    {
        $response = new Response();

        $this->userRepositoryMock
            ->expects($this->once())
            ->method('findUserByUsernameAndPassword')
            ->willReturn(User::fromArray([
                'id' => '4d8f38dc-05d4-42a6-93fe-69a72fc533b1',
                'username' => 'test',
                'password' => '$2y$12$S3RahWt0Uh7DsjOXaiOhceqwy2Ryi.rc/ptYpUCKgK4Fsm1hX9jMS'
            ]));

        $environment = Environment::mock([
            'REQUEST_METHOD' => 'POST',
            'REQUEST_URI' => '/login',
            'QUERY_STRING' => ''
        ]);
        $request = Request::createFromEnvironment($environment);
        $request = $request->withParsedBody([
            'username' => 'test',
            'password' => 'test'
        ]);

        $response = $this->loginController->login($request, $response);
        $responseContent = $this->getResponseContent($response);

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertArrayHasKey('JWT', $responseContent);
    }

    /**
     * @test
     * @dataProvider invalidRequestDataProvider
     */
    public function post_login_should_respond_400_when_username_or_password_are_missing($request)
    {
        $response = new Response();

        $this->userRepositoryMock
            ->expects($this->never())
            ->method('findUserByUsernameAndPassword');

        $response = $this->loginController->login($request, $response);
        $responseContent = $this->getResponseContent($response);

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertArrayHasKey('error', $responseContent);
    }

    public function invalidRequestDataProvider()
    {
        $environment = Environment::mock([
            'REQUEST_METHOD' => 'POST',
            'REQUEST_URI' => '/login',
            'QUERY_STRING' => ''
        ]);

        $requestWithNoUsername = Request::createFromEnvironment($environment);
        $requestWithNoUsername = $requestWithNoUsername->withParsedBody([
            'password' => 'test'
        ]);

        $requestWithNoPassword = Request::createFromEnvironment($environment);
        $requestWithNoPassword = $requestWithNoPassword->withParsedBody([
            'username' => 'test'
        ]);

        return [
            [$requestWithNoUsername],
            [$requestWithNoPassword]
        ];
    }

    /** @test */
    public function post_login_should_respond_401_when_username_and_password_are_incorrect()
    {
        $response = new Response();

        $this->userRepositoryMock
            ->expects($this->once())
            ->method('findUserByUsernameAndPassword')
            ->willReturn(null);

        $environment = Environment::mock([
            'REQUEST_METHOD' => 'POST',
            'REQUEST_URI' => '/login',
            'QUERY_STRING' => ''
        ]);
        $request = Request::createFromEnvironment($environment);
        $request = $request->withParsedBody([
            'username' => 'test',
            'password' => 'wrong_password'
        ]);

        $response = $this->loginController->login($request, $response);
        $responseContent = $this->getResponseContent($response);

        $this->assertEquals(401, $response->getStatusCode());
        $this->assertArrayHasKey('error', $responseContent);
    }

    /**
     * @param Response $response
     *
     * @return array
     */
    private function getResponseContent(Response $response): array
    {
        $body = $response->getBody();
        $body->rewind();

        return json_decode($body->getContents(), true);
    }
}
