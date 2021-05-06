<div class="page-breadcrumb">
   <div class="row">
      <div class="col-5 align-self-center">
         <h4 class="page-title" id="page-title">Permohonan (Dikembalikan)</h4>
         <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb" id="list-breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Permohonan (Dikembalikan)</a></li>
               </ol>
            </nav>
         </div>
      </div>
      <div class="col-7 align-self-center">
         <div class="d-flex no-block justify-content-end align-items-center" id="refresh-page">
            <button onclick="routing('dikembalikan_user')" type="button" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fas fa-redo"></i> Segarkan Halaman</button>
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
                     <h4 class="page-title">Data Permohonan (Dikembalikan)</h4>
                  </div>
               </div><br>
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

<?php include('../template/edit_permohonan.html'); ?>
<?php include('../template/view_permohonan.html'); ?>

<?php include('../template/add_apotek.html'); ?>
<?php include('../template/edit_apotek.html'); ?>
<?php include('../template/view_apotek.html'); ?>
<?php include('../template/modal_apotek.html'); ?>

<?php include('../template/add_klinik.html'); ?>
<?php include('../template/edit_klinik.html'); ?>
<?php include('../template/view_klinik.html'); ?>
<?php include('../template/modal_klinik.html'); ?>

<?php include('../template/add_rumah_sakit.html'); ?>
<?php include('../template/edit_rumah_sakit.html'); ?>
<?php include('../template/view_rumah_sakit.html'); ?>
<?php include('../template/modal_rumah_sakit.html'); ?>

<?php include('apotek_script.html'); ?>
<?php include('common_script.html'); ?>
<?php include('klinik_script.html'); ?>
<?php include('rumah_sakit_script.html'); ?>
<?php include('upload_file_script.html'); ?>
<?php include('edit_permohonan_script.html'); ?>
<?php include('view_permohonan_script.html'); ?>

<script>
   var accesstoken = <?php echo json_encode($_COOKIE['accesstoken']); ?>;
   var arr_detail_add = [];
   var arr_detail_add_x = [];
   var arr_detail_add_klinik = [];
   var arr_detail_add_klinik_x = [];
   var arr_detail_add_rs = [];
   var arr_detail_add_rs_x = [];
   var id_detail_add = 0;
   var id_detail_add_klinik = 0;
   var id_detail_add_rs = 0;
   var cc;

   $(document).ready(function() {
      $('#zero_config').on('xhr.dt', function(e, settings, json, xhr) {
         json.data = json.rows;
         json.recordsTotal = json.recordsFiltered = json.total;
      }).DataTable({
         "processing": true,
         "columnDefs": [{
            "targets": [4],
            "orderable": false,
         }],
         "serverSide": true,
         "scrollY": '100vh',
         "scrollX": true,
         "ajax": {
            "url": url_api_php,
            "type": "POST",
            "dataSrc": function(json) {
               return permohonanFromJson(json, false);
            },
            "data": function(d) {
               return permohonanAjaxRequest(d, 'PermohonanCurrentUser/Dikembalikan');
            }
         }
      });
   });

   function viewRouting() {
      routing('dikembalikan_user');
   }
</script>
