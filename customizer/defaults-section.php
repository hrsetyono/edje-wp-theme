<?php
/**
 * Default values for Core Settings
 * Learn more: https://github.com/hrsetyono/wp-custy/wiki/Default-Value
 */
add_filter( 'custy_default_values', function( $defaults ) {

  ///  CORE SECTION  ///
  $defaults = wp_parse_args( [
    'colorPalette' => [
      'color1' => [ 'color' => '#1976d2' ],
      'color2' => [ 'color' => '#0d47a1' ],
      'color3' => [ 'color' => '#bbdefb' ],
      'color4' => [ 'color' => '#4caf50' ],
      'color5' => [ 'color' => '#c8e6c9' ],
    ],

  ], $defaults );

  /// CUSTOM SECTION ///
  $defaults = wp_parse_args( [
    'has_back_to_top' => 'no',
    'back_to_top_style' => 'arrow-up',
    'back_to_top_alignment' => 'right',
    'back_to_top_visibility' => [
      'desktop' => true,
      'tablet' => true,
      'mobile' => false
    ],

    'has_frame' => 'yes',



  ], $defaults );


  return $defaults;
} );