<?php
session_start();

include_once('../src/PhpDaumApi.php');

$settings = array(
    'client_id' => 'Your Client ID is here',
    'redirect_uri' => 'Your Redirect Uri is here'
);
$phpDaumApi = $phpDaumApi ?? new PhpDaumApi\UserManagement($settings);

$result = $phpDaumApi->token();
$_SESSION['access_token'] = $result->access_token;
$result = json_encode($result);

echo "
<script>
    window.opener.showResult('$result');
    window.close();
</script>
";

// echo '<pre>';print_r($phpDaumApi);exit;