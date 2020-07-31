<?php

// Check for required plugins
if( !class_exists( 'Timber' ) || !class_exists( 'H' ) ) {
  add_action('admin_notices', function() {
    $text = sprintf(  __('You need to activate all Library plugins. <a href="%s">Activate now »</a>.' ), admin_url('plugins.php') . '?s=library' );
    echo '<div class="notice notice-error"><p>' . $text . '</p></div>';
  });
}

$THEME = wp_get_theme();
define( 'THEME_VERSION', $THEME->get( 'Version' ) );



require_once __DIR__ . '/functions/helpers.php';
require_once __DIR__ . '/functions/setup.php';
require_once __DIR__ . '/functions/filters.php';

if( is_admin() ) {
  require_once __DIR__ . '/functions/admin.php';
} else {
  require_once __DIR__ . '/functions/api.php';
  require_once __DIR__ . '/functions/timber.php';
}

if( class_exists('WooCommerce') ) {
  require_once __DIR__ . '/shop/hooks.php';
  require_once __DIR__ . '/shop/setup.php';
}


add_filter( 'widget_posts_args', '_h_modify_widget_recent_posts' );

/**
 * Add thumbnail to Recent Posts widget
 * 
 * @filter widget_posts_args
 */
function _h_modify_widget_recent_posts( $args ) {
  add_filter( 'the_title', '_h_modify_widget_recent_posts_title', 10, 2 );

  add_action( 'loop_end', function() {
    remove_filter( current_filter(), __FUNCTION__ );
    remove_filter( 'the_title', '_h_modify_widget_recent_posts_title', 10 );
  } );

  return $args;
}

function _h_modify_widget_recent_posts_title( $title, $post_id ) {
  if( has_post_thumbnail( $post_id ) ) {
    $title = get_the_post_thumbnail( $post_id, 'thumbnail' ) . '<h6>' . $title . '</h6>';
  }
  return $title;
}