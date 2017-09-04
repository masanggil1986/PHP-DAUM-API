<?php
session_start();

include_once('../src/PhpDaumApi.php');

$settings = array(
    'client_id' => 'Your Client ID is here',
    'redirect_uri' => 'Your Redirect Uri is here'
);
$phpDaumApi = $phpDaumApi ?? new PhpDaumApi\UserManagement($settings);

$phpDaumApi->authorize();

// echo '<pre>';print_r($phpDaumApi);exit;