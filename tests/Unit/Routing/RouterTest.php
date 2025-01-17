<?php
use SC\App;
use SC\Http\Routing\Router;

describe("loading routes", function() {
    it('loads route from constructor param', function () {
        $fake_controller = new class{};

        $router = new Router(["fake_route" => [$fake_controller::class, "fake_method"]]);

        expect($router->routes)->toBe(["fake_route" => [$fake_controller::class, "fake_method"]]);
    });

    // it('loads routes from file if passed routes param is empty or omitted', function () {
        //TODO: this would require a virtual fie system and configs
    // });
});

describe("resolve", function() {
    it('resolve route to controller action', function () {
        $fake_controller = new class{
            static bool $called = false;
            function action(): void {self::$called = true;}
        };

        app()->setLocale("it");

        $router = new Router(["/fake_route" => [$fake_controller::class, "action"]]);
        $router->resolve("/fake_route");

        expect($fake_controller::$called)->toBeTrue();

        App::dispose();
    });

    it('resolve route containing locale to controller action', function () {
        $fake_controller = new class{
            static bool $called = false;
            function action(): void {self::$called = true;}
        };

        app()->setLocale("it");

        $router = new Router(["/fake_route" => [$fake_controller::class, "action"]]);
        $router->resolve("/it/fake_route");

        expect($fake_controller::$called)->toBeTrue();

        App::dispose();
    });

    it('resolve empty route to home', function () {
        $home_controller = new class{
            static bool $called = false;
            function action(): void {self::$called = true;}
        };

        app()->setLocale("it");

        $router = new Router(["/" => [$home_controller::class, "action"]]);
        $router->resolve("/it");

        expect($home_controller::$called)->toBeTrue();

        $home_controller::$called = false;

        $router->resolve("");

        expect($home_controller::$called)->toBeTrue();

        App::dispose();
    });

    it('sets http status as 404 if route cant be resolved', function () {
        app()->setLocale("it");

        $router = new Router();

        \Safe\ob_start();
        $router->resolve("/not_found_route");
        \Safe\ob_end_clean();

        expect(http_response_code())->toEqual(404);

        App::dispose();
    });

    it('output 404 if route cant be resolved', function () {
        app()->setLocale("it");

        expect(fn() => (new Router)->resolve("/not_found_route"))->toSee('404-page');

        App::dispose();
    });

});