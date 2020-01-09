<?php

add_filter( 'h_customizer_defaults', function( $defaults ) {
  return wp_parse_args( [

    // OTHER > Back to Top
    'has_back_top' => 'yes',
    'top_button_type' => 'type-1',
    'top_button_shape' => 'square',
    'topButtonOffset' => '25px',
    'top_button_alignment' => 'right',
    'back_top_visibility' => [ 'desktop' => true, 'tablet' => true, 'mobile' => false ],
  
    'topButtonIconColor' => [
      'default' => [ 'color' => '#ffffff' ],
      'hover' => [ 'color' => '#ffffff' ],
    ],
    'topButtonShapeBackground' => [
      'default' => [ 'color' => 'var(--text)' ],
      'hover' => [ 'color' => 'var(--textInvert)' ],
    ],
    'topButtonShadow' => 'var(--shadow1)',

    // OTHER > Performance
    'emoji_scripts' => 'no',
    'has_lazy_load' => 'yes',
    'lazy_load_type' => 'fade',
  
  ], $defaults );
});
