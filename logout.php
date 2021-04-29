<?php
require 'vendor/autoload.php';
 
$issuer = 'https://usermanagement-simyanfar.kemkes.go.id/';
$cid = 'localhost-test';
$secret = '89504488-d7e9-2647-e03a-bcfa29081884';
$oidc = new Jumbojett\OpenIDConnectClient($issuer, $cid, $secret);
$oidc->signOut($_COOKIE['idtoken'], 'https://psef.kemkes.go.id/');
setcookie('sid', '', time() - 3600); 
setcookie('role', '', time() - 3600); 
setcookie('idtoken', '', time() - 3600); 
setcookie('accesstoken', '', time() - 3600); 
?>
