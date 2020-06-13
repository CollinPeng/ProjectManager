<?php
use \App\Http\Controllers\AuthenticateController;
use \App\Http\Middleware\AuthenticateMiddleware;

$app->get('/login', AuthenticateController::class . ':loginAction')
    ->setName('login');

$app->group('', function (\Slim\Routing\RouteCollectorProxy $group) {
    // 退出登录
    $group->get('/logout', AuthenticateController::class . ':logoutAction')
        ->setName('logout');
})->add(new AuthenticateMiddleware());