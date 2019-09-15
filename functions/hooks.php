<?php
/**
 * Customize many parts of Wordpress
 */
class MyHooks {
  function __construct() {
    add_filter( 'my_sample_filter', [$this, 'do_something'] );
  }

  /**
   * @filter my_sample_filter
   */
  function do_something( $var ) {
    // ...
    return $var;
  }
}

new MyHooks();