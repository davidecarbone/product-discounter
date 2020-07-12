<?php

namespace ProductDiscounter\Authentication;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Firebase\JWT\SignatureInvalidException;
use UnexpectedValueException;
use ProductDiscounter\User\User;
use DomainException;

class JWTMiddleware
{
    /* @var JWT */
    private $jwt;

    public function __construct(JWT $jwt)
    {
        $this->jwt = $jwt;
    }

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface      $response
     * @param                        $next
     *
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $next)
    {
        if (!$this->isRequestHandlable($request) || !$this->tokenIsValid($request)) {
	        return $response->withJson([
		        'error' => "You are not authorized to access this resource."
	        ], 401);
        }

        return $next($request, $response);
    }

    /**
     * @param ServerRequestInterface $request
     *
     * @return bool
     */
    private function isRequestHandlable(ServerRequestInterface $request) : bool
    {
        return $request->hasHeader('JWT');
    }

    /**
     * @param ServerRequestInterface $request
     *
     * @return bool
     */
    private function tokenIsValid(ServerRequestInterface $request) : bool
    {
        $token = $request->getHeader('JWT')[0];

        try {
            $userData = json_decode(json_encode($this->jwt->decode($token)), true);
        } catch (DomainException | SignatureInvalidException | UnexpectedValueException $e) {
            return false;
        }

        $user = User::fromArray($userData);

        return ($user instanceof User);
    }
}
