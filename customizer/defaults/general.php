<?php

add_filter( 'h_customizer_defaults', function( $defaults ) {
  return wp_parse_args( [

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

    'mobile_media' => '480px',
    'tablet_media' => '767px',

    'siteBackground' => blocksy_background_default_value( [
      'backgroundColor' => [
        'default' => [ 'color' => '#f8f9fb' ],
      ],
    ] ),
    'siteWidth' => '1120px',
    'blogWidth' => '650px',

    'gridGap' => '20px',
    'gridRim' => '10px',
    'tileGap' => '20px',

  ], $defaults );
});