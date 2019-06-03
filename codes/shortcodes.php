<?php
/**
 * Custom Shortcode
 * @deprecated: try not to use this if possible, it's hard for client to understand
 */
class MyShortcodes {
  function __construct() {
    add_shortcode( 'example', [$this, 'example'] );
  }

  /**
   * Example of custom shortcode
   *   [example name="$name"] ... [/example]
   */
  function example( $atts, $content = null ) {
    $atts = shortcode_atts([
      'name' => 'Default value'
    ], $atts);

    return "<div class='example'> <h2>{$atts['name']}</h2> $content </div>";
  }
}