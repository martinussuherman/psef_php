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
</script>
