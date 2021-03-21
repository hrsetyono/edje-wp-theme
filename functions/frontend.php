<?php

add_shortcode( 'current-year', 'shortcode_current_year' );

add_filter( 'wp_nav_menu_objects', 'my_nav_markup' );


  
/**
 * Output current year
 *   [current-year]
 */
function shortcode_current_year( $atts, $content = null ) {
  // $atts = shortcode_atts([
  //   'name' => 'Default value'
  // ], $atts);

  return date('Y');
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