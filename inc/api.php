<?php
/**
 * Codes related to WP API
 */

add_action('rest_api_init', 'my_init_api');


/**
 * @action rest_api_init
 */
function my_init_api() {
  $namespace = 'custom/v1';

  // sample-get/:id
  register_rest_route($namespace, '/sample-get/(?P<id>\d+)', [
    'methods' => 'GET',
    'permission_callback' => '__return_true',
    'callback' => '_my_api_sample_get'
  ]);

  // sample-post/:id
  register_rest_route($namespace, '/sample-post/(?P<id>\d+)', [
    'methods' => 'POST',
    'permission_callback' => '__return_true',
    'callback' => '_my_api_sample_post'
  ]);
}

/**
 * @route GET /sample-get/:id
 */
function _my_api_sample_get( $params ) {
  $id = $params['id'];
  return 'you passed in ID ' . $id;
}


/**
 * @route POST /sample-post/:id
 */
function _my_api_sample_post( $request ) {
  $params = $request->get_params();
  $params = wp_parse_args($params, [
    'id' => 0,
    'data1' => 'default value',
    'data2' => 'default value',
  ]);
  
  return 'post request';
}

/**
 * Permission callback for registering API
 * 
 * WARNING: This assumes you haven't changed the capabilities of each role
 */
function __is_logged_in() {
  return is_user_logged_in();
}

function __is_admin_role() {
  return current_user_can('activate_plugins');
}