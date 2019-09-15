<?php
define( 'ASSETS_VERSION', '2019.09.15' ); // update this to force delete browser's cache

add_action( 'wp_enqueue_scripts', 'my_public_assets', 100 );
add_action( 'admin_enqueue_scripts', 'my_admin_assets', 100 );
add_action( 'enqueue_block_editor_assets', 'my_editor_assets', 100 );


/**
 * Front-end CSS and JS
 * @action wp_enqueue_scripts 100
 */
function my_public_assets() {
  $css_dir = get_stylesheet_directory_uri() . '/css';
  $js_dir = get_stylesheet_directory_uri() . '/js';

  // Stylesheet
  wp_enqueue_style( 'my-framework', $css_dir . '/framework.css', [], ASSETS_VERSION );
  wp_enqueue_style( 'my-app', $css_dir . '/app.css', [], ASSETS_VERSION );
  wp_enqueue_style( 'dashicons', get_stylesheet_uri(), 'dashicons' ); // WP native icons
  
  // Edje Library (already registered by Edje)
  wp_enqueue_script( 'h-lightbox' );
  wp_enqueue_script( 'h-slider' );
  wp_enqueue_style( 'h-lightbox' );
  wp_enqueue_style( 'h-slider' );

  // Javascript
  wp_enqueue_script( 'my-app', $js_dir . '/app.js', ['jquery'], ASSETS_VERSION, true );
}


/**
 * WP Admin assets
 * @action admin_enqueue_scripts 100
 */
function my_admin_assets() {
  $css_dir = get_stylesheet_directory_uri() . '/css';
  $js_dir = get_stylesheet_directory_uri() . '/js';

  // Stylesheet
  wp_enqueue_style( 'my-admin', $css_dir . '/my-admin.css' );

}


/**
 * Gutenberg editor assets
 * @action enqueue_block_editor_assets 100
 */
function my_editor_assets() {
  if ( !is_admin() ) { return; }
  
  $css_dir = get_stylesheet_directory_uri() . '/css';
  $js_dir = get_stylesheet_directory_uri() . '/js';

  wp_enqueue_script( 'my-editor', $js_dir . '/my-editor.js', [ 'wp-blocks', 'wp-dom' ] , ASSETS_VERSION, true );
  wp_enqueue_style( 'my-editor', $css_dir . '/my-editor.css', [ 'wp-edit-blocks' ], ASSETS_VERSION );
}