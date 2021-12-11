<?php
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER["DOCUMENT_ROOT"]);
require_once("router.php");
require_once("configReader.php");

global $settingData;
$settingData = readConfig();

get('/', 'home.php');
get('/dashboard', 'main.php');
get('/login', 'login.php');
get('/logout', 'logout.php');
get('/view-nib/$nib', 'modules/nib/displayNib.php');
get('/sso/receive-token', 'modules/sso/receiveToken.php');
get('/sso/ids-sso', 'modules/sso/identityServerCallback.php');
get('/pemohon-user', 'modules/pemohon/displayPemohonUser.php');
post('/call-api', 'api/api.php');
