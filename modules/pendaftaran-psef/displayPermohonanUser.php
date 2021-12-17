<?php
require_once("apiCall.php");
require_once("modules/template/pageDisplay.php");

global $passedStatus;
global $settingData;
$passedStatus = $status;

function displayContent()
{
}

function displayPermohonanUserScript()
{
  global $passedStatus;
  global $settingData;

  switch ($passedStatus) {
    case "dalam-proses":
      $route = "routing('proses_user')";
      break;
    case "dikembalikan":
      $route = "routing('dikembalikan_user')";
      break;
    case "selesai":
      $route = "routing('selesai_user')";
      break;
    case "ditolak":
      $route = "routing('ditolak_user')";
      break;
    case "rumusan":
    default:
      $route = "routing('rumusan_user')";
      break;
  }
?>
  <script>
    let accesstoken = "<?php echo $_SESSION["accessToken"]; ?>";
    let apiServerUrl = "<?php echo $settingData->apiServerUrl; ?>";
    let uploadUrl = `${apiServerUrl}/api/v0.1/UploadUserFile`;

    jQuery(function() {
      <?php echo $route; ?>;
    });
  </script>
<?php
}

switch ($passedStatus) {
  case "dalam-proses":
    $title = "(Dalam Proses)";
    break;
  case "dikembalikan":
    $title = "(Dikembalikan)";
    break;
  case "selesai":
    $title = "(Selesai)";
    break;
  case "ditolak":
    $title = "(Ditolak)";
    break;
  case "rumusan":
  default:
    $title = "(Rumusan)";
    break;
}

displayPage("displayContent", "displayPermohonanUserScript", "Sistem PSEF - Data Permohonan {$title}");
