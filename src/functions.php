<?php declare(strict_types=1);

function t($key): string {
    return $key; //TODO
}

function appPath(string $path=""): string {
    return realpath(__DIR__."/../{$path}");
}
function publicPath(string $path=""): string {    
    return appPath("public/{$path}");
}

function srcPath(string $path=""): string {    
    return appPath("src/{$path}");
}

function partial(string $name): void {
    require srcPath("views/partials/{$name}.partial.php");
}

function view(string $name): void {
    require srcPath("views/{$name}.view.php");
}