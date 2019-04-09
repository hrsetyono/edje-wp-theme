<?php
/*
  Set the global scope of Product
*/
function timber_set_product( $post ) {
  global $product;
  $product = isset( $post->product ) ? $post->product : wc_get_product( $post->ID );
}


class MyShop {
  function construct() {
    // replace default pagination
    remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
    add_action( 'woocommerce_after_shop_loop', [$this, 'custom_woocommerce_pagination'], 10 );
  }

  /*
    Change the HTML markup of WC Pagination
    @action woocommerce_after_shop_loop

    @param array $args
  */
  function custom_woocommerce_pagination() {
    if( wc_get_loop_prop( 'total' ) <= 0 ) {
      return false;
    }

    $context = [
      'pagination' => Timber::get_pagination()
    ];
    Timber::render( '/partials/_pagination.twig', $context );
  }


}
/*
  Functions for SINGLE PRODUCT page
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


/*
  Functions for CART actions and pages
*/
class MyCart {
  function __construct() {
    // Cart navigation widget
    add_filter( 'woocommerce_add_to_cart_fragments', [$this, 'update_cart_widget_fragment'] );

    // replace default cross-sell
    remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
    add_action( 'woocommerce_cart_collaterals', [$this, 'custom_cross_sell_display'] );
  }

  /*
    Update Cart Widget whenever we add new item to cart via AJAX
    @filter woocommerce_add_to_cart_fragments

    @param $fragments arr - HTML to be applied to widget
  */
  function update_cart_widget_fragment( $fragments ) {
    ob_start();
    global $woocommerce;
    $context = [ 'woo' => $woocommerce ];

    Timber::render( 'woo/_cart-button.twig', $context );
    $fragments['.cart-button'] = ob_get_clean();

    return $fragments;
  }

  /*
    Custom cross sell
    @action woocommerce_cart_collaterals
  */
  function custom_cross_sell_display( ) {
    $products = Timber::get_posts( WC()->cart->get_cross_sells() );

    if( $products ) {
      $context = [ 'products' => $products ];

      Timber::render( 'woo/_cart-cross-sells.twig', $context );
    }
  }

}
