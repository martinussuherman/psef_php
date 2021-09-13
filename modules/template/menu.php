<?php
function displayMenuPerizinan(string $role)
{
  if ($role == 'Psef.Verifikator') {
?>
    <li id="menu_perizinan_verif" style="display:block" class="sidebar-item">
      <a onclick="routing('perizinan_verif')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-id-card"></i><span class="hide-menu">Tanda Terdaftar </span></a>
    </li>
  <?php
  }

  if ($role == 'Psef.Kasi') {
  ?>
    <li id="menu_perizinan_kasi" style="display:block" class="sidebar-item">
      <a onclick="routing('perizinan_kasi')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-id-card"></i><span class="hide-menu">Tanda Terdaftar </span></a>
    </li>
  <?php
  }

  if ($role == 'Psef.Kasubdit') {
  ?>
    <li id="menu_perizinan_kasubdit" style="display:block" class="sidebar-item">
      <a onclick="routing('perizinan_kasubdit')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-id-card"></i><span class="hide-menu">Tanda Terdaftar </span></a>
    </li>
  <?php
  }

  if ($role == 'Psef.Diryanfar') {
  ?>
    <li id="menu_perizinan_diryanfar" style="display:block" class="sidebar-item">
      <a onclick="routing('perizinan_diryanfar')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-id-card"></i><span class="hide-menu">Tanda Terdaftar </span></a>
    </li>
  <?php
  }

  if ($role == 'Psef.Dirjen') {
  ?>
    <li id="menu_perizinan_dirjen" style="display:block" class="sidebar-item">
      <a onclick="routing('perizinan_dirjen')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-id-card"></i><span class="hide-menu">Tanda Terdaftar </span></a>
    </li>
  <?php
  }

  if ($role == 'Psef.ValidatorSertifikat') {
  ?>
    <li id="menu_perizinan_validator" style="display:block" class="sidebar-item">
      <a onclick="routing('perizinan_validator')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-id-card"></i><span class="hide-menu">Tanda Terdaftar </span></a>
    </li>
  <?php
  }

  if ($role == 'Psef.Admin') {
  ?>
    <li id="menu_perizinan_admin" style="display:block" class="sidebar-item">
      <a onclick="routing('perizinan_admin')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-id-card"></i><span class="hide-menu">Tanda Terdaftar </span></a>
    </li>
  <?php
  }

  if ($role == '') {
  ?>
    <li id="menu_perizinan_user" style="display:block" class="sidebar-item">
      <a onclick="routing('perizinan_user')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-id-card"></i><span class="hide-menu">Tanda Terdaftar </span></a>
    </li>
  <?php
  }
}

function displayMenuTransaksi(string $role)
{
  if ($role == '') {
    return;
  }
  ?>

  <li style="display:block" class="sidebar-item">
    <a class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:routing('transaksi')" aria-expanded="false">
      <i class="fa fa-list-ul"></i><span class="hide-menu">Data Transaksi</span>
    </a>
  </li>
<?php

}
?>
