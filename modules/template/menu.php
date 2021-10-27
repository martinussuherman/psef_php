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
    <a onclick="<?php echo $route; ?>" class="sidebar-link two-column" href="javascript:void(0)" aria-expanded="false">
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
    <?php
    displaySidebarMenuItem("routing('rumusan_admin')", "Rumusan", "mdi mdi-file-outline");
    displaySidebarMenuItem("routing('proses_admin')", "Dalam Proses", "mdi mdi-timer-sand");
    displaySidebarMenuItem("routing('selesai_admin')", "Selesai", "mdi mdi-check-circle");
    displaySidebarMenuItem("routing('ditolak_admin')", "Ditolak", "mdi mdi-close-circle");
    ?>
  </ul>
<?php
}

function displayMenuPermohonanUser()
{
?>
  <ul aria-expanded="false" class="collapse first-level">
    <?php
    displaySidebarMenuItem("routing('rumusan_user')", "Rumusan", "mdi mdi-file-outline");
    displaySidebarMenuItem("routing('proses_user')", "Dalam Proses", "mdi mdi-timer-sand");
    displaySidebarMenuItem("routing('dikembalikan_user')", "Dikembalikan", "mdi mdi-keyboard-return");
    displaySidebarMenuItem("routing('selesai_user')", "Selesai", "mdi mdi-check-circle");
    displaySidebarMenuItem("routing('ditolak_user')", "Ditolak", "mdi mdi-close-circle");
    ?>
  </ul>
<?php
}

function displayMenuPermohonanValidator()
{
?>
  <ul aria-expanded="false" class="collapse first-level">
    <?php
    displaySidebarMenuItem("routing('pending_validator')", "Tertunda", "fa fa-exclamation-circle");
    displaySidebarMenuItem("routing('done_validator')", "Selesai", "fa fa-check-circle");
    displaySidebarMenuItem("routing('semua_validator')", "Semua", "mdi mdi-file-multiple");
    ?>
  </ul>
<?php
}

function displayMenuPermohonanPendingSemua(string $pendingRoute, string $allRoute)
{
?>
  <ul aria-expanded="false" class="collapse first-level">
    <?php
    displaySidebarMenuItem("routing('{$pendingRoute}')", "Tertunda", "fa fa-exclamation-circle");
    displaySidebarMenuItem("routing('{$allRoute}')", "Semua", "mdi mdi-file-multiple");
    ?>
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
    <a onclick="<?php echo $route; ?>" class="sidebar-link two-column" href="javascript:void()" aria-expanded="false">
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
    <a onclick="routing('transaksi')" class="sidebar-link two-column" href="javascript:void()" aria-expanded="false">
      <i class="fa fa-list-ul"></i>Data Transaksi
    </a>
  </li>
<?php

}

function displayMenuAdmin($role)
{
  if (is_null($role) || $role != "Psef.Admin") {
    return;
  }

?>
  <li class="sidebar-item">
    <a class="sidebar-link two-column has-arrow" href="javascript:void(0)" aria-expanded="false">
      <i class="fa fa-cogs"></i>Administrasi
    </a>

    <ul aria-expanded="false" class="collapse first-level">
      <?php
      displaySidebarMenuItem("routing('provinsi')", "Provinsi", "mdi mdi-adjust");
      displaySidebarMenuItem("routing('spanduk')", "Spanduk", "mdi mdi-adjust");
      displaySidebarMenuItem("routing('berita')", "Berita", "mdi mdi-adjust");
      displaySidebarMenuItem("routing('unduhan')", "Unduhan", "mdi mdi-adjust");
      ?>
    </ul>
  </li>
<?php
}

function displayMenuUserInfo(string $email, $settingData)
{
?>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-orange" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-user-circle h1 mt-3"></i>
    </a>

    <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
      <span class="with-arrow">
        <span class="bg-primary">
        </span>
      </span>

      <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
        <i class="fa fa-user"></i>

        <div class="m-l-10">
          <h4 class="mb-0">
          </h4>

          <p class="mb-0">
            <?php echo $email; ?>
          </p>
        </div>
      </div>

      <a class="dropdown-item" href="<?php echo $settingData->identity->identityServerUrl; ?>/Manage" target="_blank">
        <i class="far fa-id-card mr-2"></i>Profil Saya
      </a>

      <a class="dropdown-item" href="<?php echo $settingData->identity->identityServerUrl; ?>/Manage/ChangePassword" target="_blank">
        <i class="fa fa-key mr-2"></i>Ganti Kata Sandi
      </a>

      <a class="dropdown-item" href="logout.php">
        <i class="fas fa-sign-out-alt mr-2"></i>Keluar
      </a>
    </div>
  </li>
<?php
}

function displaySidebarMenuItem(string $route, string $caption, string $iconClass)
{
?>
  <li class="sidebar-item">
    <a onclick="<?php echo $route; ?>" href="javascript:void()" class="sidebar-link">
      <i class="<?php echo $iconClass; ?>"></i><?php echo $caption; ?>
    </a>
  </li>
<?php
}

