<?php
require_once("configReader.php");
require_once("apiCall.php");

$ssoAccessToken = $_GET["access-token"];
$ssoRefreshToken = $_GET["refresh_token"];
$ssoKodeIzin = $_GET["kd_izin"];
$from = $_SERVER["REMOTE_ADDR"];
$query = $_SERVER["QUERY_STRING"];

file_put_contents("oss-sso-receive-token.log", "Query string: {$query}\n", FILE_APPEND);
file_put_contents("oss-sso-receive-token.log", "from: {$from} access token: {$ssoAccessToken} - refresh token: {$ssoRefreshToken} - kode izin: {$ssoKodeIzin}\n", FILE_APPEND);

