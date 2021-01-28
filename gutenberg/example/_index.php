<?php
/**
 * EXAMPLE Block
 */

add_action( 'enqueue_block_editor_assets', 'my_assets_block_example', 110 );
add_action( 'init', 'my_register_block_example' );


/**
 * @action enqueue_block_editor_assets
 */
function my_assets_block_example() {
  $dist = get_stylesheet_directory_uri() . '/assets/dist';

  wp_register_script( 'block-example', $dist . '/block-example.js', [ 'wp-blocks', 'wp-dom' ] , '1.0', true );
  wp_register_style( 'block-example', $dist . '/block-example.css', [ 'wp-edit-blocks' ], '1.0' );
}

/**
 * Register a custom block type
 * 
 * @action init
 */
function my_register_block_example() {
  // if Gutenberg is not active
  if ( !function_exists( 'register_block_type' ) ) { return; }

  // Setup attributes
  $default_attributes = [
    'align' => [ 'type' => 'string', 'default' => 'left' ],
    'description' => [ 'type' => 'array', 'default' => '' ],
    'toolbar' => [ 'type' => 'string', 'default' => 'left' ],
    'textColor' => [ 'type' => 'string', 'defeault' => 'var(--text)' ],
    'bgColor' => [ 'type' => 'string', 'default' => 'var(--main)' ],
  ];

  wp_localize_script( 'block-example', 'localizeBC', [ 'attributes' => $default_attributes ] );

  register_block_type( 'my/example', [
    'render_callback' => function( $atts ) use ( $default_attributes ) {
      return my_render_block_example( $atts, $default_attributes );
    }
  ] );
}



/**
 * 
 */
function my_render_block_example( $atts, $default_atts ) {
  $default_values = array_map( function( $a ) {
    return $a['default'] ?? '';
  }, $default_atts );

  $atts = wp_parse_args( $atts, $default_values );

  // Return the HTML content
  return '<div class="wp-block-my-example">' . print_r( $atts, true ) . '</div>';
}