<?php

add_filter( 'h_customizer_options', function( $sections ) {
return wp_parse_args( [ 'shadow' => [

  'title' => __( 'Shadows' ),
  'container' => [ 'priority' => 1 ],
  'css_selector' => ':root',
  'options' => [

    'shadow0' => [
      'label' => __( 'Shadow 0' ),
      'type' => 'ct-box-shadow',
      'css' => '--shadow0',
    ],

    'shadow1' => [
      'label' => __( 'Shadow 1' ),
      'type' => 'ct-box-shadow',
      'css' => '--shadow1',
    ],

    'shadow2' => [
      'label' => __( 'Shadow 2' ),
      'type' => 'ct-box-shadow',
      'css' => '--shadow2',
    ],

    'shadow3' => [
      'label' => __( 'Shadow 3' ),
      'type' => 'ct-box-shadow',
      'css' => '--shadow3',
    ],

    'shadow4' => [
      'label' => __( 'Shadow 4' ),
      'type' => 'ct-box-shadow',
      'css' => '--shadow4',
    ],
  ]

] ], $sections );
} );