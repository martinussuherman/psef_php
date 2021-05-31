<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title" id="page-title">
        Sertifikat PSEF
      </h4>

      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb" id="list-breadcrumb">
            <li class="breadcrumb-item">
              <a href="javascript:void(0)">Sertifikat PSEF</a>
            </li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="col-7 align-self-center">
      <div class="d-flex no-block justify-content-end align-items-center" id="refresh-page">
        <button onclick="viewRouting()" type="button" class="btn waves-effect waves-light btn-rounded btn-primary">
          <i class="fas fa-redo"></i> Segarkan Halaman
        </button>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body" id="load-data">
          <div class="row">
            <div class="col-5 align-self-center">
              <h4 class="page-title">
                Data Sertifikat PSEF
              </h4>
            </div>
          </div>

          <div class="table-responsive" id="table-data-here">
            <table id="zero_config" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>Nomor Sertifikat PSEF</th>
                  <th>Tanggal Terbit</th>
                  <th>Tanggal Berakhir</th>
                  <th>Tindakan</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include('../../template/common_script.php');
include('view_perizinan.php');
?>

<script>
  function configurePerizinanRequest(request) {
    let sortFields = ['perizinanNumber', 'issuedAt', 'expiredAt'];
    return configureAjaxRequest('Perizinan', 'perizinanNumber', 1, sortFields, request);
  }
</script>