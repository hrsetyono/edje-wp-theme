<?php

require_once 'functions/helpers.php';
if( !MyHelpers::has_required_plugins() ) { return false; }
require_once __DIR__ . '/functions/_index.php';

if( class_exists('WooCommerce') ) {
  require_once __DIR__ . '/shop/hooks.php';
  require_once __DIR__ . '/shop/setup.php';
}


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
  // H::register_post_type( 'product', [ 'icon' => 'dashicons-cart' ] );
  // H::register_taxonomy( 'brand', [ 'post_type' => 'product' ] );

  /**
   * Create Gutenberg block for post-type listing
   */
  H::register_post_type_block( 'post' );
  // H::register_post_type_block( 'product' );
}


/**
 * Run after theme is loaded
 * 
 * @action after_setup_theme
 */
function my_after_setup_theme() {
  require_once __DIR__ . '/customizer/_index.php';

  // if( !is_admin() ) {
  //   var_dump( Custy::get_mod( 'footer_placements' ) );
  // }

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
