<?php

require_once 'codes/addon.php';
if( !MyHelper::has_required_plugins() ) { return false; }
require_once 'codes/timber.php';
require_once 'codes/acf.php';

if( class_exists('WooCommerce') ) {
  require_once 'functions-shop.php';
}

add_action( 'wp_enqueue_scripts', 'my_enqueue_scripts', 100 );
add_action( 'after_setup_theme', 'my_after_setup_theme' );
add_action( 'init', 'my_init' );
add_action( 'widgets_init', 'my_widgets' );

new MyFilter();
new MyACF();
new MyBlock();

/////

/**
 * Register all your CSS and JS here
 * @action wp_enqueue_scripts 100
 */
function my_enqueue_scripts() {
  $css_dir = get_stylesheet_directory_uri() . '/assets/css';
  $js_dir = get_stylesheet_directory_uri() . '/assets/js';

  // Stylesheet
  wp_enqueue_style( 'my-framework', $css_dir . '/framework.css' );
  wp_enqueue_style( 'my-app', $css_dir . '/app.css' );
  wp_enqueue_style( 'dashicons', get_stylesheet_uri(), 'dashicons' ); // WP native icons

  // Replace jQuery with lighter alternative, not recommended if you use WooCommerce
  // wp_deregister_script( 'jquery' );
  // wp_enqueue_script( 'cash', $js_dir . '-vendor/cash.min.js', [], false, true );

  // JavaScript
  wp_enqueue_script( 'h-lightbox', $js_dir . '-vendor/h-lightbox.min.js', [], false, true );
  wp_enqueue_script( 'h-slider', $js_dir . '-vendor/h-slider.min.js', [], false, true );
  wp_enqueue_script( 'my-app', $js_dir . '/app.js', [], false, true );
}


/**
 * Run after theme is loaded
 * @action after_setup_theme
 */
function my_after_setup_theme() {
  $GLOBALS['content_width'] = 650; // Blog width, affect Jetpack Tiled-Gallery size
  add_theme_support( 'widgets' );

  // Gutenberg support
  add_theme_support( 'align-wide' );
  add_theme_support( 'responsive-embeds' );
  // add_theme_support( 'editor-color-palette', [
  //   [
  //     'name' => 'Main',
  //     'slug' => 'main',
  //     'color' => '#2196f3',
  //   ],
  //   [
  //     'name' => 'Sub',
  //     'slug' => 'sub',
  //     'color' => '#607d8b',
  //   ],
  // ];

  // Create Nav assignment
  register_nav_menu( 'main-nav', 'Main Nav' );
  register_nav_menu( 'social-nav', 'Social Nav' );
  register_nav_menu( 'blog-nav', 'Blog Nav' );
}


/**
 * After Wordpress has finished loading but no data has been sent
 * @action init 1
 */
function my_init() {
  new MyShortcode();
  new MyTimber();

  // H::register_post_type( 'product' );

  // ACF Option page
  if( function_exists( 'acf_add_options_page' ) ) {
    acf_add_options_sub_page( [
  		'page_title' => 'Theme Options',
  		'parent_slug' => 'options-general.php',
    ] );
  }
}


/**
 * Register widgets
 * @action widgets_init
 */
function my_widgets() {
  register_sidebar( [ 'name' => 'My Footer', 'id' => 'my-footer' ] );
}
