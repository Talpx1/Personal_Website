<!DOCTYPE html>
<html lang="<?= $lang ?? "it" ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= t("Welcome") ?> | Simone Cerruti</title>
    <link rel="stylesheet" href="/css/style.css">
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
</head>
<body class="flex flex-col justify-between text-light bg-dark font-primary overflow-hidden">
    
    <?php partial('intro') ?>
    
    <?php partial('header') ?>
    
    <?php partial('bg_blobs') ?>
    
    <main class="text-center flex flex-col content-center gap-28 items-center">
        <div class="flex flex-col justify-center gap-5">
            <h1 class="font-bold text-4xl tracking-widest"><?= t("Hi, I'm") ?> <span class="font-accent text-6xl rainbow-shine px-1">Simone</span> :) </h1>
            <h2 class="font-bold text-2xl tracking-widest"><?= t('A') ?> <span class="font-accent text-4xl rainbow-shine px-1"><?= t('full-stack developer') ?></span>.</h2>
        </div>
        <nav class="flex flex-row gap-52 content-center text-xl">
            <a class="font-bold relative transition-all after:transition-all after:h-1 after:w-0 after:duration-300 after:block after:absolute after:bottom-0 after:left-0 hover:after:w-full hover:after:bg-light" href="https://portfolio.simonecerruti.com"><?= t('Projects') ?></a>
            <a class="font-bold relative transition-all after:transition-all after:h-1 after:w-0 after:duration-300 after:block after:absolute after:bottom-0 after:left-0 hover:after:w-full hover:after:bg-light" href="https://blog.simonecerruti.com">Blog</a>
            <a class="font-bold relative transition-all after:transition-all after:h-1 after:w-0 after:duration-300 after:block after:absolute after:bottom-0 after:left-0 hover:after:w-full hover:after:bg-light" href="/about"><?= t('About') ?></a>
        </nav>
    </main>
    
    <?php partial('cursor') ?>

    <?php partial('minigame') ?>
    
    <?php partial('footer') ?>    
</body>
</html>