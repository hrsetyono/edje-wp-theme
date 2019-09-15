<?php
/**
 * Customize Gutenberg Blocks
 */
class MyBlocks {
  function __construct() {
    add_action( 'acf/init', [$this, 'create_blocks'] );
    add_filter( 'acf/format_value/name=sample', [$this, 'acf_format_sample'], 10, 3 );
  }


  /**
   * Create ACF gutenberg blocks
   */
  function create_blocks() {
    // You need to create new ACF FieldGroup and set the rules to Block > is equal to > this block's name
    H::register_block( 'sample', [
      'title' => 'Sample',
      'icon' => 'dashicons-admin-post', // icon from https://developer.wordpress.org/resource/dashicons
      'post_types' => [ 'page', 'post' ]
    ] );
  }

  /**
   * Customize the return value of ACF field by the name of 'sample'
   * @filter acf/format_value/name=sample
   */
  function acf_format_sample( $value, $post_id, $field ) {
    return $value;
  }
}


new MyBlocks();