<?php

// ACF Blocks
add_action( 'acf/init', 'my_acf_create_blocks' );
add_filter( 'acf/format_value/name=sample', 'my_acf_format_sample', 10, 3 );



if( is_admin() ) {
  my_custom_block_styles();
  my_register_block_pattern();
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

/**
 * Create custom patterns
 */
function my_register_block_pattern() {
  register_block_pattern( 'my/features', [
    'title' => 'Features',
    'description' => '3 Images and a short text below it',
    'content' => "<!-- wp:columns -->\n<div class=\"wp-block-columns alignwide\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Heading</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Heading</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Heading</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->"
  ] );
}