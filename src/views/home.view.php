<!DOCTYPE html>
<html lang="<?= app()->locale ?>">
<?php partial('head', ['title' => $title]) ?>
<body class="home-page page-lang-<?= app()->locale ?> flex flex-col justify-between font-primary overflow-hidden m-0 border-0 border-none py-0 text-dark bg-light dark:text-light dark:bg-dark">
    
    <?php partial('intro') ?>
    
    <?php partial('header') ?>
    
    <?php partial('bg_blobs') ?>
    
    <main class="text-center flex flex-col content-center items-center justify-center grow px-5 lg:px-20">
        <div class="flex flex-col content-center gap-28 grow justify-center">
            <div class="flex flex-col justify-center gap-5">
                <h1 class="font-bold whitespace-nowrap text-2xl lg:text-4xl tracking-widest"><?= t("hi_im_simone", '<span class="whitespace-nowrap font-accent text-4xl lg:text-6xl rainbow-underline px-1">') ?> :)</h1>
                <h2 class="font-bold whitespace-nowrap text-xl lg:text-2xl tracking-widest"><?= t('a_fullstack_developer', '<span class="whitespace-nowrap font-accent text-2xl lg:text-4xl rainbow-underline px-1">') ?></h2>
            </div>
            <nav class="flex flex-row w-full md:w-2/3 lg:w-fit justify-between md:justify-evenly lg:gap-52 content-center text-l lg:text-xl">
                <a class="font-bold relative transition-all after:transition-all after:h-1 after:w-0 after:duration-300 after:block after:absolute after:bottom-0 after:left-0 hover:after:w-full dark:hover:after:bg-light hover:after:bg-dark" href="/<?= app()->locale ?>/projects"><?= t('projects') ?></a>
                <a class="font-bold relative transition-all after:transition-all after:h-1 after:w-0 after:duration-300 after:block after:absolute after:bottom-0 after:left-0 hover:after:w-full dark:hover:after:bg-light hover:after:bg-dark" href="/<?= app()->locale ?>/blog">Blog</a>
                <a class="font-bold relative transition-all after:transition-all after:h-1 after:w-0 after:duration-300 after:block after:absolute after:bottom-0 after:left-0 hover:after:w-full dark:hover:after:bg-light hover:after:bg-dark" href="/<?= app()->locale ?>/about"><?= t('about') ?></a>
            </nav>
        </div>

        <div class="hidden xl:flex flex-row gap-2 items-center content-center py-5">
            <?= t("press_space", '<div class="flex content-center items-center px-2 py-1 rounded-md border-dark dark:border-light border border-solid">') ?>      
        </div>
    </main>
    
    <?php partial('cursor') ?>

    <?php partial('minigame') ?>

    <?php partial('footer') ?>    
</body>
</html>