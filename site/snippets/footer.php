<?php
/**
 * Snippets are a great way to store code snippets for reuse or to keep your templates clean.
 * in loops or simply to keep your templates clean.
 * This footer snippet is reused in all templates. In fetches information from the `site.txt` content file
 * and from the `about` page.
 * More about snippets: https://getkirby.com/docs/guide/templates/snippets
 */
?>

<footer class="footer">
    <div class="wrapper">
        <ul>
            <?php foreach ($site->children()->listed() as $item): ?>
            <li><?= $item->title()->link() ?></li>
            <?php endforeach ?>
        </ul>
    </div>
</footer>

<?= js('//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js') ?>
<script>window.jQuery || document.write("<script src='assets/js/jquery-3.2.1.min.js'>\x3C/script>");</script>

<?php if ($page->template() == 'home'): ?>
    <?= js('assets/js/swiper.min.js') ?>
<?php endif ?>

<?= js('assets/js/functions.js?0130') ?>
<script>$(document).ready(initPage);</script>

</body>
</html>
