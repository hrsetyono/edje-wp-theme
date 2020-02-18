<?php
/**
 * Default values for Core Settings
 */
add_filter( 'custy_default_values', function( $defaults ) {

  // HEADER - Add new header in dropdown
  $defaults['header_placements']['sections'][] = [
    'id' => 'sub',
    'label' => 'Sub Header',
    'mode' => 'placements',
    'items' => [
      [ 'id' => 'menu', 'values' => $defaults['header']['menu'] ],
      [ 'id' => 'logo', 'values' => $defaults['header']['logo'] ],
      [ 'id' => 'mobile-menu', 'values' => $defaults['header']['mobile-menu'] ],
      [ 'id' => 'trigger', 'values' => $defaults['header']['trigger'] ],

      [ 'id' => 'top-row', 'values' => $defaults['header']['top-row'] ],
      [ 'id' => 'middle-row', 'values' => $defaults['header']['middle-row'] ],
      [ 'id' => 'bottom-row', 'values' => $defaults['header']['bottom-row'] ],
      [ 'id' => 'offcanvas', 'values' => $defaults['header']['offcanvas'] ],
    ],
    'desktop' => [
      [ 'id' => 'top-row', 'placements' => [
        [ 'id' => 'start', 'items' => [] ],
        [ 'id' => 'middle', 'items' => [] ],
        [ 'id' => 'end', 'items' => [] ],
        [ 'id' => 'start-middle', 'items' => [] ],
        [ 'id' => 'end-middle', 'items' => [] ],
      ] ],
      [ 'id' => 'middle-row', 'placements' => [
        [ 'id' => 'start', 'items' => [ 'logo' ] ],
        [ 'id' => 'middle', 'items' => [] ],
        [ 'id' => 'end', 'items' => [ 'menu' ] ],
        [ 'id' => 'start-middle', 'items' => [] ],
        [ 'id' => 'end-middle', 'items' => [] ],
      ] ],
      [ 'id' => 'bottom-row', 'placements' => [
        [ 'id' => 'start', 'items' => [] ],
        [ 'id' => 'middle', 'items' => [] ],
        [ 'id' => 'end', 'items' => [] ],
        [ 'id' => 'start-middle', 'items' => [] ],
        [ 'id' => 'end-middle', 'items' => [] ],
      ] ],
    ],
    'mobile' => [
      [ 'id' => 'top-row', 'placements' => [
        [ 'id' => 'start', 'items' => [] ],
        [ 'id' => 'middle', 'items' => [] ],
        [ 'id' => 'end', 'items' => [] ],
        [ 'id' => 'start-middle', 'items' => [] ],
        [ 'id' => 'end-middle', 'items' => [] ],
      ] ],
      [ 'id' => 'middle-row', 'placements' => [
        [ 'id' => 'start', 'items' => [ 'logo' ] ],
        [ 'id' => 'middle', 'items' => [] ],
        [ 'id' => 'end', 'items' => [ 'trigger' ] ],
        [ 'id' => 'start-middle', 'items' => [] ],
        [ 'id' => 'end-middle', 'items' => [] ],
      ] ],
      [ 'id' => 'bottom-row', 'placements' => [
        [ 'id' => 'start', 'items' => [] ],
        [ 'id' => 'middle', 'items' => [] ],
        [ 'id' => 'end', 'items' => [] ],
        [ 'id' => 'start-middle', 'items' => [] ],
        [ 'id' => 'end-middle', 'items' => [] ],
      ] ],
      [ 'id' => 'offcanvas', 'placements' => [
        [ 'id' => 'start', 'items' => [ 'mobile-menu' ] ],
      ] ],
    ],
  ];

  return $defaults;
} );