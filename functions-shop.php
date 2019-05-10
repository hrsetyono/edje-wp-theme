<?php
require_once 'codes/addon-shop.php';

add_action( 'wp_enqueue_scripts', 'shop_enqueue_scripts', 101 );
add_action( 'after_setup_theme', 'shop_after_setup_theme' );
add_action( 'init', 'shop_init' );

/**
 * Register Woocommerce assets here
 * @action wp_enqueue_scripts 101
 */
function shop_enqueue_scripts() {
  $css_dir = get_stylesheet_directory_uri() . '/assets/css';
  $js_dir = get_stylesheet_directory_uri() . '/assets/js';

  wp_enqueue_style( 'my-shop', $css_dir . '/shop.css' );
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
 * After Wordpress has finished loading but no data has been sent
 * @action init
 */
function shop_init() {
  new MyShop();
  new MyProduct();
  new MyCart();
}