<?php

/**
 * Plugin Name: Pixet integration
 * Plugin URI: https://nanforce.com
 * Description: For the custom wordpress plugin which is to integrate with pixet.com
 * Version: 1.0
 * Author: Yuehnan, Wu
 * Author URI: https://nanforce.com
 */

add_action('rest_api_init', 'register_routes');

function register_routes()
{
    register_rest_route('pixet/v1', '/access', array(
        'methods' => 'GET',
        'callback' => 'get_is_access',
    ));
}


function get_is_access()
{
    $post =
        ['status_code' => 200, 'msg' => 'Access api "pixet: v1" successfully'];
    return $post;
}
