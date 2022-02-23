<?php
session_start();
$showAddData = true;
$extraActions = 'ajukan';
$pageTitle = 'Permohonan (Rumusan)';
include('template.php');
include('../template/add_permohonan.php');
include('../template/edit_permohonan.php');

include('../template/add_apotek.html');
include('../template/edit_apotek.html');
include('../template/view_apotek.html');
include('../template/modal_apotek.html');

include('../template/add_rumah_sakit.html');
include('../template/edit_rumah_sakit.html');
include('../template/view_rumah_sakit.html');
include('../template/modal_rumah_sakit.html');

include('../template/modal_pakta.html');
include('apotek_script.html');
include('rumah_sakit_script.html');
include('edit_permohonan_script.php');
?>

<script>
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
      $('.btn-open-modal').click();
      $('#title-modal').html('Tambah Apotek');

      if (cek_open == 0) {
        $.ajax({
          url: `${apiServerUrl}/api/v1/Provinsi`,
          type: 'GET',
          beforeSend: function(xhr) {
            setAuthHeader(xhr, accesstoken);
          },
          dataType: 'json',
          success: function(data, textStatus, xhr) {
            $.each(data.value, function(i, v) {
              $('#provinsiIdApotek').append("<option value='" + v.id + "'>" + v.name + "</option>");
            });

            $('#provinsiIdApotek').select2({
              dropdownParent: $('#myModal')
            });
          },
          error: function(xhr, textStatus, errorThrown) {
            console.log('Error in Operation');
          }
        });

        cek_open = 1;
      }
    });

    $('.btn-trigger-modal-klinik').click(function() {
      $('.btn-open-modal-klinik').click();
      $('#title-modal-klinik').html('Tambah Klinik');

      if (cek_open_klinik == 0) {
        $.ajax({
          url: `${apiServerUrl}/api/v1/Provinsi`,
          type: 'GET',
          beforeSend: function(xhr) {
            setAuthHeader(xhr, accesstoken);
          },
          dataType: 'json',
          success: function(data, textStatus, xhr) {
            $.each(data.value, function(i, v) {
              $('#provinsiIdKlinik').append("<option value='" + v.id + "'>" + v.name + "</option>");
            });

            $('#provinsiIdKlinik').select2({
              dropdownParent: $('#myModalKlinik')
            });
          },
          error: function(xhr, textStatus, errorThrown) {
            console.log('Error in Operation');
          }
        });

        cek_open_klinik = 1;
      }
    });

    $('.btn-trigger-modal-rs').click(function() {
      $('.btn-open-modal-rs').click();
      $('#title-modal-rs').html('Tambah Rumah Sakit');

      if (cek_open_rs == 0) {
        $.ajax({
          url: `${apiServerUrl}/api/v1/Provinsi`,
          type: 'GET',
          beforeSend: function(xhr) {
            setAuthHeader(xhr, accesstoken);
          },
          dataType: 'json',
          success: function(data, textStatus, xhr) {
            $.each(data.value, function(i, v) {
              $('#provinsiIdRs').append("<option value='" + v.id + "'>" + v.name + "</option>");
            });

            $('#provinsiIdRs').select2({
              dropdownParent: $('#myModalRs')
            });
          },
          error: function(xhr, textStatus, errorThrown) {
            console.log('Error in Operation');
          }
        });

        cek_open_rs = 1;
      }
    })

    uploadHandler(false);

    let val_modal_pakta = '';

    $('#modal-pakta').modal('show');
    $("#modal-pakta-setuju").click(function() {
      val_modal_pakta = 'setuju';
    });

    $('#modal-pakta').on('hidden.bs.modal', function() {
      if (val_modal_pakta != 'setuju') {
        viewRouting();
      }
    })
  }

  function data_save(event) {
    let form = event.target;
    form.classList.add('was-validated');
    event.preventDefault();

    if (form.checkValidity() === false) {
      event.stopPropagation();
      scrollToTop();
      return false;
    }

    var data = $('#add-data-new').serializeFormJSON();
    data.typeId = 1;
    console.log(data);

    let detail_data_save
    let detail_data_save_klinik
    let detail_data_save_rs

    if (data.data != '') {

      if (data.data != '{"detail":[]}') {
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
      url: `${apiServerUrl}/api/v0.1/PermohonanCurrentUser`,
      type: 'POST',
      beforeSend: function(xhr) {
        setAuthHeader(xhr, accesstoken);
      },
      data: JSON.stringify(data),
      contentType: 'application/json',
      success: function(datax, textStatus, xhr) {
        if (detail_data_save !== undefined) {
          $.each(detail_data_save.detail, function(indexa, valuea) {
            detail_data_save.detail[indexa].permohonanId = datax.id;
            delete detail_data_save.detail[indexa].iddetail;
          });

          detail_data_save.apotek = detail_data_save.detail;
          delete detail_data_save.detail;
          detail_data_save.permohonanId = datax.id;

          $.ajax({
            url: `${apiServerUrl}/api/v0.1/PermohonanApotek`,
            type: 'POST',
            beforeSend: function(xhr) {
              setAuthHeader(xhr, accesstoken);
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
            detail_data_save_klinik.detail[indexa].permohonanId = datax.id;
            delete detail_data_save_klinik.detail[indexa].iddetail;
          });

          detail_data_save_klinik.klinik = detail_data_save_klinik.detail;
          delete detail_data_save_klinik.detail;
          detail_data_save_klinik.permohonanId = datax.id;

          $.ajax({
            url: `${apiServerUrl}/api/v0.1/PermohonanKlinik`,
            type: 'POST',
            beforeSend: function(xhr) {
              setAuthHeader(xhr, accesstoken);
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
            detail_data_save_rs.detail[indexa].permohonanId = datax.id;
            delete detail_data_save_rs.detail[indexa].iddetail;
          });

          detail_data_save_rs.rumahSakit = detail_data_save_rs.detail;
          delete detail_data_save_rs.detail;
          detail_data_save_rs.permohonanId = datax.id;

          $.ajax({
            url: `${apiServerUrl}/api/v0.1/PermohonanRumahSakit`,
            type: 'POST',
            beforeSend: function(xhr) {
              setAuthHeader(xhr, accesstoken);
            },
            data: JSON.stringify(detail_data_save_rs),
            contentType: 'application/json',
            success: function(datac, textStatus, xhrx) {
            },
            error: function(xhr, textStatus, errorThrown) {
              console.log('Error in Operation');
            }
          });

          // submitFormData(
          //   `${apiServerUrl}/api/v0.1/PermohonanRumahSakit`,
          //   "POST",
          //   accesstoken,
          //   JSON.stringify(detail_data_save_rs));
        }

        viewRouting();
      },
      error: function(xhr, textStatus, errorThrown) {
        console.log('Error in Operation');
      }
    });
  }

  function savePermohonan(event) {
    let form = event.target;
    form.classList.add('was-validated');
    event.preventDefault();

    if (form.checkValidity() === false) {
      displayErrorToastr("Isian Permohonan", "Isian Permohonan belum lengkap, mohon cek kembali");
      event.stopPropagation();
      scrollToTop();
      return false;
    }

    let data = getFormData("#add-data-new");
    data.typeId = 1;

    let dataApotek = data.data != "" ? JSON.parse(data.data)?.detail : undefined;
    let dataKlinik = data_klinik.data != "" ? JSON.parse(data.data_klinik)?.detail : undefined;
    let dataRumahSakit = data.data_rs != "" ? JSON.parse(data.data_rs)?.detail : undefined;

    delete data.data;
    delete data.data_klinik;
    delete data.data_rs;

    let url = `${apiServerUrl}/api/v0.1/PermohonanCurrentUser`;
    let request = submitFormData(url, "POST", accesstoken, JSON.stringify(data), ".preloader");

    request.done(
      function(dataPermohonan, textStatus, xhr) {
        savePermohonanSub(
          `${apiServerUrl}/api/v0.1/PermohonanApotek`,
          accesstoken,
          dataPermohonan,
          dataApotek);

        savePermohonanSub(
          `${apiServerUrl}/api/v0.1/PermohonanKlinik`,
          accesstoken,
          dataPermohonan,
          dataKlinik);

        savePermohonanSub(
          `${apiServerUrl}/api/v0.1/PermohonanRumahSakit`,
          accesstoken,
          dataPermohonan,
          dataRumahSakit);

        displayRequestSuccessToastr(xhr, "Simpan Permohonan", "Permohonan berhasil disimpan", "Permohonan gagal disimpan");
        viewRouting();
      }
    );
  }
</script>
