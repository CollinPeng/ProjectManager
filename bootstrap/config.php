<?php
declare(strict_types=1);

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Pixie\Connection;
use Pixie\QueryBuilder\QueryBuilderHandler;

return [
    // 配置 Twig
    Environment::class => function () {
        $loader = new FilesystemLoader(__DIR__ . '/../src/Views');
        return new Environment($loader);
    },

    // 配置数据库 DBAL
    QueryBuilderHandler::class => function () {
        $connection = new Connection('mysql', require_once __DIR__ . '/../config/database.php');
        return new QueryBuilderHandler($connection);
    }
];