<!DOCTYPE html>
<html lang="<?= app()->locale ?>">
<?php partial('head', ['title' => t('not_found')]) ?>
<body class="404-page page-lang-<?= app()->locale ?> flex flex-col justify-between font-primary overflow-hidden m-0 border-0 border-none py-0 text-dark bg-light dark:text-light dark:bg-dark">
    
    <?php partial('header') ?>
    
    <main class="text-center flex flex-col content-center items-center justify-center grow px-5 lg:px-20 gap-20">
        <h1 class="text-6xl">404: <?= t('not_found') ?></h1>
        <p><?= t('not_found_text') ?></p>
    </main>

    <?php partial('footer') ?>    
</body>
</html>