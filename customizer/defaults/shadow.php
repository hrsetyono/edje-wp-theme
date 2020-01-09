<?php

add_filter( 'h_customizer_defaults', function( $defaults ) {
  return wp_parse_args( [

    // SHADOW
    'shadow0' => [
      'enable' => true,
      'h_offset' => 0,
      'v_offset' => 1,
      'blur' => 2,
      'spread' => 0,
      'inset' => false,
      'color' => [ 'color' => 'rgba(0, 0, 0, 0.24)' ],
    ], // 0 1px 2px rgba(0,0,0,0.24);
  
    'shadow1' => [
      'enable' => true,
      'h_offset' => 0,
      'v_offset' => 3,
      'blur' => 6,
      'spread' => 0,
      'inset' => false,
      'color' => [ 'color' => 'rgba(0, 0, 0, 0.23)' ],
    ], // 0 3px 6px rgba(0, 0, 0, 0.23)
  
    'shadow2' => [
      'enable' => true,
      'h_offset' => 0,
      'v_offset' => 6,
      'blur' => 6,
      'spread' => 0,
      'inset' => false,
      'color' => [ 'color' => 'rgba(0, 0, 0, 0.23)' ],
    ], // 0 6px 6px rgba(0,0,0,0.23)
  
    'shadow3' => [
      'enable' => true,
      'h_offset' => 0,
      'v_offset' => 10,
      'blur' => 10,
      'spread' => 0,
      'inset' => false,
      'color' => [ 'color' => 'rgba(0, 0, 0, 0.22)' ],
    ], // 0 10px 10px rgba(0,0,0,0.22)
  
    'shadow4' => [
      'enable' => true,
      'h_offset' => 0,
      'v_offset' => 15,
      'blur' => 12,
      'spread' => 0,
      'inset' => false,
      'color' => [ 'color' => 'rgba(0, 0, 0, 0.22)' ],
    ],// 0 15px 12px rgba(0,0,0,0.22)

  ], $defaults );
});