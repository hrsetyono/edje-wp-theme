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



require_once __DIR__ . '/app/helpers.php';
require_once __DIR__ . '/app/setup.php';
require_once __DIR__ . '/app/filters.php';

if( is_admin() ) {
  require_once __DIR__ . '/app/admin.php';
} else {
  require_once __DIR__ . '/app/api.php';
  require_once __DIR__ . '/app/timber.php';
}

if( class_exists('WooCommerce') ) {
  require_once __DIR__ . '/shop/hooks.php';
  require_once __DIR__ . '/shop/setup.php';
}