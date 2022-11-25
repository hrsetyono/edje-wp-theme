<?php

add_shortcode('current-year', 'shortcode_current_year');
add_filter('excerpt_length', 'my_custom_excerpt_length', 999);


/**
 * Output current year
 *   [current-year]
 */
function shortcode_current_year($atts, $content = null) {
  // $atts = shortcode_atts([
  //   'name' => 'Default value'
  // ], $atts);

  return date('Y');
}

/**
 * @filter excerpt_length
 */
function my_custom_excerpt_length($length) {
  return 24;
}