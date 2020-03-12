<?php
/**
 * Default values for Footer Settings
 * Learn more: https://github.com/hrsetyono/wp-custy/wiki/Default-Value-%E2%80%93-Footer
 */
add_filter( 'custy_default_values', function( $defaults ) {

  // $defaults['footer']['top-row'] = wp_parse_args( [
  //   'items_per_row' => '3',
  // ], $defaults['footer']['top-row'] );

  return $defaults;
} );