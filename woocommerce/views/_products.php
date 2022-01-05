<div class="wc-block-grid has-<?php echo $args['catalog_columns'] ?? 4; ?>-columns alignwide">
<?php if (count($args['products']) > 0): ?>
  <ul class="wc-block-grid__products">

  <?php foreach ($args['products'] as $post): ?>
    <?php setup_postdata($post); ?>
    <?php my_setup_productdata($post); ?>

    <li class="wc-block-grid__product">
      <a
        class="wc-block-grid__product-link"
        href="<?php the_permalink(); ?>"
      >
        <figure class="wc-block-grid__product-image">
          <?php
            /**
             * @hooked woocommerce_show_product_loop_sale_flash - 10
             * @hooked woocommerce_template_loop_product_thumbnail - 10
             * @hooked h_show_product_outfstock_flash - 15
             */
            do_action('woocommerce_before_shop_loop_item_title');
          ?>
        </figure>
        <h2 class="wc-block-grid__product-title">
          <?php the_title(); ?>
        </h2>
      </a>

      <?php
        /**
         * @hooked woocommerce_template_loop_rating - 5
         * @hooked woocommerce_template_loop_price - 10
         */
        do_action('woocommerce_after_shop_loop_item_title');
      ?>
      
      <div class="wc-block-grid__product-add-to-cart">
        <?php
          /**
           * @hooked woocommerce_template_loop_product_link_close - 5
           * @hooked woocommerce_template_loop_add_to_cart - 10
           */
          do_action('woocommerce_after_shop_loop_item');
        ?>
      </div>
    </li>
  <?php endforeach; ?>
  </ul>
  
<?php else: ?>
  <div class="wp-block-group">
    <div class="wp-block-group__inner-container">
      <h1 class="has-text-align-center">
        Product Not Found
      </h1>
      <p class="has-text-align-center">
        Sorry, there is no product in this category
      </p>
    </div>
  </div>
  
<?php endif; ?>
<?php wp_reset_postdata(); ?>
</div>