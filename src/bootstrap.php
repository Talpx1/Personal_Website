<?php declare(strict_types=1);

use SC\App;
use SC\Http\Middlewares\DetectLocale;
use SC\Http\Routing\Router;

$app = App::instance();

$app->addMiddleware([
    DetectLocale::class
]);

$app->runMiddlewares();

$router = new Router();

$router->resolve();