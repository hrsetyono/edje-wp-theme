<?php

add_filter( 'custy_render_header', function( $content, $data ) {
 
  // var_dump( $data['desktop'] );

  $content = Timber::compile( 'header.twig', $data );
  return $content;

}, 20, 2 );