<?php

add_filter( 'h_render_footer', function( $content, $footer ) {
  // $footer = h_get_builder_data( 'footer' $footer );
  // var_dump( $footer ); 
  $content = Timber::compile( 'footer.twig', $footer );
  return $content;
}, 10, 2 );