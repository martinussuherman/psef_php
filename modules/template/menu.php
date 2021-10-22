<?php
function displayMenuPemohon($role)
{
  $route = "";

  switch ($role) {
    case "Psef.Verifikator":
      $route = "routing('pemohon_verif')";
      break;
    case "Psef.Kasi":
      $route = "routing('pemohon_kasi')";
      break;
    case "Psef.Kasubdit":
      $route = "routing('pemohon_kasubdit')";
      break;
    case "Psef.Diryanfar":
      $route = "routing('pemohon_diryanfar')";
      break;
    case "Psef.Dirjen":
      $route = "routing('pemohon_dirjen')";
      break;
    case "Psef.ValidatorSertifikat":
      $route = "routing('pemohon_validator')";
      break;
    case "Psef.Admin":
      $route = "routing('pemohon_admin')";
      break;
    default:
      $route = "routing('pemohon_user')";
      break;
  }
?>
  <li class="sidebar-item">
    <a onclick="<?php echo $route; ?>" class="sidebar-link two-column has-arrow" href="javascript:void(0)" aria-expanded="false">
      <i class="mdi mdi-account-circle"></i>Pemohon
    </a>
  </li>
<?php
}

function displayMenuPermohonan($role)
{
?>
  <li class="sidebar-item">
    <a class="sidebar-link has-arrow" href="javascript:void()" aria-expanded="false">
      <i class="fa fa-share"></i>Pendaftaran PSEF
    </a>

    <?php
    if ($role == "Psef.Admin") {
      displayMenuPermohonanAdmin();
    }

    if (is_null($role) || $role == "") {
      displayMenuPermohonanUser();
    }

    if ($role == "Psef.ValidatorSertifikat") {
      displayMenuPermohonanValidator();
    }

    if ($role == "Psef.Verifikator") {
      displayMenuPermohonanPendingSemua("pending_verif", "semua_verif");
    }

    if ($role == "Psef.Kasi") {
      displayMenuPermohonanPendingSemua("pending_kasi", "semua_kasi");
    }

    if ($role == "Psef.Kasubdit") {
      displayMenuPermohonanPendingSemua("pending_kasubdit", "semua_kasubdit");
    }

    if ($role == "Psef.Diryanfar") {
      displayMenuPermohonanPendingSemua("pending_diryanfar", "semua_diryanfar");
    }

    if ($role == "Psef.Dirjen") {
      displayMenuPermohonanPendingSemua("pending_dirjen", "semua_dirjen");
    }
    ?>

  </li>
<?php
}

function displayMenuPermohonanAdmin()
{
?>
  <ul aria-expanded="false" class="collapse first-level">
    <li class="sidebar-item">
      <a onclick="routing('rumusan_admin')" href="javascript:void()" class="sidebar-link">
        <i class="mdi mdi-file-outline"></i>Rumusan
      </a>
    </li>
    <li class="sidebar-item">
      <a onclick="routing('proses_admin')" href="javascript:void()" class="sidebar-link">
        <i class="mdi mdi-timer-sand"></i>Dalam Proses
      </a>
    </li>
    <li class="sidebar-item">
      <a onclick="routing('selesai_admin')" href="javascript:void()" class="sidebar-link">
        <i class="mdi mdi-check-circle"></i>Selesai
      </a>
    </li>
    <li class="sidebar-item">
      <a onclick="routing('ditolak_admin')" href="javascript:void()" class="sidebar-link">
        <i class="mdi mdi-close-circle"></i>Ditolak
      </a>
    </li>
  </ul>
<?php
}

function displayMenuPermohonanUser()
{
?>
  <ul aria-expanded="false" class="collapse first-level">
    <li class="sidebar-item">
      <a onclick="routing('rumusan_user')" href="javascript:void()" class="sidebar-link">
        <i class="mdi mdi-file-outline"></i>Rumusan
      </a>
    </li>
    <li class="sidebar-item">
      <a onclick="routing('proses_user')" href="javascript:void()" class="sidebar-link">
        <i class="mdi mdi-timer-sand"></i>Dalam Proses
      </a>
    </li>
    <li class="sidebar-item">
      <a onclick="routing('dikembalikan_user')" href="javascript:void()" class="sidebar-link">
        <i class="mdi mdi-keyboard-return"></i>Dikembalikan
      </a>
    </li>
    <li class="sidebar-item">
      <a onclick="routing('selesai_user')" href="javascript:void()" class="sidebar-link">
        <i class="mdi mdi-check-circle"></i>Selesai
      </a>
    </li>
    <li class="sidebar-item">
      <a onclick="routing('ditolak_user')" href="javascript:void()" class="sidebar-link">
        <i class="mdi mdi-close-circle"></i>Ditolak
      </a>
    </li>
  </ul>
<?php
}

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
      <a onclick="routing('<?php echo $pendingRoute; ?>')" href="javascript:void()" class="sidebar-link">
        <i class="fa fa-exclamation-circle"></i>Tertunda
      </a>
    </li>
    <li class="sidebar-item">
      <a onclick="routing('<?php echo $allRoute; ?>')" href="javascript:void()" class="sidebar-link">
        <i class="mdi mdi-file-multiple"></i>Semua
      </a>
    </li>
  </ul>
<?php
}

function displayMenuPerizinan($role)
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
    default:
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

function displayMenuTransaksi($role)
{
  if (is_null($role) || $role == "") {
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
