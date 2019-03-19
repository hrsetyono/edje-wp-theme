<?php
/*
  Handle Advanced Custom Fields plugin
*/
class MyACF {
  function __construct() {
    add_filter( 'acf/format_value/name=sample_field', [$this, 'format_sample_field'], 10, 3 );
  }

  /*
    Format Sample Field
  */
  function format_sample_field( $value, $post_id, $field ) {
    return $value;
  }

}



/*
  Handle interaction with Gutenberg blocks
*/
class MyBlock {
  function __construct() {
    add_action( 'acf/init', [$this, 'create_blocks'] );

    add_action( 'enqueue_block_assets', [$this, 'enqueue_assets'] );
  }

  
  /*
    Create gutenberg blocks
  */
  function create_blocks() {
    if( !function_exists('acf_register_block') ) { return false; }

    $this->_create( 'block-name', [
      'icon' => 'admin-page'
    ] );
  }

  /*
    Enqueue assets required to modify Block Editor
  */
  function enqueue_assets() {
    if ( !is_admin() ) { return false; }
    
    $css_dir = get_stylesheet_directory_uri() . '/assets/css';
    $js_dir = get_stylesheet_directory_uri() . '/assets/js';

    wp_enqueue_script( 'block-editor', $js_dir . '/block-editor.js', [ 'wp-blocks', 'wp-element' ], false, true );
    wp_enqueue_style( 'block-editor', $css_dir . '/block-editor.css', [ 'wp-edit-blocks' ] );
  }


  /////

  
  /*
    Create gutenberg block
    @param $name (string) - Block slug
    @param $args (array)
  */
  function _create( string $name, array $args ) {
    acf_register_block( [
      'name' => $name,
      'title' => _H::to_title( $name ),
      'description' => $args['description'] ?? '',
      'render_callback' => [$this, '_render'],
      'category' => 'formatting',
      'icon' => $args['icon'] ?? null,
      'align' => 'wide',
      'mode' => 'edit',
      'post_types' =>  $args['post_types'] ?? ['page']
    ] );
  }

  /*
    Find Twig file that matches the block name and render it
    @param $block (array) - All block fields
  */
  function _render( array $block ) {
    $slug = str_replace( 'acf/', '', $block['name'] );
    $context['block'] = new Timber\Block( $block );

    Timber::render( "/blocks/_$slug.twig", $context );
  }
  
}