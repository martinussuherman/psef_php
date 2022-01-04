<?php
set_include_path(get_include_path() . PATH_SEPARATOR . $_SERVER["DOCUMENT_ROOT"]);
require_once("configReader.php");
require_once('../template/template.php');
$settingData = readConfig();
$fileUrl = $settingData->resourceUrl;
?>

<script>
    var accesstoken = "<?php echo $_SESSION["accessToken"]; ?>";

    $(document).ready(function() {
      loadDataTablePerizinan(url_api_php, "<?php echo $fileUrl; ?>", "#zero_config");
    });

    function viewRouting() {
      routing('perizinan_user');
    }

    function view_data(id,id_izin){
      loadAndDisplayPerizinan(id, id_izin, url_api_x, accesstoken);
    }
</script>
