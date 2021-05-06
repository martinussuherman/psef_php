<?php
$pageType = 'dikembalikan';
$pageTitle = 'Permohonan (Dikembalikan)';
include('template.php');
?>

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
