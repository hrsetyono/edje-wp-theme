<?php

// ACF Blocks
add_action( 'acf/init', 'my_acf_create_blocks' );
add_filter( 'acf/format_value/name=sample', 'my_acf_format_sample', 10, 3 );



/**
 * Create ACF gutenberg blocks
 * 
 * @action acf/init
 */
function my_acf_create_blocks() {
  acf_register_block_type([
    'name' => 'acf-example',
    'title' => __('ACF Example'),
    'description' => __('A custom ACF Block'),
    'category' => 'formatting',
    'icon' => 'admin-comments',
    // Where to render this block
    'render_template' => 'gutenberg/acf/example.php',
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