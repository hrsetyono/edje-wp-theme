<?php

add_filter( 'h_customizer_options', function( $sections ) {
return wp_parse_args( [

blocksy_rand_md5() => [
  'type' => 'ct-group-title',
  'title' => __( 'Elements' ),
  'priority' => 9,
],

'button' => [

  'title' => __( 'Button' ),
  'container' => [ 'priority' => 10 ],
  'css_selector' => '.button, .wp-block-file__button, .wp-block-button__link',
  'options' => [

    'buttons' => [
      'type' => 'ct-typography',
      'label' => __( 'Buttons', 'blocksy' ),
      'css' => '--$',
    ],

    'buttonColor' => [
      'label' => __( 'Color' ),
      'type'  => 'ct-color-picker',
      'pickers' => [
        'default' => __( 'Initial' ),
        'hover' => __( 'Hover' ),
      ],
      'css' => [
        '--color' => 'default.color',
        '--colorHover' => 'hover.color'
      ],
    ],

    'buttonTextColor' => [
      'label' => __( 'Text Color' ),
      'type'  => 'ct-color-picker',
      'pickers' => [
        'default' => __( 'Initial' ),
        'hover' => __( 'Hover' ),	
      ],
      'css' => [
        '--buttonTextColor' => 'default.color',
        '--buttonTextColorHover' => 'hover.color',
      ],
    ],

    blocksy_rand_md5() => [ 'type' => 'ct-divider' ],

    'buttonBorder' => [
      'label' => __( 'Border' ),
      'type' => 'ct-border',
      'css' => '--buttonBorder',
    ],

    'buttonPadding' => [
      'label' => __( 'Padding' ),
      'type' => 'ct-spacing',
      'responsive' => true,
      'css' => '--buttonPadding'
    ],
  ]

] ], $sections );
} );