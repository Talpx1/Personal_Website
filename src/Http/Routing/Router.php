<?php declare(strict_types=1);

namespace SC\Http\Routing;

/**
 * @phpstan-type RouteList array<string, array{class-string, string}>
 */

final class Router {

    /** @var RouteList */
    public readonly array $routes;

    /** @param RouteList $routes */
    public function __construct(array $routes = []) {
        $this->routes = $routes ?: require_once srcPath("Http/Routing/routes.php");
    }

    public function resolve(string $uri): void {
        /** @var string */
        $route = str_replace("/".app()->locale, '', $uri);
        
        if(empty($route)) $route = '/';

        app()->setCurrentRoute($route);

        [$controller, $method] = $this->routes[$route];

        (new $controller)->{$method}();
    }

}