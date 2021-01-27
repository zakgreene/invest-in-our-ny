<div class="links">
    <?php if($block->pre()->isNotEmpty()): ?>
    <?= $block->pre()->kt() ?>
    <?php endif ?>

    <ul>
        <?php foreach($block->links()->toStructure() as $link): ?>
        <?php if($link->url()->isNotEmpty()): ?>
        <li>
            <a class="button" href="<?= $link->url()->html() ?>" target="_blank"><?= $link->button()->html() ?></a>
        </li>
        <?php endif ?>
        <?php endforeach ?>
    </ul>
</div>