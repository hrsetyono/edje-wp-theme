<main>
  <header class="wp-block-group alignwide / shop-header">
    <div class="wp-block-group__inner-container">
      <h1 class="has-text-align-center">
        <?php echo $args['title']; ?>
      </h1>
      <div class="has-text-align-center">
        <?php echo $args['content']; ?>
      </div>
    </div>
  </header>

  <?php if (isset($args['categories'])) {
    get_template_part('woocommerce/views/_categories', '', $args);
  } ?>

  <?php if (isset($args['products'])) {
    get_template_part('woocommerce/views/_products', '', $args);
  } ?>
</main>