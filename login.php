<?php
session_start();
require("vendor/autoload.php");
include("configReader.php");

$settingData = readConfig();
$oidc = new Jumbojett\OpenIDConnectClient(
  $settingData->identity->identityServerUrl,
  $settingData->identity->clientId
);

$oidc->setRedirectURL($settingData->identity->loginRedirectUrl);

foreach ($settingData->identity->scopes as $scope) {
  $oidc->addScope($scope);
}

$oidc->authenticate();

$idToken = $oidc->getIdToken();
$accessToken = $oidc->getAccessToken();
$userClaims = $oidc->getVerifiedClaims();
$idTokenData = $oidc->getIdTokenPayload();

$_SESSION["idToken"] = $idToken;
$_SESSION["accessToken"] = $accessToken;
$_SESSION["refreshToken"] = $oidc->getRefreshToken();
$_SESSION["tokenExpired"] = $userClaims->exp;
$_SESSION["role"] = $userClaims->role;
$_SESSION["email"] = $idTokenData->email;

setcookie('sid', $userClaims->sub, time() + 86400, "/");
setcookie('role', $userClaims->role, time() + 86400, "/");
setcookie('email',  $idTokenData->email, time() + 86400, "/");
setcookie('idtoken', $idToken, time() + 86400, "/");
setcookie('accesstoken', $accessToken, time() + 86400, "/");

header("Location: ./");
