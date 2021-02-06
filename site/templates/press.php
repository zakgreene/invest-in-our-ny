<?php snippet('header') ?>

<main class="press">
    <section><div class="wrapper">
        <?php foreach($page->press()->toStructure()->sortBy('date', 'desc') as $story): ?>
        <div class="press__story">

            <?php if ($story->img()->isNotEmpty()): ?>
            <figure class="press__image"><a href="<?= $story->url()->html() ?>" target="_blank"><img src="<?= $story->img()->toFile()->thumb([
                'width'     => 800,
            ])->url() ?>" alt="<?= $story->img()->toFile()->alt()->html() ?>" /></a></figure>
            <?php endif ?>

            <div class="press__col">
                <h2><a href="<?= $story->url()->html() ?>" target="_blank"><?= $story->title()->html() ?></a></h2>
                <p class="press__details">
                    <?= $story->date()->toDate('M j, Y') ?>
                    <?= ($story->source()->isNotEmpty()) ? '<span class="press__source">' . $story->source()->html() . '</span>' : '' ?>
                </p>
            
                <?= $story->excerpt()->kt() ?>
            </div>
        </div>
        <?php endforeach ?>
    </div></section>
</main>

<?php snippet('footer') ?>
