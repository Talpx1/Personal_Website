<?php declare(strict_types=1);

namespace SC\Support\Facades\Article;
use SC\Support\Repositories\ArticleRepository;

/** @mixin ArticleRepository */
class Article {

    protected static string $type;

    /** @param mixed[] $args */
    public static function __callStatic(string $method, array $args): mixed {
        $repository = new ArticleRepository(static::$type);

        return $repository->{$method}(...$args);
    }

}