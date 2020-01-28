<?php

add_filter( 'custy_render_header', function( $content, $data ) {
 
  $content = Timber::compile( 'header.twig', $data );
  return $content;

}, 20, 2 );