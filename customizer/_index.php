<?php

if( !class_exists( 'Custy' ) ) { return; }

// DEFAULT VALUES
require_once __DIR__ . '/defaults-header.php';
require_once __DIR__ . '/defaults-footer.php';
require_once __DIR__ . '/defaults-section.php';
require_once __DIR__ . '/svg.php';


/**
 * Add custom sections to customizer
 */
add_filter( 'custy_sections', function( $sections ) {
  $new_sections = custy_combine_vars_from_dir( __DIR__ . '/section', 'section', 'sections' );
  return array_merge( $sections, $new_sections );
} );


/**
 * Add custom items to Header builder
 */
add_filter( 'custy_header_items', function( $items ) {
  $new_items = custy_combine_vars_from_dir( __DIR__ . '/header' , 'item', 'items' );
  return array_merge( $items, $new_items );
} );


/**
 * Add custom items to Footer builder
 */
add_filter( 'custy_footer_items', function( $items ) {
  $new_items = custy_combine_vars_from_dir( __DIR__ . '/footer' , 'item', 'items' );
  return array_merge( $items, $new_items );
} );