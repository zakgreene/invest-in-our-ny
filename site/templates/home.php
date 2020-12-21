<?php snippet('header') ?>

<main>
	<header><div class="wrapper">
        <h2><?= $page->heading()->html() ?></h2>
    </div></header>

    <section class="petition"><div class="wrapper">
        <div class="petition__statement">
            <?= $page->statement()->kt() ?>
        </div>

        <?= $page->petition() ?>
    </div></div>

    <section class="members"><div class="wrapper">
    	<?php foreach($page->logos()->toFiles() as $logo): ?>
    		<img src="<?= $logo->url() ?>" alt="">
    	<?php endforeach ?>

    	<?= $page->orgs()->kt() ?>
    </div></section>
</main>

<?php snippet('footer') ?>
