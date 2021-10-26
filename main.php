<?php
session_start();

$role = $_SESSION["role"];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
include('modules/template/menu.php');
include('modules/template/header.php');
include("configReader.php");

$settingData = readConfig();
displayHeader();
?>

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
            <a onclick="<?php if ($role == '') {
                          echo "routing('pemohon_user')";
                        } elseif ($role == 'Psef.Admin') {
                          echo "routing('pemohon_admin')";
                        } else {
                          echo "routing('welcome')";
                        } ?>" href="javascript:void(0)" class="navbar-brand">

              <!-- Logo icon -->
              <b class="logo-icon">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img src="/assets/internal/logo-kemkes.png" alt="homepage" class="dark-logo" height="50px" />
                <!-- Light Logo icon -->
                <img src="/assets/internal/logo-kemkes.png" alt="homepage" class="light-logo" height="50px" />
              </b>
              <!--End Logo icon -->
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

              <?php displayMenuUserInfo($_SESSION["email"], $settingData); ?>

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
              displayMenuAdmin($role);
              displayMenuPemohon($role);
              displayMenuPermohonan($role);
              displayMenuPerizinan($role);
              displayMenuTransaksi($role);
              ?>
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
    </div>

    <div id="content">
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" integrity="sha512-+NqPlbbtM1QqiK8ZAo4Yrj2c4lNQoGv8P79DPtKzj++l5jnN39rHA/xsqn8zE9l0uSoxaCdrOgFs6yjyfbBxSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha512-pgGHFWjBtbKHTTDW5buGZ9mU0nGfxNavf5kWK/Od2ugA//9FuMHAunkAiMe5jeL/5WW1r0UxwKi6D5LpMOJD3w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/3.3.4/js/bootstrap-switch.min.js" integrity="sha512-J+763o/bd3r9iW+gFEqTaeyi+uAphmzkE/zU8FxY6iAvD3nQKXa+ZAWkBI9QS9QkYEKddQoiy0I5GDxKf/ORBA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.7/quill.min.js" integrity="sha512-P2W2rr8ikUPfa31PLBo5bcBQrsa+TNj8jiKadtaIrHQGMo6hQM6RdPjQYxlNguwHz8AwSQ28VkBK6kHBLgd/8g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.7.13/tinymce.min.js" integrity="sha512-14mUAc7bPPk/ppYTQKsuQ9hLwjXh/d6mX2y7QKQ3MtjddJysxmIzGcnzR53PJ2/0tvFT5IUfkQqh7QeLd5iH9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js" integrity="sha512-nnzkI2u2Dy6HMnzMIkh7CPd1KX445z38XIu4jG1jGw7x5tSL3VBjE44dY4ihMU1ijAQV930SPM12cCFrB18sVw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
  <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
  <script src="assets/libs/toastr/build/toastr.min.js"></script>
  <script src="assets/extra-libs/DataTables/datatables.min.js"></script>

  <!-- slimscrollbar scrollbar JavaScript -->
  <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
  <script src="assets/extra-libs/sparkline/sparkline.js"></script>

  <!-- apps -->
  <script src="dist/js/app.js"></script>
  <script src="dist/js/app.init.horizontal-fullwidth.js"></script>
  <script src="dist/js/app-style-switcher.horizontal.js"></script>
  <!--Wave Effects -->
  <script src="dist/js/waves.js"></script>
  <!--Menu sidebar -->
  <script src="dist/js/sidebarmenu.js"></script>
  <!--Custom JavaScript -->
  <script src="dist/js/custom.js"></script>

  <script src="assets/js/stepbar.js"></script>
  <script src="assets/js/print.min.js"></script>
  <script src="assets/js/config.js?5" defer></script>
  <script src="assets/js/jquery.number.min.js"></script>
  <script src="assets/js/keyboardShortcut.js"></script>
  <script src="assets/js/async.min.js"></script>
  <script src="assets/js/jquery.form.min.js" defer></script>
  <!-- <script src="assets/js/jquery.easyui.min.js"></script> -->

  <!-- start - This is for export functionality only -->
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
  <!-- Handlebars -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.js"></script>

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
  <script>
    function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
      var expires = "expires=" + d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
      var expires = "expires=" + d.toUTCString();
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
      for (var i = 0; i < ca.length; i++) {
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

    function unset_sess() {
      delCookie("sid");
      delCookie("role");
      window.location = 'logout.php';
    }
  </script>

  <script type="text/javascript">
    const sid = "<?php echo $_COOKIE['sid'] ?>";
    const role = "<?php echo $role; ?>";

    $(document).ready(function() {
      var accesstoken = <?php echo json_encode($_COOKIE['accesstoken']); ?>;

      $.ajax({
        url: url_api_x + "PermohonanType",
        type: 'GET',
        beforeSend: function(xhr) {
          xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
        },
        dataType: 'json',
        success: function(data, textStatus, xhr) {

        },
        error: function(xhr, textStatus, errorThrown) {
          unset_sess();
        }
      });

      var local_nib = localStorage.getItem("nib");
      if (sid == '') {
        unset_sess();
      }
      $(document).keydown(function(e) {
        keyboardShortcut({
          debug: false,
          selector: e,
          key: 'f',
          ctrl: true,
          shift: true
        }, function() {
          $(".form-control-sm").focus()
        })
      })
      $(document).keydown(function(e) {
        keyboardShortcut({
          debug: false,
          selector: e,
          key: 'a',
          ctrl: true,
          shift: true,
        }, function() {
          $(".btn-add-data").click()
        })
      })
      if (checkCookie('Theme')) {
        if (getCookie('Theme') == "true") {
          $("#theme-view").click();
        }
      }
      if (checkCookie('SidebarPosition')) {
        if (getCookie('SidebarPosition') == "true") {
          $("#sidebar-position").click();
        }
      }
      if (checkCookie('HeaderPosition')) {
        if (getCookie('HeaderPosition') == "true") {
          $("#header-position").click();
        }
      }
      if (checkCookie('BoxedLayout')) {
        if (getCookie('BoxedLayout') == "true") {
          $("#boxed-layout").click();
        }
      }
      if (local_nib != null) {
        routing('detail_nib')
      } else {
        console.log(role)
        switch (role) {
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

    function logout() {
      unset_sess();
    }

    function change_password_set(e) {
      e.preventDefault();
      var data = $('#add-change-password').serializeFormJSON();
      var accesstoken = <?php echo json_encode($_COOKIE['accesstoken']); ?>;
      $.ajax({
        url: url_api_ia + 'CurrentUser/ChangePassword',
        type: 'POST',
        beforeSend: function(xhr) {
          xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
        },
        data: JSON.stringify(data),
        contentType: 'application/json',
        success: function(data, textStatus, xhr) {
          if (xhr.status == '200') {
            toastr.success(data.CrudMsg, 'Kata Sandi Berhasi diubah!');
            $('#old-password').val('')
            $('#new-password').val('')
            $('#modal-close-cp').click()
          } else {
            toastr.error('Kata Sandi Lama yang Anda Masukkan Salah!', 'Error!');
          }
        },
        error: function(xhr, textStatus, errorThrown) {
          toastr.error('Kata Sandi Lama yang Anda Masukkan Salah!', 'Error!');
        }
      });
    }
  </script>
</body>

</html>
