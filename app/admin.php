<?php

add_action( 'admin_enqueue_scripts', 'my_admin_assets', 100 );
add_action( 'enqueue_block_editor_assets', 'my_editor_assets', 100 );

// ACF Blocks
add_action( 'acf/init', 'my_acf_create_blocks' );
add_filter( 'acf/format_value/name=sample', 'my_acf_format_sample', 10, 3 );

// Custom Blocks
my_custom_blocks();


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
  
  $css_dir = get_template_directory_uri() . '/assets/css';
  $js_dir = get_template_directory_uri() . '/assets/js';

  wp_enqueue_script( 'my-editor', $js_dir . '/my-editor.js', [ 'wp-blocks', 'wp-dom' ] , THEME_VERSION, true );
  wp_enqueue_style( 'my-editor', $css_dir . '/my-editor.css', [ 'wp-edit-blocks' ], THEME_VERSION );
}


/**
 * Create ACF gutenberg blocks
 * 
 * @action acf/init
 */
function my_acf_create_blocks() {
  acf_register_block_type([
    'name' => 'sample',
    'title' => __('Sample'),
    'description' => __('A custom ACF Block'),
    'render_template' => 'acf-blocks.php',
    'category' => 'formatting',
    'icon' => 'admin-comments',
  ]);
}


/**
 * Customize the return value of ACF field by the name of 'sample'
 * 
 * @filter acf/format_value/name=sample 10
 */
function my_acf_format_sample( $value, $post_id, $field ) {
  return $value;
}


/**
 * Create custom blocks or register block style
 */
function my_custom_blocks() {
  register_block_style( 'core/table', [
    'name' => 'sample',
    'label' => __( 'Sample Style' ),
    'style' => '', // name of registered CSS to be enqueued
    'inline_style' => '',
  ] );
}