<?php

// Check for required plugins
if( !class_exists( 'Timber' ) || !class_exists( 'H' ) || !class_exists( 'Custy' ) ) {
  add_action('admin_notices', function() {
    $text = sprintf(  __('You need to activate all Library plugins. <a href="%s">Activate now »</a>.' ), admin_url('plugins.php') . '?s=library' );
    echo '<div class="notice notice-error"><p>' . $text . '</p></div>';
  });
}

require_once __DIR__ . '/functions/enqueue.php';
require_once __DIR__ . '/functions/hooks.php';
require_once __DIR__ . '/functions/timber.php';
// require_once __DIR__ . '/functions/api.php';
// require_once __DIR__ . '/functions/blocks.php';
// require_once __DIR__ . '/functions/shortcodes.php';
require_once __DIR__ . '/customizer/_index.php';

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
  add_theme_support( 'h-comment' );

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
   * @deprecated - use Custy instead so the settings are in 1 place
   */
  // if( function_exists( 'acf_add_options_page' ) ) {
  //   acf_add_options_sub_page( [
  // 		'page_title' => 'Theme Options',
  // 		'parent_slug' => 'themes.php',
  //   ] );
  // }
}