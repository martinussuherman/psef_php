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
                    <hr>
                    <br>
                    <div style="background: rgba(232,243,249,.7) !important">
                      <div class="box-header with-border">
                        <h2 class="box-title" style="padding-left:0px">Selamat Datang di Sistem PSEF</h2>
                      </div>
                      <div class="box box-body" style="background: rgba(232,243,249,.7) !important">
                        <ul class="breadcrumb" id="breadcrumb" style="display: none;">
                        </ul>
                        <h2>Penyelenggara Sistem Elektronik Farmasi (PSEF)</h2>
                        <h3>Tentang Pendaftaran PSEF</h3>
                        <p style="line-height: 1.5">
                          Pendaftaran Penyedia Sistem Elektronik Farmasi (PSEF) merupakan persyaratan untuk
                          Penyedia Sistem Elektronik (PSE) yang memfasilitasi pelayanan kefarmasian.<br>
                          Pelaku usaha yang dapat mendaftarkan diri sebagai PSEF adalah pelaku usaha berbadan hukum, dan telah
                          atau akan bekerjasama dengan pelaksana pekerjaan kefarmasian sesuai dengan ketentuan yang berlaku.<br>
                          Pemberi pelayanan kefarmasian yang difasilitasi oleh PSEF harus berupa apotek yang resmi dan berizin.<br>
                        </p>
                        <h3>Persyaratan Pendaftaran</h3>
                        <ul id="syarat" style="list-style-type: none; padding-left: 2px;">
                          <li><i class="fa fa-check-square"></i>Data pemohon</li>
                          <li><i class="fa fa-check-square"></i>Memiliki NIB</li>
                          <li><i class="fa fa-check-square"></i>Memiliki Tanda Daftar Penyelenggara Sistem Elektronik (PSE)</li>
                          <li><i class="fa fa-check-square"></i>Memiliki Izin Usaha Berbentuk IUI/PMSE</li>
                          <li><i class="fa fa-check-square"></i>Memiliki Apoteker Penanggungjawab</li>
                          <li><i class="fa fa-check-square"></i>Mengisi Data Permohonan</li>
                          <li><i class="fa fa-check-square"></i>Membuat Surat Permohonan</li>
                          <li><i class="fa fa-check-square"></i>Membuat Dokumentasi API</li>
                          <li><i class="fa fa-check-square"></i>Membuat Dokumen Proses Bisnis Aplikasi</li>
                          <li><i class="fa fa-check-square"></i>Membuat Surat Pernyataan Komitmen bekerjasama dengan Apotek</li>
                          <li><i class="fa fa-check-square"></i>Memiliki daftar apotek jaringan yang bekerjasama</li>
                        </ul>

                        <a href="/assets/doc/Checklist%20Perizinan%20PSEF%20untuk%20Pemohon.xlsx" target="_blank">
                          <h5>
                            Checklist Perizinan PSEF Untuk Pemohon<span class="ml-2 fa fa-download"></span>
                          </h5>
                        </a>

                        <style type="text/css">
                          ul#syarat i.fa {
                            padding-right: 10px;
                          }

                          .box {
                            position: relative;
                            border-radius: 3px;
                            background: #ffffff;
                            border-top: 3px solid #d2d6de;
                            margin-bottom: 20px;
                            width: 100%;
                            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
                          }

                          .box.box-info {
                            border-top-color: #00c0ef;
                          }

                          .box-body {
                            border-top-left-radius: 0;
                            border-top-right-radius: 0;
                            border-bottom-right-radius: 3px;
                            border-bottom-left-radius: 3px;
                            padding: 10px;
                          }

                          .box-header.with-border {
                            border-bottom: 1px solid #f4f4f4;
                          }

                          .box-header {
                            color: #444;
                            display: block;
                            padding: 10px;
                            position: relative;
                          }
                        </style>
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
                      <div class="row mt-2" id="home-statistik">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="auth-box on-sidebar" style="position:fixed;background: #fff url(../assets/images/bg2.jpg) fixed no-repeat;">
        <div id="loginform">
          <div class="logo mb-3">
            <span class="db">
              <img src="/assets/internal/logo-psef.png" alt="logo" width="60%" />
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
                  <a href="https://usermanagement-simyanfar.kemkes.go.id/Account/ForgotPassword" class="text-dark float-right" target="_blank"><i class="fa fa-lock m-r-5"></i> Lupa Kata Sandi?</a>
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
