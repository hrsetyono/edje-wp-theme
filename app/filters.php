<?php

/**
 * Customize many parts of Wordpress
 */
class MyFilters {
  function __construct() {
    add_shortcode( 'example', [$this, 'shortcode_example'] );
  }


  
  /**
   * Example of custom shortcode
   *   [example name="$name"] ... [/example]
   */
  function shortcode_example( $atts, $content = null ) {
    $atts = shortcode_atts([
      'name' => 'Default value'
    ], $atts);

    return "<div class='example'> <h2>{$atts['name']}</h2> $content </div>";
  }
}

new MyFilters();