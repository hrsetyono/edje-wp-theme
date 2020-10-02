<?php

my_before_setup_theme();
add_action( 'after_setup_theme', 'my_after_setup_theme' );
add_action( 'wp_enqueue_scripts', 'my_public_assets', 99 );
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
  add_theme_support( 'title_tag' );
  add_theme_support( 'html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption'] );
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
    [ 'name' => 'Main Dark',  'slug' => 'main-dark',  'color' => 'var(--mainDark)' ],
    [ 'name' => 'Main Light', 'slug' => 'main-light', 'color' => 'var(--mainLight)' ],

    [ 'name' => 'Sub',        'slug' => 'sub',       'color' => 'var(--sub)' ],
    [ 'name' => 'Sub Dark',   'slug' => 'sub-dark',  'color' => 'var(--subDark)' ],
    [ 'name' => 'Sub Light',  'slug' => 'sub-light', 'color' => 'var(--subLight)' ],
  ] );

  add_theme_support( 'editor-font-sizes', [
    [ 'name' => 'Small', 'slug' => 'small', 'size' => 14 ],
    [ 'name' => 'Regular', 'slug' => 'regular', 'size' => 16 ],
    [ 'name' => 'Medium', 'slug' => 'medium', 'size' => 20 ],
    [ 'name' => 'Large', 'slug' => 'large', 'size' => 24 ],
    [ 'name' => 'Huge', 'slug' => 'huge', 'size' => 32 ],
  ] );

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
 * Front-end CSS and JS
 * @action wp_enqueue_scripts 100
 */
function my_public_assets() {
  $dist = get_template_directory_uri() . '/assets/dist';

  wp_enqueue_style( 'my-style', $dist . '/style.css', [], THEME_VERSION );

  // If inside blog
  if( ( is_archive() || is_author() || is_category() || is_single() || is_home() || is_tag() ) && 'post' == get_post_type() ) {
    wp_enqueue_style( 'my-blog', $dist . '/blog.css', [], THEME_VERSION );
  }
  
  
  // wp_enqueue_script( 'h-lightbox' );
  // wp_enqueue_script( 'h-slider' );
  // wp_enqueue_style( 'h-lightbox' );
  // wp_enqueue_style( 'h-slider' );

  // Uncomment this to disable gutenberg default style
  // wp_dequeue_style( 'wp-block-library' );
  // wp_dequeue_style( 'wp-block-library-theme' );

  // Javascript
  wp_enqueue_script( 'my-bundle', $dist . '/bundle.js', [], THEME_VERSION, true );
}


/**
 * @action widgets_init
 */
function my_widgets_init() {
  register_sidebar([
    'name' => 'Sidebar',
    'id' => 'sidebar',
    'description' => 'Appear besides post'
  ] );
}