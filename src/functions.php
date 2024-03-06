<?php declare(strict_types=1);

use SC\App;
use function Safe\preg_match;
use function Safe\realpath;

function t(string $key, string ...$tags): string {
    $translations = require(srcPath('lang')."/".app()->locale.".php");

    $translation = $translations[$key] ?? $key;

    foreach ($tags as $key => $tag) {
        $tag_name = null; 
        preg_match("/(?<=<)\w+/m", $tag, $tag_name);
        $translation = str_replace("<{$key}>", $tag, $translation);
        $translation = str_replace("</{$key}>", "</{$tag_name[0]}>", $translation);
    }

    return $translation;
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

/** @param array<string, mixed> $params */
function partial(string $name, array $params = []): void {
    extract($params);
    require srcPath("views/partials/{$name}.partial.php");
}

/** @param array<string, mixed> $params */
function view(string $name, array $params = []): void {
    extract($params);
    require srcPath("views/{$name}.view.php");
}

function app(): App {
    return App::instance();
}