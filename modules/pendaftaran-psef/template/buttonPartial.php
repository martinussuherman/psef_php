<?php
function buttonAjukan()
{
?>
  <button type="button" class="btn btn-rounded btn-success" onclick="ajukan_permohonan('{{data_permohonan.id}}')">
    Ajukan Permohonan
  </button>
<?php
}

function buttonSetujuiKembalikan()
{
?>
  <button type="button" class="btn btn-rounded btn-success" onclick="process_data('{{data_permohonan.id}}')">
    Setujui
  </button>

  <button type="button" class="btn btn-rounded btn-warning" onclick="reject_data('{{data_permohonan.id}}')">
    Kembalikan
  </button>
<?php
}

function buttonProsesData()
{
?>
  <button type="button" class="btn btn-rounded btn-success" onclick="process_data('{{data_permohonan.id}}')">
    Proses Data
  </button>
<?php
}
?>
