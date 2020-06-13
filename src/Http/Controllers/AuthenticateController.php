<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Response;

class AuthenticateController extends Controller
{
    /**
     *
     * @return ResponseInterface
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function loginAction(): ResponseInterface
    {
        $response = new Response();
        $response->getBody()->write(
            $this->twig->render('authenticate/login.twig')
        );

        return $response;
    }

    /**
     * 退出登录
     * @return ResponseInterface
     */
    public function logoutAction(): ResponseInterface
    {
        $response = new Response();
        $response->getBody()->write('退出登录');

        return $response;
    }
}