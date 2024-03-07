<?php declare(strict_types=1);

use SC\App;
use SC\Http\Middlewares\DetectLocale;
use SC\Http\Routing\Router;
use function Safe\parse_url;

$app = App::instance();

$app->addMiddleware([
    DetectLocale::class
]);

$app->runMiddlewares();

$router = new Router();

$uri = parse_url($_SERVER['REQUEST_URI'])['path'] ?? "/";
$router->resolve($uri);