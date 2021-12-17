<script>
  function edit_data_permohonan(id) {
    $.ajax({
      url: url_api_x + "PermohonanCurrentUser(" + id + ")",
      type: 'GET',
      beforeSend: function (xhr) {
        xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
      },
      dataType: 'json',
      success: function (data, textStatus, xhr) {
        edit_permohonan(data)
      },
      error: function (xhr, textStatus, errorThrown) {
        console.log('Error in Operation');
      }
    });
  }

  function edit_permohonan(data) {
    let source = $("#edit-data").html();
    let template = Handlebars.compile(source);

    transformDataPermohonan(data);
    $('#load-data').html(template(data));

    $('#v-straUrl').val(data.straUrl)
    $('#v-suratPermohonanUrl').val(data.suratPermohonanUrl)
    $('#v-prosesBisnisUrl').val(data.prosesBisnisUrl)
    $('#v-dokumenApiUrl').val(data.dokumenApiUrl)
    $('#v-dokumenPseUrl').val(data.dokumenPseUrl)
    $('#v-izinUsahaUrl').val(data.izinUsahaUrl)
    $('#v-komitmenKerjasamaApotekUrl').val(data.komitmenKerjasamaApotekUrl)
    $('#v-pernyataanKeaslianDokumenUrl').val(data.pernyataanKeaslianDokumenUrl);
    // $('#v-spplUrl').val(data.spplUrl)
    // $('#v-izinLokasiUrl').val(data.izinLokasiUrl)
    // $('#v-imbUrl').val(data.imbUrl)
    // $('#v-pembayaranPnbpUrl').val(data.pembayaranPnbpUrl)

    uploadHandler(true);
  }

  function update_data(event) {
    let form = event.target;
    form.classList.add('was-validated');
    event.preventDefault();

    if (form.checkValidity() === false) {
      event.stopPropagation();
      scrollToTop();
      return false;
    }

    var data = $('#data-update').serializeFormJSON();
    data.typeId = 1;
    data.pemohonId = parseInt(data.pemohonId)
    data.id = parseInt(data.id)
    let id_permohonan = data.id

    $.ajax({
      url: url_api_x + 'PermohonanCurrentUser(' + id_permohonan + ')',
      type: 'PATCH',
      beforeSend: function (xhr) {
        xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
      },
      data: JSON.stringify(data),
      contentType: 'application/json',
      success: function (data, textStatus, xhr) {
        if (xhr.status == '204' || xhr.status == '200') {
          viewRouting();
          toastr.success("Memperbarui Permohonan", 'Berhasil!');
        } else {
          toastr.error("Memperbarui Permohonan", 'Gagal!');
        }
      },
      error: function (xhr, textStatus, errorThrown) {
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
          beforeSend: function (xhr) {
            xhr.setRequestHeader('Authorization', 'Bearer ' + accesstoken + '');
          },
          data: JSON.stringify(data),
          contentType: 'application/json',
          success: function (data, textStatus, xhr) {
            if (xhr.status == '204') {
              swal(
                'Berhasil!',
                'Permohonan di Ajukan',
                'success'
              );

              viewRouting();
            } else {
              swal({
                type: 'error',
                title: 'Oops...',
                text: 'Permohonan Gagal di Ajukan'
              });
            }
          },
          error: function (xhr, textStatus, errorThrown) {
            console.log('Error in Operation');
          }
        });
      }
    })
  }
</script>
