<?php declare(strict_types=1);

use SC\App;
use SC\Http\Routing\Router;

$app = new App();

$app->runMiddlewares();

$router = new Router();

$router->resolve();