<?php declare(strict_types=1);

use SC\App;
use SC\Http\Routing\Router;
use function Safe\ob_start;

beforeEach(fn()=>app()->setLocale('en'));
afterEach(fn()=>App::dispose());

test("'/' routes to home page", function() {
    expect(fn() => (new Router)->resolve("/"))->toSee('home-page');
});

test("'/blog' routes to home page", function() {
    expect(fn() => (new Router)->resolve("/blog"))->toSee('blog-page');
});

test("'/about' routes to home page", function() {
    expect(fn() => (new Router)->resolve("/about"))->toSee('about-page');
});

test("'/projects' routes to home page", function() {
    expect(fn() => (new Router)->resolve("/projects"))->toSee('projects-page');
});

