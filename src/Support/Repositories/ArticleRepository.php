<?php declare(strict_types=1);

namespace SC\Support\Repositories;

use SC\Entities\Article\Article;
use function Safe\scandir;

class ArticleRepository {

    protected string $article_dir;

    public function __construct(protected string $type) {
        $this->article_dir = appPath('articles');
    }

    /** 
     * @return Article[] 
     */
    public function latest(int $amount): array {
        $files = $this->allAsFiles();
        return $this->collect(array_splice($files, 0, $amount));
    }

    /** 
     * @return Article[] 
     */
    public function all(): array {
        return $this->collect($this->allAsFiles());
    }

    /** @return string[] */
    protected function allAsFiles(): array {
        return array_diff(scandir($this->article_dir."/{$this->type}", SCANDIR_SORT_DESCENDING), ['.', '..']);
    }

    /** 
     * @param string[] $articles
     * @return Article[] 
     */
    protected function collect(array $articles): array {
        return array_map(fn($article) => new Article($article, $this->type), $articles);
    }

}