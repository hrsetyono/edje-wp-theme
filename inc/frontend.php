<?php

add_shortcode( 'example', 'my_shortcode_example' );


  
/**
 * Example of custom shortcode
 *   [example name="$name"] ... [/example]
 */
function my_shortcode_example( $atts, $content = null ) {
  $atts = shortcode_atts([
    'name' => 'Default value'
  ], $atts);

  return "<div class='example'> <h2>{$atts['name']}</h2> $content </div>";
}