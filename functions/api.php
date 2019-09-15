<?php
/**
 * for H::GET() and H::POST()
 * IMPORTANT - This should be defined on `wp-config.php` so it can vary between local / live
 */
define( 'API_URL', 'https://yoursite.com/wp-json/my/v1' );

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
    global $h_api_namespace;
    $h_api_namespace = 'my/v1';
    H::register_GET_route( '/sample-get/:id', [$this, 'sample_get'] );
    H::register_POST_route( '/sample-post/:id', [$this, 'sample_post'] );

    // Changing version. All routes registered below will have "my/v2" namespace
    $h_api_namespace = 'my/v2';
    H::register_GET_route( '/sample-get/:id', [$this, 'sample_get_v2'] );
  }

  /**
   * @get my/v1/sample-get/:id
   */
  function sample_get( $params ) {
    $id = $params['id'];
    return 'version 1';
  }

  /**
   * @get my/v2/sample-get/:id
   */
  function sample_get_v2( $params ) {
    $id = $params['id'];
    return 'version 2';
  }

  /**
   * @post my/v1/sample-post/:id
   */
  function sample_post( $request ) {
    $params = $request->get_params();
    return $params;
  }
}

new MyAPI();