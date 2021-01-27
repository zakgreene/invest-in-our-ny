<div class="downloads">
    <?php if($block->pre()->isNotEmpty()): ?>
    <?= $block->pre()->kt() ?>
    <?php endif ?>

    <ul>
        <?php foreach($block->downloads()->toStructure() as $download): ?>
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
</div>