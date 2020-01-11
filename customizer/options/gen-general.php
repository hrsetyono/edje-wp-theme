<?php

add_filter( 'h_customizer_options', function( $sections ) {
  return wp_parse_args( [ 'general' => [
    'title' => __( 'General' ),
    'container' => [ 'priority' => 1 ],
    'options' => [

      'siteBackground' => [
        'label' => __( 'Site Background' ),
        'type' => 'ct-background',
        'css' => '--site$',
      ],

      'siteWidth' => [
        'label' => __( 'Site Width' ),
        'type' => 'ct-slider',
        'units' => [
          'px' => [ 'min' => 960, 'max' => 1600 ],
        ],
        'css' => '--siteWidth',
      ],

      'blogWidth' => [
        'label' => __( 'Blog Width' ),
        'type' => 'ct-slider',
        'units' => [
          'px' => [ 'min' => 600, 'max' => 960 ],
        ]
      ],
    
      blocksy_rand_md5() => [ 'label' => __( 'Grid' ), 'type' => 'ct-title' ],

      'gridGap' => [
        'label' => __( 'Grid Gap' ),
        'desc' => __( 'Distance between columns of <code>h-grid</code>' ),
        'type' => 'ct-slider',
        'responsive' => true,
        'units' => [
          'px' => [ 'min' => 0, 'max' => 40 ],
          'rem' => [ 'min' => 0, 'max' => 3 ],
        ],
        'css' => '--gridGap',
      ],

      'gridRim' => [
        'label' => __( 'Grid Rim' ),
        'desc' => __( 'Minimum distance between edge of screen to content' ),
        'type' => 'ct-slider',
        'responsive' => true,
        'units' => [
          'px' => [ 'min' => 0, 'max' => 20 ],
          'rem' => [ 'min' => 0, 'max' => 2 ],
        ],
        'css' => '--gridRim',
      ],

      'tileGap' => [
        'label' => __( 'Tile Gap' ),
        'desc' => __( 'Distance between items of <code>h-tile</code>' ),
        'type' => 'ct-slider',
        'responsive' => true,
        'units' => [
          'px' => [ 'min' => 0, 'max' => 40 ],
          'rem' => [ 'min' => 0, 'max' => 3 ],
        ],
        'css' => '--tileGap',
      ],
    
    ]
    
  ] ], $sections );
} );