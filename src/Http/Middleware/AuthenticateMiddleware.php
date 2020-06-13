<?php
declare(strict_types=1);

namespace App\Http\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Psr7\Response;

/**
 * Authenticate middleware.
 *
 * @package App\Http\Middleware
 */
class AuthenticateMiddleware
{
    public function __invoke(ServerRequestInterface $request, RequestHandlerInterface $handler):ResponseInterface
    {
        $response = $handler->handle($request);
        if (empty($_SESSION['user_id'])) {
            return $response->withHeader('Location', '/login')->withStatus(302);
        }

        return $response;
    }
}