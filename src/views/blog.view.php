<!DOCTYPE html>
<html lang="<?= app()->locale ?>">
<?php partial('head', ['title' => $title]) ?>
<body class="blog-page page-lang-<?= app()->locale ?> flex flex-col justify-between font-primary overflow-hidden m-0 border-0 border-none py-0 text-dark bg-light dark:text-light dark:bg-dark">
    <?php partial('header') ?>

    <main class="flex justify-between gap-16">
        <section class="flex flex-col gap-4 grow">
            <h2 class="text-center"><?= t('practical_articles', '<span class="text-2xl font-accent">') ?></h2>     
            <?php foreach($practical as $article): ?>
                <a href="<?= $article->link ?>" class="p-2 text-center text-light dark:text-dark bg-dark dark:bg-light rounded-r-full underline">
                    <?= $article->titleForList() ?>
                </a>
            <?php endforeach ?>
        </section>

        <section class="flex flex-col gap-8 text-center" style="max-width: 600px;">
            <p><small>you@simonecerruti.com:/blog$</small></p>
            <h1 class="text-6xl font-bold"><?= $title ?></h1>
            <div class="text-left"><?= t('blog_description', '<span class="text-2xl font-accent">', '<p class="my-4">') ?></div>
        </section>

        <section class="flex flex-col gap-4 grow">
            <h2 class="text-center"><?= t('technical_articles', '<span class="text-2xl font-accent">') ?></h2>     
            <?php foreach($technical as $article): ?>
                <a href="<?= $article->link ?>" class="p-2 text-center text-light dark:text-dark bg-dark dark:bg-light rounded-l-full underline">
                    <?= $article->titleForList() ?>
                </a>
            <?php endforeach ?>
        </section>
    </main>
    
    <?php partial('footer') ?> 
</body>
</html>