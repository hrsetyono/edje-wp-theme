<?php
/**
 * Customize many parts of Wordpress
 */
class MyHooks {
  function __construct() {
    add_filter( 'sample_filter', [$this, 'sample_filter'] );
  }

  /**
   * @filter sample_filter
   */
  function sample_filter() {

  }
}