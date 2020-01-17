<?php

add_filter( 'custy_sections', function( $sections ) {
return wp_parse_args( [ 'button' => [

  'title' => __( 'Button' ),
  'container' => [ 'priority' => 10 ],
  'css_selector' => '.button, .wp-block-file__button, .wp-block-button__link',
  'options' => [

    'buttons' => [
      'type' => 'ct-typography',
      'label' => __( 'Buttons', 'blocksy' ),
      'css' => '--$',
    ],

    'buttonBackground' => [
      'label' => __( 'Background' ),
      'type'  => 'ct-color-picker',
      'pickers' => [
        'default' => __( 'Initial' ),
        'hover' => __( 'Hover' ),
      ],
      'css' => [
        '--buttonBg' => 'default.color',
        '--buttonBgHover' => 'hover.color'
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
        '--buttonColor' => 'default.color',
        '--buttonColorHover' => 'hover.color',
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