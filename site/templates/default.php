<?php snippet('header') ?>

<main class="general">

    <?php $blocks = $page->blocks()->toBlocks();
        $hasSection = false;
        if ($blocks->first()->type() == 'section-start') $hasSection = true;
    ?>

    <?php if (!$hasSection): ?>
    <section><div class="wrapper">
    <?php endif ?>

    <?= $page->blocks()->toBlocks() ?>
    </div></section>
</main>

<?php snippet('footer') ?>
