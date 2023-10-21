<!DOCTYPE html>
<html lang="<?= $lang ?? "it" ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= t("Welcome") ?> | Simone Cerruti</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="flex flex-col justify-between text-light bg-dark font-primary">
    <?php partial('header') ?>

    <main class="text-center flex flex-col content-center gap-28 items-center">
        <div class="flex flex-col justify-center gap-5">
            <h1 class="font-bold text-6xl"><?= t("Hi, I'm") ?> <span class="font-accent text-7xl">Simone</span> :) </h1>
            <h2 class="font-bold text-4xl"><?= t('A') ?> <span class="font-accent text-5xl"><?= t('full-stack developer') ?></span>.</h2>
        </div>
        <nav class="flex flex-row gap-52 content-center text-2xl">
            <a class="font-bold" href="https://portfolio.simonecerruti.com"><?= t('Projects') ?></a>
            <a class="font-bold" href="https://blog.simonecerruti.com">Blog</a>
            <a class="font-bold" href="/about"><?= t('About') ?></a>
        </nav>
    </main>

    <?php partial('footer') ?>
</body>
</html>