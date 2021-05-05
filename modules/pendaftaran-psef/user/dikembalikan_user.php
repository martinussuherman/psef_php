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

<!-- Template for edit -->
<script id="edit-data" type="text/x-handlebars-template">
   <h4 class="card-title">Ubah Data Permohonan</h4>
    <form class="m-t-30" id="data-update" onsubmit="update_data(event)">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nomor Permohonan</label>
                    <input type="text" value= "{{permohonanNumber}}" class="form-control" name="permohonanNumber" disabled>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Alamat Domain Web</label>
                     <input type="text" value= "{{domain}}" class="form-control" name="domain" placeholder="Masukan Alamat Domain Web." required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nama Sistem</label>
                    <input type="text" value= "{{systemName}}" class="form-control" name="systemName" placeholder="Masukan Nama Sistem." required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nama Apoteker</label>
                    <input type="text" value= "{{apotekerName}}" class="form-control" name="apotekerName" placeholder="Masukan Nama Apoteker." required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Email Apoteker</label>
                    <input type="email" value= "{{apotekerEmail}}" class="form-control" name="apotekerEmail" placeholder="Masukan Email Apoteker." required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nomor Telepon Apoteker</label>
                    <input type="text" value= "{{apotekerPhone}}" class="form-control" name="apotekerPhone" placeholder="Masukan Nomor Telepon Apoteker." required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>NIK Apoteker</label>
                    <input type="text" value= "{{apotekerNik}}" class="form-control" name="apotekerNik" placeholder="Masukan NIK Apoteker." required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nomor STRA</label>
                    <input type="text" value= "{{straNumber}}" class="form-control" name="straNumber" placeholder="Masukan Nomor STRA." required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Kedaluwarsa STRA</label>
                    <input type="date" value= "{{straExpiry}}" class="form-control" name="straExpiry" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label><b>Contoh Surat</b></label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id/assets/doc/Contoh%20Surat%20Permohonan%20Tanda%20Daftar%20PSEF.docx">Contoh Surat Permohonan</a>
            </div>
            <br>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id/assets/doc/Contoh%20Dokumen%20PSE%20Kominfo.docx">Contoh Dokumen PSE Kominfo</a>
            </div>
        </div>
        <div class="form-group">
            <label>Salinan STRA</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{straUrl}}" id="close-straUrl">{{name_straUrl}}</a>
            </div>
            <input type="file" class="form-control" id="straUrl">
            <small class="form-text text-muted">*Berkas yang anda upload wajib PDF & size file maksimal 5 MB</small>
            <input type="hidden" name="straUrl" id="v-straUrl">
        </div>
        <div class="form-group">
            <label>Surat Permohonan</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{suratPermohonanUrl}}" id="close-suratPermohonanUrl">{{name_suratPermohonanUrl}}</a>
            </div>
            <input type="file" class="form-control" id="suratPermohonanUrl">
            <small class="form-text text-muted">*Berkas yang anda upload wajib PDF & size file maksimal 5 MB</small>
            <input type="hidden" name="suratPermohonanUrl" id="v-suratPermohonanUrl">
        </div>
        <div class="form-group">
            <label>Dokumen Proses Bisnis</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{prosesBisnisUrl}}" id="close-prosesBisnisUrl">{{name_prosesBisnisUrl}}</a>
            </div>
            <input type="file" class="form-control" id="prosesBisnisUrl">
            <small class="form-text text-muted">*Berkas yang anda upload wajib PDF & size file maksimal 5 MB</small>
            <input type="hidden" name="prosesBisnisUrl" id="v-prosesBisnisUrl">
        </div>
        <div class="form-group">
            <label>Dokumen Application Programmer Interface Sistem PSEF</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{dokumenApiUrl}}" id="close-dokumenApiUrl">{{name_dokumenApiUrl}}</a>
            </div>
            <input type="file" class="form-control" id="dokumenApiUrl">
            <small class="form-text text-muted">*Berkas yang anda upload wajib PDF & size file maksimal 5 MB</small>
            <input type="hidden" name="dokumenApiUrl" id="v-dokumenApiUrl">
        </div>
        <div class="form-group">
            <label>Dokumen PSE Kominfo</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{dokumenPseUrl}}" id="close-dokumenPseUrl">{{name_dokumenPseUrl}}</a>
            </div>
            <input type="file" class="form-control" id="dokumenPseUrl">
            <small class="form-text text-muted">*Berkas yang anda upload wajib PDF & size file maksimal 5 MB</small>
            <input type="hidden" name="dokumenPseUrl" id="v-dokumenPseUrl">
        </div>
        <div class="form-group">
            <label>SPPL</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{spplUrl}}" id="close-spplUrl">{{name_spplUrl}}</a>
            </div>
            <input type="file" class="form-control" id="spplUrl">
            <small class="form-text text-muted">*Berkas yang anda upload wajib PDF & size file maksimal 5 MB</small>
            <input type="hidden" name="spplUrl" id="v-spplUrl">
        </div>
        <div class="form-group">
            <label>Izin Lokasi</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{izinLokasiUrl}}" id="close-izinLokasiUrl">{{name_izinLokasiUrl}}</a>
            </div>
            <input type="file" class="form-control" id="izinLokasiUrl">
            <small class="form-text text-muted">*Berkas yang anda upload wajib PDF & size file maksimal 5 MB</small>
            <input type="hidden" name="izinLokasiUrl" id="v-izinLokasiUrl">
        </div>
        <div class="form-group">
            <label>IMB</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{imbUrl}}" id="close-imbUrl">{{name_imbUrl}}</a>
            </div>
            <input type="file" class="form-control" id="imbUrl">
            <small class="form-text text-muted">*Berkas yang anda upload wajib PDF & size file maksimal 5 MB</small>
            <input type="hidden" name="imbUrl" id="v-imbUrl">
        </div>
        <div class="form-group">
            <label>Pembayaran PNBP</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{pembayaranPnbpUrl}}" id="close-pembayaranPnbpUrl">{{name_pembayaranPnbpUrl}}</a>
            </div>
            <input type="file" class="form-control" id="pembayaranPnbpUrl">
            <small class="form-text text-muted">*Berkas yang anda upload wajib PDF & size file maksimal 5 MB</small>
            <input type="hidden" name="pembayaranPnbpUrl" id="v-pembayaranPnbpUrl">
        </div>
        <br><br>
        <input type="checkbox" value="check" id="agree" required/> Dengan ini saya menyatakan bahwa data yang saya isi adalah benar
        <br><br>
        <input type="hidden" name="pemohonId" id="pemohonId" value="{{pemohonId}}">
        <input type="hidden" name="id" value="{{id}}">
        <button type="submit" class="btn btn-primary">Kirim</button>
        <button type="button" class="btn btn-danger" onclick="routing('dikembalikan_user')">Batal</button>
    </form>
</script>

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
               var data = [];

               for (var i = 0, ien = json.data.length; i < ien; i++) {
                  var datax = [];

                  let permohonan = json.data[i];
                  let data_straExpiry = moment(permohonan.straExpiry).format("YYYY-MM-DD");
                  let actions = `
                  <td>
                     <button onclick="viewPermohonan(${permohonan.id}, true)" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-info">
                        Lihat Detail Data
                     </button>
                     <button onclick="edit_data_permohonan(${permohonan.id})" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-primary">
                        Ubah Permohonan
                     </button>
                     <button onclick="edit_data_apotek(${permohonan.id}, ${permohonan.permohonanNumber})" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-secondary">
                        Ubah Apotek
                     </button>
                     <button onclick="edit_data_klinik(${permohonan.id}, ${permohonan.permohonanNumber})" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-warning">
                        Ubah Klinik
                     </button>
                     <button onclick="edit_data_rs(${permohonan.id}, ${permohonan.permohonanNumber})" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-danger">
                        Ubah Rumah Sakit
                     </button>
                     <button onclick="ajukan_permohonan(${permohonan.id})" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-success">
                        Ajukan Permohonan
                     </button>
                  </td>`;

                  datax.push(permohonan.permohonanNumber);
                  datax.push(permohonan.domain);
                  datax.push(permohonan.straNumber);
                  datax.push(data_straExpiry);
                  datax.push(permohonan.pemohonStatusName);
                  datax.push(actions);
                  data.push(datax);
               }

               return JSON.parse(JSON.stringify(data));
            },

            "data": function(d) {
               var order_name = []

               order_name.push('permohonanNumber');
               order_name.push('domain');
               order_name.push('straNumber');
               order_name.push('straExpiry');
               order_name.push('statusName');
               order_name.push('id');

               var data = {};

               data.fpage = (parseInt(d.start) + parseInt(d.length)) / parseInt(d.length);
               data.frows = d.length;
               data.fsearch = d.search['value'];
               data.forder = 'lastUpdate';
               data.fsort = 'desc';
               data.fmodul = 'PermohonanCurrentUser/Dikembalikan';
               data.flsearch = 'permohonanNumber,domain,straNumber';
               data.ftots = 3;
               return data;
            }
         }
      });
   });

   function viewRouting() {
      routing('dikembalikan_user');
   }

   $('.modal-close-conf').click(function() {
      close_modals();
   })

   function close_modals() {
      $('.modal-close').click();
      $('#name').val('')
      $('#siaNumber').val('')
      $('#apotekerName').val('')
      $('#straNumber').val('')
      $('#sipaNumber').val('')
      $('#address').val('')
      $('select[name="provinsiId"]').val(null).trigger("change");
   }

   function detail_add(e) {
      e.preventDefault();
      var data = $('#add_detail_data').serializeFormJSON();
      let name_provinsi = $('#provinsiIdApotek').select2('data');

      if (data.editdetail == 'deletedetail') {

         $('#apotek_' + data.rowdetail).remove()

         $.each(arr_detail_add, function(indexa, valuea) {
            if (data.rowdetail == valuea.iddetail) {
               cc = indexa
            }
         });

         Array.prototype.remove = function(indexcc) {
            this.splice(indexcc, 1);
         }

         arr_detail_add.remove(cc)

         var s_detail = [];

         arr_detail_add.map((val, index) => {
            s_detail.push(val)
         })
         arr_detail_add = s_detail
         arr_detail_add_x.detail = s_detail;
      }

      arr_detail_add.push({
         "name": data.name,
         "permohonanId": 0,
         "siaNumber": data.siaNumber,
         "apotekerName": data.apotekerName,
         "straNumber": data.straNumber,
         "sipaNumber": data.sipaNumber,
         "address": data.address,
         "provinsiId": data.provinsiId,
         "iddetail": id_detail_add
      })

      arr_detail_add_x = {
         detail: arr_detail_add
      }

      $('#data').val(JSON.stringify(arr_detail_add_x))
      $(".detail-item").append(`<tr id="apotek_${id_detail_add}">
                                    <td>${data.name}</td>
                                    <td>${data.siaNumber}</td>
                                    <td>${data.apotekerName}</td>
                                    <td>${data.straNumber}</td>
                                    <td>${data.sipaNumber}</td>
                                    <td>${data.address}</td>
                                    <td>${name_provinsi[0].text}</td>
                                    <td>
                                        <button onclick="edit_detail_add('${id_detail_add}')" type="button" class="btn waves-effect waves-light btn-primary" iddadd="${id_detail_add}">Ubah Apotek</button>
                                        <button onclick="delete_detail_add('${id_detail_add}')" type="button" class="btn waves-effect waves-light btn-danger" iddadd="${id_detail_add}">Hapus</button>
                                    </td>
                                </tr>`)
      id_detail_add++;
      close_modals()
   }

   function edit_detail_add(id) {
      $.each(arr_detail_add, function(i, v) {
         if (id == v.iddetail) {
            $("#name").val(v.name)
            $("#siaNumber").val(v.siaNumber)
            $("#apotekerName").val(v.apotekerName)
            $("#straNumber").val(v.straNumber)
            $("#sipaNumber").val(v.sipaNumber)
            $("#address").val(v.address)
            $('#provinsiIdApotek').val(v.provinsiId).trigger("change");
            $('#title-modal').html('Ubah Apotek')
            $("#editdetail").val('deletedetail')
            $("#rowdetail").val(v.iddetail)
         }
      });
      $('.btn-open-modal').click()
   }

   function delete_detail_add(id) {
      swal({
         title: 'Hapus Apotek',
         text: "Apakah Anda yakin menghapus apotek ini ?",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         cancelButtonText: "Batal",
         confirmButtonText: 'Ya, Hapus !'
      }).then((result) => {
         if (result.value) {
            $.ajax({
               success: function(data, textStatus, xhr) {
                  swal(
                     'Berhasil!',
                     'Apotek dihapus',
                     'success'
                  )

                  $('#apotek_' + id).remove()

                  $.each(arr_detail_add, function(indexa, valuea) {
                     if (id == valuea.iddetail) {
                        cc = indexa
                     }
                  });

                  Array.prototype.remove = function(indexcc) {
                     this.splice(indexcc, 1);
                  }

                  arr_detail_add.remove(cc)

                  var s_detail = [];

                  arr_detail_add.map((val, index) => {
                     s_detail.push(val)
                  })
                  arr_detail_add = s_detail
                  arr_detail_add_x.detail = s_detail;

                  $('#data').val('')
                  $('#data').val(JSON.stringify(arr_detail_add_x))
               }
            });
         }
      })
   }

   function detail_add_klinik(e) {
      e.preventDefault();
      var data = $('#add_detail_data_klinik').serializeFormJSON();
      let name_provinsi = $('#provinsiIdKlinik').select2('data');

      if (data.editdetail == 'deletedetail') {

         $('#klinik_' + data.rowdetail).remove()

         $.each(arr_detail_add_klinik, function(indexa, valuea) {
            if (data.rowdetail == valuea.iddetail) {
               cc = indexa
            }
         });

         Array.prototype.remove = function(indexcc) {
            this.splice(indexcc, 1);
         }

         arr_detail_add_klinik.remove(cc)

         var s_detail = [];

         arr_detail_add_klinik.map((val, index) => {
            s_detail.push(val)
         })
         arr_detail_add_klinik = s_detail
         arr_detail_add_klinik_x.detail = s_detail;
      }

      arr_detail_add_klinik.push({
         "name": data.name,
         "permohonanId": 0,
         "apotekerName": data.apotekerName,
         "straNumber": data.straNumber,
         "sipaNumber": data.sipaNumber,
         "address": data.address,
         "provinsiId": data.provinsiId,
         "iddetail": id_detail_add_klinik
      })

      arr_detail_add_klinik_x = {
         detail: arr_detail_add_klinik
      }

      $('#data_klinik').val(JSON.stringify(arr_detail_add_klinik_x))
      $(".detail-item-klinik").append(`<tr id="klinik_${id_detail_add_klinik}">
                                    <td>${data.name}</td>
                                    <td>${data.apotekerName}</td>
                                    <td>${data.straNumber}</td>
                                    <td>${data.sipaNumber}</td>
                                    <td>${data.address}</td>
                                    <td>${name_provinsi[0].text}</td>
                                    <td>
                                        <button onclick="edit_detail_add_klinik('${id_detail_add_klinik}')" type="button" class="btn waves-effect waves-light btn-primary" iddadd="${id_detail_add_klinik}">Ubah Klinik</button>
                                        <button onclick="delete_detail_add_klinik('${id_detail_add_klinik}')" type="button" class="btn waves-effect waves-light btn-danger" iddadd="${id_detail_add_klinik}">Hapus</button>
                                    </td>
                                </tr>`)
      id_detail_add_klinik++;
      close_modals()
   }

   function edit_detail_add_klinik(id) {
      $.each(arr_detail_add_klinik, function(i, v) {
         if (id == v.iddetail) {
            $("#name_klinik").val(v.name)
            $("#apotekerName_klinik").val(v.apotekerName)
            $("#straNumber_klinik").val(v.straNumber)
            $("#sipaNumber_klinik").val(v.sipaNumber)
            $("#address_klinik").val(v.address)
            $('#provinsiIdKlinik').val(v.provinsiId).trigger("change");
            $('#title-modal-klinik').html('Ubah Klinik')
            $("#editdetail_klinik").val('deletedetail')
            $("#rowdetail_klinik").val(v.iddetail)
         }
      });
      $('.btn-open-modal-klinik').click()
   }

   function delete_detail_add_klinik(id) {
      swal({
         title: 'Hapus Klinik',
         text: "Apakah Anda yakin menghapus klinik ini ?",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         cancelButtonText: "Batal",
         confirmButtonText: 'Ya, Hapus !'
      }).then((result) => {
         if (result.value) {
            $.ajax({
               success: function(data, textStatus, xhr) {
                  swal(
                     'Berhasil!',
                     'Klinik dihapus',
                     'success'
                  )

                  $('#klinik_' + id).remove()

                  $.each(arr_detail_add_klinik, function(indexa, valuea) {
                     if (id == valuea.iddetail) {
                        cc = indexa
                     }
                  });

                  Array.prototype.remove = function(indexcc) {
                     this.splice(indexcc, 1);
                  }

                  arr_detail_add_klinik.remove(cc)

                  var s_detail = [];

                  arr_detail_add_klinik.map((val, index) => {
                     s_detail.push(val)
                  })
                  arr_detail_add_klinik = s_detail
                  arr_detail_add_klinik_x.detail = s_detail;

                  $('#data_klinik').val('')
                  $('#data_klinik').val(JSON.stringify(arr_detail_add_klinik_x))
               }
            });
         }
      })
   }

   function detail_add_rs(e) {
      e.preventDefault();
      var data = $('#add_detail_data_rs').serializeFormJSON();
      let name_provinsi = $('#provinsiIdRs').select2('data');

      if (data.editdetail == 'deletedetail') {

         $('#rs_' + data.rowdetail).remove()

         $.each(arr_detail_add_rs, function(indexa, valuea) {
            if (data.rowdetail == valuea.iddetail) {
               cc = indexa
            }
         });

         Array.prototype.remove = function(indexcc) {
            this.splice(indexcc, 1);
         }

         arr_detail_add_rs.remove(cc)

         var s_detail = [];

         arr_detail_add_rs.map((val, index) => {
            s_detail.push(val)
         })
         arr_detail_add_rs = s_detail
         arr_detail_add_rs_x.detail = s_detail;
      }

      arr_detail_add_rs.push({
         "name": data.name,
         "permohonanId": 0,
         "apotekerName": data.apotekerName,
         "straNumber": data.straNumber,
         "sipaNumber": data.sipaNumber,
         "address": data.address,
         "provinsiId": data.provinsiId,
         "iddetail": id_detail_add_rs
      })

      arr_detail_add_rs_x = {
         detail: arr_detail_add_rs
      }

      $('#data_rs').val(JSON.stringify(arr_detail_add_rs_x))
      $(".detail-item-rs").append(`<tr id="rs_${id_detail_add_rs}">
                                    <td>${data.name}</td>
                                    <td>${data.apotekerName}</td>
                                    <td>${data.straNumber}</td>
                                    <td>${data.sipaNumber}</td>
                                    <td>${data.address}</td>
                                    <td>${name_provinsi[0].text}</td>
                                    <td>
                                        <button onclick="edit_detail_add_rs('${id_detail_add_rs}')" type="button" class="btn waves-effect waves-light btn-primary" iddadd="${id_detail_add_rs}">Ubah Rumah Sakit</button>
                                        <button onclick="delete_detail_add_rs('${id_detail_add_rs}')" type="button" class="btn waves-effect waves-light btn-danger" iddadd="${id_detail_add_rs}">Hapus</button>
                                    </td>
                                </tr>`)
      id_detail_add_rs++;
      close_modals()
   }

   function edit_detail_add_rs(id) {
      $.each(arr_detail_add_rs, function(i, v) {
         if (id == v.iddetail) {
            $("#name_rs").val(v.name)
            $("#apotekerName_rs").val(v.apotekerName)
            $("#straNumber_rs").val(v.straNumber)
            $("#sipaNumber_rs").val(v.sipaNumber)
            $("#address_rs").val(v.address)
            $('#provinsiIdRs').val(v.provinsiId).trigger("change");
            $('#title-modal-rs').html('Ubah Rumah Sakit')
            $("#editdetail_rs").val('deletedetail')
            $("#rowdetail_rs").val(v.iddetail)
         }
      });
      $('.btn-open-modal-rs').click()
   }

   function delete_detail_add_rs(id) {
      swal({
         title: 'Hapus Rumah Sakit',
         text: "Apakah Anda yakin menghapus rumah sakit ini ?",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         cancelButtonText: "Batal",
         confirmButtonText: 'Ya, Hapus !'
      }).then((result) => {
         if (result.value) {
            $.ajax({
               success: function(data, textStatus, xhr) {
                  swal(
                     'Berhasil!',
                     'Rumah Sakit dihapus',
                     'success'
                  )

                  $('#rs_' + id).remove()

                  $.each(arr_detail_add_rs, function(indexa, valuea) {
                     if (id == valuea.iddetail) {
                        cc = indexa
                     }
                  });

                  Array.prototype.remove = function(indexcc) {
                     this.splice(indexcc, 1);
                  }

                  arr_detail_add_rs.remove(cc)

                  var s_detail = [];

                  arr_detail_add_rs.map((val, index) => {
                     s_detail.push(val)
                  })
                  arr_detail_add_rs = s_detail
                  arr_detail_add_rs_x.detail = s_detail;

                  $('#data_rs').val('')
                  $('#data_rs').val(JSON.stringify(arr_detail_add_rs_x))
               }
            });
         }
      })
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

   //klinik
   function edit_data_klinik(id, no_permohonan) {
      $.ajax({
         url: url_api_x + "PermohonanKlinik(" + id + ")",
         type: 'GET',
         beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
         },
         dataType: 'json',
         success: function(data, textStatus, xhr) {
            edit_klinik(data, no_permohonan, id)
         },
         error: function(xhr, textStatus, errorThrown) {
            console.log('Error in Operation');
         }
      });
   }

   function edit_klinik(data, no_permohonan, permohonanId) {
      let source = $("#edit-data-klinik").html();
      let template = Handlebars.compile(source);
      data.permohonanId = permohonanId
      data.no_permohonan = no_permohonan
      $.each(data.value, function(i, v) {
         data.value[i].no_permohonan = no_permohonan
      });
      $('#load-data').html(template(data));
      $('#zero_config_klinik').DataTable({
         "scrollY": '100vh',
         "scrollX": true,
      });

      $('#page-title-klinik').html('Data Klinik Nomor Permohonan (' + no_permohonan + ')')
      $('#page-title').html('Klinik')
      $('#refresh-page').html(`<button onclick="edit_data_klinik('${permohonanId}','${no_permohonan}')" type="button" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fas fa-redo"></i> Segarkan Halaman</button>`)

      $('#new-breadcrumb').remove()
      $("#list-breadcrumb").append(`<li class="breadcrumb-item" id="new-breadcrumb"><a href="javascript:void(0)">Klinik</a></li>`)
   }

   function edit_data_klinik_permohonan(id, id_permohonan, no_permohonan) {
      $.ajax({
         url: url_api_x + "PermohonanKlinik(" + id_permohonan + ")",
         type: 'GET',
         beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
         },
         dataType: 'json',
         success: function(data, textStatus, xhr) {
            let data_klinik = [];
            $.each(data.value, function(i, v) {
               if (v.id == id) {
                  data_klinik = v
               }
            });
            edit_klinik_permohonan(data_klinik, no_permohonan)
         },
         error: function(xhr, textStatus, errorThrown) {
            console.log('Error in Operation');
         }
      });
   }

   function edit_klinik_permohonan(data, no_permohonan) {
      let source = $("#edit-data-klinik-permohonan").html();
      let template = Handlebars.compile(source);
      data.no_permohonan = no_permohonan

      $('#load-data').html(template(data));

      $.ajax({
         url: url_api + 'Provinsi',
         type: 'GET',
         beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
         },
         dataType: 'json',
         success: function(datax, textStatus, xhr) {
            $.each(datax.value, function(i, v) {
               $('select[name="provinsiId"]').append("<option value='" + v.id + "'>" + v.name + "</option>")
            });
            $('#provinsiId').select2()
            $("#provinsiId option").removeAttr('selected');
            $('#provinsiId').val(data.provinsiId).trigger('change');
         },
         error: function(xhr, textStatus, errorThrown) {
            console.log('Error in Operation');
         }
      });
   }

   function add_data_klinik(id, no_permohonan) {
      let source = $("#add-data-klinik-permohonan").html();
      let template = Handlebars.compile(source);
      let data = []
      data.no_permohonan = no_permohonan
      data.permohonanId = id

      $('#load-data').html(template(data));

      $.ajax({
         url: url_api + 'Provinsi',
         type: 'GET',
         beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
         },
         dataType: 'json',
         success: function(datax, textStatus, xhr) {
            $.each(datax.value, function(i, v) {
               $('select[name="provinsiId"]').append("<option value='" + v.id + "'>" + v.name + "</option>")
            });
            $('#provinsiId').select2()
         },
         error: function(xhr, textStatus, errorThrown) {
            console.log('Error in Operation');
         }
      });
   }

   function data_save_klinik(e) {
      e.preventDefault();
      var data = $('#data-add-klinik').serializeFormJSON();
      let no_permohonan = $('#no_permohonan').val()
      data.permohonanId = parseInt(data.permohonanId)
      let add_klinik = {};
      var add_detail_klinik = [];
      add_detail_klinik.push(data)
      add_klinik.klinik = add_detail_klinik
      add_klinik.permohonanId = data.permohonanId
      $.ajax({
         url: url_api_x + 'PermohonanKlinik',
         type: 'POST',
         beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
         },
         data: JSON.stringify(add_klinik),
         contentType: 'application/json',
         success: function(datax, textStatus, xhr) {
            if (xhr.status == '204' || xhr.status == '201') {
               edit_data_klinik('' + data.permohonanId + '', '' + no_permohonan + '');
               toastr.success("Tambah Klinik", 'Berhasil!');
            } else {
               toastr.error("Tambah Klinik", 'Gagal!');
            }
         },
         error: function(xhr, textStatus, errorThrown) {
            console.log('Error in Operation');
         }
      });
   }

   function update_data_klinik(e) {
      e.preventDefault();
      var data = $('#data-update-klinik').serializeFormJSON();
      data.permohonanId = parseInt(data.permohonanId)
      data.id = parseInt(data.id)
      data.provinsiId = parseInt(data.provinsiId)
      let id_klinik = data.id
      let no_permohonan = $('#no_permohonan').val()
      let update_klinik = {};
      var update_detail_add = [];
      update_detail_add.push(data)
      update_klinik.permohonanId = data.permohonanId
      update_klinik.klinik = update_detail_add

      $.ajax({
         url: url_api_x + "PermohonanKlinik(" + id_klinik + ")",
         type: 'PUT',
         beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
         },
         data: JSON.stringify(update_klinik),
         contentType: 'application/json',
         success: function(datax, textStatus, xhr) {
            if (xhr.status == '204' || xhr.status == '200') {
               edit_data_klinik('' + data.permohonanId + '', '' + no_permohonan + '');
               toastr.success("Memperbarui Klinik", 'Berhasil!');
            } else {
               toastr.error("Memperbarui Klinik", 'Gagal!');
            }
         },
         error: function(xhr, textStatus, errorThrown) {
            console.log('Error in Operation');
         }
      });

   }

   function delete_data_klinik_permohonan(id, id_permohonan) {
      swal({
         title: 'Hapus Klinik',
         text: "Apakah Anda yakin menghapus klinik ini ?",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         cancelButtonText: "Batal",
         confirmButtonText: 'Ya, Hapus !'
      }).then((result) => {
         if (result.value) {
            let delete_klinik = {};
            let delete_detail_klinik = [];
            id = parseInt(id)
            id_permohonan = parseInt(id_permohonan)
            delete_detail_klinik.push({
               "id": id,
               "permohonanId": id_permohonan
            })
            delete_klinik.klinik = delete_detail_klinik
            delete_klinik.permohonanId = id_permohonan
            $.ajax({
               url: url_api_x + 'PermohonanKlinik(' + id + ')',
               type: 'DELETE',
               beforeSend: function(xhr) {
                  xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
               },
               data: JSON.stringify(delete_klinik),
               contentType: 'application/json',
               success: function(data, textStatus, xhr) {
                  if (xhr.status == '204') {
                     swal(
                        'Berhasil!',
                        'Klinik dihapus',
                        'success'
                     )
                     $('#rowKlinik_' + id).remove()
                  } else {
                     swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Gagal Delete Klinik'
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

   //rs
   function edit_data_rs(id, no_permohonan) {
      $.ajax({
         url: url_api_x + "PermohonanRumahSakit(" + id + ")",
         type: 'GET',
         beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
         },
         dataType: 'json',
         success: function(data, textStatus, xhr) {
            edit_rs(data, no_permohonan, id)
         },
         error: function(xhr, textStatus, errorThrown) {
            console.log('Error in Operation');
         }
      });
   }

   function edit_rs(data, no_permohonan, permohonanId) {
      let source = $("#edit-data-rs").html();
      let template = Handlebars.compile(source);
      data.permohonanId = permohonanId
      data.no_permohonan = no_permohonan
      $.each(data.value, function(i, v) {
         data.value[i].no_permohonan = no_permohonan
      });
      $('#load-data').html(template(data));
      $('#zero_config_rs').DataTable({
         "scrollY": '100vh',
         "scrollX": true,
      });

      $('#page-title-rs').html('Data Rumah Sakit Nomor Permohonan (' + no_permohonan + ')')
      $('#page-title').html('Rumah Sakit')
      $('#refresh-page').html(`<button onclick="edit_data_rs('${permohonanId}','${no_permohonan}')" type="button" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fas fa-redo"></i> Segarkan Halaman</button>`)

      $('#new-breadcrumb').remove()
      $("#list-breadcrumb").append(`<li class="breadcrumb-item" id="new-breadcrumb"><a href="javascript:void(0)">Rumah Sakit</a></li>`)
   }

   function edit_data_rs_permohonan(id, id_permohonan, no_permohonan) {
      $.ajax({
         url: url_api_x + "PermohonanRumahSakit(" + id_permohonan + ")",
         type: 'GET',
         beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
         },
         dataType: 'json',
         success: function(data, textStatus, xhr) {
            let data_rs = [];
            $.each(data.value, function(i, v) {
               if (v.id == id) {
                  data_rs = v
               }
            });
            edit_rs_permohonan(data_rs, no_permohonan)
         },
         error: function(xhr, textStatus, errorThrown) {
            console.log('Error in Operation');
         }
      });
   }

   function edit_rs_permohonan(data, no_permohonan) {
      let source = $("#edit-data-rs-permohonan").html();
      let template = Handlebars.compile(source);
      data.no_permohonan = no_permohonan

      $('#load-data').html(template(data));

      $.ajax({
         url: url_api + 'Provinsi',
         type: 'GET',
         beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
         },
         dataType: 'json',
         success: function(datax, textStatus, xhr) {
            $.each(datax.value, function(i, v) {
               $('select[name="provinsiId"]').append("<option value='" + v.id + "'>" + v.name + "</option>")
            });
            $('#provinsiId').select2()
            $("#provinsiId option").removeAttr('selected');
            $('#provinsiId').val(data.provinsiId).trigger('change');
         },
         error: function(xhr, textStatus, errorThrown) {
            console.log('Error in Operation');
         }
      });
   }

   function add_data_rs(id, no_permohonan) {
      let source = $("#add-data-rs-permohonan").html();
      let template = Handlebars.compile(source);
      let data = []
      data.no_permohonan = no_permohonan
      data.permohonanId = id

      $('#load-data').html(template(data));

      $.ajax({
         url: url_api + 'Provinsi',
         type: 'GET',
         beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
         },
         dataType: 'json',
         success: function(datax, textStatus, xhr) {
            $.each(datax.value, function(i, v) {
               $('select[name="provinsiId"]').append("<option value='" + v.id + "'>" + v.name + "</option>")
            });
            $('#provinsiId').select2()
         },
         error: function(xhr, textStatus, errorThrown) {
            console.log('Error in Operation');
         }
      });
   }

   function data_save_rs(e) {
      e.preventDefault();
      var data = $('#data-add-rs').serializeFormJSON();
      let no_permohonan = $('#no_permohonan').val()
      data.permohonanId = parseInt(data.permohonanId)
      let add_rs = {};
      var add_detail_rs = [];
      add_detail_rs.push(data)
      add_rs.rumahSakit = add_detail_rs
      add_rs.permohonanId = data.permohonanId
      $.ajax({
         url: url_api_x + 'PermohonanRumahSakit',
         type: 'POST',
         beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
         },
         data: JSON.stringify(add_rs),
         contentType: 'application/json',
         success: function(datax, textStatus, xhr) {
            if (xhr.status == '204' || xhr.status == '201') {
               edit_data_rs('' + data.permohonanId + '', '' + no_permohonan + '');
               toastr.success("Tambah Rumah Sakit", 'Berhasil!');
            } else {
               toastr.error("Tambah Rumah Sakit", 'Gagal!');
            }
         },
         error: function(xhr, textStatus, errorThrown) {
            console.log('Error in Operation');
         }
      });
   }

   function update_data_rs(e) {
      e.preventDefault();
      var data = $('#data-update-rs').serializeFormJSON();
      data.permohonanId = parseInt(data.permohonanId)
      data.id = parseInt(data.id)
      data.provinsiId = parseInt(data.provinsiId)
      let id_rs = data.id
      let no_permohonan = $('#no_permohonan').val()
      let update_rs = {};
      var update_detail_add = [];
      update_detail_add.push(data)
      update_rs.permohonanId = data.permohonanId
      update_rs.rumahSakit = update_detail_add

      $.ajax({
         url: url_api_x + "PermohonanRumahSakit(" + id_rs + ")",
         type: 'PUT',
         beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
         },
         data: JSON.stringify(update_rs),
         contentType: 'application/json',
         success: function(datax, textStatus, xhr) {
            if (xhr.status == '204' || xhr.status == '200') {
               edit_data_rs('' + data.permohonanId + '', '' + no_permohonan + '');
               toastr.success("Memperbarui Rumah Sakit", 'Berhasil!');
            } else {
               toastr.error("Memperbarui Rumah Sakit", 'Gagal!');
            }
         },
         error: function(xhr, textStatus, errorThrown) {
            console.log('Error in Operation');
         }
      });

   }

   function delete_data_rs_permohonan(id, id_permohonan) {
      swal({
         title: 'Hapus Rumah Sakit',
         text: "Apakah Anda yakin menghapus rumah sakit ini ?",
         type: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         cancelButtonText: "Batal",
         confirmButtonText: 'Ya, Hapus !'
      }).then((result) => {
         if (result.value) {
            let delete_rs = {};
            let delete_detail_rs = [];
            id = parseInt(id)
            id_permohonan = parseInt(id_permohonan)
            delete_detail_rs.push({
               "id": id,
               "permohonanId": id_permohonan
            })
            delete_rs.rumahSakit = delete_detail_rs
            delete_rs.permohonanId = id_permohonan
            $.ajax({
               url: url_api_x + 'PermohonanRumahSakit(' + id + ')',
               type: 'DELETE',
               beforeSend: function(xhr) {
                  xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
               },
               data: JSON.stringify(delete_rs),
               contentType: 'application/json',
               success: function(data, textStatus, xhr) {
                  if (xhr.status == '204') {
                     swal(
                        'Berhasil!',
                        'Rumah Sakit dihapus',
                        'success'
                     )
                     $('#rowRs_' + id).remove()
                  } else {
                     swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Gagal Delete Rumah Sakit'
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
