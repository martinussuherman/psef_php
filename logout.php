<?php
require("vendor/autoload.php");
include("configReader.php");

$settingData = readConfig();
$oidc = new Jumbojett\OpenIDConnectClient(
  $settingData->identity->identityServerUrl,
  $settingData->identity->clientId
);

$idToken = $_SESSION["idToken"];
session_unset();
session_destroy();
session_write_close();

setcookie('sid', '', time() - 3600);
setcookie('role', '', time() - 3600);
setcookie('idtoken', '', time() - 3600);
setcookie('accesstoken', '', time() - 3600);
setcookie('email',  '', time() - 3600);
setcookie(session_name(), '', 0, '/');

$oidc->signOut($idToken, $settingData->identity->logoutRedirectUrl);
