<?php

// Check for required plugins
if( !class_exists( 'Timber' ) || !class_exists( 'H' ) || !class_exists( 'Custy' ) ) {
  add_action('admin_notices', function() {
    $text = sprintf(  __('You need to activate all Library plugins. <a href="%s">Activate now »</a>.' ), admin_url('plugins.php') . '?s=library' );
    echo '<div class="notice notice-error"><p>' . $text . '</p></div>';
  });
}

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
  require_once __DIR__ . '/customizer/_index.php';
  
  /**
   * Register custom post type
   * - Read more at https://github.com/hrsetyono/edje-wp-library/wiki/Custom-Post-Type
   */
  // H::register_post_type( 'product', [ 'icon' => 'dashicons-cart' ] );
  // H::register_taxonomy( 'brand', [ 'post_type' => 'product' ] );
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