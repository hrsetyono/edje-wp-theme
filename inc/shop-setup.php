<?php

add_action( 'after_setup_theme', 'my_shop_support' );
add_action( 'wp_enqueue_scripts', 'my_enqueue_shop_assets', 101 );


/**
 * Register Woocommerce assets here
 * @action wp_enqueue_scripts 101
 */
function my_enqueue_shop_assets() {
  $css_dir = get_stylesheet_directory_uri() . '/assets/css';
  $js_dir = get_stylesheet_directory_uri() . '/assets/js';

  wp_enqueue_style( 'my-shop', $css_dir . '/shop.css', [], THEME_VERSION );
}

/**
 * Run after theme is loaded
 * @action after_setup_theme
 */
function my_shop_support() {
  add_theme_support( 'woocommerce', [
    'product_grid' => [ 'default_columns' => 4 ],
    'single_image_width' => 480,
  ] );
  add_theme_support( 'wc-product-gallery-zoom' );
  add_theme_support( 'wc-product-gallery-lightbox' );
  add_theme_support( 'wc-product-gallery-slider' );
}