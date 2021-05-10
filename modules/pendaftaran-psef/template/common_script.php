<script>
  function emptyStringIfUndefined(string) {
    if (string == undefined) {
      return "";
    }

    return string;
  }

  function fileNameFromUrl(url) {
    if (url == undefined) {
      return "";
    }

    let splitUrl = url.split("/");
    return splitUrl[splitUrl.length - 1];
  }

  function updateDataPermohonan(dataPermohonan) {
    dataPermohonan.straExpiry = moment(dataPermohonan.straExpiry).format("YYYY-MM-DD");
    dataPermohonan.name_straUrl = fileNameFromUrl(dataPermohonan.straUrl);
    dataPermohonan.name_suratPermohonanUrl = fileNameFromUrl(dataPermohonan.suratPermohonanUrl);
    dataPermohonan.name_prosesBisnisUrl = fileNameFromUrl(dataPermohonan.prosesBisnisUrl);
    dataPermohonan.name_dokumenApiUrl = fileNameFromUrl(dataPermohonan.dokumenApiUrl);
    dataPermohonan.name_dokumenPseUrl = fileNameFromUrl(dataPermohonan.dokumenPseUrl);
    dataPermohonan.name_spplUrl = fileNameFromUrl(dataPermohonan.spplUrl);
    dataPermohonan.name_izinLokasiUrl = fileNameFromUrl(dataPermohonan.izinLokasiUrl);
    dataPermohonan.name_imbUrl = fileNameFromUrl(dataPermohonan.imbUrl);
    dataPermohonan.name_pembayaranPnbpUrl = fileNameFromUrl(dataPermohonan.pembayaranPnbpUrl);
  }

  function progressPermohonanFromStatus(statusId) {
    switch (statusId) {
      case 4:
        return 1;
      case 6:
        return 2;
      case 8:
        return 3;
      case 5:
      case 10:
        return 4;
      case 7:
      case 12:
        return 5;
      case 9:
        return 6;
      case 11:
        return 7;
      case 13:
        return 9;
    }

    return statusId;
  }

  function displayApotekData(dataApotek) {
    if (dataApotek == undefined) {
      return;
    }

    $.each(dataApotek.value, function(index, value) {
      $(".detail-item").append(`
        <tr>
          <td>${index + 1}</td>
          <td>${value.name}</td>
          <td>${value.siaNumber}</td>
          <td>${value.apotekerName}</td>
          <td>${value.straNumber}</td>
          <td>${value.sipaNumber}</td>
          <td>${value.address}</td>
          <td>${value.provinsiName}</td>
        </tr>`);
    });
  }

  function displayKlinikData(dataKlinik) {
    if (dataKlinik == undefined) {
      return;
    }

    $.each(dataKlinik.value, function(index, value) {
      $(".detail-item-klinik").append(`
        <tr>
          <td>${index + 1}</td>
          <td>${value.name}</td>
          <td>${value.apotekerName}</td>
          <td>${value.straNumber}</td>
          <td>${value.sipaNumber}</td>
          <td>${value.address}</td>
          <td>${value.provinsiName}</td>
        </tr>`);
    });
  }

  function displayRumahSakitData(dataRumahSakit) {
    if (dataRumahSakit == undefined) {
      return;
    }

    $.each(dataRumahSakit.value, function(index, value) {
      $(".detail-item-rs").append(`
        <tr>
          <td>${index + 1}</td>
          <td>${value.name}</td>
          <td>${value.apotekerName}</td>
          <td>${value.straNumber}</td>
          <td>${value.sipaNumber}</td>
          <td>${value.address}</td>
          <td>${value.provinsiName}</td>
        </tr>`);
    });
  }

  function displayPermohonanProgress(dataPermohonan) {
    $('#stepbar').stepbar({
      items: ["Pemohon", "Verifikasi", "KaSi", "KaSubDit", "DirYanFar", "Dirjen", "Finalisasi", "Selesai"],
      color: '#D2DC02',
      fontColor: '#000',
      selectedColor: '#16B3AC',
      selectedFontColor: '#fff',
      current: progressPermohonanFromStatus(dataPermohonan.statusId)
    });
  }

  function loadOssData(dataPemohon, apiUrl, token) {
    if (dataPemohon == undefined || dataPemohon.nib == undefined) {
      return;
    }

    $.ajax({
      url: `${apiUrl}OssInfo/OssFullInfo?id=${dataPemohon.nib }`,
      type: 'GET',
      beforeSend: function(xhr) {
        xhr.setRequestHeader('Authorization', 'Bearer ' + token + '');
      },
      dataType: 'json',
      success: function(data, textStatus, xhr) {
        if (data.keterangan == "Data NIB tidak ditemukan" ||
          data.keterangan == "NIB harus 13 karakter." ||
          data.keterangan == "Api Key tidak valid") {
          $("#cek_nib").css("color", "red");
          $('#cek_nib').html('Data NIB Tidak di Temukan');
          $("#nib").removeClass("form-control is-valid").addClass("form-control is-invalid");
          $('#status_nib').val(0);
          return;
        }

        $("#cek_nib").css("color", "green");
        $('#cek_nib').html(`
          Data NIB Dapat di Gunakan<br>
          <a onclick="detail_nib(${dataPemohon.nib})" style="color:blue;text-decoration: underline;cursor: pointer;">
            Periksa Detail NIB
          </a>`);
        $("#nib").removeClass("form-control is-invalid").addClass("form-control is-valid");
        $('#status_nib').val(1);
        $('#nib_view').append(`
          <table class="table table-bordered">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nama Perusahaan</th>
                <th scope="col">NIB</th>
                <th scope="col">NPWP Perusahaan</th>
                <th scope="col">Nomor Telepon Perusahaan</th>
                <th scope="col">Alamat Perusahaan</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>${data.namaPerseroan}</th>
                <th>${data.nib}</th>
                <th>${data.npwpPerseroan}</th>
                <th>${data.nomorTelponPerseroan}</th>
                <th>${data.alamatPerseroan}</th>
              </tr>
            </tbody>
          </table>`);
      },
      error: function(xhr, textStatus, errorThrown) {}
    });
  }

  function loadPermohonanHistory(permohonanId, apiUrl, token) {
    $.ajax({
      url: `${apiUrl}HistoryPermohonan/ByPermohonan(permohonanId=${permohonanId})`,
      type: 'GET',
      beforeSend: function(xhr) {
        xhr.setRequestHeader('Authorization', 'Bearer ' + token + '');
      },
      dataType: 'json',
      success: function(historyList, textStatus, xhr) {
        $.each(historyList.value, function(index, history) {
          $(".detail-history").append(`
            <tr>
              <td>${moment(history.updatedAt).format("YYYY-MM-DD, HH:mm:ss")}</td>
              <td>${history.updatedBy}</td>
              <td>${history.statusName}</td>
              <td>${history.reason}</td>
            </tr>`);
        });
      },
      error: function(xhr, textStatus, errorThrown) {
        console.log('Error in Operation');
      }
    });
  }

  function permohonanKembalikan(permohonanId, apiUrl, token) {
    Swal.mixin({
      input: 'text',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: "Batal",
      confirmButtonText: 'Ya'
    }).queue([{
      title: 'Kembalikan Permohonan ?',
      text: 'Mohon isi catatan'
    }]).then((result) => {
      if (!result.value) {
        return;
      }

      $.ajax({
        url: apiUrl,
        type: 'POST',
        data: JSON.stringify({
          reason: result.value[0],
          permohonanId: parseInt(id)
        }),
        beforeSend: function(xhr) {
          xhr.setRequestHeader('Authorization', 'Bearer ' + token + '');
        },
        contentType: 'application/json',
        success: function(data, textStatus, xhr) {
          if (xhr.status == '204') {
            viewRouting();
            toastr.success("Permohonan di Kembalikan", 'Berhasil!');
            return;
          }

          toastr.error("Permohonan di Kembalikan", 'Gagal!');
        },
        error: function(xhr, textStatus, errorThrown) {
          console.log('Error in Operation');
        }
      });
    });
  }

  function permohonanSetujui(permohonanId, apiUrl, token) {
    swal({
      title: 'Penyetujuan Permohonan',
      text: "Apakah anda yakin ingin menyetujui permohonan ini ?",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Ajukan !',
      cancelButtonText: "Batal",
    }).then((result) => {
      if (!result.value) {
        return;
      }

      $.ajax({
        url: apiUrl,
        type: 'POST',
        beforeSend: function(xhr) {
          xhr.setRequestHeader('Authorization', 'Bearer ' + token + '');
        },
        data: JSON.stringify({
          'permohonanId': parseInt(permohonanId)
        }),
        contentType: 'application/json',
        success: function(data, textStatus, xhr) {
          if (xhr.status == '204') {
            swal(
              'Berhasil!',
              'Permohonan di Setujui',
              'success'
            );

            viewRouting();
            return;
          }

          swal({
            type: 'error',
            title: 'Oops...',
            text: 'Permohonan Gagal di Setujui'
          });
        },
        error: function(xhr, textStatus, errorThrown) {
          console.log('Error in Operation');
        }
      });
    })
  }
</script>
