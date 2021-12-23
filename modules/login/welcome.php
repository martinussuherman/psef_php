<?php
session_start();

if ($_SESSION["role"] == "") {
?>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card mt-5 py-3">
          <div class="card-header text-center">
            <h3>Selamat datang di Sistem PSEF, untuk melanjutkan silahkan pilih pada menu yang ada</h3>
            <h3 class="text-danger">PENTING: Mohon periksa dahulu Data Pemohon Anda, sebelum mengajukan Permohonan.</h3>
          </div>
        </div>
      </div>
    </div>
  <?php
  return;
}
  ?>

  <div class="page-breadcrumb">
    <div class="row">
      <div class="col-5 align-self-center">
        <h4 class="page-title">Dasbor</h4>
        <div class="d-flex align-items-center">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb" id="list-breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Dasbor</a></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- End Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Container fluid  -->
  <!-- ============================================================== -->
  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Sales chart -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body border-top">
            <div class="row m-b-0">
              <!-- col -->
              <!-- <div class="col-lg-3 col-md-6">
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><span class="text-dark display-5"><i class="mdi mdi-account-circle"></i></span></div>
                                            <div><span>Total Pemohon</span>
                                                <h3 class="font-medium m-b-0" id="total_pemohon"></h3>
                                            </div>
                                        </div>
                                    </div> -->
              <div class="col-lg-3 col-md-6">
                <div class="d-flex align-items-center">
                  <div class="m-r-10"><span class="text-cyan display-5"><i class="fa fa-share"></i></span></div>
                  <div><span>Total Permohonan</span>
                    <h3 class="font-medium m-b-0" id="total_permohonan"></h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="d-flex align-items-center">
                  <div class="m-r-10"><span class="text-success display-5"><i class="mdi mdi-refresh"></i></span></div>
                  <div><span>Total Permohonan Dalam Proses</span>
                    <h3 class="font-medium m-b-0" id="total_permohonan_proses"></h3>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 col-md-6">
                <div class="d-flex align-items-center">
                  <div class="m-r-10"><span class="text-info display-5"><i class="fa fa-id-card"></i></span></div>
                  <div><span>Total Sertifikat PSEF</span>
                    <h3 class="font-medium m-b-0" id="total_perizinan"></h3>
                  </div>
                </div>
              </div>
              <!-- <div class="col-lg-3 col-md-6">
                                        <div class="d-flex align-items-center">
                                            <div class="m-r-10"><span class="text-warning display-5"><i class="mdi mdi-alert"></i></span></div>
                                            <div><span>Total Permohonan Tertunda</span>
                                                <h3 class="font-medium m-b-0" id="total_permohonan_pending"></h3>
                                            </div>
                                        </div>
                                    </div> -->

              <div class="col-lg-3 col-md-6">
                <div class="d-flex align-items-center">
                  <div class="m-r-10"><span class="text-danger display-5"><i class="mdi mdi-close-circle"></i></span></div>
                  <div><span>Total Permohonan Ditolak</span>
                    <h3 class="font-medium m-b-0" id="total_permohonan_ditolak"></h3>
                  </div>
                </div>
              </div>
              <!-- col -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body border-top">
            <h4>Aktivitas Terbaru</h4>
            <div class="table-responsive" id="table-data-here">
              <table id="zero_config_ra" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>Nomor Permohonan</th>
                    <th>Aktifitas</th>
                    <th>Tanggal</th>
                  </tr>
                </thead>
                <tbody class="detail-item-ra">
                  <!-- Isi detail-item -->
                </tbody>
              </table>
              <!-- Table content goes here -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    var accesstoken = <?php echo json_encode($_COOKIE['accesstoken']); ?>;
    $(document).ready(function() {

      switch (role) {
        case 'Psef.Verifikator':
          cek_pending_permohonan('VerifikatorPendingTotal', 'pending_verif', 'Verifikator');
          break;

        case 'Psef.Kasi':
          cek_pending_permohonan('KepalaSeksiPendingTotal', 'pending_kasi', 'KepalaSeksi');
          break;

        case 'Psef.Kasubdit':
          cek_pending_permohonan('KepalaSubDirektoratPendingTotal', 'pending_kasubdit', 'KepalaSubDirektorat');
          break;

        case 'Psef.Diryanfar':
          cek_pending_permohonan('DirekturPelayananFarmasiPendingTotal', 'pending_diryanfar', 'DirekturPelayananFarmasi');
          break;

        case 'Psef.Dirjen':
          cek_pending_permohonan('DirekturJenderalPendingTotal', 'pending_dirjen', 'DirekturJenderal');
          break;

        case 'Psef.ValidatorSertifikat':
          cek_pending_permohonan('ValidatorSertifikatPendingTotal', 'pending_validator', 'ValidatorSertifikat');
          break;

        default:
          break;
      }



    });

    function cek_pending_permohonan(url_cek, url_pending, url_dashboard) {
      $.ajax({
        url: url_api_x + 'Dashboard' + url_dashboard,
        type: 'GET',
        beforeSend: function(xhr) {
          xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
        },
        dataType: 'json',
        success: function(data, textStatus, xhr) {
          $('#total_pemohon').html(data.totalPemohon)
          $('#total_perizinan').html(data.totalPerizinan)
          $('#total_permohonan').html(data.totalPermohonan)
          $('#total_permohonan_pending').html(data.totalPermohonanPending)
          $('#total_permohonan_proses').html(data.totalPermohonanDalamProses)
          $('#total_permohonan_ditolak').html(data.totalPermohonanDitolak)

          $.each(data.aktifitas, function(index, value) {
            let data_date_ac = moment(value.data).format("YYYY-MM-DD");
            let id_permohonan_ac = '';
            if (value.item === null) {
              id_permohonan_ac = ''
            } else {
              id_permohonan_ac = value.item
            }
            $(".detail-item-ra").append(`<tr>
                                            <td>${id_permohonan_ac}</td>
                                            <td>${value.action}</td>
                                            <td>${data_date_ac}</td>
                                        </tr>`)
          });
          $('#zero_config_ra').DataTable({
            "order": [
              [2, "desc"]
            ]
          })
        },
        error: function(xhr, textStatus, errorThrown) {}
      });

      $.ajax({
        url: url_api_x + 'Permohonan/' + url_cek,
        type: 'GET',
        beforeSend: function(xhr) {
          xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
        },
        dataType: 'json',
        success: function(data, textStatus, xhr) {
          if (data.value > 0) {
            swal({
              title: "Ada " + data.value + " Permohonan yang belum di Lihat",
              text: "Apakah anda ingin melihatnya ?",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              cancelButtonText: "Batal",
              confirmButtonText: 'Ya, Saya ingin melihatnya!'
            }).then((result) => {
              if (result.value) {
                routing(url_pending)
              }
            })
          }

        },
        error: function(xhr, textStatus, errorThrown) {}
      });
    }
  </script>
