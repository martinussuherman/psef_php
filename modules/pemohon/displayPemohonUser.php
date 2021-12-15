<?php
require_once("apiCall.php");
require_once("modules/template/pageDisplay.php");

function displayContent()
{
  global $settingData;
  $pemohonResponse = callGetApi(
    "{$settingData->apiServerUrl}/api/v0.1/Pemohon/CurrentUserInfo",
    $_SESSION["accessToken"]
  );

  if ($pemohonResponse->success === false && $pemohonResponse->result != 404) {
    displayError("Terdapat masalah dalam menampilkan data Pemohon", $pemohonResponse);
    return;
  }

  $phone = "";
  $address = "";
  $nib = "";

  if (
    $pemohonResponse->success === false &&
    $pemohonResponse->result == 404
    && isset($_SESSION["ssoSuccess"])
  ) {
    $postData = [
      "token" => $_SESSION["ssoAccessToken"]
    ];
    $userInfoResponse = callPostApi(
      "{$settingData->identity->identityServerUrl}/Oss/UserInfo",
      "",
      json_encode($postData)
    );

    if ($userInfoResponse->success === false) {
      displayError("Terdapat masalah dalam mengambil data user dari OSS", $userInfoResponse);
      return;
    }

    $phone = $userInfoResponse->result->telp;
    $address = $userInfoResponse->result->alamat;
    $nib = $userInfoResponse->result->dataNib[0];

    $postData = [
      "id" => 0,
      "userId" => "",
      "phone" => $phone,
      "address" => $address,
      "nib" => $nib
    ];
    $savePemohonResponse = callPostApi(
      "{$settingData->apiServerUrl}/api/v0.1/Pemohon/CurrentUser",
      $_SESSION["accessToken"],
      json_encode($postData)
    );

    if ($savePemohonResponse->success === false) {
      displayError("Terdapat masalah dalam menyimpan data Pemohon", $savePemohonResponse);
      return;
    }
  }

  if ($pemohonResponse->success === true) {
    $phone = $pemohonResponse->result->phone;
    $address = $pemohonResponse->result->address;
    $nib = $pemohonResponse->result->nib;
  }
?>
  <div class="container-fluid">
    <div class="card m-3 p-4">
      <h4 class="card-title">Data Pemohon</h4>
      <form class="mt-3" id="data-update" onsubmit="updatePemohon(event)">
        <div class="form-group">
          <label>Nomor Telepon</label>
          <input value="<?php echo $phone; ?>" type="tel" class="form-control" name="phone" placeholder="Masukan Nomor Telepon." required>
        </div>

        <div class="form-group">
          <label>Alamat</label>
          <input value="<?php echo $address; ?>" type="text" class="form-control" name="address" placeholder="Masukan Alamat." required>
        </div>

        <div class="form-group">
          <label>NIB</label>
          <input value="<?php echo $nib; ?>" type="tel" class="form-control" name="nib" placeholder="Masukan NIB." id="input-nib" required>

          <small class="form-text text-muted">
            <div id="status-nib" style="color:white;"></div>
          </small>
        </div>

        <div id="view-nib"></div>

        <input type="hidden" name="id" value="" type="number">
        <button id="save-pemohon" type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
<?php
}

function displayPemohonUserScript()
{
  global $settingData;
?>
  <script>
    jQuery(function() {
      $("#input-nib").blur(function() {
        cekNib();
      });

      cekNib();
      setSaveButtonStateOnInputChanged("#data-update", "#save-pemohon");
      setPhoneNumberInputFilter(document.querySelector("input[name='phone']"));
      setNumberOnlyInputFilter(document.querySelector("input[name='nib']"));
    });

    function cekNib() {
      loadAndDisplayNib(
        $("#input-nib").val(),
        "<?php echo $settingData->apiServerUrl; ?>",
        "<?php echo $_SESSION["accessToken"]; ?>",
        "#input-nib",
        "#status-nib",
        "#view-nib");
    }

    function routing() {}

    function updatePemohon(event) {
      event.preventDefault();
      patchData(
        apiv01Url + 'Pemohon/CurrentUser',
        accesstoken,
        "Perubahan Data Pemohon",
        "Data Pemohon Berhasil Disimpan",
        "Data Pemohon Gagal Disimpan",
        "#data-update",
        routing
      );
    }
  </script>
<?php
}

displayPage("displayContent", "displayPemohonUserScript", "Sistem PSEF - Data Pemohon");
