<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title" id="page-title"><?php echo $pageTitle; ?></h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb" id="list-breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo $pageTitle; ?></a></li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex no-block justify-content-end align-items-center" id="refresh-page">
        <button onclick="viewRouting()" type="button" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fas fa-redo"></i> Segarkan Halaman</button>
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
              <h4 class="page-title">Data <?php echo $pageTitle; ?></h4>
            </div>

            <?php
            if (isset($showAddData)) {
              include('add_data.html');
            }
            ?>
          </div>
          <div class="table-responsive" id="table-data-here">
            <table id="zero_config" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th>Nomor Permohonan</th>
                  <th>Domain</th>
                  <th>Nomor STRA</th>
                  <th>Kedaluwarsa STRA</th>
                  <th>Status</th>
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
if (!isset($pageType)) {
  include('../template/view_permohonan.html');
  include('common_script.html');
  include('view_permohonan_script.html');
}
?>