<?php

add_filter( 'custy_render_footer', function( $content, $data ) {
  
  // var_dump( $data );

  $content = Timber::compile( 'footer.twig', $data );
  return $content;
}, 10, 2 );