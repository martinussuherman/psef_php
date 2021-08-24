<!-- Template for view -->
<script id="view-data" type="text/x-handlebars-template">
  <h4 class="card-title">
    Detail Data Permohonan
  </h4>

  <form class="m-t-30">
    <?php
    if (isset($isKemkesView)) {
      include('view_permohonan_kemkes.php');
    }

    include('buttonPartial.php');
    include('../../template/view_data_permohonan.php');
    include('../../template/view_dokumen.php');
    include('../../template/table_apotek.php');
    // include('../../template/table_klinik.php');
    include('../../template/table_rumah_sakit.php');

    if (isset($showRekamJejak)) {
      include('../../template/table_rekam_jejak.php');
    }
    ?>

    <div id="alasan-dikembalikan" class="row d-none">
      <div class="col">
        <h4 class="card-title text-danger">Alasan Dikembalikan</h4>
        <p class="text-danger">
        </p>
      </div>
    </div>

    <button type="button" class="btn btn-danger" onclick="viewRouting()">Kembali</button>

    <?php
    if ($extraActions == 'ajukan') {
      buttonAjukan();
    }

    if ($extraActions == 'setujui') {
      buttonSetujuiKembalikan();
    }

    if ($extraActions == 'validasi') {
      buttonProsesData();
    }
    ?>
  </form>
</script>
