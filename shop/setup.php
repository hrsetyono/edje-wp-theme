<?php
add_action( 'plugins_loaded', 'shop_before_setup_theme' );
add_action( 'after_setup_theme', 'shop_after_setup_theme' );
add_action( 'wp_enqueue_scripts', 'shop_enqueue_scripts', 101 );


/**
 * @action plugins_loaded
 */
function shop_before_setup_theme() {
  new MyShopHooks();
}


/**
 * Register Woocommerce assets here
 * @action wp_enqueue_scripts 101
 */
function shop_enqueue_scripts() {
  $css_dir = get_stylesheet_directory_uri() . '/assets/css';
  $js_dir = get_stylesheet_directory_uri() . '/assets/js';

  wp_enqueue_style( 'my-shop', $css_dir . '/shop.css', [], THEME_VERSION );
}

/**
 * Run after theme is loaded
 * @action after_setup_theme
 */
function shop_after_setup_theme() {
  add_theme_support( 'woocommerce', [
    'product_grid' => [ 'default_columns' => 4 ],
    'single_image_width' => 480,
  ] );
  add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );
}

/**
 * Assign global $product object in Timber
 */
function timber_set_product( $post ) {
  global $product;
  $product = isset( $post->product ) ? $post->product : wc_get_product( $post->ID );
}
