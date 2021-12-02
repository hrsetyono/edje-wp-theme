<?php

$inc = __DIR__ . '/inc';
require_once $inc . '/_helpers.php';

// Abort if required plugins is inactive
if( !Helper::has_required_plugins() ) { return; }

// Modules
require_once $inc . '/enqueue.php';
require_once $inc . '/gutenberg.php';
require_once $inc . '/acf.php';

if( is_admin() ) {
  require_once $inc . '/admin.php';
} else {
  // require_once $inc . '/api.php';
  // require_once $inc . '/timber.php';
  require_once $inc . '/frontend.php';
}

if( class_exists('WooCommerce') ) {
  require_once __DIR__ . '/inc-shop/shop-setup.php';
  require_once __DIR__ . '/inc-shop/shop-filters.php';
  require_once __DIR__ . '/inc-shop/shop-views.php';
}


// Initial setup
my_before_setup_theme();
add_action( 'after_setup_theme', 'my_after_setup_theme' );
add_action( 'widgets_init', 'my_widgets_init' );


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
}


/**
 * Setup theme supports
 * 
 * @action after_setup_theme
 */
function my_after_setup_theme() {
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'menus' );
  add_theme_support( 'custom-logo' );
  add_theme_support( 'title-tag' );
  add_theme_support( 'html5', [
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'navigation-widgets', 'style', 'script'
  ] );
  add_theme_support( 'automatic-feed-links' );
  add_post_type_support( 'page', 'excerpt' ); // allow page to have excerpt
  
  add_theme_support( 'widgets' );
  add_theme_support( 'customize-selective-refresh-widgets' );

  // Edje Support
  add_theme_support( 'h-faq-block-v2' );
  add_theme_support( 'h-icon-block' );
  add_theme_support( 'h-comment-editor' ); // Enable this if you allow comment in the website
  add_theme_support( 'h-classic-widgets' );

  // Gutenberg support
  add_theme_support( 'align-wide' );
  add_theme_support( 'responsive-embeds' );
  
  // Make sure to sync this with the $colors variable in assets/sass/framework/vars.scss
  add_theme_support( 'editor-color-palette', [
    [ 'name' => 'Text',        'slug' => 'text-base',   'color' => 'var(--text)' ],
    [ 'name' => 'Text Dim',    'slug' => 'text-dim',    'color' => 'var(--textDim)' ],
    [ 'name' => 'Text Invert', 'slug' => 'text-invert', 'color' => 'var(--textInvert)' ],

    [ 'name' => 'Primary',       'slug' => 'color1',       'color' => 'var(--color1)' ],
    [ 'name' => 'Primary Dark',  'slug' => 'color1-dark',  'color' => 'var(--color1Dark)' ],
    [ 'name' => 'Primary Light', 'slug' => 'color1-light', 'color' => 'var(--color1Light)' ],

    [ 'name' => 'Secondary',       'slug' => 'color2',       'color' => 'var(--color2)' ],
    [ 'name' => 'Secondary Light', 'slug' => 'color2-light', 'color' => 'var(--color2Light)' ],

    [ 'name' => 'Tertiary',       'slug' => 'color3',       'color' => 'var(--color3)' ],
    [ 'name' => 'Tertiary Light', 'slug' => 'color3-light', 'color' => 'var(--color3Light)' ],
  ] );

  add_theme_support( 'editor-font-sizes', [
    [ 'name' => 'Small', 'slug' => 'small', 'size' => 14 ],
    [ 'name' => 'Regular', 'slug' => 'regular', 'size' => 16 ],
    [ 'name' => 'Medium', 'slug' => 'medium', 'size' => 18 ],
    [ 'name' => 'Large', 'slug' => 'large', 'size' => 22 ],
    [ 'name' => 'Huge', 'slug' => 'huge', 'size' => 30 ],
  ] );

  remove_theme_support( 'core-block-patterns' );

  /**
   * ACF Options page
   */
  if( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_sub_page( [
  		'page_title' => 'Theme Options',
  		'parent_slug' => 'themes.php',
    ] );
  }
}



/**
 * @action widgets_init
 */
function my_widgets_init() {
  register_sidebar([
    'name' => 'Sidebar',
    'id' => 'sidebar',
    'description' => 'Appear besides post',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widgettitle">',
    'after_title'   => '</h3>',
  ] );
}