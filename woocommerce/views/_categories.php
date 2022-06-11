<section class="shop-categories">
  <h2>
    <?php _e('Category'); ?>
  </h2>

  <div data-tiles="3-2">
  <?php foreach ($categories as $c): ?>
    <a
      class="category-tease"
      href="<?php echo $c->link; ?>"
    >
      <figure>
        <img
          src="<?php echo $c->image; ?>"
          alt="<?php echo $c->name; ?> Thumbnail"
        >
      </figure>
      <h3>
        <?php echo "{$c->name} ({$c->count})"; ?>
      </h3>
    </a>
  <?php endforeach; ?>
  </div>
</section>
