<?php
/**
 * Codes related to WP API
 */
class MyAPI {
  function __construct() {
    add_action( 'rest_api_init', [$this, 'init'] );
  }

  function init() {
    $namespace = 'my/v1';

    // sample-get/:id
    register_rest_route( $namespace, '/sample-get/(?P<id>\d+)', [
      'methods' => 'GET',
      'callback' => [$this, 'sample_get']
    ] );

    // sample-post/:id
    register_rest_route( $namespace, '/sample-post/(?P<id>\d+)', [
      'methods' => 'POST',
      'callback' => [$this, 'sample_post']
    ] );
  }

  /**
   * @get /sample-get/:id
   */
  function sample_get( $params ) {
    $id = $params['id'];
    return 'you passed in ID ' . $id;
  }

  /**
   * @post /sample-post/:id
   */
  function sample_post( $request ) {
    $params = $request->get_params();
    $id = $params['id'];
    
    return 'post request';
  }
}

new MyAPI();