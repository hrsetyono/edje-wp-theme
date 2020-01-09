<?php

add_filter( 'h_customizer_defaults', function( $defaults ) {
  return wp_parse_args( [

    // BLOG POSTS
    'blogTitleSize' => 'var(--h1Size)',
    'blogTitleColor' => [
      'default' => [ 'color' => 'var(--text)' ]
    ],

  ], $defaults );
});

