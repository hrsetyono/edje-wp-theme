<?php

add_action( 'admin_enqueue_scripts', 'my_admin_assets', 100 );
add_action( 'enqueue_block_editor_assets', 'my_editor_assets', 100 );


/////


/**
 * WP Admin assets
 * @action admin_enqueue_scripts 100
 */
function my_admin_assets() {
  $css_dir = get_template_directory_uri() . '/assets/css';
  $js_dir = get_template_directory_uri() . '/assets/js';

  // Stylesheet
  wp_enqueue_style( 'my-admin', $css_dir . '/my-admin.css', [], THEME_VERSION );
}


/**
 * Gutenberg editor assets
 * @action enqueue_block_editor_assets 100
 */ 
function my_editor_assets() {
  if ( !is_admin() ) { return; }
  
  $dist = get_template_directory_uri() . '/assets/dist';

  wp_enqueue_script( 'my-editor', $dist . '/my-editor.js', [ 'wp-blocks', 'wp-dom' ] , THEME_VERSION, true );
  wp_enqueue_style( 'my-editor', $dist . '/my-editor.css', [ 'wp-edit-blocks' ], THEME_VERSION );
}