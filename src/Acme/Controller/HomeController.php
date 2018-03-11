<?php declare(strict_types = 1);

namespace Acme\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class HomeController
 * @package Acme\Controller
 */
class HomeController
{
    /**
     * @param ServerRequestInterface $request  Request instance.
     * @param ResponseInterface      $response Response instance.
     * @return ResponseInterface
     */
    public function hello(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $response->withJson([
            'message' => 'hello, world!',
        ]);
    }
}
