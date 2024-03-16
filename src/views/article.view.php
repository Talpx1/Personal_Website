<?php /** @var \SC\Entities\Article\Article $article */ ?>

<!DOCTYPE html>
<!-- Hellooooo! Looking for the source code? Here you go: https://github.com/Talpx1/Personal_Website -->
<html lang="it">
<?php partial('head', ['title' => $article->formattedTitle()]) ?>
<body class="article-page page-lang-<?= app()->locale ?> flex flex-col justify-between font-primary text-dark bg-light dark:text-light dark:bg-dark">
    <?php partial('header') ?>
    
    <main class="flex flex-col items-center justify-between gap-16 px-5 lg:px-20">

        <?php if(app()->locale === 'en'): ?>
            <p class="py-5">I'm sorry, but articles in english are not yet available right now :(</p>
        <?php endif ?>
        
        <section class="flex flex-col gap-8 w-full items-center mt-8">
            <h1 class="text-2xl lg:text-4xl font-bold"><?= $article->formattedTitle() ?></h1>
            <div class="flex gap-8 items-center">
                <span>#<?= $article->number ?></span>
                <span class="uppercase px-2 py-1 bg-dark text-light dark:bg-light dark:text-dark rounded-full"><?= t($article->type) ?></span>
            </div>
        </section>

        <article class="flex flex-col gap-16 container items-center mb-24"><?= $article->getContent() ?></article>
    </main>
    <?php partial('footer') ?> 
</body>
</html>