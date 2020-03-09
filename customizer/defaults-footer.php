<?php
/**
 * Default values for Core Settings
 */
add_filter( 'custy_default_values', function( $defaults ) {
  // Add new footer in dropdown
  $defaults['footer_placements']['sections'][] = [
    'id' => 'second',
    'label' => __( 'Second Footer' ),
    'mode' => 'columns',
    'settings' => [],
    'items' => [
      [ 'id' => 'menu', 'values' => $defaults['footer']['menu'] ],
      [ 'id' => 'copyright', 'values' => $defaults['footer']['copyright'] ],
      
      [ 'id' => 'top-row', 'values' => $defaults['footer']['top-row'] ],
      [ 'id' => 'middle-row', 'values' => $defaults['footer']['middle-row'] ],
      [ 'id' => 'bottom-row', 'values' => $defaults['footer']['bottom-row'] ],
    ],
    'rows' => [
      [ 'id' => 'top-row', 'columns' => [
        [ 'menu' ]
      ] ],
      [ 'id' => 'middle-row', 'columns' => [
        [ 'widget-area-1' ],
        [ 'widget-area-2' ],
        [ 'widget-area-3' ]
      ] ],
      [ 'id' => 'bottom-row', 'columns' => [
        [ 'copyright' ]
      ] ],
    ],
  ];

  return $defaults;
} );