<?php snippet('header') ?>

<main class="home">
    <section class="top"><div class="wrapper">
        <div class="top__col">
            <header class="top__header">

                <?php if($page->topimg()->isNotEmpty()): ?>
                <img class="top__logo" src="<?= $page->topimg()->toFile()->url() ?>" alt="<?= $page->topimg()->toFile()->alt()->html() ?>" />
                <?php endif ?>

                <h1 class="top__title"><?= $page->heading()->html() ?></h1>

                <p class="top__dek"><?= $page->subhead()->html() ?></p>
            </header>

            <div class="petition__statement more">
                <p class="more__first"><?= $page->statement_pre()->html() ?></p> <a class="more__expand">Read More <span class="plus">+</span></a>

                <div class="more__text"><?= $page->statement()->kt() ?></div>
            </div>
        </div>

        <div class="top__col">
            <div class="petition__embed">
                <?php if($page->petition_pre()->isNotEmpty()): ?>
                <p class="petition__label"><?= $page->petition_pre()->html() ?></p>
                <?php endif ?>

                <?= $page->petition() ?>    
            </div>
        </div>
    </div></section>


    <?php if($page->inter_img()->isNotEmpty()): ?>
    <section class="interimg"<?= ($page->inter_bg()->isNotEmpty()) ? 'style="background-color: #' . $page->inter_bg()->html() . '"' : '' ?>><div class="wrapper">
        <img src="<?= $page->inter_img()->toFile()->url() ?>" />
    </div></section>
    <?php endif ?>


    <?php if($page->slideshow()->isNotEmpty()): ?>
    <section class="facts swiper-container">
        <?php if($page->slideshow_pre()->isNotEmpty()): ?>
        <div class="facts__pre"><?= $page->slideshow_pre()->kt() ?></div>
        <?php endif ?>

        <div class="swiper-wrapper">
        <?php foreach($page->slideshow()->toStructure() as $slide): ?>
            <div class="swiper-slide"><div class="wrapper">

                <?php if ($slide->img()->isNotEmpty()): ?>
                <figure class="facts__image"><img src="<?= $slide->img()->toFile()->thumb([
                    'width'     => 800,
                ])->url() ?>" alt="<?= $slide->img()->toFile()->alt()->html() ?>" /></figure>
                <?php endif ?>
                <div class="facts__text">
                    <?= $slide->text()->kt() ?>
                </div>
            </div></div>
        <?php endforeach ?>
        </div>

        <a class="prev"><img src="<?= $kirby->url('assets') ?>/img/arrow-left.svg"></a>
        <a class="next"><img src="<?= $kirby->url('assets') ?>/img/arrow-right.svg"></a>
        
        <div class="swiper-pagination"></div>
    </section>
    <?php endif ?>
    

    <?php if($page->downloads()->isNotEmpty()): ?>
    <section class="downloads"><div class="wrapper">
        <?php if($page->downloads_pre()->isNotEmpty()): ?>
        <?= $page->downloads_pre()->kt() ?>
        <?php endif ?>

        <ul>
            <?php foreach($page->downloads()->toStructure() as $download): ?>
            <?php if($download->pdf()->isNotEmpty()): ?>
            <li>
                <a class="button-wrap" href="<?= $download->pdf()->toFile()->url() ?>" target="_blank">
                    <?php if($download->img()->isNotEmpty()): ?><img src="<?= $download->img()->toFile()->thumb([
                        'width'     => 400,
                    ])->url() ?>" alt="<?= $download->button()->html() ?>" /><?php endif ?>
                <span class="button"><?= $download->button()->html() ?></a>
            </li>
            <?php endif ?>
            <?php endforeach ?>
        </ul>
    </div></section>
    <?php endif ?>


    <?php if($page->logos()->isNotEmpty()): ?>
    <section class="members members--logos"><div class="wrapper">

        <?php if($page->logos_title()->isNotEmpty()): ?>
        <h3><?= $page->logos_title()->html() ?></h3>
        <?php endif ?>

        <?php foreach($page->logos()->toFiles() as $logo): ?>
        <?php if($logo->link()->isNotEmpty()) $link = $logo->link()->html(); else $link = null ?>
        <?= isset($link) ? '<a href="' . $link . '">' : '' ?><img src="<?= $logo->url() ?>" alt="<?= $logo->alt()->html() ?>"><?= isset($link) ? '</a>' : '' ?>
        <?php endforeach ?>

    </div></section>
    <?php endif ?>


    <?php if($page->orgs_pre()->isNotEmpty()): ?>
    <section class="members members--names"><div class="wrapper">
        <?php if($page->orgs_title()->isNotEmpty()): ?>
        <h3><?= $page->orgs_title()->html() ?></h3>
        <?php endif ?>

        <div class="members__names more">
            <div class="more__first"><?= $page->orgs_pre()->kt() ?></div>

            <?php if($page->orgs()->isNotEmpty()): ?>
            <a class="more__expand">Read More <span class="plus">+</span></a>

            <div class="more__text"><?= $page->orgs()->kt() ?></div>
            <?php endif ?>
        </div>
    </div></section>
    <?php endif ?>
</main>


<?php snippet('footer') ?>
