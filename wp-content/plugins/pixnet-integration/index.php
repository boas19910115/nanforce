<?php

/**
 * Plugin Name: Pixnet integration
 * Plugin URI: https://nanforce.com
 * Description: For the custom wordpress plugin which is to integrate with pixnet.com
 * Version: 1.0
 * Author: Yuehnan, Wu
 * Author URI: https://nanforce.com
 */



add_action('rest_api_init', 'register_routes');

function register_routes()
{
    register_rest_route('pixnet/v1', '/access', array(
        'methods' => 'GET',
        'callback' => 'get_is_access',
    ));
    register_rest_route('pixnet/v1', '/auth-callback', array(
        'methods' => 'GET',
        'callback' => 'get_pixet_auth_callback',
    ));
    register_rest_route('pixnet/v1', '/blog-info', array(
        'methods' => 'GET',
        'callback' => 'get_blog_info',
    ));
}


function get_is_access()
{
    $post =
        ['status_code' => 200, 'msg' => 'Access api "pixnet: v1" successfully'];
    return $post;
}

function get_pixet_auth_callback()
{
    return 'none';
}

function  get_blog_info()
{
    require_once(__DIR__ . '/init.inc.php');

    $apiList = $pixapi->getAPIList();

    return $apiList;
}

// class PixnetMethods
// {
//     private  $pixapi;

//     public function __construct()
//     {
//         require_once(__DIR__ . '/init.inc.php');
//         $this->pixapi = new PixAPI(array(
//             'key'  => '1e547b8651056884c27da3b5f635f831',
//             'secret' => 'a7982792fec1e47fa49abc18fc789ef6',
//             'callback' => 'https://nanforce.com/wp-json/pixet/v1/auth-callback'
//         ));;
//     }


//     public function  get_blog_info()
//     {
//         $apiList = $this->pixapi->getAPIList();
//         return $apiList;
//     }
// }
