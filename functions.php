<?php

$inc = __DIR__ . '/inc';
require_once $inc . '/_helpers.php';

// Abort if required plugins is inactive
if( !Helper::has_required_plugins() ) { return; }


// Initial setup
my_before_setup_theme();
add_action( 'after_setup_theme', 'my_after_setup_theme' );
add_action( 'widgets_init', 'my_widgets_init' );

// Other modules
require_once $inc . '/enqueue.php';
require_once $inc . '/gutenberg.php';

if( !is_admin() ) {
  // require_once $inc . '/api.php';
  require_once $inc . '/timber.php';
  require_once $inc . '/frontend.php';
}

if( class_exists('WooCommerce') ) {
  require_once $inc . '/shop-setup.php';
  require_once $inc . '/shop-filters.php';
}


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
  add_theme_support( 'title_tag' );
  add_theme_support( 'html5', [
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'navigation-widgets', 'style', 'script'
  ] );
  add_theme_support( 'automatic-feed-links' );
  add_post_type_support( 'page', 'excerpt' ); // allow page to have excerpt
  
  add_theme_support( 'widgets' );
  add_theme_support( 'customize-selective-refresh-widgets' );


  // Edje Support
  add_theme_support( 'h-faq-block' );
  add_theme_support( 'h-comment-editor' );

  // Gutenberg support
  add_theme_support( 'align-wide' );
  add_theme_support( 'responsive-embeds' );
  
  add_theme_support( 'editor-color-palette', [
    [ 'name' => 'Text',        'slug' => 'text',        'color' => 'var(--text)' ],
    [ 'name' => 'Text Dim',    'slug' => 'text-dim',    'color' => 'var(--textDim)' ],
    [ 'name' => 'Text Invert', 'slug' => 'text-invert', 'color' => 'var(--textInvert)' ],

    [ 'name' => 'Main',       'slug' => 'main',       'color' => 'var(--main)' ],
    [ 'name' => 'Main Light', 'slug' => 'main-light', 'color' => 'var(--mainLight)' ],

    [ 'name' => 'Sub',        'slug' => 'sub',       'color' => 'var(--sub)' ],
    [ 'name' => 'Sub Light',  'slug' => 'sub-light', 'color' => 'var(--subLight)' ],

    [ 'name' => 'Red',       'slug' => 'red',       'color' => 'var(--red)' ],
    [ 'name' => 'Red Light', 'slug' => 'red-light', 'color' => 'var(--redLight)' ],

    [ 'name' => 'Yellow',       'slug' => 'yellow',       'color' => 'var(--yellow)' ],
    [ 'name' => 'Yellow Light', 'slug' => 'yellow-light', 'color' => 'var(--yellowLight)' ],
  ] );

  add_theme_support( 'editor-font-sizes', [
    [ 'name' => 'Small', 'slug' => 'small', 'size' => 14 ],
    [ 'name' => 'Regular', 'slug' => 'regular', 'size' => 16 ],
    [ 'name' => 'Medium', 'slug' => 'medium', 'size' => 20 ],
    [ 'name' => 'Large', 'slug' => 'large', 'size' => 24 ],
    [ 'name' => 'Huge', 'slug' => 'huge', 'size' => 32 ],
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
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ] );
}
