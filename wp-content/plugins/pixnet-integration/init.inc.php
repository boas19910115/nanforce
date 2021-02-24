<?php
require_once(__DIR__ . '/lib/pixnet-sdk/src/Loader.php');
ob_start();
session_start();
PixAPI::setDebugMode(false);

$pixapi = new PixAPI(array(
    'key'  => '1e547b8651056884c27da3b5f635f831',
    'secret' => 'a7982792fec1e47fa49abc18fc789ef6',
    'callback' => 'https://nanforce.com/wp-json/pixet/v1/auth-callback'
));;
