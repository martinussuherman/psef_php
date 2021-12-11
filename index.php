<?php
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER["DOCUMENT_ROOT"]);
require_once("router.php");
require_once("configReader.php");

global $settingData;
$settingData = readConfig();

get('/', 'home.php');
get('/login', 'login.php');
get('/logout', 'logout.php');
get('/sso/receive-token', 'modules/sso/receiveToken.php');
get('/sso/ids-sso', 'modules/sso/identityServerCallback.php');

if (!isset($_SESSION["accessToken"])) {
  header("Location: /");
  return;
}

get('/dashboard', 'main.php');
get('/view-nib/$nib', 'modules/nib/displayNib.php');
get('/pemohon-user', 'modules/pemohon/displayPemohonUser.php');
get('/permohonan-user/$status', 'modules/pendaftaran-psef/displayPermohonanUser.php');
get('/tanda-daftar', 'modules/perizinan/displayPerizinan.php');
post('/call-api', 'api/api.php');
