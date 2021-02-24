<?php
require_once(__DIR__ . '/lib/pixnet-sdk/src/Loader.php');
ob_start();
session_start();
PixAPI::setDebugMode(false);
