<?php declare(strict_types=1);

namespace SC\Http\Middlewares;

use SC\Http\Middlewares\Contracts\Middleware;
use function Safe\parse_url;

class DetectLocale implements Middleware {
    public function handle(): void {
        $uri_path = parse_url($_SERVER['REQUEST_URI'])['path'] ?? "/";
        $locale = explode("/", $uri_path)[1];
        
        app()->setLocale($locale);
    }

}