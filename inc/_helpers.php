<?php

class Helper {
  /**
   * Check if required plugins are activated
   */
  static function has_required_plugins() {
    if (!class_exists('H')) {
      add_action('admin_notices', function() {
        $text = sprintf(
          __('You need to activate all Library plugins. <a href="%s">Activate now »</a>.'),
          admin_url('plugins.php') . '?s=library'
        );
        echo "<div class='notice notice-error'><p>{$text}</p></div>";
      });

      return false;
    }
    return true;
  }
}

