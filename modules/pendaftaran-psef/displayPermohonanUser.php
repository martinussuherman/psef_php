<?php
require_once("apiCall.php");
require_once("modules/template/pageDisplay.php");

global $passedStatus;
$passedStatus = $status;

function displayContent()
{
}

function displayPermohonanUserScript()
{
  global $passedStatus;

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
