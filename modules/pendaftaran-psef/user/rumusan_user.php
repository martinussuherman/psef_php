<div class="page-breadcrumb">
   <div class="row">
      <div class="col-5 align-self-center">
         <h4 class="page-title" id="page-title">Permohonan (Rumusan)</h4>
         <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb" id="list-breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                  <li class="breadcrumb-item"><a href="javascript:void(0)">Permohonan (Rumusan)</a></li>
               </ol>
            </nav>
         </div>
      </div>
      <div class="col-7 align-self-center">
         <div class="d-flex no-block justify-content-end align-items-center" id="refresh-page">
            <button onclick="routing('rumusan_user')" type="button" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fas fa-redo"></i> Segarkan Halaman</button>
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
                     <h4 class="page-title">Data Permohonan (Rumusan)</h4>
                  </div>
                  <div class="col-7 align-self-center">
                     <div class="d-flex no-block justify-content-end align-items-center" id="add_data">
                        <button onclick="add_data()" type="button" class="btn waves-effect waves-light btn-info btn-add-data">Tambah Data Permohonan</button>
                     </div>
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

<?php include('../template/add_permohonan.html'); ?>
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

<?php include('../template/modal_pakta.html'); ?>
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
               return permohonanAjaxRequest(d, 'PermohonanCurrentUser/Rumusan');
            }
         }
      });
   });

   function viewRouting() {
      routing('rumusan_user');
   }

   function add_data() {
      let source = $("#add-data").html();
      let template = Handlebars.compile(source);
      let cek_open = 0;
      let cek_open_klinik = 0;
      let cek_open_rs = 0;

      $('#load-data').html(template());

      $('.btn-trigger-modal').click(function() {
         $('.btn-open-modal').click()
         $('#title-modal').html('Tambah Apotek')
         if (cek_open == 0) {
            $.ajax({
               url: url_api + 'Provinsi',
               type: 'GET',
               beforeSend: function(xhr) {
                  xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
               },
               dataType: 'json',
               success: function(data, textStatus, xhr) {
                  $.each(data.value, function(i, v) {
                     $('#provinsiIdApotek').append("<option value='" + v.id + "'>" + v.name + "</option>")
                  });
                  $('#provinsiIdApotek').select2()
               },
               error: function(xhr, textStatus, errorThrown) {
                  console.log('Error in Operation');
               }
            });
            cek_open = 1;
         }
      })
      $('.btn-trigger-modal-klinik').click(function() {
         $('.btn-open-modal-klinik').click()
         $('#title-modal-klinik').html('Tambah Klinik')
         if (cek_open_klinik == 0) {
            $.ajax({
               url: url_api + 'Provinsi',
               type: 'GET',
               beforeSend: function(xhr) {
                  xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
               },
               dataType: 'json',
               success: function(data, textStatus, xhr) {
                  $.each(data.value, function(i, v) {
                     $('#provinsiIdKlinik').append("<option value='" + v.id + "'>" + v.name + "</option>")
                  });
                  $('#provinsiIdKlinik').select2()
               },
               error: function(xhr, textStatus, errorThrown) {
                  console.log('Error in Operation');
               }
            });
            cek_open_klinik = 1;
         }
      })
      $('.btn-trigger-modal-rs').click(function() {
         $('.btn-open-modal-rs').click()
         $('#title-modal-rs').html('Tambah Rumah Sakit')
         if (cek_open_rs == 0) {
            $.ajax({
               url: url_api + 'Provinsi',
               type: 'GET',
               beforeSend: function(xhr) {
                  xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
               },
               dataType: 'json',
               success: function(data, textStatus, xhr) {
                  $.each(data.value, function(i, v) {
                     $('#provinsiIdRs').append("<option value='" + v.id + "'>" + v.name + "</option>")
                  });
                  $('#provinsiIdRs').select2()
               },
               error: function(xhr, textStatus, errorThrown) {
                  console.log('Error in Operation');
               }
            });
            cek_open_rs = 1;
         }
      })

      $('#straUrl').change(function() {
         upload_stra()
      });
      $('#dokumenApiUrl').change(function() {
         upload_dokapi()
      });
      $('#prosesBisnisUrl').change(function() {
         upload_bisnis()
      });
      $('#suratPermohonanUrl').change(function() {
         upload_permohonan()
      });
      $('#dokumenPseUrl').change(function() {
         upload_dok_pse()
      });
      $('#spplUrl').change(function() {
         upload_sppl()
      });
      $('#izinLokasiUrl').change(function() {
         upload_izin_lokasi()
      });
      $('#imbUrl').change(function() {
         upload_imb()
      });
      $('#pembayaranPnbpUrl').change(function() {
         upload_pnbp()
      });

      let val_modal_pakta = ''

      $('#modal-pakta').modal('show');
      $("#modal-pakta-setuju").click(function() {
         val_modal_pakta = 'setuju'
      });
      $('#modal-pakta').on('hidden.bs.modal', function() {
         if (val_modal_pakta != 'setuju') {
            routing('rumusan_user');
         }
      })


   }

   function data_save(e) {
      e.preventDefault();
      var data = $('#add-data-new').serializeFormJSON();
      data.typeId = 1;
      console.log(data)
      let detail_data_save
      let detail_data_save_klinik
      let detail_data_save_rs

      if (data.data != '') {
         console.log('a')
         if (data.data != '{"detail":[]}') {
            console.log('b')
            detail_data_save = JSON.parse(data.data)
         }
      }
      if (data.data_klinik != '') {
         if (data.data_klinik != '{"detail":[]}') {
            detail_data_save_klinik = JSON.parse(data.data_klinik)
         }
      }
      if (data.data_rs != '') {
         if (data.data_rs != '{"detail":[]}') {
            detail_data_save_rs = JSON.parse(data.data_rs)
         }
      }

      delete data.data
      delete data.data_klinik
      delete data.data_rs

      $.ajax({
         url: url_api_x + 'PermohonanCurrentUser',
         type: 'POST',
         beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
         },
         data: JSON.stringify(data),
         contentType: 'application/json',
         success: function(datax, textStatus, xhr) {

            if (detail_data_save !== undefined) {
               $.each(detail_data_save.detail, function(indexa, valuea) {
                  detail_data_save.detail[indexa].permohonanId = datax.id
                  delete detail_data_save.detail[indexa].iddetail
               });

               detail_data_save.apotek = detail_data_save.detail
               delete detail_data_save.detail
               detail_data_save.permohonanId = datax.id

               $.ajax({
                  url: url_api_x + 'PermohonanApotek',
                  type: 'POST',
                  beforeSend: function(xhr) {
                     xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
                  },
                  data: JSON.stringify(detail_data_save),
                  contentType: 'application/json',
                  success: function(datac, textStatus, xhrx) {

                  },
                  error: function(xhr, textStatus, errorThrown) {
                     console.log('Error in Operation');
                  }
               });

            }

            if (detail_data_save_klinik !== undefined) {
               $.each(detail_data_save_klinik.detail, function(indexa, valuea) {
                  detail_data_save_klinik.detail[indexa].permohonanId = datax.id
                  delete detail_data_save_klinik.detail[indexa].iddetail
               });
               detail_data_save_klinik.klinik = detail_data_save_klinik.detail
               delete detail_data_save_klinik.detail
               detail_data_save_klinik.permohonanId = datax.id

               $.ajax({
                  url: url_api_x + 'PermohonanKlinik',
                  type: 'POST',
                  beforeSend: function(xhr) {
                     xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
                  },
                  data: JSON.stringify(detail_data_save_klinik),
                  contentType: 'application/json',
                  success: function(datac, textStatus, xhrx) {

                  },
                  error: function(xhr, textStatus, errorThrown) {
                     console.log('Error in Operation');
                  }
               });
            }

            if (detail_data_save_rs !== undefined) {
               $.each(detail_data_save_rs.detail, function(indexa, valuea) {
                  detail_data_save_rs.detail[indexa].permohonanId = datax.id
                  delete detail_data_save_rs.detail[indexa].iddetail
               });
               detail_data_save_rs.rumahSakit = detail_data_save_rs.detail
               delete detail_data_save_rs.detail
               detail_data_save_rs.permohonanId = datax.id

               $.ajax({
                  url: url_api_x + 'PermohonanRumahSakit',
                  type: 'POST',
                  beforeSend: function(xhr) {
                     xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
                  },
                  data: JSON.stringify(detail_data_save_rs),
                  contentType: 'application/json',
                  success: function(datac, textStatus, xhrx) {

                  },
                  error: function(xhr, textStatus, errorThrown) {
                     console.log('Error in Operation');
                  }
               });
            }

            routing('rumusan_user');

         },
         error: function(xhr, textStatus, errorThrown) {
            console.log('Error in Operation');
         }
      });

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

      updateDataPermohonan(data);
      $('#load-data').html(template(data));

      $('#v-straUrl').val(data.straUrl)
      $('#v-suratPermohonanUrl').val(data.suratPermohonanUrl)
      $('#v-prosesBisnisUrl').val(data.prosesBisnisUrl)
      $('#v-dokumenApiUrl').val(data.dokumenApiUrl)
      $('#v-dokumenPseUrl').val(data.dokumenPseUrl)
      $('#v-spplUrl').val(data.spplUrl)
      $('#v-izinLokasiUrl').val(data.izinLokasiUrl)
      $('#v-imbUrl').val(data.imbUrl)
      $('#v-pembayaranPnbpUrl').val(data.pembayaranPnbpUrl)

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
               routing('rumusan_user');
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
                     routing('rumusan_user')
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
