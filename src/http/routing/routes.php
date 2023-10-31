<?php declare(strict_types=1);
use SC\Http\Controllers\CommonController;

return [
    '/' => [CommonController::class, 'home'],
    '/blog' => [CommonController::class, 'blog'],
    '/about' => [CommonController::class, 'about'],
    '/portfolio' => [CommonController::class, 'portfolio'],
];