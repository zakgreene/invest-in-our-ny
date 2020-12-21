<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title><?= $site->title() ?><?= ($page->template() != 'home') ? $page->title() : '' ?></title>

    <?php if ($page->template() == 'home'): ?>
        <?= css('assets/css/swiper.min.css') ?>
    <?php endif ?>
    <?= css('assets/css/main.css') ?>

</head>
<body>

<header class="header">
    <div class="wrapper">
        <a class="logo" href="<?= $site->url() ?>"><img src="<?= $kirby->url('assets') ?>/img/logo.svg" alt="<?= $site->title() ?>" /></a>

        <a class="menu-open"><img src="<?= $kirby->url('assets') ?>/img/menu.svg" alt="Menu" /></a>

        <nav id="menu" class="menu">
            <a class="menu-close"><img src="<?= $kirby->url('assets') ?>/img/close.svg" alt="Close Menu" /></a>
            <ul>
                <?php foreach ($site->children()->listed() as $item): ?>
                <li><?= $item->title()->link() ?></li>
                <?php endforeach ?>
            </ul>
        </nav>
    </div>
</header>
