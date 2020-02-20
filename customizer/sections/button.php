<?php

$section = [
  'title' => __( 'Button' ),
  'container' => [ 'priority' => 10 ],
  'css_selector' => '.button, .wp-block-file__button, .wp-block-button__link',
  'options' => [

    'buttons' => [
      'type' => 'ct-typography',
      'label' => __( 'Buttons' ),
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
        '--buttonBg' => 'default',
        '--buttonBgHover' => 'hover'
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
        '--buttonColor' => 'default',
        '--buttonColorHover' => 'hover',
      ],
    ],

    custy_rand_id() => [ 'type' => 'ct-divider' ],

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

];