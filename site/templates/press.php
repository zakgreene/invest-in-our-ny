<?php snippet('header') ?>

<main class="press">
    <section><div class="wrapper">
        <?php foreach($page->press()->toStructure() as $story): ?>
        <div class="press__story">

            <?php if ($story->img()->isNotEmpty()): ?>
            <figure class="press__image"><a href="<?= $story->url()->html() ?>" target="_blank"><img src="<?= $story->img()->toFile()->thumb([
                'width'     => 800,
            ])->url() ?>" alt="<?= $story->img()->toFile()->alt()->html() ?>" /></a></figure>
            <?php endif ?>

            <div class="press__col">
                <h2><a href="<?= $story->url()->html() ?>" target="_blank"><?= $story->title()->html() ?></a></h2>
                <?= ($story->source()->isNotEmpty()) ? '<p class="press__source">' . $story->source()->html() . '</p>' : '' ?>
                <?= $story->excerpt()->kt() ?>
            </div>
        </div>
        <?php endforeach ?>
    </div></section>
</main>

<?php snippet('footer') ?>
