<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title><?= $site->title() ?><?= ($page->isHomePage()) ? '' : ' - ' . $page->title() ?></title>

    <?php if ($page->template() == 'home'): ?>
        <?= css('assets/css/swiper.min.css') ?>
    <?php endif ?>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <?= css('assets/css/main.css') ?>

    <?= $page->metaTags() ?>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-T8Z1P49K73"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-T8Z1P49K73');
    </script>
</head>
<body>


<?php if ($page->template() != 'home'): ?>
<header class="header">
    <div class="wrapper">

        <a class="header__logo" href="<?= $site->url() ?>"><img src="<?= $site->logo_top()->toFile()->url() ?>" alt="<?= $site->title() ?>" /></a>

        <h1><?= ($page->alt_title()->isNotEmpty()) ? $page->alt_title()->html() : $page->title()->html() ?></h1>

        <?php snippet("menu") ?>
    </div>
</header>
<?php endif ?>
