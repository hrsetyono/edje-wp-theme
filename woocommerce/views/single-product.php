<?php the_post(); ?>  

<main>
  <?php
    /**
     * @hooked woocommerce_output_all_notices - 10
     */
    do_action('woocommerce_before_single_product');
  ?>

  <div class="product-columns / wp-block-columns alignwide">
    <div class="product-figure / wp-block-column">
      <?php
        /**
         * @hooked woocommerce_show_product_sale_flash - 10
         * @hooked h_show_product_outfstock_flash - 15
         * @hooked woocommerce_show_product_images - 20
         */
        do_action('woocommerce_before_single_product_summary');
      ?>
    </div>
    <div class="product-summary / wp-block-column">
      <?php
        /**
         * @hooked woocommerce_template_single_title - 5
         * @hooked woocommerce_template_single_price - 10
         * @hooked woocommerce_template_single_rating - 10
         * @hooked woocommerce_template_single_excerpt - 20
         * @hooked woocommerce_template_single_add_to_cart - 30
         * @hooked woocommerce_template_single_meta - 40
         * @hooked woocommerce_template_single_sharing - 50
         */
        do_action('woocommerce_single_product_summary');
      ?>
    </div>
  </div>

  <?php
    /**
     * @hooked woocommerce_output_product_data_tabs - 10
     */
    do_action('woocommerce_after_single_product_summary');
  ?>
  
  <?php do_action('woocommerce_after_single_product'); ?>

  <section class="product-related / wp-block-group has-background has-color-1-light-background-color alignfull">
    <div class="wp-block-group__inner-container">
      <h3 class="alignwide">
        <?php _e('Related Products'); ?>
      </h3>
      <?php get_template_part('woocommerce/views/_products', '', $args); ?>
    </div>
  </section>
</main>