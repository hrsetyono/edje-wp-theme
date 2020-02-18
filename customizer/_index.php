<?php

if( !class_exists( 'Custy' ) ) { return; }

// DEFAULTS
require_once __DIR__ . '/defaults-core.php';
require_once __DIR__ . '/defaults-header.php';
require_once __DIR__ . '/defaults.php';


/**
 * Add custom sections to customizer
 */
add_filter( 'custy_sections', function( $all_sections ) {
  $files = glob( __DIR__ . "/sections/*.php" );

  // Require all options
  foreach( $files as $f ) {
    $file_name = basename( $f, '.php' );
    
    // SKIP if first letter is underscore
    if( preg_match( '/^_/', $file_name, $matches ) ) { continue; }

    // Get variable $section or $sections from file
    require $f;

    if( isset( $section ) ) {
      $all_sections[ $file_name ] = $section;
    }
    elseif( isset( $sections ) ) {
      $all_sections = array_merge( $all_sections, $sections );
    }
  }

  return $all_sections;
} );