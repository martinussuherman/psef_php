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

</script>
