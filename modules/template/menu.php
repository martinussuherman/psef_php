<?php
function displayMenuPermohonanValidator()
{
?>
  <ul aria-expanded="false" class="collapse first-level">
    <li class="sidebar-item">
      <a onclick="routing('pending_validator')" href="javascript:void()" class="sidebar-link">
        <i class="fa fa-exclamation-circle"></i>Tertunda
      </a>
    </li>
    <li class="sidebar-item">
      <a onclick="routing('done_validator')" href="javascript:void()" class="sidebar-link">
        <i class="fa fa-check-circle"></i>Selesai
      </a>
    </li>
    <li class="sidebar-item">
      <a onclick="routing('semua_validator')" href="javascript:void()" class="sidebar-link">
        <i class="mdi mdi-file-multiple"></i>Semua
      </a>
    </li>
  </ul>
<?php
}

function displayMenuPermohonanPendingSemua(string $pendingRoute, string $allRoute)
{
?>
  <ul aria-expanded="false" class="collapse first-level">
    <li class="sidebar-item">
      <a onclick="<?php echo $pendingRoute; ?>" href="javascript:void()" class="sidebar-link">
        <i class="fa fa-exclamation-circle"></i>Tertunda
      </a>
    </li>
    <li class="sidebar-item">
      <a onclick="<?php echo $allRoute; ?>" href="javascript:void()" class="sidebar-link">
        <i class="mdi mdi-file-multiple"></i>Semua
      </a>
    </li>
  </ul>
<?php
}

function displayMenuPerizinan(string $role)
{
  $route = "";

  switch ($role) {
    case "Psef.Verifikator":
      $route = "routing('perizinan_verif')";
      break;
    case "Psef.Kasi":
      $route = "routing('perizinan_kasi')";
      break;
    case "Psef.Kasubdit":
      $route = "routing('perizinan_kasubdit')";
      break;
    case "Psef.Diryanfar":
      $route = "routing('perizinan_diryanfar')";
      break;
    case "Psef.Dirjen":
      $route = "routing('perizinan_dirjen')";
      break;
    case "Psef.ValidatorSertifikat":
      $route = "routing('perizinan_validator')";
      break;
    case "Psef.Admin":
      $route = "routing('perizinan_admin')";
      break;
    case "":
      $route = "routing('perizinan_user')";
      break;
  }
?>
  <li class="sidebar-item">
    <a onclick="<?php echo $route; ?>" class="sidebar-link two-column has-arrow" href="javascript:void()" aria-expanded="false">
      <i class="fa fa-id-card"></i>Tanda Terdaftar
    </a>
  </li>
<?php
}

function displayMenuTransaksi(string $role)
{
  if ($role == "") {
    return;
  }
?>

  <li class="sidebar-item">
    <a onclick="routing('transaksi')" class="sidebar-link two-column has-arrow" href="javascript:void()" aria-expanded="false">
      <i class="fa fa-list-ul"></i>Data Transaksi
    </a>
  </li>
<?php

}
?>
