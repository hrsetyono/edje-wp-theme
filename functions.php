<?php

require_once 'functions/helpers.php';
if( !MyHelpers::has_required_plugins() ) { return false; }

require_once 'functions/enqueue.php';
require_once 'functions/hooks.php';
require_once 'functions/theme-supports.php';
require_once 'functions/api.php';
require_once 'functions/blocks.php';
require_once 'functions/shortcodes.php';
require_once 'functions/timber.php';


if( class_exists('WooCommerce') ) {
  require_once 'shop/hooks.php';
  require_once 'shop/setup.php';
}

require_once 'customizer/defaults.php';
require_once 'customizer/styles.php';


my_before_setup_theme();
add_action( 'after_setup_theme', 'my_after_setup_theme' );


/////

/**
 * Function that run first
 */
function my_before_setup_theme() {
  /**
   * Register custom post type
   * - Read more at https://github.com/hrsetyono/edje-wp-library/wiki/Custom-Post-Type
   */
  H::register_post_type( 'product', [ 'icon' => 'dashicons-cart' ] );
  H::register_taxonomy( 'brand', [ 'post_type' => 'product' ] );

  /**
   * Create Gutenberg block for post-type listing
   */
  H::register_post_type_block( 'post' );
  H::register_post_type_block( 'product' );
}


/**
 * Run after theme is loaded
 * 
 * @action after_setup_theme
 */
function my_after_setup_theme() { 
  // Create Nav assignment
  register_nav_menus( [
    'nav_1' => __( 'Nav 1' ),
    'nav_2' => __( 'Nav 2' ),
    'mobile_nav' => __( 'Mobile Nav' ),
    'footer_nav' => __( 'Footer Nav' ),
  ] );

  
  // ACF Option page
  if( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_sub_page( [
  		'page_title' => 'Theme Options',
  		'parent_slug' => 'themes.php',
    ] );
  }
}
