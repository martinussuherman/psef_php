<?php
require 'vendor/autoload.php';

$issuer = 'https://usermanagement-simyanfar.kemkes.go.id/';
$cid = 'psef-client';
$secret = '89504488-d7e9-2647-e03a-bcfa29081884';
$oidc = new Jumbojett\OpenIDConnectClient($issuer, $cid, $secret);

$oidc->setRedirectURL("https://psef.kemkes.go.id/login.php");
$oidc->addScope("roles");
$oidc->addScope("email");
$oidc->addScope("PsefOdataApi");
$oidc->addScope("SimyanfarIdentityApi");
$oidc->authenticate();

$id_token = $oidc->getIdToken();
$access_token = $oidc->getAccessToken();
$userClaims = $oidc->getVerifiedClaims();
$idTokenData = $oidc->getIdTokenPayload();

setcookie('sid', $userClaims->sub, time() + 86400, "/");
setcookie('role', $userClaims->role, time() + 86400, "/");
setcookie('email',  $idTokenData->email, time() + 86400, "/");
setcookie('idtoken', $id_token, time() + 86400, "/");
setcookie('accesstoken', $access_token, time() + 86400, "/");

header("Location: ./");
