<?php

$THEME = wp_get_theme();
define( 'THEME_VERSION', $THEME->get( 'Version' ) );

add_action( 'wp_enqueue_scripts', 'my_public_assets', 99 );
add_action( 'admin_enqueue_scripts', 'my_admin_assets', 100 );
add_action( 'enqueue_block_editor_assets', 'my_editor_assets', 100 );


/**
 * Front-end CSS and JS
 * @action wp_enqueue_scripts 100
 */
function my_public_assets() {
  $dist = get_template_directory_uri() . '/assets/dist';

  wp_enqueue_style( 'my-app', $dist . '/app.css', [], THEME_VERSION );

  // If inside blog
  if( ( is_archive() || is_author() || is_category() || is_single() || is_home() || is_tag() ) && 'post' == get_post_type() ) {
    wp_enqueue_style( 'my-post', $dist . '/post.css', [], THEME_VERSION );
  }
  
  // wp_enqueue_script( 'h-lightbox' );
  // wp_enqueue_script( 'h-slider' );
  // wp_enqueue_style( 'h-lightbox' );
  // wp_enqueue_style( 'h-slider' );

  // Disable gutenberg default styling
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );

  // Javascript
  wp_enqueue_script( 'my-app', $dist . '/app.js', [], THEME_VERSION, true );
}


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