<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/internal/logo.png">
    <title>Selamat Datang di Sistem PSEF</title>
    <!-- This page plugin CSS -->
    <link href="assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="dist/css/quill.snow.css" rel="stylesheet">
    <!-- Sweet alert -->
    <link href="assets/libs/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- select2 -->
    <link href="assets/libs/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Toastr -->
    <link href="assets/libs/toastr/build/toastr.min.css" rel="stylesheet">
    <!-- Bootstrap Switch -->
    <link rel="stylesheet" type="text/css" href="assets/libs/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css">
	 <!-- easyui -->
    <!-- <link rel="stylesheet" type="text/css" href="assets/libs/easyui/easyui.css">
	<link rel="stylesheet" type="text/css" href="assets/libs/easyui/icon.css"> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-39495412-5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-39495412-5');
</script>

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader" style="opacity: 0.5;filter: alpha(opacity=50);">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        <div style="position: fixed;z-index: 9;width:100%">
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a onclick="<?php if($_COOKIE['role'] == ''){ echo "routing('pemohon_user')"; } elseif($_COOKIE['role'] == 'Psef.Admin'){ echo "routing('pemohon_admin')";} else { echo "routing('welcome')";} ?>" href="javascript:void(0)" class="navbar-brand">

                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="/assets/internal/logo-kemkes-no-text.png" alt="homepage" class="dark-logo" height="50px" />
                            <!-- Light Logo icon -->
                            <img src="/assets/internal/logo-kemkes-no-text.png" alt="homepage" class="light-logo" height="50px" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <?php /* <span class="logo-text">
                             <!-- dark Logo text -->
                             <img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                             <!-- Light Logo text -->
                             <img src="assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span> */ ?>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">

                        <li class="nav-item" id="company_data" style="color: white;margin: auto;"></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <span class="with-arrow"><span class="bg-primary"></span></span>
                                <div class="d-flex no-block align-items-center p-15 bg-primary text-white m-b-10">
                                    <div class=""><img src="assets/images/users/1.jpg" alt="user" class="img-circle" width="60"></div>
                                    <div class="m-l-10">
                                        <h4 class="m-b-0" id="username"></h4>
                                        <p class=" m-b-0" id="email"></p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href=" https://usermanagement-simyanfar.kemkes.go.id/manage" target="_blank"><i class="ti-user m-r-5 m-l-5"></i> Profil Saya</a>

                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="https://usermanagement-simyanfar.kemkes.go.id/Manage/ChangePassword" target="_blank"><i class="ti-user m-r-5 m-l-5"></i> Ganti Kata Sandi</a>

                                <div class="dropdown-divider"></div>
                                <div class="dropdown-divider"></div>
                                <a onclick="logout()" class="dropdown-item" href="javascript:void(0)"><i class="fa fa-power-off m-r-5 m-l-5"></i> Keluar</a>
                                <div class="dropdown-divider"></div>

                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
         <!-- sample modal content -->

        <div id="responsive-modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="name_change_password">Ganti Kanta Sandi </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form id="add-change-password" onsubmit="change_password_set(event)">
                        <div class="modal-body">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Kata Sandi Lama:</label>
                                    <input type="password" id="old-password" class="form-control" name="oldPassword">
                                </div>
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Kata Sandi Baru:</label>
                                    <input type="password" id="new-password" class="form-control" name="newPassword">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" id="modal-close-cp">Batal</button>
                            <button type="submit" class="btn btn-danger waves-effect waves-light">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.modal -->

        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <?php 
                            if($_COOKIE['role']=='Psef.Admin'){
                        ?>
                            <li id="menu_Administrasi" style="display:block" class="sidebar-item"> <a class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-cogs"></i><span class="hide-menu">Administrasi</span></a>
                                <ul aria-expanded="false" class="collapse  first-level">
                                    <li id="menu_Provinsi" class="sidebar-item"><a onclick="routing('provinsi')" href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">Provinsi</span></a></li>
                                    <li id="menu_Spanduk" class="sidebar-item"><a onclick="routing('spanduk')" href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">Spanduk</span></a></li>
                                    <li id="menu_Berita" class="sidebar-item"><a onclick="routing('berita')" href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">Berita</span></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                        <?php 
                            if($_COOKIE['role']=='Psef.Admin'){
                        ?>
                            <!-- <li id="menu_warehouse" style="display:block" class="sidebar-item"> <a class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-share"></i><span class="hide-menu">Data Referensi </span></a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li id="menu_Warehouse-Location-list-Menu" class="sidebar-item"><a onclick="routing_menu('Warehouse-Location-list-List-Data')" href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-adjust"></i><span class="hide-menu">Kode Izin </span></a></li>
                                </ul>
                            </li> -->
                        <?php } ?>
                        <?php if($_COOKIE['role']==''){ ?>
                            <li id="menu_PemohonUser" style="display:block" class="sidebar-item"> <a onclick="routing('pemohon_user')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Pemohon</span></a>
                            </li>
                        <?php }else if($_COOKIE['role']=='Psef.Verifikator'){ ?>
                            <li id="menu_PemohonVerifikator" style="display:block" class="sidebar-item"> <a onclick="routing('pemohon_verif')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Pemohon</span></a>
                            </li>
                        <?php }else if($_COOKIE['role']=='Psef.Dirjen'){ ?>
                            <li id="menu_PemohonDirjen" style="display:block" class="sidebar-item"> <a onclick="routing('pemohon_dirjen')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Pemohon</span></a>
                            </li>
                        <?php }else if($_COOKIE['role']=='Psef.Diryanfar'){ ?>
                            <li id="menu_PemohonDiryanfar" style="display:block" class="sidebar-item"> <a onclick="routing('pemohon_diryanfar')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Pemohon</span></a>
                            </li>
                        <?php }else if($_COOKIE['role']=='Psef.Kasubdit'){ ?>
                            <li id="menu_PemohonKasubdit" style="display:block" class="sidebar-item"> <a onclick="routing('pemohon_kasubdit')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Pemohon</span></a>
                            </li>
                        <?php }else if($_COOKIE['role']=='Psef.Kasi'){ ?>
                            <li id="menu_PemohonKasi" style="display:block" class="sidebar-item"> <a onclick="routing('pemohon_kasi')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Pemohon</span></a>
                            </li>
                        <?php }else if($_COOKIE['role']=='Psef.ValidatorSertifikat'){ ?>
                            <li id="menu_PemohonValidator" style="display:block" class="sidebar-item"> <a onclick="routing('pemohon_validator')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Pemohon</span></a>
                            </li>
                        <?php }else if($_COOKIE['role']=='Psef.Admin'){ ?>
                            <li id="menu_PemohonAdmin" style="display:block" class="sidebar-item"> <a onclick="routing('pemohon_admin')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-account-circle"></i><span class="hide-menu">Pemohon</span></a>
                            </li>
                        <?php } ?>
                        <?php 
                            if($_COOKIE['role']=='Psef.Admin'){
                        ?>
                            <li id="menu_pendaftaranpsefAdmin" style="display:block" class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                    <i class="fa fa-share"></i>
                                    <span class="hide-menu">Pendaftaran PSEF</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li id="menu_Rumusan_Admin" class="sidebar-item"><a onclick="routing('rumusan_admin')" href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-file-outline"></i><span class="hide-menu">Rumusan</span></a></li>
                                    <li id="menu_Purchase-Request-list-Menu" class="sidebar-item"><a onclick="routing('proses_admin')" href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-timer-sand"></i><span class="hide-menu">Dalam Proses</span></a></li>
                                    <li id="menu_Purchase-Order-list-Menu" class="sidebar-item"><a onclick="routing('selesai_admin')" href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-check-circle"></i><span class="hide-menu">Selesai</span></a></li>
                                    <li id="menu_Goods-Received-list-Menu" class="sidebar-item"><a onclick="routing('ditolak_admin')" href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-close-circle"></i><span class="hide-menu">Ditolak</span></a></li>
                                </ul>
                            </li>
                        <?php }else if($_COOKIE['role']==''){ ?>
                            <li id="menu_pendaftaranpsefUser" style="display:block" class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                    <i class="fa fa-share"></i>
                                    <span class="hide-menu">Pendaftaran PSEF</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li id="menu_Rumusan_User" class="sidebar-item"><a onclick="routing('rumusan_user')" href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-file-outline"></i><span class="hide-menu">Rumusan</span></a></li>
                                    <li id="menu_Proses_User" class="sidebar-item"><a onclick="routing('proses_user')" href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-timer-sand"></i><span class="hide-menu">Dalam Proses</span></a></li>
                                    <li id="menu_Dikembalikan_User" class="sidebar-item"><a onclick="routing('dikembalikan_user')" href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-keyboard-return"></i><span class="hide-menu">Dikembalikan</span></a></li>
                                    <li id="menu_Selesai_User" class="sidebar-item"><a onclick="routing('selesai_user')" href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-check-circle"></i><span class="hide-menu">Selesai</span></a></li>
                                    <li id="menu_Ditolak_User" class="sidebar-item"><a onclick="routing('ditolak_user')" href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-close-circle"></i><span class="hide-menu">Ditolak</span></a></li>
                                </ul>
                            </li>
                        <?php }else if($_COOKIE['role']=='Psef.Verifikator'){ ?>
                            <li id="menu_pendaftaranpsefVerifikator" style="display:block" class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                    <i class="fa fa-share"></i>
                                    <span class="hide-menu">Pendaftaran PSEF</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li id="menu_Pending_Verifikator" class="sidebar-item"><a onclick="routing('pending_verif')" href="javascript:void(0)" class="sidebar-link"><i class="fa fa-exclamation-circle"></i><span class="hide-menu">Tertunda</span></a></li>
                                    <li id="menu_Semua_Verifikator" class="sidebar-item"><a onclick="routing('semua_verif')" href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-file-multiple"></i><span class="hide-menu">Semua</span></a></li>
                                </ul>
                            </li>
                        <?php }else if($_COOKIE['role']=='Psef.ValidatorSertifikat'){ ?>
                            <li id="menu_pendaftaranpsefvalidator" style="display:block" class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                    <i class="fa fa-share"></i>
                                    <span class="hide-menu">Pendaftaran PSEF</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li id="menu_Pending_Validator" class="sidebar-item"><a onclick="routing('pending_validator')" href="javascript:void(0)" class="sidebar-link"><i class="fa fa-exclamation-circle"></i><span class="hide-menu">Tertunda</span></a></li>
                                    <li id="menu_Done_Validator" class="sidebar-item"><a onclick="routing('done_validator')" href="javascript:void(0)" class="sidebar-link"><i class="fa fa-check-circle"></i><span class="hide-menu">Done</span></a></li>
                                    <li id="menu_Semua_Validator" class="sidebar-item"><a onclick="routing('semua_validator')" href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-file-multiple"></i><span class="hide-menu">Semua</span></a></li>
                                </ul>
                            </li>
                        <?php }else if($_COOKIE['role']=='Psef.Kasi'){ ?>
                            <li id="menu_pendaftaranpsefKasi" style="display:block" class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                    <i class="fa fa-share"></i>
                                    <span class="hide-menu">Pendaftaran PSEF</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li id="menu_Pending_Kasi" class="sidebar-item"><a onclick="routing('pending_kasi')" href="javascript:void(0)" class="sidebar-link"><i class="fa fa-exclamation-circle"></i><span class="hide-menu">Tertunda</span></a></li>
                                    <li id="menu_Semua_Kasi" class="sidebar-item"><a onclick="routing('semua_kasi')" href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-file-multiple"></i><span class="hide-menu">Semua</span></a></li>
                                </ul>
                            </li>
                        <?php }else if($_COOKIE['role']=='Psef.Kasubdit'){ ?>
                            <li id="menu_pendaftaranpsefKasubdit" style="display:block" class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                    <i class="fa fa-share"></i>
                                    <span class="hide-menu">Pendaftaran PSEF</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li id="menu_Pending_Kasubdit" class="sidebar-item"><a onclick="routing('pending_kasubdit')" href="javascript:void(0)" class="sidebar-link"><i class="fa fa-exclamation-circle"></i><span class="hide-menu">Tertunda</span></a></li>
                                    <li id="menu_Semua_Kasubdit" class="sidebar-item"><a onclick="routing('semua_kasubdit')" href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-file-multiple"></i><span class="hide-menu">Semua</span></a></li>
                                </ul>
                            </li>
                        <?php }else if($_COOKIE['role']=='Psef.Diryanfar'){ ?>
                            <li id="menu_pendaftaranpsefDiryanfar" style="display:block" class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                    <i class="fa fa-share"></i>
                                    <span class="hide-menu">Pendaftaran PSEF</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li id="menu_Pending_Diryanfar" class="sidebar-item"><a onclick="routing('pending_diryanfar')" href="javascript:void(0)" class="sidebar-link"><i class="fa fa-exclamation-circle"></i><span class="hide-menu">Tertunda</span></a></li>
                                    <li id="menu_Semua_Diryanfar" class="sidebar-item"><a onclick="routing('semua_diryanfar')" href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-file-multiple"></i><span class="hide-menu">Semua</span></a></li>
                                </ul>
                            </li>
                        <?php }else if($_COOKIE['role']=='Psef.Dirjen'){ ?>
                            <li id="menu_pendaftaranpsefDirjen" style="display:block" class="sidebar-item">
                                <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                    <i class="fa fa-share"></i>
                                    <span class="hide-menu">Pendaftaran PSEF</span>
                                </a>
                                <ul aria-expanded="false" class="collapse first-level">
                                    <li id="menu_Pending_Dirjen" class="sidebar-item"><a onclick="routing('pending_dirjen')" href="javascript:void(0)" class="sidebar-link"><i class="fa fa-exclamation-circle"></i><span class="hide-menu">Tertunda</span></a></li>
                                    <li id="menu_Semua_Dirjen" class="sidebar-item"><a onclick="routing('semua_dirjen')" href="javascript:void(0)" class="sidebar-link"><i class="mdi mdi-file-multiple"></i><span class="hide-menu">Semua</span></a></li>
                                </ul>
                            </li>
                        <?php } ?>

                        <?php 
                            if($_COOKIE['role']=='Psef.Dirjen'){
                        ?>
                            <li id="menu_perizinan_dirjen" style="display:block" class="sidebar-item">
                            <a onclick="routing('perizinan_dirjen')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-id-card"></i><span class="hide-menu">Tanda Terdaftar </span></a>
                            </li>
                        <?php }else if($_COOKIE['role']=='Psef.Kasubdit'){ ?>
                            <li id="menu_perizinan_kasubdit" style="display:block" class="sidebar-item">
                            <a onclick="routing('perizinan_kasubdit')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-id-card"></i><span class="hide-menu">Tanda Terdaftar </span></a>
                            </li>
                        <?php }else if($_COOKIE['role']=='Psef.Dirjen'){ ?>
                            <li id="menu_perizinan_dirjen" style="display:block" class="sidebar-item">
                            <a onclick="routing('perizinan_dirjen')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-id-card"></i><span class="hide-menu">Tanda Terdaftar </span></a>
                            </li>
                        <?php }else if($_COOKIE['role']=='Psef.Verifikator'){ ?>
                            <li id="menu_perizinan_verif" style="display:block" class="sidebar-item">
                            <a onclick="routing('perizinan_verif')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-id-card"></i><span class="hide-menu">Tanda Terdaftar </span></a>
                            </li>
                        <?php }else if($_COOKIE['role']=='Psef.Kasi'){ ?>
                            <li id="menu_perizinan_kasi" style="display:block" class="sidebar-item">
                            <a onclick="routing('perizinan_kasi')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-id-card"></i><span class="hide-menu">Tanda Terdaftar </span></a>
                            </li>
                        <?php }else if($_COOKIE['role']=='Psef.ValidatorSertifikat'){ ?>
                            <li id="menu_perizinan_validator" style="display:block" class="sidebar-item">
                            <a onclick="routing('perizinan_validator')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-id-card"></i><span class="hide-menu">Tanda Terdaftar </span></a>
                            </li>
                        <?php }else if($_COOKIE['role']=='Psef.Diryanfar'){ ?>
                            <li id="menu_perizinan_diryanfar" style="display:block" class="sidebar-item">
                            <a onclick="routing('perizinan_diryanfar')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-id-card"></i><span class="hide-menu">Tanda Terdaftar </span></a>
                            </li>
                        <?php }else if($_COOKIE['role']=='Psef.Admin'){ ?>
                            <li id="menu_perizinan_admin" style="display:block" class="sidebar-item">
                            <a onclick="routing('perizinan_admin')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-id-card"></i><span class="hide-menu">Tanda Terdaftar </span></a>
                            </li>
                        <?php }else if($_COOKIE['role']==''){ ?>
                            <li id="menu_perizinan_user" style="display:block" class="sidebar-item">
                            <a onclick="routing('perizinan_user')" class="sidebar-link two-column has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-id-card"></i><span class="hide-menu">Tanda Terdaftar </span></a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
                        </div>
        <div class="page-wrapper" id="content" style="padding-top:125px;">

        </div>
        <footer class="footer text-center">
            <!-- All Rights Reserved by PT CIPTA HASIL SUGIARTO 2018</a>. -->
        </footer>
    </div>
    <aside class="customizer">
        <a href="javascript:void(0)" class="service-panel-toggle"><i class="fa fa-spin fa-cog"></i></a>
        <div class="customizer-body">
            <div class="tab-content" id="pills-tabContent">
                <!-- Tab 1 -->
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="p-15 border-bottom">
                        <!-- Sidebar -->
                        <h5 class="font-medium m-b-10 m-t-10">Layout Settings</h5>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" onclick="setCookie('Theme', this.checked, 360)" class="custom-control-input" name="theme-view" id="theme-view">
                            <label class="custom-control-label" for="theme-view">Dark Theme</label>
                        </div>

                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" onclick="setCookie('SidebarPosition', this.checked, 360)" class="custom-control-input" name="sidebar-position" id="sidebar-position">
                            <label class="custom-control-label" for="sidebar-position">Fixed Sidebar</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" onclick="setCookie('HeaderPosition', this.checked, 360)" class="custom-control-input" name="header-position" id="header-position">
                            <label class="custom-control-label" for="header-position">Fixed Header</label>
                        </div>
                        <div class="custom-control custom-checkbox m-t-10">
                            <input type="checkbox" onclick="setCookie('BoxedLayout', this.checked, 360)" class="custom-control-input" name="boxed-layout" id="boxed-layout">
                            <label class="custom-control-label" for="boxed-layout">Boxed Layout</label>
                        </div>
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Logo Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item"><a href="javascript:setCookie('logo_skin1', 'skin1', 360)" id="logo_skin1" class="theme-link" data-logobg="skin1"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin2"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin3"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin4"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin5"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-logobg="skin6"></a></li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Navbar BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Navbar Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin1"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin2"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin3"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin4"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin5"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-navbarbg="skin6"></a></li>
                        </ul>
                        <!-- Navbar BG -->
                    </div>
                    <div class="p-15 border-bottom">
                        <!-- Logo BG -->
                        <h5 class="font-medium m-b-10 m-t-10">Sidebar Backgrounds</h5>
                        <ul class="theme-color">
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin1"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin2"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin3"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin4"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin5"></a></li>
                            <li class="theme-item"><a href="javascript:void(0)" class="theme-link" data-sidebarbg="skin6"></a></li>
                        </ul>
                        <!-- Logo BG -->
                    </div>
                </div>
                <!-- End Tab 1 -->
            </div>
        </div>
    </aside>
    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script>
    function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays*24*60*60*1000));
      var expires = "expires="+ d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays*24*60*60*1000));
      var expires = "expires="+ d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function checkCookie(cname) {
      var vcname = getCookie(cname);
      if (vcname != "") {
       return true;
      } else {
        return false;
      }
    }

    function getCookie(cname) {
      var name = cname + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          return c.substring(name.length, c.length);
        }
      }
      return "";
    }

    function delCookie(cname) {
        var expires = "Wed; 01 Jan 1970";
        document.cookie = cname + "=;" + expires + ";path=/";
    }

    function unset_sess(){
        delCookie("sid");
        delCookie("role");
        window.location = 'https://psef.kemkes.go.id/logout.php';
    }
    </script>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="dist/js/app.js"></script>
    <script src="dist/js/app.init.horizontal-fullwidth.js"></script>
    <script src="dist/js/app-style-switcher.horizontal.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <script src="assets/js/stepbar.js"></script>
    <!--Datatables -->
    <script src="assets/extra-libs/DataTables/datatables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script>
    //=============================================//
    //    File export                              //
    //=============================================//
    $('#file_export').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-cyan text-white mr-1');
    </script>

    <!-- Handlebars -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.js"></script>
    <!-- Sweet alert -->
    <script src="assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!-- Sweet alert -->
    <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
    <!-- Taostr -->
    <script src="assets/libs/toastr/build/toastr.min.js"></script>
    <!-- Bootstrap Switch -->
    <script src="assets/libs/bootstrap-switch/dist/js/bootstrap-switch.min.js"></script>
    <script src="assets/js/print.min.js"></script>
    <script src="assets/js/config.js?5" defer></script>
	<script src="assets/js/jquery.number.min.js"></script>
	<script src="assets/js/moment.min.js"></script>
    <script src="assets/js/keyboardShortcut.js"></script>
    <script src="assets/js/async.min.js"></script>
    <script src="assets/js/jquery.form.min.js" defer></script>
    <script src="assets/js/tinymce.min.js"></script>
    <script src="assets/js/quill.min.js"></script>
	<!-- <script src="assets/js/jquery.easyui.min.js"></script> -->
    <script type="text/javascript">
        const sid = "<?php echo $_COOKIE['sid'] ?>";
        const role = "<?php echo $_COOKIE['role'] ?>";

        $(document).ready(function() {
            var accesstoken = <?php echo json_encode($_COOKIE['accesstoken']); ?>; 
            
            $.ajax({
                url: url_api_x+"PermohonanType",
                type: 'GET',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                },
                dataType: 'json',
                success: function (data, textStatus, xhr) {
                   
                },
                error: function (xhr, textStatus, errorThrown) {
                    unset_sess();
                }
            });

            var local_nib = localStorage.getItem("nib");
            if(sid==''){
                unset_sess();
            }
            $(document).keydown(function( e ){
                keyboardShortcut(
                    {
                        debug: false,
                        selector: e,
                        key: 'f',
                        ctrl:true,
                        shift:true
                    },function() {
                        $(".form-control-sm").focus()
                    }
                )
            })
            $(document).keydown(function( e ){
                keyboardShortcut(
                    {
                        debug: false,
                        selector: e,
                        key: 'a',
                        ctrl:true,
                        shift:true,
                    },function() {
                        $( ".btn-add-data" ).click()
                    }
                )
            })
            if(checkCookie('Theme')){
              if(getCookie('Theme')=="true"){
                $("#theme-view").click();
              }
            }
            if(checkCookie('SidebarPosition')){
              if(getCookie('SidebarPosition')=="true"){
                $("#sidebar-position").click();
              }
            }
            if(checkCookie('HeaderPosition')){
              if(getCookie('HeaderPosition')=="true"){
                $("#header-position").click();
              }
            }
            if(checkCookie('BoxedLayout')){
              if(getCookie('BoxedLayout')=="true"){
                $("#boxed-layout").click();
              }
            }
            if(local_nib != null){
                routing('detail_nib')
            }else{
                console.log(role)
                switch(role) {
                    case "":
                        routing('pemohon_user');
                    break;
                    case "Psef.Admin":
                        routing('pemohon_admin');
                    break;
                    default:
                        routing('welcome');
                }
            }
           
        });

        function logout(){
            unset_sess();
        }
        function change_password_set(e){
            e.preventDefault();
            var data = $('#add-change-password').serializeFormJSON();
            var accesstoken = <?php echo json_encode($_COOKIE['accesstoken']); ?>;
            $.ajax({
                url: url_api_ia+'CurrentUser/ChangePassword',
                type: 'POST',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                },
                data: JSON.stringify(data),
                contentType: 'application/json',
                success: function (data, textStatus, xhr) {
                    if (xhr.status == '200') {
                        toastr.success(data.CrudMsg, 'Kata Sandi Berhasi diubah!');
                        $('#old-password').val('')
                        $('#new-password').val('')
                        $('#modal-close-cp').click()
                    }else{
                        toastr.error('Kata Sandi Lama yang Anda Masukkan Salah!', 'Error!');
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    toastr.error('Kata Sandi Lama yang Anda Masukkan Salah!', 'Error!');
                }
            });
        }
    </script>
    <script>

    </script>


</body>

</html>
