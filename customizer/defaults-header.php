<?php
/**
 * Default values for Header Settings
 * Learn more: https://github.com/hrsetyono/wp-custy/wiki/Default-Value-%E2%80%93-Header
 */
add_filter( 'custy_default_values', function( $defaults ) {

  // $defaults['header']['button'] = wp_parse_args( [
  //   'style' => 'solid',
  // ], $defaults['header']['button'] );


  /// CUSTOM ITEM ///
  $defaults['header']['free-text'] = [
    'content' => 'Sample Text',
    'textColor' => [
      'default' => [ 'color' => 'var(--text)' ],
      'link' => [ 'color' => 'var(--main)' ],
    ],
    'textSize' => 'var(--smallFontSize)',
    'textMaxWidth' => '100%',
  ];

  return $defaults;
} );