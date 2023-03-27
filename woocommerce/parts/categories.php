<?php
  $categories = $args['categories'];
?>

<section class="shop-categories">
  <h2>
    <?= __('Category') ?>
  </h2>

  <div data-tiles="3-2">
  <?php foreach ($categories as $c): ?>
    <a
      class="category-tease"
      href="<?= $c->link ?>"
    >
      <figure>
        <img
          src="<?= $c->image ?>"
          alt="<?= $c->name ?> Thumbnail"
        >
      </figure>
      <h3>
        <?= "{$c->name} ({$c->count})" ?>
      </h3>
    </a>
  <?php endforeach; ?>
  </div>
</section>
