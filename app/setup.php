<?php

my_before_setup_theme();
add_action( 'after_setup_theme', 'my_after_setup_theme' );
add_action( 'wp_enqueue_scripts', 'my_public_assets', 99 );


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

  // Gutenberg support
  add_theme_support( 'align-wide' );
  add_theme_support( 'responsive-embeds' );

  // Edje Support
  add_theme_support( 'h-faq-block' );
  add_theme_support( 'h-comment-editor' );

  
  if( class_exists( 'Custy' ) ) {
    add_theme_support( 'editor-color-palette', Custy::get_editor_color_palette() );
    add_theme_support( 'editor-font-sizes', Custy::get_editor_font_sizes() );

    // Add @font-face in custy.css and append these fonts in Customizer dropdown
    $font_dir = get_stylesheet_directory_uri() . '/assets/fonts';

    add_theme_support( 'custy-fonts', [
      'Source Sans Pro' => [
        '400' => $font_dir . '/sourcesanspro-regular.woff2',
        '400i' => $font_dir . '/sourcesanspro-italic.woff2',
        '700' => $font_dir . '/sourcesanspro-bold.woff2',
      ],
      'Noto Serif' => [
        '700' => $font_dir . '/notoserif-bold.woff2',
      ],
    ] );
  }

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
  $css_dir = get_template_directory_uri() . '/assets/css';
  $js_dir = get_template_directory_uri() . '/assets/js';

  // Stylesheet
  wp_enqueue_style( 'my-framework', $css_dir . '/framework.css', [], THEME_VERSION );
  wp_enqueue_style( 'my-header', $css_dir . '/header.css', [], THEME_VERSION );
  wp_enqueue_style( 'my-app', $css_dir . '/app.css', [], THEME_VERSION );
  wp_enqueue_style( 'my-footer', $css_dir . '/footer.css', [], THEME_VERSION );
  wp_enqueue_style( 'dashicons', get_stylesheet_uri(), 'dashicons' ); // WP native icons

  // If inside blog
  if( ( is_archive() || is_author() || is_category() || is_single() || is_home() || is_tag() ) && 'post' == get_post_type() ) {
    wp_enqueue_style( 'my-blog', $css_dir . '/blog.css', [], THEME_VERSION );
  }
  
  
  // wp_enqueue_script( 'h-lightbox' );
  // wp_enqueue_script( 'h-slider' );
  // wp_enqueue_style( 'h-lightbox' );
  // wp_enqueue_style( 'h-slider' );

  // Disable gutenberg default style
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );

  // Javascript
  wp_enqueue_script( 'my-app', $js_dir . '/app.js', ['jquery'], THEME_VERSION, true );
}