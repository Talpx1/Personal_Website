<?php declare(strict_types=1);

use SC\App;
use SC\Http\Middlewares\DetectLocale;
use SC\Http\Routing\Router;
use function Safe\ob_start;

beforeEach(fn()=>(App::instance())->addMiddleware(DetectLocale::class));
afterEach(fn()=>App::dispose());

test("home page gets correctly translated based on url segment", function(string $locale) {
    $route = "/{$locale}";

    $_SERVER['REQUEST_URI'] = $route;
    app()->runMiddlewares();

    $content = fn() => (new Router)->resolve($route);
    
    expect($content)->toSee("page-lang-{$locale}");

    expect($content)->when($locale==='it', fn(Pest\Expectation $content) => $content->toSee('Benvenuto'));
    expect($content)->when($locale==='en', fn(Pest\Expectation $content) => $content->toSee('Welcome'));

})->with("valid_locales");

test("blog page gets correctly translated based on url segment", function(string $locale) {
    $route = "/{$locale}/blog";

    $_SERVER['REQUEST_URI'] = $route;
    app()->runMiddlewares();

    $content = fn() => (new Router)->resolve($route);
    
    expect($content)->toSee("page-lang-{$locale}");

    expect($content)->when($locale==='it', fn(Pest\Expectation $content) => $content->toSee("Ciao, ci sto ancora lavorando. Ripassa più avanti!"));
    expect($content)->when($locale==='en', fn(Pest\Expectation $content) => $content->toSee("Hi, I'm still working on this. Check back later!"));

})->with("valid_locales");

test("about page gets correctly translated based on url segment", function(string $locale) {
    $route = "/{$locale}/about";

    $_SERVER['REQUEST_URI'] = $route;
    app()->runMiddlewares();

    $content = fn() => (new Router)->resolve($route);
    
    expect($content)->toSee("page-lang-{$locale}");

    expect($content)->when($locale==='it', fn(Pest\Expectation $content) => $content->toSee("Ciao, ci sto ancora lavorando. Ripassa più avanti!"));
    expect($content)->when($locale==='en', fn(Pest\Expectation $content) => $content->toSee("Hi, I'm still working on this. Check back later!"));

})->with("valid_locales");

test("projects page gets correctly translated based on url segment", function(string $locale) {
    $route = "/{$locale}/projects";

    $_SERVER['REQUEST_URI'] = $route;
    app()->runMiddlewares();

    $content = fn() => (new Router)->resolve($route);
    
    expect($content)->toSee("page-lang-{$locale}");

    expect($content)->when($locale==='it', fn(Pest\Expectation $content) => $content->toSee("Ciao, ci sto ancora lavorando. Ripassa più avanti!"));
    expect($content)->when($locale==='en', fn(Pest\Expectation $content) => $content->toSee("Hi, I'm still working on this. Check back later!"));

})->with("valid_locales");
