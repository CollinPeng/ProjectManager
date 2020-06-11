<?php
declare(strict_types=1);

use Slim\Factory\AppFactory;
session_start();

$container = require_once __DIR__ . '/../bootstrap/bootstrap.php';

AppFactory::setContainer($container);
$app = AppFactory::create();

require_once __DIR__ . '/../routes/web.php';

$app->run();