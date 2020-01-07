<?php

add_filter( 'h_customizer_defaults', 'my_customizer_defaults' );

function my_customizer_defaults( $defaults ) {
  $new_defaults = wp_parse_args( [
    'colorPalette' => [
      'color1' => [ 'color' => '#1976d2' ],
      'color2' => [ 'color' => '#0d47a1' ],
      'color3' => [ 'color' => '#bbdefb' ],
      'color4' => [ 'color' => '#546e7a' ],
      'color5' => [ 'color' => '#cfd8dc' ],
    ],
    'textColor' => [
      'default' => [ 'color' => '#2c3e50' ],
      'invert' => [ 'color' => '#333333' ],
    ],
  ], $defaults );

  return $new_defaults;
}