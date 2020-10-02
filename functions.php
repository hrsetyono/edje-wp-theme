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



$inc = __DIR__ . '/inc';

require_once $inc . '/_helpers.php';
require_once $inc . '/_setup.php';
require_once $inc . '/gutenberg.php';

if( is_admin() ) {
  require_once $inc . '/admin.php';
} else {
  require_once $inc . '/api.php';
  require_once $inc . '/timber.php';
  require_once $inc . '/frontend.php';
}

if( class_exists('WooCommerce') ) {
  require_once $inc . '/shop-setup.php';
  require_once $inc . '/shop-filters.php';

  /**
   * Assign global $product object in Timber
   */
  function timber_set_product( $post ) {
    global $product;
    $product = isset( $post->product ) ? $post->product : wc_get_product( $post->ID );
  }
}