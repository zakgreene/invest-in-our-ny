<?php if ($block->url()->isNotEmpty()): ?>
<figure class="video">
    <?= video($block->url()) ?>
    <?php if ($block->caption()->isNotEmpty()): ?>
    <figcaption><?= $block->caption() ?></figcaption>
    <?php endif ?>
</figure>
<?php endif ?>