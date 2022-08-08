<?php

add_action('init', 'my_shop_init');
add_action('after_setup_theme', 'my_shop_support');
add_action('wp_enqueue_scripts', 'my_frontend_shop_assets', 101);
add_action('admin_enqueue_scripts', 'my_admin_shop_assets', 100);
add_action('enqueue_block_editor_assets', 'my_editor_shop_assets', 100);

// disable built-in WooCommerce CSS
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

my_shop_block_styles();


/**
 * Set global $product object
 */
function my_setup_productdata($post) {
  global $product;
  $product = isset($post->product)
    ? $post->product
    : wc_get_product($post->ID);
}

/**
 * Remove image sizes
 */
function my_shop_init() {
  // remove all woocommerce image sizes
  $wc_image_sizes = [
    'woocommerce_thumbnail',
    'woocommerce_single',
    'woocommerce_gallery_thumbnail',
    'shop_catalog',
    'shop_single',
    'shop_thumbnail'
  ];

  foreach ($wc_image_sizes as $s) {
    remove_image_size($s);
  }
}


/**
 * Register Woocommerce assets here
 * @action wp_enqueue_scripts 101
 */
function my_frontend_shop_assets() {
  $dist = get_template_directory_uri() . '/dist';

  wp_enqueue_script('my-shop', $dist . '/shop.js', [], THEME_VERSION, true);
  wp_enqueue_style('my-shop', $dist . '/shop.css', [], THEME_VERSION);
  
  wp_deregister_style('wc-block-vendors-style');
  wp_deregister_style('wc-block-style');
  wp_deregister_style('wc-blocks-vendors-style');
  wp_deregister_style('wc-blocks-style');

  // disable Swatch plugin CSS
  wp_deregister_style('woo-variation-swatches');
}

/**
 * Register Woocommerce assets for admin here
 * @action admin_enqueue_scripts
 */
function my_admin_shop_assets() {
  $dist = get_template_directory_uri() . '/dist';
  wp_enqueue_style('my-shop-admin', $dist . '/shop-admin.css', [], THEME_VERSION);
}

/**
 * Gutenberg editor assets
 * @action enqueue_block_editor_assets 100
 */ 
function my_editor_shop_assets() {
  if (!is_admin()) { return; }
  
  $dist = get_template_directory_uri() . '/dist';

  // wp_enqueue_script( 'my-shop-editor', $dist . '/shop-editor.js', [ 'wp-blocks', 'wp-dom' ] , THEME_VERSION, true );
  wp_enqueue_style('my-shop-editor', $dist . '/shop-editor.css', ['wp-edit-blocks'], THEME_VERSION);

  wp_deregister_style('wc-block-vendors-style');
  wp_deregister_style('wc-block-style');
  wp_deregister_style('wc-block-editor');
  wp_deregister_style('wc-blocks-vendors-style');
  wp_deregister_style('wc-blocks-style');  
  wp_deregister_style('wc-blocks-editor'); 
}


/**
 * Run after theme is loaded
 * @action after_setup_theme
 */
function my_shop_support() {
  add_theme_support('woocommerce', [
    'product_grid' => [
      'default_columns' => 4
    ],
    'single_image_width' => 480,
  ]);

  add_theme_support('wc-product-gallery-zoom');
  add_theme_support('wc-product-gallery-lightbox');
  add_theme_support('wc-product-gallery-slider');
}

/**
 * Custom Styles for WooCommerce's blocks
 */
function my_shop_block_styles() {
  // slider style
  $slider_blocks = [
    'woocommerce/product-best-sellers',
    'woocommerce/handpicked-products',
    'woocommerce/product-category',
    'woocommerce/product-new',
    'woocommerce/product-on-sale',
    'woocommerce/product-top-rated',
    'woocommerce/products-by-attribute',
    'woocommerce/product-tag'
  ];

  foreach ($slider_blocks as $b) {
    register_block_style($b, ['name' => 'my-slider', 'label' => 'Slider']);
  }

}