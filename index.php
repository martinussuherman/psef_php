<?php
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER["DOCUMENT_ROOT"]);
require_once("router.php");

get('/', 'home.php');
get('/dashboard', 'main.php');
get('/login', 'login.php');
get('/logout', 'logout.php');
get('/view-nib/$nib', 'modules/nib/displayNib.php');
get('/sso/receive-token', 'modules/sso/receiveToken.php');
get('/sso/ids-sso', 'modules/sso/identityServerCallback.php');
post('/call-api', 'api/api.php');
