<?php snippet('header') ?>

<main class="general">

    <?php if ($page->blocks()->isNotEmpty()):
        $blocks = $page->blocks()->toBlocks();
        $hasSection = false;
        if ($blocks->first()->type() == 'section-start') $hasSection = true;
    
    if (!$hasSection): ?>
    <section><div class="wrapper">
    <?php endif ?>

    <?= $page->blocks()->toBlocks() ?>
    </div></section>

    <?php else: ?>

    <section><div class="wrapper"><?= $page->text() ?></div></section>

    <?php endif ?>
</main>

<?php snippet('footer') ?>
