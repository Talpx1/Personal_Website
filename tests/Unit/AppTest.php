<?php
use SC\App;
use SC\Http\Middlewares\Contracts\Middleware;
use function Safe\ob_start;
use function Safe\realpath;

afterEach(fn()=>App::dispose());

describe("singleton", function() {
    it('throws if instantiated with new keyword', function () {
        new App(); // @phpstan-ignore-line
    })->throws(Error::class);


    it('always return same instance', function () {
        $app = App::instance();

        expect(App::instance())->toBe($app);
    });

    it('correctly disposes the singleton instance', function () {
        $app = App::instance();
    
        App::dispose();
    
        expect(App::instance())->not->toBe($app);
    });
});


describe("middleware", function() {
    it('can add a middleware using a valid class-string', function () {
        $app = App::instance();

        $middleware = new class implements Middleware {
            public static bool $hasRun = false;
            public function handle(): void {self::$hasRun = true;}
        };

        $app->addMiddleware($middleware::class);

        expect($middleware::$hasRun)->toBeFalse();

        $app->runMiddlewares();
        
        expect($middleware::$hasRun)->toBeTrue();
    });

    it('can add multiple middlewares using an array of valid class-string', function () {
        $app = App::instance();

        $middleware = new class implements Middleware {
            public static bool $hasRun = false;
            public function handle(): void {self::$hasRun = true;}
        };

        $middleware2 = new class implements Middleware {
            public static bool $hasRun = false;
            public function handle(): void {self::$hasRun = true;}
        };

        $app->addMiddleware([$middleware::class, $middleware2::class]);

        expect($middleware::$hasRun)->toBeFalse();
        expect($middleware2::$hasRun)->toBeFalse();

        $app->runMiddlewares();
        
        expect($middleware::$hasRun)->toBeTrue();
        expect($middleware2::$hasRun)->toBeTrue();
    });

    it('throw if passed middleware does not implement the middleware contract', function () {
        $app = App::instance();

        $middleware = new class {
            public static bool $hasRun = false;
            public function handle(): void {self::$hasRun = true;}
        };

        $app->addMiddleware($middleware::class); //@phpstan-ignore-line
    })->throws(RuntimeException::class, "The middleware passed to addMiddleware must implement the Middleware contract.");
});

describe("locale", function() {
    it('can set locale', function (string $locale) {
        $app = App::instance();

        $app->setLocale($locale);

        expect($app->locale)->toBe($locale);
    })->with(["it", "en"]);

    it('set locale is invalid the fallback locale is used', function () {
        $app = App::instance();

        $app->setLocale('dedqewdq');

        expect($app->locale)->toBe("it");
    });

    it('can get locale with country', function (string $locale, string $locale_with_country) {
        $app = App::instance();

        $app->setLocale($locale);

        expect($app->localeWithCountry())->toBe($locale_with_country);

        App::dispose();
    })->with([["it", "it-it"], ["en", "en-us"]]);

    //TODO: impossible to test without configs
    // it('returns the default locale with country if the locale with country does not exists for the current locale', function () {
    // });

    it('can switch between locales', function () {
        $app = App::instance();

        $app->setLocale("en");

        expect($app->alternateLocale())->toBe("it");
    });
});

describe("route", function() {
    it('can get and set current route', function () {
        $app = App::instance();

        expect($app->currentRoute())->toBe("/");

        $app->setCurrentRoute("test");

        expect($app->currentRoute())->toBe("test");
    });

    it('defaults to home if current route is not set', function () {
        $app = App::instance();

        expect($app->currentRoute())->toBe("/");
    });
});
