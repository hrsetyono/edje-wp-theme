<?php
/**
 * Customize many parts of Wordpress
 */
class MyHooks {
  function __construct() {
    add_filter( 'acf/format_value/name=sample', [$this, 'acf_format_sample'], 10, 3 );
  }

  /**
   * Customize the return value of ACF field by the name of 'sample'
   * @filter acf/format_value/name=sample
   */
  function acf_format_sample( $value, $post_id, $field ) {
    return $value;
  }
}