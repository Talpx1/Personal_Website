<?php declare(strict_types=1);

namespace SC\Http\Routing;

use function Safe\preg_replace;
use function Safe\preg_match;

/**
 * @phpstan-type RouteList array<string, array{class-string, string}>
 */

final class Router {

    /** @var RouteList */
    public readonly array $routes;

    /** @param RouteList $routes */
    public function __construct(array $routes = []) {
        $this->routes = $routes ?: require srcPath("Http/Routing/routes.php");
    }

    public function resolve(string $uri): void { //TODO: test
        /** @var string */
        $uri = str_replace("/".app()->locale, '', $uri);
        
        if(empty($uri)) $uri = '/';

        app()->setCurrentRoute($uri);

        $match = null;

        foreach(array_keys($this->routes) as $route) {
            $regexp = $this->buildMatcher($route);
        
            if(preg_match($regexp, $uri)) {     
                $match = $route;
                break;
            }
        }

        if(is_null($match)) {
            http_response_code(404);
            view('errors/404');
            return;
        }

        [$controller, $method] = $this->routes[$match];


        (new $controller)->{$method}();
    }

    protected function buildMatcher(string $route): string{
        return "/".preg_replace('/{[a-zA-Z0-9-_]+}/', "[a-zA-Z0-9-_]+", str_replace("/", '\/', $route)).'$/';
    }

}