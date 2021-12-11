<?php
require_once("vendor/autoload.php");
require_once("configReader.php");
require_once("apiCall.php");

$settingData = readConfig();
$oidc = new Jumbojett\OpenIDConnectClient(
  $settingData->identity->identityServerUrl,
  $settingData->identity->clientId
);

$postData = [
  'token' => $_SESSION["ssoAccessToken"]
];

callPostApi("{$settingData->identity->identityServerUrl}/Oss/RevokeToken", "", $postData);

$idToken = $_SESSION["idToken"];
session_unset();
session_destroy();
session_write_close();

setcookie('accesstoken', '', time() - 3600);
setcookie(session_name(), '', 0, '/');

$oidc->signOut($idToken, $settingData->identity->logoutRedirectUrl);
