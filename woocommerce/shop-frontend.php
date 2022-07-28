<?php

// Replace default HTML of pagination
remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);
add_action('woocommerce_after_shop_loop', 'my_custom_woocommerce_pagination', 10);

// Move the Cross Sell out of the CART TOTAL div
remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
add_action('woocommerce_after_cart', 'my_custom_cross_sell_display');

// Replace default Related Products
remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);


/**
 * Change the markup of WC Pagination
 * @action woocommerce_after_shop_loop
 */
function my_custom_woocommerce_pagination() {
  if (wc_get_loop_prop('total') <= 0) { return; }

  $args = [
    'pagination' => H::get_pagination(),
  ];

  get_template_part('views/_pagination', '', $args);
}

/**
 * Change the markup of Cart's Cross-Sell
 * @action woocommerce_cart_collaterals
 */
function my_custom_cross_sell_display() {
  $args = [
    'products' => get_posts([
      'post_type' => 'product',
      'post__in' => WC()->cart->get_cross_sells(),
      'posts_per_page' => 4,
    ]),
  ];

  get_template_part('woocommerce/views/_cart-cross-sells', '', $args);
}