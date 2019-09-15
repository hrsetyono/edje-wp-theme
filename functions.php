<?php

require_once 'functions/helpers.php';
if( !MyHelper::has_required_plugins() ) { return false; }

require_once 'functions/api.php';
require_once 'functions/blocks.php';
require_once 'functions/shortcodes.php';
require_once 'functions/timber.php';
require_once 'functions/hooks.php';
require_once 'functions/enqueue.php';

if( class_exists('WooCommerce') ) {
  require_once 'functions/shop-hooks.php';
  require_once 'functions/shop.php';
}

my_before_setup_theme();
add_action( 'after_setup_theme', 'my_after_setup_theme' );

/////

/**
 * Run first
 * @action plugins_loaded
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
 * @action after_setup_theme
 */
function my_after_setup_theme() {
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'menus' );
  add_theme_support( 'custom-logo' );
  add_theme_support( 'title_tag' );
  add_theme_support( 'html5', ['search-form', 'comment-form', 'gallery', 'caption'] );
  add_theme_support( 'automatic-feed-links' );
  add_post_type_support( 'page', 'excerpt' ); // allow page to have excerpt
  
  add_theme_support( 'widgets' );

  // Gutenberg support
  add_theme_support( 'align-wide' );
  add_theme_support( 'responsive-embeds' );

  /**
   * Each color will be outputted into 2 classes: `has-x-background-color` and `has-x-color`.
   * Format: $class-name => $value
   */
  add_theme_support( 'editor-color-palette', H::color_palette([
    'Red'       => 'var(--red)',
    'Light Red' => 'var(--red-light)',
    'Orange'       => 'var(--orange)',
    'Light Orange' => 'var(--orange-light)',
    'Yellow'       => 'var(--yellow)',
    'Light Yellow' => 'var(--yellow-light)',
    'Green'        => 'var(--green)',
    'Light Green'  => 'var(--green-light)',
    'Blue'         => 'var(--blue)',
    'Light Blue'   => 'var(--blue-light)',

    'Black'      => 'var(--black)',
    'Gray'       => 'var(--gray)',
    'Light Gray' => 'var(--gray-light)',
    'White'      => 'var(--white)',
  ]) );


  // Create Nav assignment
  register_nav_menu( 'main-nav', 'Main Nav' );
  register_nav_menu( 'social-nav', 'Social Nav' );
  register_nav_menu( 'blog-nav', 'Blog Nav' );

  
  // ACF Option page
  if( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_sub_page( [
  		'page_title' => 'Theme Options',
  		'parent_slug' => 'themes.php',
    ] );
  }
}
