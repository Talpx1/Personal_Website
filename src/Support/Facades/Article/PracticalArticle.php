<?php declare(strict_types=1);

namespace SC\Support\Facades\Article;

/** @mixin \SC\Support\Repositories\ArticleRepository */
final class PracticalArticle extends Article {
    protected static string $type = 'practical';
}