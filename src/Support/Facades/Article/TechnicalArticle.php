<?php declare(strict_types=1);

namespace SC\Support\Facades\Article;

/** @mixin \SC\Support\Repositories\ArticleRepository */
final class TechnicalArticle extends Article {
    protected static string $type = 'technical';
}