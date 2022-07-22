<?php
  $title = $args['title'] ?? '';
  $content = $args['content'] ?? '';

  $categories = $args['categories'] ?? null;
  $products = $args['products'] ?? null;
?>

<main>
  <header class="wp-block-group alignwide / shop-header">
    <div class="wp-block-group__inner-container">
      <h1 class="has-text-align-center">
        <?= $title ?>
      </h1>
      <div class="has-text-align-center">
        <?= $content ?>
      </div>
    </div>
  </header>

  <?php if ($categories) {
    get_template_part('woocommerce/views/_categories', '', $args);
  } ?>

  <?php if ($products) {
    get_template_part('woocommerce/views/_products', '', $args);
  } ?>
</main>