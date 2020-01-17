<?php

add_filter( 'h_render_header', function( $content, $header ) {
  // $header = h_get_header_data( $header );

  // $content = Timber::compile( 'header.twig', $header );
  // return $content;
}, 10, 2 );