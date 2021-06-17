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
 * Change the Menu markup
 * 
 * @filter wp_nav_menu_objects
 */
function my_nav_markup( $items ) {
  foreach( $items as $i ) {
    // Change the "menu-item" class into "submenu-item" if it's a child menu
    if( $i->menu_item_parent !== '0' && $i->classes[1] == 'menu-item' ) {
      $i->classes[1] = 'sub-menu-item';
    }
  }

  return $items;
}