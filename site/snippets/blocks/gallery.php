<figure>
  <ul>
    <?php foreach ($block->images()->toFiles() as $image): ?>
    <li>
        <?php if($image->link()->isNotEmpty()) $link = $image->link()->html(); else $link = null ?>
        <?= isset($link) ? '<a href="' . $link . '">' : '' ?><?= $image ?><?= isset($link) ? '</a>' : '' ?>
    </li>
    <?php endforeach ?>
  </ul>
</figure>