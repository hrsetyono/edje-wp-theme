<?php
add_filter( 'custy_sections', function( $sections ) {
return wp_parse_args( [
  
  custy_rand_id() => [
    'type' => 'ct-group-title',
    'title' => __( 'Elements' ),
    'priority' => 10,
  ],

], $sections );
} );