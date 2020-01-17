<?php

add_filter( 'custy_sections', function( $sections ) {

return wp_parse_args( [ 'typography' => [

  'title' => __( 'Typography' ),
  'container' => [ 'priority' => 10 ],
  'css_selector' => ':root',
  'options' => [

    'linkColor' => [
      'label' => __( 'Link Color' ),
      'type'  => 'ct-color-picker',
      'pickers' => [
        'default' => __( 'Initial' ),
        'hover' => __( 'Hover' ),
      ],
      'css' => [
        '--linkColor' => 'default.color',
        '--linkColorHover' => 'hover.color'
      ],
    ],

    'headingColor' => [
      'label' => __( 'Heading Color' ),
      'type'  => 'ct-color-picker',
      'pickers' => [
        'default' => __( 'Initial' )
      ],
      'css' => [
        '--headingColor' => 'default.color',
      ],
    ],

    blocksy_rand_md5() => [ 'type' => 'ct-divider' ],

    'blockquote' => [
      'type' => 'ct-typography',
      'label' => __( 'Blockquote', 'blocksy' ),
      'css_selector' => 'blockquote',
      'css' => '--$',
    ],

    'pre' => [
      'type' => 'ct-typography',
      'label' => __( 'Preformatted', 'blocksy' ),
      'css_selector' => 'code, pre, samp',
      'css' => '--$',
    ],
    
  ],

] ], $sections );
} );