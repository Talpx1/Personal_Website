<?php declare(strict_types=1);

namespace SC\Http\Routing;

final class Router {

    private $routes = [];

    public function __construct() {
        $this->routes = require_once __DIR__ ."/routes.php";
    }

    public function resolve(): void {
        $uri_path = parse_url($_SERVER['REQUEST_URI'])['path'];

        $uri = str_replace("/".app()->locale, '', $uri_path);
        
        if(empty($uri)) $uri = '/';

        app()->setCurrentRoute($uri);

        [$controller, $method] = $this->routes[$uri];

        (new $controller)->{$method}();
    }

}