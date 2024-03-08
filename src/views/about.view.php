<!DOCTYPE html>
<html lang="<?= app()->locale ?>">
<?php partial('head', ['title' => $title]) ?>
<body class="about-page page-lang-<?= app()->locale ?> flex flex-col justify-between font-primary overflow-hidden m-0 border-0 border-none py-0 px-5 lg:px-20 text-dark bg-light dark:text-light dark:bg-dark">
    <?php partial('header') ?>

    <main class="grow grid place-content-center"><?= t('work_in_progress') ?></main>
    
    <?php partial('footer') ?> 
</body>
</html>