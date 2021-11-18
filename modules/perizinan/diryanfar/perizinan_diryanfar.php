<?php
require_once("../template/template.php");
?>

<script>
    var accesstoken = <?php echo json_encode($_COOKIE['accesstoken']); ?>; 
    $(document).ready(function() { 
        $('#zero_config').on('xhr.dt', function ( e, settings, json, xhr ) {
            json.data = json.rows;
            json.recordsTotal = json.recordsFiltered = json.total;
        }).DataTable({
            "processing": true,
            "serverSide": true,
            "scrollY": '100vh',
            "scrollX": true,
            "ajax": {
            "url": url_api_php,
            "type": "POST",
            "dataSrc": function ( json ) {
                let data = [];

                for (let i = 0; i < json.data.length; i++) {
                  let action =`
                    <button onclick="view_data('${json.data[i].permohonanId}', '${json.data[i].id}')" class="btn btn-xs btn-block btn-info">
                      Lihat Detail Data
                    </button>
                    <a href="${json.data[i].tandaDaftarUrl}" target="_blank" class="btn btn-xs btn-block btn-success">
                      Unduh Tanda Daftar
                    </a>`;

                  data.push(dataTablePerizinanRow(json.data[i], action));
                }

                return data;
            },

            "data": function ( d ) {
              return configurePerizinanRequest(d);
            }
            }
        });
    });

    function viewRouting() {
      routing('perizinan_diryanfar');
    }

    function view_data(id, id_izin){
      loadAndDisplayPerizinan(id, id_izin, url_api_x, accesstoken);
    }
</script>
