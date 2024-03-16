<!DOCTYPE html>
<html lang="<?= app()->locale ?>">
<?php partial('head', ['title' => $title]) ?>
<body class="blog-page page-lang-<?= app()->locale ?> flex flex-col justify-between font-primary overflow-hidden m-0 border-0 border-none py-0 text-dark bg-light dark:text-light dark:bg-dark">
    <?php partial('header') ?>

    <main class="flex justify-between gap-16">
        <section class="flex flex-col gap-4 grow">
            <h2 class="text-center"><?= t('practical_articles') ?></h2>     
            <?php foreach($practical as $article): ?>
                <a href="<?= $article->link ?>" class="p-2 text-center text-light dark:text-dark bg-dark dark:bg-light rounded-r-full underline">
                    <?= $article->titleForList() ?>
                </a>
            <?php endforeach ?>
        </section>

        <section class="flex flex-col gap-8 text-center" style="max-width: 600px;">
            <p><small>you@simonecerruti.com:/blog$</small></p>
            <h1 class="text-6xl font-bold"><?= $title ?></h1>
            <p class="">
                Benvenut* nel mio blog! Gli articoli che troverai saranno principalmente riguardanti lo sviluppo software, prevalentemente usando PHP e Laravel.
                Se non sei una persona tecnica o uno sviluppatore, non scappare! Alcuni articoli sono stati fatti proprio per te :)
                Questo blog si divide in due macro categorie: pratico e tecnico.
                Gli articoli pratici sono rivolti a un pubblico non tencico, a cui interessa capire alcuni concetti, senza scendere nello specifico. Usano esempi reali per permettere al lettore di compiere delle scelte informate.
                Gli articoli tecnici, al contrario, sono pensati per un pubblico tecnico e scendono nel dettaglio dell’argomento. Riportano codice sorgente e terminologie proprie dello sviluppo software.
            </p>
        </section>

        <section class="flex flex-col gap-4 grow">
            <h2 class="text-center"><?= t('technical_articles') ?></h2>     
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