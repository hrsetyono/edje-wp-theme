<?php

// add_action( 'init', 'my_register_custom_block' );

// ACF Blocks
add_action( 'acf/init', 'my_acf_create_blocks' );
add_filter( 'acf/format_value/name=sample', 'my_acf_format_sample', 10, 3 );



if( is_admin() ) {
  my_custom_block_styles();
  my_register_block_pattern();
}


/**
 * Register a custom block type
 * 
 * @action init
 */
function my_register_custom_block() {
  // if Gutenberg is not active
  if ( !function_exists( 'register_block_type' ) ) { return; }

  $dist = get_stylesheet_directory_uri() . '/assets/dist';
  wp_register_script( 'block-custom', $dist . '/block-custom.js', [ 'wp-blocks', 'wp-dom' ] , null, true );
  wp_register_style( 'block-custom', $dist . '/block-custom.css', [ 'wp-edit-blocks' ] );

  $default_attributes = [
    'align' => [ 'type' => 'string', 'default' => 'left' ],
    'description' => [ 'type' => 'array', 'default' => '' ],
    'toolbar' => [ 'type' => 'string', 'default' => 'left' ],
    'textColor' => [ 'type' => 'string', 'defeault' => 'var(--text)' ],
    'bgColor' => [ 'type' => 'string', 'default' => 'var(--main)' ],
  ];

  wp_localize_script( 'block-custom', 'localizeBC', [ 'attributes' => $default_attributes ] );

  register_block_type( 'my/block', [
    'editor_style' => 'block-custom',
    'editor_script' => 'block-custom',
    'render_callback' => function( $atts, $inner_blocks = null ) use ( $default_attributes ) {
      $default_values = array_map( function( $a ) {
        return $a['default'] ?? '';
      }, $default_attributes );

      $atts = wp_parse_args( $atts, $default_values );
      $atts['innerBlocks'] = $inner_blocks;

      return Timber::compile( 'blocks/block-custom.twig', $atts );
    }
  ] );
}



/**
 * Create ACF gutenberg blocks
 * 
 * @action acf/init
 */
function my_acf_create_blocks() {
  // acf_register_block_type([
  //   'name' => 'sample',
  //   'title' => __('Sample'),
  //   'description' => __('A custom ACF Block'),
  //   'render_template' => 'acf-blocks.php',
  //   'category' => 'formatting',
  //   'icon' => 'admin-comments',
  // ]);
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
  // register_block_style( 'core/table', [ 'name' => 'sample', 'label' => 'Sample Style' ] );
}

/**
 * Create custom patterns
 * 
 * How to format: Create the block in editor, copy it, paste it in https://codebeautify.org/json-escape-unescape
 */
function my_register_block_pattern() {
  register_block_pattern( 'my/features', [
    'title' => 'Features',
    'description' => '3 Images and a short text below it',
    'content' => "<!-- wp:columns -->\n<div class=\"wp-block-columns alignwide\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Heading</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Heading</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img alt=\"\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Heading</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->"
  ] );
}