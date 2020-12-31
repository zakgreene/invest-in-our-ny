<?php snippet('header') ?>

<main class="home">
    <header class="intro"><div class="wrapper">
        <h2><?= $page->heading()->html() ?></h2>
    </div></header>

    <section class="petition-embed"><div class="wrapper">
        <div class="petition-embed__statement more">
            <p class="more__first">New York is facing an unprecedented economic crisis: while millions of New Yorkers can’t make rent or put food on the table, the wealthiest New Yorkers have grown $77 billion richer during the pandemic.</p> <a class="more__expand">More <span class="plus">+</span></a>

            <div class="more__text"><?= $page->statement()->kt() ?></div>
        </div>

        <?= $page->petition() ?>
    </div></section>

    <section class="facts swiper-container">
        <div class="swiper-wrapper">

            <div class="swiper-slide"><div class="wrapper">
                <img class="icon" src="<?= $kirby->url('assets') ?>/img/money1.svg" />
                <h2>New York’s 120 billionaires grew $77 billion richer since the start of the pandemic.</h2>
            </div></div>

            <div class="swiper-slide"><div class="wrapper">
                <img class="icon" src="<?= $kirby->url('assets') ?>/img/money2.svg" />
                <h2>Over the past 10 years, Andrew Cuomo cut $300 billion in funding for our schools and hospitals.</h2>
            </div></div>

            <div class="swiper-slide"><div class="wrapper">
                <img class="icon" src="<?= $kirby->url('assets') ?>/img/money1.svg" />
                <h2>Governor Cuomo passed 10 budgets that included tax breaks for the wealthiest New Yorkers.</h2>
            </div></div>

            <div class="swiper-slide"><div class="wrapper">
                <img class="icon" src="<?= $kirby->url('assets') ?>/img/money2.svg" />
                <h2>New York’s $50 billion budget hole is the result of Governor Cuomo cutting taxes for the richest New Yorkers.</h2>
            </div></div>

            <div class="swiper-slide"><div class="wrapper">
                <img class="icon" src="<?= $kirby->url('assets') ?>/img/money1.svg" />
                <h2>The Invest In Our New York Act raises $50 billion through taxes on the ultra-wealthy so we can Invest in Our New York.</h2>
            </div></div>

        </div>

        <a class="prev"><img src="<?= $kirby->url('assets') ?>/img/arrow-left.svg"></a>
        <a class="next"><img src="<?= $kirby->url('assets') ?>/img/arrow-right.svg"></a>
        
        <div class="swiper-pagination"></div>
    </section>

    <section class="members--logos"><div class="wrapper">

        <h3>Steering Committee</h3>

    <?php foreach($page->logos()->toFiles() as $logo): ?>
        <img src="<?= $logo->url() ?>" alt="">
    <?php endforeach ?>

    </div></section>

    <section class="members--names"><div class="wrapper">
        <h3>[Supported By]</h3>

        <?= $page->orgs()->kt() ?>
    </div></section>

    <section class="downloads"><div class="wrapper">
        <p>No cuts to working people, Black and immigrants, A commitment from our legislative leaders to raise billions in additional revenue in 2021</p>

        <a href="#" class="button">Download one-pager</a>
        <a href="#" class="button">Download report</a>
    </div></section>
</main>

<?php snippet('footer') ?>
