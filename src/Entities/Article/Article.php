<?php declare(strict_types=1);

namespace SC\Entities\Article;

class Article {

    public readonly int $number;
    public readonly string $title;
    public readonly string $file;
    public readonly string $link;
    public readonly string $type;

    public function __construct(string $article_name, string $type) {
        $this->number = (int)substr($article_name, 0, 4);

        $file_name = pathinfo(substr($article_name, 5), PATHINFO_FILENAME);

        $this->title = str_replace("_", " ", $file_name);
        $this->file = appPath("articles/{$type}/{$article_name}");
        $this->link = "/blog/article/{$file_name}";
        $this->type = $type;
    }

    public function formattedTitle(): string {
        if(strlen($this->title) <= 30) {
            return $this->title;
        }

        return substr($this->title, 0, 30)."...";
    }

    public function titleForList(): string {
        return "#{$this->number} - {$this->formattedTitle()}";
    }

}