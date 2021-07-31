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

  function userDaysColor(days) {
    if (days < 2) {
      return 'green';
    }

    if (days < 3) {
      return 'yellow';
    }

    if (days < 4) {
      return 'red';
    }

    return 'black';
  }

  function totalDaysColor(days) {
    if (days < 5) {
      return 'green';
    }

    if (days < 7) {
      return 'yellow';
    }

    if (days < 9) {
      return 'red';
    }

    return 'black';
  }

  function dayStatusHtml(dataPermohonan) {
    return `
    <p>${dataPermohonan.statusName}</p>
    <hr style="display: inline;border: 7px solid ${userDaysColor(dataPermohonan.userLevelDays)};">
      &nbsp;User Days : ${dataPermohonan.userLevelDays}
    </hr>
    <br><br>
    <hr style="display: inline;border: 7px solid ${totalDaysColor(dataPermohonan.totalDays)};">
      &nbsp;Total Days : ${dataPermohonan.totalDays}
    </hr>`;
  }

  function configureAjaxRequest(
    moduleName,
    searchedFields,
    numberOfSearchFields,
    sortFields,
    requestData) {
    let colNumber = requestData.order[0].column;
    let sortDirection = requestData.order[0].dir;

    let data = {
      fpage: (requestData.start + requestData.length) / requestData.length,
      frows: requestData.length,
      fsearch: requestData.search.value,
      forder: sortFields[colNumber],
      fsort: sortDirection,
      fmodul: moduleName,
      flsearch: searchedFields,
      ftots: numberOfSearchFields
    };

    return data;
  }

  function transformDataPermohonan(dataPermohonan) {
    dataPermohonan.straExpiry = moment(dataPermohonan.straExpiry).format("YYYY-MM-DD");
    dataPermohonan.name_straUrl = fileNameFromUrl(dataPermohonan.straUrl);
    dataPermohonan.name_suratPermohonanUrl = fileNameFromUrl(dataPermohonan.suratPermohonanUrl);
    dataPermohonan.name_prosesBisnisUrl = fileNameFromUrl(dataPermohonan.prosesBisnisUrl);
    dataPermohonan.name_dokumenApiUrl = fileNameFromUrl(dataPermohonan.dokumenApiUrl);
    dataPermohonan.name_dokumenPseUrl = fileNameFromUrl(dataPermohonan.dokumenPseUrl);
    dataPermohonan.name_izinUsahaUrl = fileNameFromUrl(dataPermohonan.izinUsahaUrl);
    dataPermohonan.name_komitmenKerjasamaApotekUrl = fileNameFromUrl(dataPermohonan.komitmenKerjasamaApotekUrl);
    dataPermohonan.name_pernyataanKeaslianDokumenUrl = fileNameFromUrl(dataPermohonan.pernyataanKeaslianDokumenUrl);
    // dataPermohonan.name_spplUrl = fileNameFromUrl(dataPermohonan.spplUrl);
    // dataPermohonan.name_izinLokasiUrl = fileNameFromUrl(dataPermohonan.izinLokasiUrl);
    // dataPermohonan.name_imbUrl = fileNameFromUrl(dataPermohonan.imbUrl);
    // dataPermohonan.name_pembayaranPnbpUrl = fileNameFromUrl(dataPermohonan.pembayaranPnbpUrl);
  }

  function transformDataPerizinan(dataPerizinan) {
    if (dataPerizinan == undefined) {
      return;
    }

    dataPerizinan.issuedAt = moment(dataPerizinan.issuedAt).format("YYYY-MM-DD");
    dataPerizinan.expiredAt = moment(dataPerizinan.expiredAt).format("YYYY-MM-DD");
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

  function loadAndDisplayOssData(dataPemohon, apiUrl, token) {
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

  function loadAndDisplayPermohonan(permohonanId, apiUrl, token) {
    loadPermohonan(permohonanId, apiUrl, token).done(function(dataPermohonan, textStatus, xhr) {
      let pemohonId = dataPermohonan.pemohonId;

      $.when(
        loadPemohon(pemohonId, apiUrl, token),
        loadPermohonanApotek(permohonanId, apiUrl, token),
        loadPermohonanKlinik(permohonanId, apiUrl, token),
        loadPermohonanRumahSakit(permohonanId, apiUrl, token),
      ).done(function(
        loadPemohonResult,
        loadApotekResult,
        loadKlinikResult,
        loadRumahSakitResult) {
        // Ref: https://api.jquery.com/jquery.when
        // loadApotekResult: [ data, statusText, jqXHR ]

        viewPermohonan(
          apiUrl,
          token,
          dataPermohonan,
          loadPemohonResult[0],
          undefined,
          loadApotekResult[0],
          loadKlinikResult[0],
          loadRumahSakitResult[0],
          true,
          true);
      });
    });
  }

  function loadAndDisplayPermohonanCurrentUser(permohonanId, apiUrl, token) {
    $.when(
      loadPermohonanCurrentUser(permohonanId, apiUrl, token),
      loadPermohonanApotek(permohonanId, apiUrl, token),
      loadPermohonanKlinik(permohonanId, apiUrl, token),
      loadPermohonanRumahSakit(permohonanId, apiUrl, token),
    ).done(function(
      loadPermohonanResult,
      loadApotekResult,
      loadKlinikResult,
      loadRumahSakitResult) {
      // Ref: https://api.jquery.com/jquery.when
      // loadApotekResult: [ data, statusText, jqXHR ]

      viewPermohonan(
        apiUrl,
        token,
        loadPermohonanResult[0],
        undefined,
        undefined,
        loadApotekResult[0],
        loadKlinikResult[0],
        loadRumahSakitResult[0],
        false,
        false);
    });
  }

  function loadAndDisplayPerizinan(permohonanId, perizinanId, apiUrl, token) {
    loadPermohonan(permohonanId, apiUrl, token).done(function(dataPermohonan, textStatus, xhr) {
      let pemohonId = dataPermohonan.pemohonId;

      $.when(
        loadPemohon(pemohonId, apiUrl, token),
        loadPerizinan(perizinanId, apiUrl, token),
        loadPermohonanApotek(permohonanId, apiUrl, token),
        loadPermohonanKlinik(permohonanId, apiUrl, token),
        loadPermohonanRumahSakit(permohonanId, apiUrl, token),
      ).done(function(
        loadPemohonResult,
        loadPerizinanResult,
        loadApotekResult,
        loadKlinikResult,
        loadRumahSakitResult) {
        // Ref: https://api.jquery.com/jquery.when
        // loadApotekResult: [ data, statusText, jqXHR ]

        viewPermohonan(
          apiUrl,
          token,
          dataPermohonan,
          loadPemohonResult[0],
          loadPerizinanResult[0],
          loadApotekResult[0],
          loadKlinikResult[0],
          loadRumahSakitResult[0],
          false,
          false);
      });
    });
  }

  function loadPermohonan(permohonanId, apiUrl, token) {
    return $.ajax({
      url: `${apiUrl}Permohonan(${permohonanId})`,
      type: 'GET',
      beforeSend: function(xhr) {
        xhr.setRequestHeader('Authorization', 'Bearer ' + token + '');
      },
      dataType: 'json'
    });
  }

  function loadPermohonanAlasanDikembalikan(permohonanId, apiUrl, token) {
    return $.ajax({
      url: `${apiUrl}PermohonanCurrentUser/AlasanDikembalikan?permohonanId=${permohonanId}`,
      type: 'GET',
      beforeSend: function(xhr) {
        xhr.setRequestHeader('Authorization', 'Bearer ' + token + '');
      },
      dataType: 'json'
    });
  }

  function loadPermohonanCurrentUser(permohonanId, apiUrl, token) {
    return $.ajax({
      url: `${apiUrl}PermohonanCurrentUser(${permohonanId})`,
      type: 'GET',
      beforeSend: function(xhr) {
        xhr.setRequestHeader('Authorization', 'Bearer ' + token + '');
      },
      dataType: 'json'
    });
  }

  function loadPermohonanApotek(permohonanId, apiUrl, token) {
    return $.ajax({
      url: `${apiUrl}PermohonanApotek(${permohonanId})`,
      type: 'GET',
      beforeSend: function(xhr) {
        xhr.setRequestHeader('Authorization', 'Bearer ' + token + '');
      },
      dataType: 'json',
    });
  }

  function loadPermohonanKlinik(permohonanId, apiUrl, token) {
    return $.ajax({
      url: `${apiUrl}PermohonanKlinik(${permohonanId})`,
      type: 'GET',
      beforeSend: function(xhr) {
        xhr.setRequestHeader('Authorization', 'Bearer ' + token + '');
      },
      dataType: 'json',
    });
  }

  function loadPermohonanRumahSakit(permohonanId, apiUrl, token) {
    return $.ajax({
      url: `${apiUrl}PermohonanRumahSakit(${permohonanId})`,
      type: 'GET',
      beforeSend: function(xhr) {
        xhr.setRequestHeader('Authorization', 'Bearer ' + token + '');
      },
      dataType: 'json',
    });
  }

  function loadPemohon(pemohonId, apiUrl, token) {
    return $.ajax({
      url: `${apiUrl}Pemohon(${pemohonId})`,
      type: 'GET',
      beforeSend: function(xhr) {
        xhr.setRequestHeader('Authorization', 'Bearer ' + token + '');
      },
      dataType: 'json',
    });
  }

  function loadPerizinan(perizinanId, apiUrl, token) {
    return $.ajax({
      url: `${apiUrl}Perizinan(${perizinanId})`,
      type: 'GET',
      beforeSend: function(xhr) {
        xhr.setRequestHeader('Authorization', 'Bearer ' + token + '');
      },
      dataType: 'json'
    });
  }

  function loadAndDisplayPermohonanHistory(permohonanId, apiUrl, token) {
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

  function viewPermohonan(
    apiUrl,
    token,
    dataPermohonan,
    dataPemohon,
    dataPerizinan,
    dataApotek,
    dataKlinik,
    dataRumahSakit,
    isDisplayHistory,
    isDisplayProgress) {
    let template = Handlebars.compile($("#view-data").html());
    let data = {
      data_permohonan: dataPermohonan,
      data_apotek: dataApotek,
      data_klinik: dataKlinik,
      data_rs: dataRumahSakit,
      data_pemohon: dataPemohon,
      data_izin: dataPerizinan
    };

    transformDataPermohonan(dataPermohonan);
    transformDataPerizinan(dataPerizinan);

    $('#load-data').html(template(data));

    displayApotekData(dataApotek);
    displayKlinikData(dataKlinik);
    displayRumahSakitData(dataRumahSakit);

    if (isDisplayProgress) {
      displayPermohonanProgress(dataPermohonan);
    }

    loadAndDisplayOssData(dataPemohon, apiUrl, token);

    if (isDisplayHistory) {
      loadAndDisplayPermohonanHistory(dataPermohonan.id, apiUrl, token);
    }
  }

  function permohonanKembalikan(permohonanId, apiUrl, token) {
    Swal.mixin({
      input: 'textarea',
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
          permohonanId: parseInt(permohonanId)
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

  function permohonanTandaDaftar(permohonanId, nik, passphrase, apiUrl, token) {
    $.ajax({
      url: apiUrl,
      type: 'POST',
      beforeSend: function(xhr) {
        xhr.setRequestHeader('Authorization', 'Bearer ' + token + '');
      },
      data: JSON.stringify({
        'permohonanId': parseInt(permohonanId),
        'nik': nik,
        'passphrase': passphrase
      }),
      contentType: 'application/json',
      success: function(data, textStatus, xhr) {
        if (xhr.status == 204) {
          Swal.fire(
            'Berhasil!',
            'Permohonan di Proses',
            'success'
          );

          viewRouting();
        } else {
          Swal.fire(
            'Oops...',
            'Permohonan Gagal di Proses',
            'error'
          );
        }
      },
      error: function(xhr, textStatus, errorThrown) {
        Swal.fire(
          'Gagal',
          `<p>Permohonan Gagal di Proses</p><p>${xhr.responseJSON.failureContent}</p>`,
          'error'
        );
      }
    });
  }

  function inputPassphrase(id, apiUrl, token) {
    Swal
      .fire({
        imageUrl: "https://psef.kemkes.go.id/assets/internal/logo-bsre.png",
        html: '<div class="form-group text-left">' +
          '<label class="control-label">Passphrase</label>' +
          '<input id="swal-input" type="password" class="form-control">' +
          "</div>",
        showCancelButton: true,
        focusConfirm: false,
        preConfirm: () => {
          return [
            document.getElementById("swal-input").value
          ];
        }
      })
      .then((result) => {
        if (result.isDismissed) {
          return;
        }

        let passphrase = result.value[0];

        permohonanTandaDaftar(id, '', passphrase, apiUrl, token);
      });
  }

  function scrollToTop() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  }
</script>
