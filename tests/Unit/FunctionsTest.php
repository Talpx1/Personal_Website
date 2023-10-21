<?php

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
