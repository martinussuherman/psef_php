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

</script>
