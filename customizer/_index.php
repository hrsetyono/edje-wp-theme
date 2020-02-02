<?php

if( class_exists( 'Custy' ) ) {
  // DEFAULTS
  require_once __DIR__ . '/defaults-core.php';
  require_once __DIR__ . '/defaults.php';

  // OPTIONS
  // require_once __DIR__ . '/options/sidebar.php';

  require_once __DIR__ . '/options/title-elements.php';
  require_once __DIR__ . '/options/typography.php';
  require_once __DIR__ . '/options/grid.php';
  require_once __DIR__ . '/options/button.php';
  // require_once __DIR__ . '/options/form.php';
  // require_once __DIR__ . '/options/other.php';
}