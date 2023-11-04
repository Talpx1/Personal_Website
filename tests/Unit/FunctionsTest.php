<?php

describe("translate", function() {
    beforeEach(fn() => app());
    afterEach(fn() => \SC\App::dispose());

    it('resolve and translate the given key in the appropriate language', function (string $locale) {
        app()->setLocale($locale);
        expect(t('welcome'))->when(app()->locale==='it', fn(Pest\Expectation $translation) => $translation->toBeString()->toBe('Benvenuto') );
        expect(t('welcome'))->when(app()->locale==='en', fn(Pest\Expectation $translation) => $translation->toBeString()->toBe('Welcome') );
    })->with(['it', 'en']);

    it('replaces placeholders when tags are passed', function () {
        app()->setLocale('en');
        expect(t('hi_im_simone', '<span class="test1">'))->toBeString()->toBe('Hi, I\'m <span class="test1">Simone</span> :)'); 
        expect(t('hi_im_simone', '<div class="test2">'))->toBeString()->toBe('Hi, I\'m <div class="test2">Simone</div> :)'); 
    });

    it('returns the key if no translation is found', function () {
        app()->setLocale('en');
        expect(t('non_existent_translation'))->toBeString()->toBe('non_existent_translation'); 
    });
});

describe("app path", function() {
    it('returns the absolute path of the resource starting from the root of the project', function (string $path) {
        expect(appPath($path))->toBeString()->toBe(dirname(__DIR__, 2)."\\{$path}");
    })->with(["src","public"]);

    it('returns the projects root absolute path when called without param', function () {
        expect(appPath())->toBeString()->toBe(dirname(__DIR__, 2));
    });
});

describe("public path", function() {
    it('returns the absolute path of the resource inside the public folder', function () {
        expect(publicPath("index.php"))->toBeString()->toBe(dirname(__DIR__, 2)."\\public\\index.php");
    });

    it('returns the projects public folder absolute path when called without param', function () {
        expect(publicPath())->toBeString()->toBe(dirname(__DIR__, 2)."\\public");
    });
});

describe("src path", function() {
    it('returns the absolute path of the resource inside the src folder', function () {
        expect(srcPath("bootstrap.php"))->toBeString()->toBe(dirname(__DIR__, 2)."\\src\\bootstrap.php");
    });

    it('returns the projects src folder absolute path when called without param', function () {
        expect(srcPath())->toBeString()->toBe(dirname(__DIR__, 2)."\\src");
    });
});

describe("partial", function() {
    beforeEach(fn() => app()->setLocale("it"));
    afterEach(fn() => \SC\App::dispose());

    it('requires the given partial with params', function () {
        ob_start();
        partial('head', ['title'=>'test']);
        $partial = ob_get_clean();

        expect($partial)->toBeString()->toContain("<head>", '<meta charset="UTF-8">', '<meta name="viewport" content="width=device-width, initial-scale=1.0">', "</head>", "<title>test | Simone Cerruti</title>");        
    });
});

describe("view", function() {
    beforeEach(fn() => app()->setLocale("it"));
    afterEach(fn() => \SC\App::dispose());

    it('requires the given view with params', function () {
        ob_start();
        view('home', ['title'=>'test']);
        $partial = ob_get_clean();

        expect($partial)->toBeString()->toContain('<meta charset="UTF-8">', '<body', "<main", "<title>test | Simone Cerruti</title>");        
    });
});

describe("app", function() {
    it('returns an instance of the App class', function () {
        expect(app())->toBeInstanceOf(\SC\App::class);      
    });
});
