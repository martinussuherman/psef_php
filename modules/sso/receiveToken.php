<?php
require_once("configReader.php");
require_once("apiCall.php");

$ssoAccessToken = $_GET["access-token"];
$ssoRefreshToken = $_GET["refresh-token"];
$from = $_SERVER["REMOTE_ADDR"];

file_put_contents("oss-sso-receive-token.log", "from: {$from} access token: {$ssoAccessToken} - refresh token: {$ssoRefreshToken}\n", FILE_APPEND);

