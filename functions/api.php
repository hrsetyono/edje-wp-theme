<?php
/**
 * Handles registering new route and do GET / POST request
 */
class MyAPI {
  function __construct() {
    add_action( 'rest_api_init', [$this, 'rest_api_init'] );
  }

  /**
   * @action rest_api_init
   */
  function rest_api_init() {
    $namespace = 'my/v1';

    register_rest_route( $namespace, '/sample-get/(?P<id>\d+)', [
      'methods' => 'GET',
      'callback' => [$this, 'sample_get'],
    ] );

    register_rest_route( $namespace, '/sample-post/(?P<id>\d+)', [
      'methods' => 'POST',
      'callback' => [$this, 'sample_post'],
    ] );
  }

  /**
   * @get my/v1/sample-get/:id
   */
  function sample_get( $params ) {
    $id = $params['id'];
    return 'you passed in ID ' . $id;
  }

  /**
   * @post my/v1/sample-post/:id
   */
  function sample_post( $request ) {
    $params = $request->get_params();
    $id = $params['id'];
    
    return 'post request';
  }
}

new MyAPI();