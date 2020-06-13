<?php
use \App\Http\Controllers\AuthenticateController;
use \App\Http\Middleware\AuthenticateMiddleware;

$app->get('/login', AuthenticateController::class . ':loginAction')
    ->setName('login');

// 注册页面
$app->get('/register', AuthenticateController::class . ':registerAction')
    ->setName('register');

$app->group('', function (\Slim\Routing\RouteCollectorProxy $group) {
    // 退出登录
    $group->get('/logout', AuthenticateController::class . ':logoutAction')
        ->setName('logout');
})->add(new AuthenticateMiddleware());