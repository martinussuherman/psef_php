<?php
require_once("{$_SERVER['DOCUMENT_ROOT']}/router.php");

$homeRoute = empty($_SESSION["accessToken"]) ? "home.php" : "main.php";

get('/', $homeRoute);
get('/login', 'login.php');
get('/logout', 'logout.php');
get('/view-nib/$nib', 'modules/nib/displayNib.php');
get('/sso/receive-token', 'modules/sso/receiveToken.php');
