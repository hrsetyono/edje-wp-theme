<?php
  $products = $args['products'];

  $catalog_columns = $args['catalog_columns'] ?? get_option('woocommerce_catalog_columns');
  $extra_classes = $args['extra_classes'] ?? '';
?>

<div class="wc-block-grid has-<?= $catalog_columns ?>-columns alignwide <?= $extra_classes ?>">
<?php if (count($products) > 0): ?>
  <ul class="wc-block-grid__products">

  <?php foreach ($products as $post): ?>
    <?php
      setup_postdata($post);

      // Set the global variable
      global $product;
      $product = isset($post->product) ? $post->product : wc_get_product($post->ID);
    ?>

    <li class="wc-block-grid__product">
      <a
        class="wc-block-grid__product-link"
        href="<?php the_permalink(); ?>"
      >
        <figure class="wc-block-grid__product-image">
          <?php
            // do_action('woocommerce_before_shop_loop_item_title');
            woocommerce_show_product_loop_sale_flash();
            woocommerce_template_loop_product_thumbnail();
            h_show_product_outfstock_flash();
          ?>
        </figure>
        <h2 class="wc-block-grid__product-title">
          <?php the_title(); ?>
        </h2>
      </a>

      <?php
        // do_action('woocommerce_after_shop_loop_item_title');
        woocommerce_template_loop_rating();
        woocommerce_template_loop_price();
      ?>
      
      <div class="wc-block-grid__product-add-to-cart">
        <?php
          // do_action('woocommerce_after_shop_loop_item');
          woocommerce_template_loop_product_link_close();
          woocommerce_template_loop_add_to_cart();
        ?>
      </div>
    </li>
  <?php endforeach; ?>
  </ul>
  
<?php else: ?>
  <div class="wp-block-group">
    <div class="wp-block-group__inner-container">
      <h2 class="has-text-align-center">
        Product Not Found
      </h2>
      <p class="has-text-align-center">
        Sorry, there is no product in this category
      </p>
    </div>
  </div>
  
<?php endif; ?>
<?php wp_reset_postdata(); ?>
</div>