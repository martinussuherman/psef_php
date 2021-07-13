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

$id_token=$oidc->getIdToken();
$access_token=$oidc->getAccessToken();
$data_verif = $oidc->getVerifiedClaims();
$sid_value = $data_verif->sub;
$role_value = $data_verif->role;
$idTokenData = $oidc->getIdTokenPayload();
$email = $idTokenData->email;
setcookie('sid', $sid_value, time() + 86400, "/");
setcookie('email', $email, time() + 86400, "/");
setcookie('role', $role_value, time() + 86400, "/");
setcookie('idtoken', $id_token, time() + 86400, "/");
setcookie('accesstoken', $access_token, time() + 86400, "/");

header("Location: ./");
?>
