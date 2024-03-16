<?php declare(strict_types=1);

namespace SC\Http\Controllers;

use SC\Support\Facades\Article\PracticalArticle;
use SC\Support\Facades\Article\TechnicalArticle;

class ArticleController {   //TODO: test
    public function show(): void {
        $article_type = segment(2);
        $article_name = segment(3);

        $facade = $article_type === 'practical' ? PracticalArticle::class : TechnicalArticle::class;

        $article = $facade::findByName($article_name);

        view('article', ['article' => $article]);
    }

}