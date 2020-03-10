<?php

$section = [
  'title' => __( 'Grid' ),
  'container' => [ 'priority' => 10 ],
  'options' => [

    'gridGap' => [
      'label' => __( 'Grid Gap' ),
      'desc' => __( 'Distance between columns' ),
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
      'desc' => __( 'Minimum distance from window to content' ),
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
];