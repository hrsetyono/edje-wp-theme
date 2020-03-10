<?php
/**
 * Default values for Core Settings
 * List of options: https://github.com/hrsetyono/edje-blocksy/wiki/Default-Value-%E2%80%93-Core
 */

add_filter( 'custy_default_values', function( $defaults ) {

  $defaults['colorPalette'] = [
    'color1' => [ 'color' => '#1976d2' ],
    'color2' => [ 'color' => '#0d47a1' ],
    'color3' => [ 'color' => '#bbdefb' ],
    'color4' => [ 'color' => '#4caf50' ],
    'color5' => [ 'color' => '#c8e6c9' ],
  ];

  return $defaults;
} );