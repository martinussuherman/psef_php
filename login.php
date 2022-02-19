<?php
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
$_SESSION["role"] = $userClaims->role ?? "";
$_SESSION["email"] = $idTokenData->email;

$cookieExpiry = time() + 172800;
setcookie('sid', $userClaims->sub, $cookieExpiry, "/");
setcookie('role', $userClaims->role ?? "", $cookieExpiry, "/");
setcookie('email',  $idTokenData->email, $cookieExpiry, "/");
setcookie('idtoken', $idToken, $cookieExpiry, "/");
setcookie('accesstoken', $accessToken, $cookieExpiry, "/");

header("Location: ./");
