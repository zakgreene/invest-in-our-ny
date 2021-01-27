<a class="menu-open"><img src="<?= $kirby->url('assets') ?>/img/menu.svg" alt="Menu" /></a> 

<nav id="menu" class="menu">
    <a class="menu-close"><img src="<?= $kirby->url('assets') ?>/img/close.svg" alt="Close Menu" /></a>
    <ul>
        <?php foreach ($site->children()->listed() as $item): ?>
        <li><?= $item->title()->link() ?></li>
        <?php endforeach ?>
    </ul>
</nav>