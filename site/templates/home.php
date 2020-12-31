<?php snippet('header') ?>

<main class="home">
    <section class="top"><div class="wrapper">
        <div class="top__col">
            <header class="top__header">
                <img class="top__logo" src="<?= $page->topimg()->toFile()->url() ?>" alt="<?= $page->topimg()->toFile()->alt() ?>" />

                <h1 class="top__title"><?= $page->heading()->html() ?></h1>

                <p class="top__dek"><?= $page->subhead()->html() ?></p>
            </header>

            <div class="petition__statement more">
                <p class="more__first">New York is facing an unprecedented economic crisis: while millions of New Yorkers can’t make rent or put food on the table, the wealthiest New Yorkers have grown $77 billion richer during the pandemic.</p> <a class="more__expand">More <span class="plus">+</span></a>

                <div class="more__text"><?= $page->statement()->kt() ?></div>
            </div>
        </div>

        <div class="top__col">
            <div class="petition__embed">
                <p class="petition__label">Sign the petition to Invest in Our New York</p>

                <?= $page->petition() ?>    
            </div>
        </div>
    </div></section>

    <section class="img"><div class="wrapper">
        <img src="<?= $kirby->url('assets') ?>/img/sampleimg.png" />
    </div></section>

    <section class="facts swiper-container">
        <div class="swiper-wrapper">

            <div class="swiper-slide"><div class="wrapper">
                <figure class="facts__image"><img class="icon" src="<?= $kirby->url('assets') ?>/img/money1.svg" /></figure>
                <div class="facts__text">
                    <h2>Progressive Income Tax</h2>

                    <p>Creates an equitable tax system where New Yorkers who earn significantly more money pay a significantly higher tax rate.</p>
                </div>
            </div></div>

            <div class="swiper-slide"><div class="wrapper">
                <figure class="facts__image"><img class="icon" src="<?= $kirby->url('assets') ?>/img/money2.svg" /></figure>
                <div class="facts__text">
                    <h2>Investment Income Tax</h2>

                    <p>Taxes income from investments like stocks the same way the state currently taxes wages.</p>
                </div>
            </div></div>

            <div class="swiper-slide"><div class="wrapper">
                <figure class="facts__image"><img class="icon" src="<?= $kirby->url('assets') ?>/img/money1.svg" /></figure>
                <div class="facts__text">
                    <h2>The Heirs’ Tax</h2>

                    <p>A tax on large sums of inherited wealth.</p>
                </div>
            </div></div>

            <div class="swiper-slide"><div class="wrapper">
                <figure class="facts__image"><img class="icon" src="<?= $kirby->url('assets') ?>/img/money2.svg" /></figure>
                <div class="facts__text">
                    <h2>Billionaires’ Tax</h2>

                    <p>A tax on New York's 120 billionaires who are worth $600 billion.</p>
                </div>
            </div></div>

            <div class="swiper-slide"><div class="wrapper">
                <figure class="facts__image"><img class="icon" src="<?= $kirby->url('assets') ?>/img/money1.svg" /></figure>
                <div class="facts__text">
                    <h2>Wall Street Tax</h2>

                    <p>Unlike financial centers like London and Hong Kong, NY doesn’t tax financial transactions. This places a small tax on stocks and bonds trades.</p>
                </div>
            </div></div>

            <div class="swiper-slide"><div class="wrapper">
                <figure class="facts__image"><img class="icon" src="<?= $kirby->url('assets') ?>/img/money2.svg" /></figure>
                <div class="facts__text">
                    <h2>The Corporate Tax</h2>

                    <p>A bill to repeal the Trump corporate tax cuts, by restoring taxes on the profit a corporation makes each year.</p>
                </div>
            </div></div>

        </div>

        <a class="prev"><img src="<?= $kirby->url('assets') ?>/img/arrow-left.svg"></a>
        <a class="next"><img src="<?= $kirby->url('assets') ?>/img/arrow-right.svg"></a>
        
        <div class="swiper-pagination"></div>
    </section>

    <section class="members--logos"><div class="wrapper">

        <h3>Endorsers</h3>

    <?php foreach($page->logos()->toFiles() as $logo): ?>
        <img src="<?= $logo->url() ?>" alt="">
    <?php endforeach ?>

    </div></section>

    <section class="members--names"><div class="wrapper">
        <h3>Supporters</h3>

        <?= $page->orgs()->kt() ?>
    </div></section>

    <section class="downloads"><div class="wrapper">
        <p>You can learn more about the campaign for the Invest In Our New York Act in the downloadable PDF documents below</p>

        <a href="#" class="button">Download one-pager</a>
        <a href="#" class="button">Download report</a>
    </div></section>
</main>

<?php snippet('footer') ?>
