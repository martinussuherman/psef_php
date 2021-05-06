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

   function edit_data_permohonan(id) {
      $.ajax({
         url: url_api_x + "PermohonanCurrentUser(" + id + ")",
         type: 'GET',
         beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
         },
         dataType: 'json',
         success: function(data, textStatus, xhr) {
            edit_permohonan(data)
         },
         error: function(xhr, textStatus, errorThrown) {
            console.log('Error in Operation');
         }
      });
   }

   function edit_permohonan(data) {
      let source = $("#edit-data").html();
      let template = Handlebars.compile(source);
      let nib = data.nib
      data.straExpiry = moment(data.straExpiry).format("YYYY-MM-DD");
      let name_straUrl = data.straUrl
      let name_suratPermohonanUrl = data.suratPermohonanUrl
      let name_prosesBisnisUrl = data.prosesBisnisUrl
      let name_dokumenApiUrl = data.dokumenApiUrl
      let name_dokumenPseUrl = data.dokumenPseUrl
      let name_spplUrl = data.spplUrl
      let name_izinLokasiUrl = data.izinLokasiUrl
      let name_imbUrl = data.imbUrl
      let name_pembayaranPnbpUrl = data.pembayaranPnbpUrl
      var split_straUrl = name_straUrl.split("/");
      var split_suratPermohonanUrl = name_suratPermohonanUrl.split("/");
      var split_prosesBisnisUrl = name_prosesBisnisUrl.split("/");
      var split_dokumenApiUrl = name_dokumenApiUrl.split("/");
      var split_dokumenPseUrl = name_dokumenPseUrl.split("/");
      var split_spplUrl = name_spplUrl.split("/");
      var split_izinLokasiUrl = name_izinLokasiUrl.split("/");
      var split_imbUrl = name_imbUrl.split("/");
      var split_pembayaranPnbpUrl = name_pembayaranPnbpUrl.split("/");
      data.name_straUrl = split_straUrl[split_straUrl.length - 1]
      data.name_suratPermohonanUrl = split_suratPermohonanUrl[split_suratPermohonanUrl.length - 1]
      data.name_prosesBisnisUrl = split_prosesBisnisUrl[split_prosesBisnisUrl.length - 1]
      data.name_dokumenApiUrl = split_dokumenApiUrl[split_dokumenApiUrl.length - 1]
      data.name_dokumenPseUrl = split_dokumenPseUrl[split_dokumenPseUrl.length - 1]
      data.name_spplUrl = split_spplUrl[split_spplUrl.length - 1]
      data.name_izinLokasiUrl = split_izinLokasiUrl[split_izinLokasiUrl.length - 1]
      data.name_imbUrl = split_imbUrl[split_imbUrl.length - 1]
      data.name_pembayaranPnbpUrl = split_pembayaranPnbpUrl[split_pembayaranPnbpUrl.length - 1]

      $('#load-data').html(template(data));
      $('#v-straUrl').val(name_straUrl)
      $('#v-suratPermohonanUrl').val(name_suratPermohonanUrl)
      $('#v-prosesBisnisUrl').val(name_prosesBisnisUrl)
      $('#v-dokumenApiUrl').val(name_dokumenApiUrl)
      $('#v-dokumenPseUrl').val(name_dokumenPseUrl)
      $('#v-spplUrl').val(name_spplUrl)
      $('#v-izinLokasiUrl').val(name_izinLokasiUrl)
      $('#v-imbUrl').val(name_imbUrl)
      $('#v-pembayaranPnbpUrl').val(name_pembayaranPnbpUrl)

      $('#straUrl').change(function() {
         upload_stra('edit')
      });
      $('#dokumenApiUrl').change(function() {
         upload_dokapi('edit')
      });
      $('#prosesBisnisUrl').change(function() {
         upload_bisnis('edit')
      });
      $('#suratPermohonanUrl').change(function() {
         upload_permohonan('edit')
      });
      $('#dokumenPseUrl').change(function() {
         upload_dok_pse('edit')
      });
      $('#spplUrl').change(function() {
         upload_sppl('edit')
      });
      $('#izinLokasiUrl').change(function() {
         upload_izin_lokasi('edit')
      });
      $('#imbUrl').change(function() {
         upload_imb('edit')
      });
      $('#pembayaranPnbpUrl').change(function() {
         upload_pnbp('edit')
      });
   }

   function update_data(e) {
      e.preventDefault();
      var data = $('#data-update').serializeFormJSON();
      data.typeId = 1;
      data.pemohonId = parseInt(data.pemohonId)
      data.id = parseInt(data.id)
      let id_permohonan = data.id

      $.ajax({
         url: url_api_x + 'PermohonanCurrentUser(' + id_permohonan + ')',
         type: 'PATCH',
         beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
         },
         data: JSON.stringify(data),
         contentType: 'application/json',
         success: function(data, textStatus, xhr) {
            if (xhr.status == '204' || xhr.status == '200') {
               routing('dikembalikan_user');
               toastr.success("Memperbarui Permohonan", 'Berhasil!');
            } else {
               toastr.error("Memperbarui Permohonan", 'Gagal!');
            }
         },
         error: function(xhr, textStatus, errorThrown) {
            console.log('Error in Operation');
         }
      });

   }

   function ajukan_permohonan(id) {
      let data = {
         'permohonanId': parseInt(id)
      }
      swal({
         title: 'Ajukan Permohonan',
         text: "Apakah anda yakin ingin mengajukan permohonan ini ?",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         cancelButtonText: "Batal",
         confirmButtonText: 'Ya, Ajukan !'
      }).then((result) => {
         if (result.value) {
            $.ajax({
               url: url_api_x + 'PermohonanCurrentUser/Ajukan',
               type: 'POST',
               beforeSend: function(xhr) {
                  xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
               },
               data: JSON.stringify(data),
               contentType: 'application/json',
               success: function(data, textStatus, xhr) {
                  if (xhr.status == '204') {
                     swal(
                        'Berhasil!',
                        'Permohonan di Ajukan',
                        'success'
                     )
                     routing('dikembalikan_user')
                  } else {
                     swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Permohonan Gagal di Ajukan'
                     })
                  }
               },
               error: function(xhr, textStatus, errorThrown) {
                  console.log('Error in Operation');
               }
            });
         }
      })
   }
</script>
