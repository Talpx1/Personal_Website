<?php declare(strict_types=1);

use SC\App;
use SC\Http\Routing\Router;

$app = App::instance();

$app->runMiddlewares();

$router = new Router();

$router->resolve();