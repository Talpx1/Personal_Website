<!DOCTYPE html>
<html lang="<?= app()->locale ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= t("welcome") ?> | Simone Cerruti</title>
    <link rel="stylesheet" href="/css/style.css">
    <script>
        const darkClass = 'dark'
        const shouldBeDark = window.matchMedia('(prefers-color-scheme: dark)').matches
        document.documentElement.classList.toggle(darkClass, shouldBeDark)
    </script>
    <script src="/js/scripts.js"></script>

    <link rel="apple-touch-icon" sizes="180x180" href="/assets/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="/assets/favicon/site.webmanifest">
    <link rel="mask-icon" href="/assets/favicon/safari-pinned-tab.svg" color="#040f0f">
    <link rel="shortcut icon" href="/assets/favicon/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Simone Cerruti">
    <meta name="application-name" content="Simone Cerruti">
    <meta name="msapplication-TileColor" content="#040f0f">
    <meta name="msapplication-config" content="/assets/favicon/browserconfig.xml">
    <meta name="theme-color" content="#030c0c">

    <meta http-equiv="content-language" content="<?= app()->localeWithCountry() ?>">
    <link rel="alternate" href="<?= "https://{$_SERVER['SERVER_NAME']}/".app()->alternateLocale() ?>" hreflang="<?= app()->alternateLocale() ?>" type="text/html">
</head>
<body class="flex flex-col justify-between font-primary overflow-hidden m-0 border-0 border-none py-0 px-5 lg:px-20 text-dark bg-light dark:text-light dark:bg-dark ">
    
    <?php partial('intro') ?>
    
    <?php partial('header') ?>
    
    <?php partial('bg_blobs') ?>
    
    <main class="text-center flex flex-col content-center gap-28 items-center">
        <div class="flex flex-col justify-center gap-5">
            <h1 class="font-bold text-2xl lg:text-4xl tracking-widest"><?= t("hi_im_simone", '<span class="font-accent text-4xl lg:text-6xl rainbow-underline px-1">') ?></h1>
            <h2 class="font-bold text-xl lg:text-2xl tracking-widest"><?= t('a_fullstack_developer', '<span class="font-accent text-2xl lg:text-4xl rainbow-underline px-1">') ?></h2>
        </div>
        <nav class="flex flex-row w-full md:w-2/3 lg:w-fit justify-between md:justify-evenly lg:gap-52 content-center text-l lg:text-xl">
            <a class="font-bold relative transition-all after:transition-all after:h-1 after:w-0 after:duration-300 after:block after:absolute after:bottom-0 after:left-0 hover:after:w-full dark:hover:after:bg-light hover:after:bg-dark" href="/portfolio"><?= t('projects') ?></a>
            <a class="font-bold relative transition-all after:transition-all after:h-1 after:w-0 after:duration-300 after:block after:absolute after:bottom-0 after:left-0 hover:after:w-full dark:hover:after:bg-light hover:after:bg-dark" href="/blog">Blog</a>
            <a class="font-bold relative transition-all after:transition-all after:h-1 after:w-0 after:duration-300 after:block after:absolute after:bottom-0 after:left-0 hover:after:w-full dark:hover:after:bg-light hover:after:bg-dark" href="/about"><?= t('about') ?></a>
        </nav>
    </main>
    
    <?php partial('cursor') ?>

    <?php partial('minigame') ?>
    
    <?php partial('footer') ?>    
</body>
</html>