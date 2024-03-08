<?php declare(strict_types=1);
use SC\App;
use SC\Http\Controllers\CommonController;
use function Safe\ob_start;

beforeEach(fn()=>app()->setLocale('en'));
afterEach(fn()=>App::dispose());

describe("home", function() {
    test("home method shows home page", function() {
        expect(fn() => (new CommonController)->home())->toSee('home-page');
    });

    test("home method pass title to view", function() {
        expect(fn() => (new CommonController)->home())->toSee('Welcome');
    });
});

describe("projects", function() {
    test("projects method shows projects page", function() {
        expect(fn() => (new CommonController)->projects())->toSee('projects-page');
    });

    test("projects method pass title to view", function() {
        expect(fn() => (new CommonController)->projects())->toSee('Projects');
    });
});

describe("about", function() {
    test("about method shows about page", function() {
        expect(fn() => (new CommonController)->about())->toSee('about-page');
    });

    test("about method pass title to view", function() {
        expect(fn() => (new CommonController)->about())->toSee('About');
    });
});

describe("blog", function() {
    test("blog method shows blog page", function() {
        expect(fn() => (new CommonController)->blog())->toSee('blog-page');
    });

    test("blog method pass title to view", function() {
        expect(fn() => (new CommonController)->blog())->toSee('Blog');
    });
});