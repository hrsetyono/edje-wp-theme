<?php
/**
 * Codes for custom Shortcode
 */
class MyShortcode {
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

    return "<div class='example'> <h2>${ $atts['name'] }</h2>  $content </div>";
  }
}


/**
 * Dump any custom Wordpress filter or action here
 */
class MyFilter {
  function __construct() {
    add_filter( 'sample_filter', [$this, 'sample_filter'] );
  }

  /**
   * @filter sample_filter
   */
  function sample_filter() {

  }
}


/**
 * Reusable functions
 */
class MyHelper {
  /**
   * Check activation of Edje and Timber plugins
   */
  static function has_required_plugins( array $plugins = ['H', 'Timber'] ) {
    $is_all_installed = true;

    // if any of the plugins doesn't exist, break the loop
    if( is_array( $plugins ) ) {
      foreach( $plugins as $p ) {
        $is_all_installed = class_exists( $p );
        if( !$is_all_installed ) { break; }
      }
    } else {
      $is_all_installed = class_exists( $plugins );
    }

    // show error message if all not installed AND it's admin page
    $is_admin_page = is_admin() && current_user_can('install_plugins');
    if( !$is_all_installed && $is_admin_page ) {
      add_action('admin_notices', function() {
        $text = sprintf(
          __('You need to activate WP Edje and Timber. <a href="%s">Activate now »</a>.', 'my'),
          admin_url('plugins.php')
        );
        echo '<div class="notice notice-error"><p>' . $text . '</p></div>';
      });
    }
    return $is_all_installed;
  }
}
