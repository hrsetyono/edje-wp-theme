<?php
/**
 * Set the global scope for Product. Required for many default actions
 */
function timber_set_product( $post ) {
  global $product;
  $product = isset( $post->product ) ? $post->product : wc_get_product( $post->ID );
}


class MyShop {
  function construct() {
    remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
    add_action( 'woocommerce_after_shop_loop', [$this, 'custom_woocommerce_pagination'], 10 );
  }

  /**
   * Change the markup of WC Pagination
   * @action woocommerce_after_shop_loop
   */
  function custom_woocommerce_pagination() {
    if( wc_get_loop_prop( 'total' ) <= 0 ) { return; }

    $context = [
      'pagination' => Timber::get_pagination()
    ];
    Timber::render( '/partials/_pagination.twig', $context );
  }


}

/**
 * Codes for Single Product pages
 */
class MyProduct {
  function __construct() {
    $this->remove_image_sizes();
  }

  function remove_image_sizes() {
    $wc_image_sizes = [ 'woocommerce_thumbnail', 'woocommerce_single', 'woocommerce_gallery_thumbnail', 'shop_catalog', 'shop_single', 'shop_thumbnail' ];
    foreach( $wc_image_sizes as $s ) {
      remove_image_size( $s );
    }
  }
}


/**
 * Codes for Cart page
 */
class MyCart {
  function __construct() {
    // Cart navigation widget
    add_filter( 'woocommerce_add_to_cart_fragments', [$this, 'update_cart_widget_fragment'] );

    // replace default cross-sell
    remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
    add_action( 'woocommerce_cart_collaterals', [$this, 'custom_cross_sell_display'] );
  }

  /**
   * Change the markup of Cart Widget that is updated with AJAX whenever we add new item.
   * @filter woocommerce_add_to_cart_fragments
   * 
   * @param array $fragments - HTML to be applied to widget
   */
  function update_cart_widget_fragment( $fragments ) : array {
    ob_start();
    global $woocommerce;
    $context = [ 'woo' => $woocommerce ];

    Timber::render( 'woo/_cart-button.twig', $context );
    $fragments['.cart-button'] = ob_get_clean();

    return $fragments;
  }

  /**
   * Change the markup of Cart's Cross-Sell
   * @action woocommerce_cart_collaterals
   */
  function custom_cross_sell_display( ) {
    $products = Timber::get_posts( WC()->cart->get_cross_sells() );

    if( $products ) {
      $context = [ 'products' => $products ];

      Timber::render( 'woo/_cart-cross-sells.twig', $context );
    }
  }

}
