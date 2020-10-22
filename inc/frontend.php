<?php

add_shortcode( 'example', 'my_shortcode_example' );
add_filter( 'wp_nav_menu_objects', 'my_nav_markup' );


  
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

/**
 * Change the navigation markup
 * 
 * @filter wp_nav_menu_objects
 */
function my_nav_markup( $items ) {
  foreach( $items as &$item ) {
    // add toggle button if has children
    if( in_array( 'menu-item-has-children', $item->classes ) ) {
      $item->title = $item->title . ' <i class="child-indicator"></i>';
    }
  }

  return $items;
}