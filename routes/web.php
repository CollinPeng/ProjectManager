<?php
use \App\Http\Controllers\AuthenticateController;
use \App\Http\Middleware\AuthenticateMiddleware;

$app->get('/login', AuthenticateController::class . ':loginAction')
    ->setName('login');

// 处理登录逻辑
$app->post('/login', AuthenticateController::class . ':loginHandlerAction')
    ->setName('login_handler');

// 注册页面
$app->get('/register', AuthenticateController::class . ':registerAction')
    ->setName('register');

// 处理注册逻辑
$app->post('/register', AuthenticateController::class . ':registerHandlerAction')
    ->setName('register_handler');

$app->group('', function (\Slim\Routing\RouteCollectorProxy $group) {
    // 退出登录
    $group->get('/logout', AuthenticateController::class . ':logoutAction')
        ->setName('logout');
})->add(new AuthenticateMiddleware());