<?php

$THEME = wp_get_theme();
define('THEME_VERSION', $THEME->get('Version'));

add_action('wp_enqueue_scripts', 'my_public_assets', 99);
add_action('admin_enqueue_scripts', 'my_admin_assets', 100);
add_action('enqueue_block_editor_assets', 'my_editor_assets', 100);


/**
 * Front-end CSS and JS
 * @action wp_enqueue_scripts 100
 */
function my_public_assets() {
  $dir = get_template_directory_uri() . '/assets/dist';

  wp_enqueue_style('my-app', $dir . '/app.css', [], THEME_VERSION);
  wp_enqueue_style('my-gutenberg', $dir . '/gutenberg.css', [], THEME_VERSION);
  
  // wp_enqueue_script( 'h-lightbox' );
  // wp_enqueue_script( 'h-slider' );
  // wp_enqueue_style( 'h-lightbox' );
  // wp_enqueue_style( 'h-slider' );

  // Disable gutenberg default styling
  wp_dequeue_style('wp-block-library');
  wp_dequeue_style('wp-block-library-theme');

  // Javascript
  wp_enqueue_script('my-app', $dir . '/app.js', [], THEME_VERSION, true);
}


/**
 * WP Admin assets
 * @action admin_enqueue_scripts 100
 */
function my_admin_assets() {
  $dir = get_template_directory_uri() . '/assets/dist';

  wp_enqueue_script('my-admin', $dir . '/my-admin.js', [], THEME_VERSION , true);
  wp_enqueue_style('my-admin', $dir . '/my-admin.css', [], THEME_VERSION);
}


/**
 * Gutenberg editor assets
 * @action enqueue_block_editor_assets 100
 */ 
function my_editor_assets() {
  if (!is_admin()) { return; }
  
  $dir = get_template_directory_uri() . '/assets/dist';

  wp_enqueue_script('my-editor', $dir . '/my-editor.js', [ 'wp-blocks', 'wp-dom' ] , THEME_VERSION, true);
  wp_enqueue_style('my-editor', $dir . '/my-editor.css', [ 'wp-edit-blocks' ], THEME_VERSION);
}