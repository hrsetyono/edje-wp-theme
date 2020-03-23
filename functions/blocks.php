<?php
/**
 * Customize Gutenberg Blocks
 */
class MyBlocks {
  function __construct() {
    add_action( 'acf/init', [$this, 'create_blocks'] );
    add_filter( 'acf/format_value/name=sample', [$this, 'acf_format_sample'], 10, 3 );

    $this->register_block_styles();
  }


  /**
   * Create ACF gutenberg blocks
   * 
   * @action acf/init
   */
  function create_blocks() {
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
  function acf_format_sample( $value, $post_id, $field ) {
    return $value;
  }

  
  /**
   * Register custom style to existing block
   */
  function register_block_styles() {
    // register_block_style( 'core/table', [
    //   'name' => 'sample',
    //   'label' => __( 'Sample Style' ),
    //   'style' => '', // name of registered CSS to be enqueued
    //   'inline_style' => '',
    // ] );
  }
}

new MyBlocks();