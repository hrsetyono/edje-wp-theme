<?php

// Replace default HTML of pagination
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
add_action( 'woocommerce_after_shop_loop', 'my_custom_woocommerce_pagination', 10 );

// Allow auto update on Cart widget
add_filter( 'woocommerce_add_to_cart_fragments', 'my_update_cart_widget_fragment' );

// Replace default HTML of cross-sell
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' ); // replace default cross-sell
add_action( 'woocommerce_cart_collaterals', 'my_custom_cross_sell_display' );



/**
 * Change the markup of WC Pagination
 * @action woocommerce_after_shop_loop
 */
function my_custom_woocommerce_pagination() {
  if( wc_get_loop_prop( 'total' ) <= 0 ) { return; }

  $context = [
    'pagination' => Timber::get_pagination()
  ];
  Timber::render( '_pagination.twig', $context );
}

/**
 * Change the markup of Cart Widget that is updated with AJAX whenever we add new item.
 * @filter woocommerce_add_to_cart_fragments
 * 
 * @param array $fragments - HTML to be applied to widget
 */
function my_update_cart_widget_fragment( $fragments ) : array {
  ob_start();
  global $woocommerce;
  $context = [ 'woo' => $woocommerce ];

  Timber::render( 'shop/_cart-button.twig', $context );
  $fragments['#cart-button'] = ob_get_clean();

  return $fragments;
}

/**
 * Change the markup of Cart's Cross-Sell
 * @action woocommerce_cart_collaterals
 */
function my_custom_cross_sell_display( ) {
  $products = Timber::get_posts( WC()->cart->get_cross_sells() );

  if( $products ) {
    $context = [ 'products' => $products ];
    Timber::render( 'shop/_cart-cross-sells.twig', $context );
  }
}