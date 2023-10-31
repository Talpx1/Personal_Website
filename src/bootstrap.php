<?php declare(strict_types=1);

use SC\App;

$app = new App();

$app->runMiddlewares();

view('home');