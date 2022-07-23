<?php

add_shortcode('current-year', 'shortcode_current_year');

add_filter('wp_nav_menu_objects', 'my_nav_markup');
add_filter('excerpt_length', 'my_custom_excerpt_length', 999);

add_filter('previous_post_link', 'my_adjacent_post_link', 10, 5);
add_filter('next_post_link', 'my_adjacent_post_link', 10, 5);


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
 * Change the Menu markup
 * 
 * @filter wp_nav_menu_objects
 */
function my_nav_markup($items) {
  foreach ($items as $i) {
    // Change the "menu-item" class into "submenu-item" if it's a child menu
    if ($i->menu_item_parent !== '0' && $i->classes[1] == 'menu-item') {
      $i->classes[1] = 'sub-menu-item';
    }
  }

  return $items;
}

/**
 * @filter excerpt_length
 */
function my_custom_excerpt_length($length) {
  return 24;
}

/**
 * 
 * 
 * @filter prev_post_link
 */
function my_adjacent_post_link($output, $format, $link, $post, $adjacent) {
  if (strpos($output, '%thumbnail') && $post) {
    $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'thumbnail');
    $thumbnail = $thumbnail_url ? "<img src='{$thumbnail_url}'>"  : '';

    $output = str_replace('%thumbnail', $thumbnail, $output);
  }

  if (strpos($output, '%label')) {
    $label = $adjacent === 'next' ? __('Next Post') : __('Previous Post');
    $label = "<em>{$label}</em>";

    $output = str_replace('%label', $label, $output);
  }

  return $output;
}
