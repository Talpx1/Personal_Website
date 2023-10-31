<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | Simone Cerruti</title>
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