<?php
add_filter( 'custy_sections', function( $sections ) {
return wp_parse_args( [
  
  blocksy_rand_md5() => [
    'type' => 'ct-group-title',
    'title' => __( 'Elements' ),
    'priority' => 10,
  ],

], $sections );
} );