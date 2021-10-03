<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php
include('analytics.php');
?>

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

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-205037947-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-205037947-1');
  </script>

  <!-- Custom CSS -->
  <link href="dist/css/style.min.css" rel="stylesheet">
  <!-- Toastr -->
  <link href="../../assets/libs/toastr/build/toastr.min.css" rel="stylesheet">
  <link href="dist/css/quill.snow.css" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
  <div class="main-wrapper" style="background: #eef5f9;">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center">
      <div class="row">
        <div class="page-wrapper" style="display: block;background: #fff url(../assets/images/bg0.jpg) fixed no-repeat;">
          <div class="form-horizontal">
            <div class="card-body">
              <div class="col-md-8">
                <div id="_the_view_" class="col-md-12">
                  <div class="box box-info">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                      <div class="carousel-inner" id="homePageBanner">
                        <!-- <div class="carousel-item active">
                                                <img class="d-block w-100" src="https://www.kemkes.go.id/web/assets/images/banner/banner%20coronavirus.jpg" alt="First slide">
                                                </div>
                                                <div class="carousel-item">
                                                <img class="d-block w-100" src="https://www.kemkes.go.id/web/assets/images/imgHeaderBackground-ind.jpg" alt="Second slide">
                                                </div>
                                                <div class="carousel-item">
                                                <img class="d-block w-100" src="https://www.kemkes.go.id/web/assets/images/article/Keselamatan%20Tenaga%20Kesehatan%20Keselamatan%20Kita%20Semua.jpeg" alt="Third slide">
                                                </div> -->
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>

                    <hr />

                    <div class="jumbotron text-center" style="background-image: url(../assets/images/bg2.jpg);">
                      <h1>Selamat Datang di Sistem PSEF</h1>
                      <hr />
                      <h2>Penyelenggara Sistem Elektronik Farmasi (PSEF)</h2>
                    </div>

                    <div class="card">
                      <h4 class="card-header bg-dark text-white">TENTANG PENDAFTARAN PSEF</h4>
                      <p class="card-body text-justify" style="font-size: 1.25em;">
                        Pendaftaran Penyedia Sistem Elektronik Farmasi (PSEF) merupakan persyaratan untuk
                        Penyedia Sistem Elektronik (PSE) yang memfasilitasi pelayanan kefarmasian.<br />
                        Pelaku usaha yang dapat mendaftarkan diri sebagai PSEF adalah pelaku usaha berbadan hukum, dan telah
                        atau akan bekerjasama dengan pelaksana pekerjaan kefarmasian sesuai dengan ketentuan yang berlaku.<br />
                        Pemberi pelayanan kefarmasian yang difasilitasi oleh PSEF harus berupa apotek yang resmi dan berizin.
                      </p>
                    </div>

                    <div class="card">
                      <h4 class="card-header bg-purple text-white">PERSYARATAN PENDAFTARAN</h4>

                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                          <i class="fa fa-check-square mr-2"></i>Data pemohon
                        </li>
                        <li class="list-group-item">
                          <i class="fa fa-check-square mr-2"></i>Memiliki NIB
                        </li>
                        <li class="list-group-item">
                          <i class="fa fa-check-square mr-2"></i>Memiliki Tanda Daftar Penyelenggara Sistem Elektronik (PSE)
                        </li>
                        <li class="list-group-item">
                          <i class="fa fa-check-square mr-2"></i>Memiliki Izin Usaha Berbentuk IUI/PMSE
                        </li>
                        <li class="list-group-item">
                          <i class="fa fa-check-square mr-2"></i>Memiliki Apoteker Penanggungjawab
                        </li>
                        <li class="list-group-item">
                          <i class="fa fa-check-square mr-2"></i>Mengisi Data Permohonan
                        </li>
                        <li class="list-group-item">
                          <i class="fa fa-check-square mr-2"></i>Membuat Surat Permohonan
                        </li>
                        <li class="list-group-item">
                          <i class="fa fa-check-square mr-2"></i>Membuat Dokumentasi API
                        </li>
                        <li class="list-group-item">
                          <i class="fa fa-check-square mr-2"></i>Membuat Dokumen Proses Bisnis Aplikasi
                        </li>
                        <li class="list-group-item">
                          <i class="fa fa-check-square mr-2"></i>Membuat Surat Pernyataan Komitmen bekerjasama dengan Apotek
                        </li>
                        <li class="list-group-item">
                          <i class="fa fa-check-square mr-2"></i>Memiliki daftar apotek jaringan yang bekerjasama
                        </li>
                      </ul>

                      <div class="mt-2">
                        <a target="_blank" href="/assets/doc/Checklist%20Perizinan%20PSEF%20untuk%20Pemohon.xlsx" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start text-primary">
                          <h5>Checklist Perizinan PSEF Untuk Pemohon</h5><i class="fa fa-download"></i>
                        </a>
                        <a target="_blank" href="/assets/doc/Contoh%20Surat%20Pernyataan.docx"  class="list-group-item list-group-item-action d-flex justify-content-between align-items-start text-primary">
                          <h5>Contoh Surat Pernyataan</h5><i class="fa fa-download"></i>
                        </a>
                      </div>
                    </div>

                    <div class="card">
                      <h4 class="card-header bg-success text-white">Tanda Daftar PSEF Yang Terbit</h4>

                      <table id="zero_config" class="card-body table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Tanda Daftar PSEF</th>
                            <th>Nama Perusahaan</th>
                            <th>Tanggal</th>
                          </tr>
                        </thead>
                        <tbody class="detail-table-halaman">
                        </tbody>
                      </table>
                    </div>

                    <div class="card">
                      <h4 class="card-header bg-secondary text-white">BERITA</h4>
                      <div class="row mt-2" id="homePageNews">
                      </div>
                    </div>

                    <div class="card">
                      <h4 class="card-header bg-cyan text-white">UNDUHAN</h4>
                      <div class="card-body" id="home-unduhan">
                      </div>
                    </div>

                    <div class="card">
                      <h4 class="card-header bg-orange text-white">STATISTIK PENGUNJUNG</h4>
                      <div class="card-body" id="home-statistik">
                        <?php
                          retrieveAnalytics();
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="auth-box on-sidebar text-white" style="position:fixed; background-image: url(../assets/internal/bg-dark.jpg);">
        <div id="loginform">
          <div class="logo mb-3">
            <span class="db">
              <img src="/assets/internal/logo-psef-white.png" alt="logo" width="60%" />
            </span>
          </div>
          <!-- Form -->
          <div class="row">
            <div class="col-12">
              <div class="px-3 py-2" style="box-shadow: inset 0 3px 6px rgba(134, 167, 213, 1), 0 4px 6px rgba(134, 167, 213, 1);border-radius: 10px;">
                <div class="form-group text-center mt-2">
                  <div class="col-xs-12">
                    <a href="./login.php" class="btn btn-block btn-lg btn-info">Masuk</a>
                  </div>
                </div>
                <div class="form-group text-center">
                  <div class="col-xs-12">
                    <a href="https://usermanagement-simyanfar.kemkes.go.id/Account/Register" class="btn btn-block btn-lg btn-success" target="_blank">Daftar</a>
                  </div>
                </div>
                <div class="custom-control custom-checkbox">
                  <a href="https://usermanagement-simyanfar.kemkes.go.id/Account/ForgotPassword" class="text-white float-right" target="_blank"><i class="fa fa-lock m-r-5"></i> Lupa Kata Sandi?</a>
                </div>
              </div>
              <div class="form-group text-center p-1 mt-3">
                <h3 style="text-decoration: underline;">Kontak Kami</h3>
                <p class="text-left">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                  admin-psef@kemkes.go.id
                </p>
                <p class="text-left">
                  <i class="fa fa-map-marker" aria-hidden="true"></i>
                  Gedung adhyatma lt. 8 ruang 809 Jl. H.R Rasuna Said Blok X5 Kav. 4-9 Jakarta
                </p>
                <p class="text-center mt-3 pt-2">
                  Sertifikat Elektronik Dijamin oleh:
                  <img src="/assets/internal/logo-bsre.png" alt="logo" width="50%" />
                </p>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group m-b-0 m-t-10" style="position: absolute;
                bottom: 0!important;width: inherit;
                margin-bottom: 0px;">
          <div class="col-sm-12 text-center">
            <!-- 2018 PT CIPTA HASIL SUGIARTO.<br/>Syarat &amp; Ketentuan   Kebijakan Privasi -->
          </div>
        </div>

      </div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- All Required js -->
  <!-- ============================================================== -->
  <script src="/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/assets/js/moment.min.js"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="/assets/libs/popper.js/dist/umd/popper.min.js"></script>
  <script src="/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Taostr -->
  <script src="../../assets/libs/toastr/build/toastr.min.js"></script>
  <!-- ============================================================== -->
  <!-- This page plugin js -->
  <!-- ============================================================== -->
  <script src="/assets/js/config.js"></script>
  <script src="assets/js/quill.min.js"></script>
  <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $('#to-recover').on("click", function() {
      $("#loginform").slideUp();
    });
  </script>
  <script>
    $(document).ready(function() {
      $.ajax({
        url: url_api_x + "Perizinan/HalamanMuka",
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, xhr) {
          $.each(data.value, function(index, value) {
            let dth_issuedAt = moment(value.issuedAt).format("YYYY-MM-DD");
            $(".detail-table-halaman").append(`<tr>
                                        <td>${value.perizinanNumber}</td>
                                        <td>${value.companyName}</td>
                                        <td>${dth_issuedAt}</td>
                                        </tr>`)
          });
        },
        error: function(xhr, textStatus, errorThrown) {
          console.log('Error in Operation');
        }
      });
      $.ajax({
        url: url_api + "HomepageBanner",
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, xhr) {
          $.each(data.value, function(index, value) {
            let hpBanner = '';
            if (index == 0) {
              hpBanner = 'active';
            }

            $("#homePageBanner").append(
              `<div class="carousel-item ${hpBanner}">
                <img class="d-block w-100" src="${value.url}" alt="Banner Image">
              </div>`);
          });
        },
        error: function(xhr, textStatus, errorThrown) {
          console.log('Error in Operation');
        }
      });
      $.ajax({
        url: url_api + "HomepageNews",
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, xhr) {
          $.each(data.value, function(index, value) {
            let hpn_publishedAt = moment(value.publishedAt).format("YYYY-MM-DD");
            let data_content_news = JSON.parse(value.content);

            $("#homePageNews").append(
              `<div class="col-lg-6">
                <div class="card">
                  <img class="card-img-top img-responsive" src="${value.imageUrl}" alt="News Image"/>
                  <div class="card-body">
                    <div class="d-flex no-block align-items-center m-b-15">
                      <span><i class="ti-calendar"></i> ${hpn_publishedAt}</span>
                    </div>
                    <h3 class="font-normal">${value.title}</h3>
                    <p class="m-b-0 m-t-10" id="page-news-${index}"></p>
                    <a href="${value.linkUrl}" class="btn btn-success btn-rounded waves-effect waves-light m-t-20" target="_blank">
                      Read more
                    </a>
                  </div>
                </div>
              </div>`);

            quill = new Quill('#page-news-' + index, {});
            quill.setContents(data_content_news)
            quill.disable();
            $('.ql-editor').css('padding', '0');

          });
        },
        error: function(xhr, textStatus, errorThrown) {
          console.log('Error in Operation');
        }
      });
    });

    $.ajax({
        url: url_api + "HomepageUnduhan",
        type: 'GET',
        dataType: 'json',
        success: function(data, textStatus, xhr) {
          $.each(data.value, function(index, value) {
            $("#home-unduhan").append(
              `<div class="list-group">
                <a href="${value.url}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start" target="_blank">
                  ${value.title}<i class="fa fa-file ml-2"></i>
                </a>
              </div>`);
          });
        },
        error: function(xhr, textStatus, errorThrown) {
          console.log('Error in Operation');
        }
      });

    $('#username, #password').keypress(function(event) {
      if (event.keyCode == 13 || event.which == 13) {
        login();
        event.preventDefault();
      }
    });

    function login() {
      var username = $("#username").val();
      var password = $("#password").val();
      $.ajax({
        url: url + 'config.php',
        type: 'POST',
        cache: false,
        dataType: 'JSON',
        data: {
          username: username
        },
        success: function(data) {
          check_login(data.token, username, password)
        },
        error: function(xhr, textStatus, errorThrown) {
          var err = eval("(" + xhr.responseText + ")");
          console.log('Error in Operation');
        }
      });
    }

    function check_login(token, username, password) {
      $.ajax({
        url: url_api + 'usrlogin.php?token=' + token,
        type: 'POST',
        dataType: 'json',
        data: {
          username: username,
          password: password
        },
        success: function(data, textStatus, xhr) {
          if (data.LoggedIn === true) {

            set_sess(username, token);
          } else {
            toastr.error(data.ErrMsg, 'Error!');
          }

        },
        error: function(xhr, textStatus, errorThrown) {
          console.log('Error in Operation');
        }
      });
    }

    function setCookie(cname, cvalue, exdays) {
      var d = new Date();
      d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
      var expires = "expires=" + d.toUTCString();
      document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function set_sess(username, token) {
      setCookie("username", username, 365);
      setCookie("token", token, 365);
      window.location = url;
    }
  </script>
</body>

</html>
