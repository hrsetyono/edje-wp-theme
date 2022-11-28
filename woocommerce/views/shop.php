<?php
  $page = $args['page'];
  $products = $args['products'];

  $pagination = $args['pagination'] ?? null;
?>

<main>
  <?php // do_action('woocommerce_before_main_content'); ?>

  <?= apply_filters('the_content', $page->post_content); ?>

  <?php
    // do_action('woocommerce_before_shop_loop');
    woocommerce_output_all_notices();
    wc_setup_loop();
    woocommerce_catalog_ordering();
  ?>

  <?php get_template_part('woocommerce/views/_products', '', [
    'products' => $products,
  ]); ?>

  <?php get_template_part('views/_pagination', '', [
    'pagination' => $pagination,
  ]); ?>

  <?php
    // do_action('woocommerce_after_shop_loop');
    // woocommerce_pagination();
    woocommerce_reset_loop();
  ?>

  <?php // do_action('woocommerce_after_main_content'); ?>
</main>