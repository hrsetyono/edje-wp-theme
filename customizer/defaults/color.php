<?php

add_filter( 'h_customizer_defaults', function( $defaults ) {
  return wp_parse_args( [

    // COLOR
    'colorPalette' => [
      'color1' => [ 'color' => '#1976d2' ],
      'color2' => [ 'color' => '#0d47a1' ],
      'color3' => [ 'color' => '#bbdefb' ],
      'color4' => [ 'color' => '#546e7a' ],
      'color5' => [ 'color' => '#cfd8dc' ],
    ],
    'textColor' => [
      'default' => [ 'color' => '#2c3e50' ],
      'invert' => [ 'color' => '#ffffff' ],
    ],
    'headingColor' => [
      'default' => [ 'color' => 'var(--text)' ],
    ],
    'content_link_type' => 'type-2', // @deprecated
    'linkColor' => [
      'default' => [ 'color' => 'var(--text)', ],
      'hover' => [ 'color' => 'var(--main)', ],
    ],
    'buttonTextColor' => [
      'default' => [ 'color' => 'var(--textInvert)', ],
      'hover' => [ 'color' => 'var(--textInvert)', ],
    ],
    'buttonColor' => [
      'default' => [ 'color' => 'var(--main)', ],
      'hover' => [ 'color' => 'var(--mainDark)', ],
    ],

  ], $defaults );
});