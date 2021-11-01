<?php
set_include_path(get_include_path() . ":" . $_SERVER["DOCUMENT_ROOT"]);
require_once("configReader.php");
require_once("apiCall.php");
require_once("modules/template/pageDisplay.php");

global $passedNib;
$passedNib = $nib;

function displayContent()
{
  global $passedNib;

  $settingData = readConfig();
  $apiResult = callGetApi(
    "{$settingData->apiServerUrl}/api/v0.1/OssInfo/OssFullInfo?id={$passedNib}",
    $_SESSION["accessToken"]
  );

  if ($apiResult->success === false) {
    // TODO: display message
    return;
  }
?>
  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-5 align-self-center">
        <h4 class="page-title">NIB</h4>
        <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/">
                  Home
                </a>
              </li>

              <li class="breadcrumb-item">
                NIB
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="card">
      <h4 class="card-title">Detail NIB</h4>

      <form class="card-body m-t-30">
        <h4 class="card-title" style="font-weight: bold;">
          Data Perusahaan
        </h4>

        <hr class="m-t-0">

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">NIB</label>
              <input value="<?php echo $apiResult->result->nib; ?>" type="text" class="form-control" disabled>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">OSS ID</label>
              <input value="<?php echo $apiResult->result->ossId; ?>" type="text" class="form-control" disabled>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Tanggal Pengajuan NIB</label>
              <input value="<?php echo displayDateFromJson($apiResult->result->tglPengajuanNib); ?>" type="text" class="form-control" disabled>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Tanggal Terbit NIB</label>
              <input value="<?php echo displayDateFromJson($apiResult->result->tglTerbitNib); ?>" type="text" class="form-control" disabled>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Tanggal Perubahan NIB</label>
              <input value="<?php echo displayDateFromJson($apiResult->result->tglPerubahanNib); ?>" type="text" class="form-control" disabled>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">No NPP</label>
              <input value="<?php echo $apiResult->result->noNpp; ?>" type="text" class="form-control" disabled>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">No VA</label>
              <input value="<?php echo $apiResult->result->noVa; ?>" type="text" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">No WLKP</label>
              <input value="<?php echo $apiResult->result->noWlkp; ?>" type="text" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Badan Hukum</label>
              <input value="<?php echo displayStatusBadanHukum($apiResult->result->statusBadanHukum); ?>" type="text" class="form-control" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Penanaman Modal</label>
              <input value="<?php echo displayStatusPenanamanModal($apiResult->result->statusPenanamanModal); ?>" type="text" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">NPWP</label>
              <input value="<?php echo $apiResult->result->npwpPerseroan; ?>" type="text" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Nama Perusahaan</label>
              <input value="<?php echo $apiResult->result->namaPerseroan; ?>" type="text" class="form-control" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Badan Usaha</label>
              <input value="<?php echo displayJenisPerseroan($apiResult->result->jenisPerseroan); ?>" type="text" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Alamat Perusahaan</label>
              <textarea class="form-control" rows="7" disabled><?php echo displayAlamatPerseroan($apiResult->result); ?></textarea>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Jenis API</label>
              <input value="<?php echo $apiResult->result->jenisApi; ?>" type="text" class="form-control" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Dalam Bentuk Uang</label>
              <input value="<?php echo $apiResult->result->dalamBentukUang; ?>" type="text" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Dalam Bentuk Lain</label>
              <input value="<?php echo $apiResult->result->dalamBentukLain; ?>" type="text" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Total Modal Dasar</label>
              <input value="<?php echo $apiResult->result->totalModalDasar; ?>" type="text" class="form-control" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Total Modal Ditempatkan</label>
              <input value="<?php echo $apiResult->result->totalModalDitempatkan; ?>" type="text" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">No Pengesahan</label>
              <input value="<?php echo $apiResult->result->noPengesahan; ?>" type="text" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Tgl Pengesahan</label>
              <input value="<?php echo displayDateFromJson($apiResult->result->tglPengesahan); ?>" type="text" class="form-control" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">No Akta Lama</label>
              <input value="<?php echo $apiResult->result->noAktaLama; ?>" type="text" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Tgl Akta Lama</label>
              <input value="<?php echo displayDateFromJson($apiResult->result->tglAktaLama); ?>" type="text" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">No Pengesahan Lama</label>
              <input value="<?php echo $apiResult->result->noPengesahanLama; ?>" type="text" class="form-control" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Tgl Pengesahan Lama</label>
              <input value="<?php echo displayDateFromJson($apiResult->result->tglPengesahanLama); ?>" type="text" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Status NIB</label>
              <input value="<?php echo displayStatusNib($apiResult->result->statusNib); ?>" type="text" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Tipe Dokumen</label>
              <input value="<?php echo displayTipeDokumen($apiResult->result->tipeDokumen); ?>" type="text" class="form-control" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Jenis ID User</label>
              <input value="<?php echo displayJenisIdUserProses($apiResult->result->jenisIdUserProses); ?>" type="text" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">No ID</label>
              <input value="<?php echo $apiResult->result->noIdUserProses; ?>" type="text" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Nama User</label>
              <input value="<?php echo $apiResult->result->namaUserProses; ?>" type="text" class="form-control" disabled>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Email User</label>
              <input value="<?php echo $apiResult->result->emailUserProses; ?>" type="text" class="form-control" disabled>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">No HP User</label>
              <input value="<?php echo $apiResult->result->hpUserProses; ?>" type="text" class="form-control" disabled>
            </div>
          </div>
        </div>
        <br>
        <h4 class="card-title" style="font-weight: bold;">Data Proyek</h4>
        <hr class="m-t-0">
        <div class="table-responsive" id="table-proyek">
          <table id="zero_config_proyek" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th width="180px">ID PROYEK</th>
                <th>KBLI</th>
                <th>SEKTOR</th>
                <th>URAIAN USAHA</th>
                <th width="96px">JUMLAH TENAGA KERJA</th>
                <th width="290px">INVESTASI</th>
                <th>STATUS TANAH</th>
                <th>ALAMAT</th>
                <th>PRODUK</th>
              </tr>
            </thead>
            <tbody class="detail-item-proyek">

            </tbody>
          </table>
        </div>
        <br>
        <h4 class="card-title" style="font-weight: bold;">Data Pemegang Saham</h4>
        <hr class="m-t-0">
        <div class="table-responsive" id="table-ps">
          <table id="zero_config_ps" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>IDENTITAS PEMEGANG SAHAM</th>
                <th>ALAMAT PEMEGANG SAHAM</th>
                <th>TOTAL MODAL</th>
              </tr>
            </thead>
            <tbody class="detail-item-ps">
              <?php displayDataPemegangSaham($apiResult->result->pemegangSaham); ?>
            </tbody>
          </table>
        </div>
        <br>
        <h4 class="card-title" style="font-weight: bold;">Data Penanggung Jawab</h4>
        <hr class="m-t-0">
        <div class="table-responsive" id="table-pj">
          <table id="zero_config_pj" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>IDENTITAS PENANGGUNG JAWAB</th>
                <th>ALAMAT PENANGGUNG JAWAB</th>
              </tr>
            </thead>
            <tbody class="detail-item-pj">
              <?php displayDataPenanggungJawab($apiResult->result->penanggungJwb); ?>
            </tbody>
          </table>
        </div>
        <br>
        <h4 class="card-title" style="font-weight: bold;">Data LEGALITAS</h4>
        <hr class="m-t-0">
        <div class="table-responsive" id="table-legilitas">
          <table id="zero_config_legilitas" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>AKTA</th>
                <th>NOTARIS</th>
              </tr>
            </thead>
            <tbody class="detail-item-legilitas">
            </tbody>
          </table>
        </div>
        <br>
        <h4 class="card-title" style="font-weight: bold;">Data RPTKA</h4>
        <hr class="m-t-0">
        <div class="table-responsive" id="table-rptka">
          <table id="zero_config_rptka" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>JENIS RPTKA</th>
                <th>NO RPTKA</th>
                <th>RPTKA AWAL</th>
                <th>RPTKA AKHIR</th>
                <th>JUMLAH TKA RPTKA</th>
                <th>JANGKA PENGGUNAAN WAKTU</th>
                <th>JANGKA WAKTU PERMOHONAN RPTKA</th>
              </tr>
            </thead>
            <tbody class="detail-item-rptka">

            </tbody>
          </table>
        </div>
        <br>
        <h4 class="card-title" style="font-weight: bold;">Data DNI</h4>
        <hr class="m-t-0">
        <div class="table-responsive" id="table-dni">
          <table id="zero_config_dni" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>KODE DNI</th>
              </tr>
            </thead>
            <tbody class="detail-item-dni">

            </tbody>
          </table>
        </div>
        <br>
        <h4 class="card-title" style="font-weight: bold;">Data CHECKLIST</h4>
        <hr class="m-t-0">
        <div class="table-responsive" id="table-ck">
          <table id="zero_config_ck" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>ID IZIN</th>
                <th>ID PROYEK</th>
                <th>KODE IZIN</th>
                <th>NAMA IZIN</th>
                <th>CHECKLIST OSS</th>
              </tr>
            </thead>
            <tbody class="detail-item-ck">

            </tbody>
          </table>
        </div>
      </form>
    </div>
  </div>
<?php
}

function displayNumberWithSeparator($number)
{
  return number_format($number, 0, ",", ".");
}

function displayDateFromJson(string $jsonDate)
{
  $date = DateTime::createFromFormat("Y-m-d\TH:i:sP", $jsonDate);
  return $date->format("d-m-Y");
}

function displayStatusBadanHukum(string $kodeBadanHukum)
{
  switch ($kodeBadanHukum) {
    case "01":
      return "Badan Hukum";
    case "02":
      return "Bukan Badan Hukum";
    default:
      return "-";
  }
}

function displayStatusPenanamanModal(string $kodePenanamanModal)
{
  switch ($kodePenanamanModal) {
    case "01":
      return "Penanaman Modal Asing";
    case "02":
      return "Penanaman Modal Dalam Negeri";
    case "03":
      return "Bukan (PMA/PMDN)";
    default:
      return "-";
  }
}

function displayJenisPerseroan(string $kodeJenisPerseroan)
{
  switch ($kodeJenisPerseroan) {
    case "01":
      return "Perusahaan Terbatas (PT)";
    case "02":
      return "Perseroan Komanditer (CV)";
    case "04":
      return "Badan Usaha Pemerintah";
    case "05":
      return "Firma (Fa)";
    case "06":
      return "Persekutuan Perdata";
    case "07":
      return "Koperasi";
    case "10":
      return "Yayasan";
    case "16":
      return "Bentuk Usaha Tetap (BUT)";
    case "17":
      return "Perseorangan";
    case "18":
      return "Badan Layanan Umum (BLU)";
    case "19":
      return "Badan Hukum (selain PT,Yayasan dan Koperasi)";
    default:
      return "-";
  }
}

function displayStatusNib(string $kodeStatusNib)
{
  switch ($kodeStatusNib) {
    case "01":
      return "Aktif";
    case "02":
      return "Belum Aktif";
    case "03":
      return "Diizinkan Usaha";
    case "04":
      return "Diizinkan Beroperasi";
    case "05":
      return "Dibekukan";
    case "06":
      return "Dicabut";
    default:
      return "-";
  }
}

function displayTipeDokumen(string $kodeTipeDokumen)
{
  switch ($kodeTipeDokumen) {
    case "9":
      return "Original";
    case "5":
      return "Update";
    case "3":
      return "Pencabutan";
    case "4":
      return "Pembatalan";
    default:
      return "-";
  }
}

function displayJenisIdUserProses(string $kodeJenisIdUserProses)
{
  switch ($kodeJenisIdUserProses) {
    case "01":
      return "Kartu Tanda Penduduk (KTP)";
    case "02":
      return "Paspor";
    default:
      return "-";
  }
}

function displayAlamatPerseroan($apiData)
{
  return
    $apiData->alamatPerseroan .
    " RT/RW " . $apiData->rtRwPerseroan .
    ", Kel. " . $apiData->kelurahanPerseroan .
    "&#13;&#10;Kode Pos: " . $apiData->kodePosPerseroan .
    "&#13;&#10;No. Telp: " . $apiData->nomorTelponPerseroan .
    "&#13;&#10;Email : " . $apiData->emailPerusahaan;
}

function displayDataPemegangSaham(array $listDataPemegangSaham)
{
  foreach ($listDataPemegangSaham as $pemegangSaham) {
  ?>
    <tr>
      <td>
        <?php echo $pemegangSaham->namaPemegangSaham; ?>
        <br />NPWP : <?php echo $pemegangSaham->npwpPemegangSaham; ?>
        <br />KTP/PASPOR : <?php echo $pemegangSaham->noIdentitasPemegangSaham; ?>
        <br />Jabatan : <?php echo $pemegangSaham->jabatanPemegangSaham; ?>
      </td>
      <td>
        <?php echo $pemegangSaham->alamatPemegangSaham; ?>
        <br />Fax : <?php echo $pemegangSaham->faxPemegangSaham; ?>
        <br />E-mail : <?php echo $pemegangSaham->emailPemegangSaham; ?>
      </td>
      <td>
        <?php echo $pemegangSaham->totalModalPemegang; ?>
      </td>
    </tr>
  <?php
  }
}

function displayDataPenanggungJawab(array $listDataPenanggungJawab)
{
  foreach ($listDataPenanggungJawab as $penanggungJawab) {
  ?>
    <tr>
      <td>
        <?php echo $penanggungJawab->namaPenanggungJwb; ?>
        <br />NPWP : <?php echo $penanggungJawab->npwpPenanggungJwb; ?>
        <br />KTP/PASPOR : <?php echo $penanggungJawab->noIdentitasPenanggungJwb; ?>
        <br />Jabatan : <?php echo $penanggungJawab->jabatanPenanggungJwb; ?>
      </td>
      <td>
        <?php echo $penanggungJawab->alamatPenanggungJwb; ?> RT/RW <?php echo $penanggungJawab->rtRwPenanggungJwb; ?>
        <br />Telp : <?php echo $penanggungJawab->noHpPenanggungJwb; ?>
        <br />E-mail : <?php echo $penanggungJawab->emailPenanggungJwb; ?>
        <br />Negara Asal : <?php echo $penanggungJawab->negaraAsalPenanggungJwb; ?>
      </td>
    </tr>
<?php
  }
}

displayPage("displayContent", "Sistem PSEF - Detail NIB");
