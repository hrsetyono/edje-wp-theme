<?php
/**
 * Customize ACF
 */
class MyACF {
  function __construct() {
    add_filter( 'acf/format_value/name=sample_field', [$this, 'format_sample_field'], 10, 3 );
  }

  /**
   * Format the return value of ACF "sample_field"
   */
  function format_sample_field( $value, $post_id, $field ) {
    return $value;
  }
}


/**
 * Customize Gutenberg block
 */
class MyBlock {
  function __construct() {
    add_action( 'acf/init', [$this, 'create_blocks'] );
    add_action( 'enqueue_block_editor_assets', [$this, 'enqueue_assets'] );
  }

  
  /**
   * Create ACF gutenberg blocks
   */
  function create_blocks() {
    H::register_block( 'sample', [
      'icon' => 'welcome-write-blog'
    ] );
  }

  /**
   * Enqueue assets that modify Gutenberg while editing
   */
  function enqueue_assets() {
    if ( !is_admin() ) { return; }
    
    $css_dir = get_stylesheet_directory_uri() . '/assets/css';
    $js_dir = get_stylesheet_directory_uri() . '/assets/js';

    wp_enqueue_script( 'my-gutenberg', $js_dir . '/admin-gutenberg.js', [ 'wp-blocks', 'wp-dom' ] , false, true );
    wp_enqueue_style( 'my-gutenberg', $css_dir . '/admin-gutenberg.css', [ 'wp-edit-blocks' ] );
  }
}