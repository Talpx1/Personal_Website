<?php declare(strict_types=1);

use SC\Http\Controllers\ArticleController;
use SC\Http\Controllers\CommonController;

return [
    '/' => [CommonController::class, 'home'],
    '/blog' => [CommonController::class, 'blog'],
    '/about' => [CommonController::class, 'about'],
    '/projects' => [CommonController::class, 'projects'],
    '/blog/article/{type}/{slug}' => [ArticleController::class, 'show'],
];