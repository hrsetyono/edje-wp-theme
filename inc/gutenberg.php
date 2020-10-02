<?php

// ACF Blocks
add_action( 'acf/init', 'my_acf_create_blocks' );
add_filter( 'acf/format_value/name=sample', 'my_acf_format_sample', 10, 3 );


if( is_admin() ) {
  my_custom_block_styles();
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
function my_custom_block_styles() {
  register_block_style( 'core/table', [
    'name' => 'sample',
    'label' => __( 'Sample Style' ),
    'style' => '', // name of registered CSS to be enqueued
    'inline_style' => '',
  ] );
}