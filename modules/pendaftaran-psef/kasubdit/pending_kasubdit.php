<?php
$isKemkesView = true;
$showRekamJejak = true;
$extraActions = 'setujui';

$pageTitle = 'Permohonan (Tertunda)';
include('../template/template_kemkes.php');
?>

<script>
    var accesstoken = <?php echo json_encode($_COOKIE['accesstoken']); ?>; 
    $(document).ready(function() { 
        $('#zero_config').on('xhr.dt', function ( e, settings, json, xhr ) {
            json.data = json.rows;
            json.recordsTotal = json.recordsFiltered = json.total;
        }).DataTable({
            "processing": true,
            "columnDefs": [ {
                "targets": [4],
                "orderable": false,
            } ],
            "serverSide": true,
            "scrollY": '100vh',
            "scrollX": true,
            "ajax": {
            "url": url_api_php,
            "type": "POST",
            "dataSrc": function ( json ) {
              let data = [];

              for (let i = 0; i < json.data.length; i++) {
                let info =
                    `<p>${json.data[i].statusName}</p>` +
                    `<p><hr style="display: inline;border: 7px solid ${userDaysColor(json.data[i].userLevelDays)};" />` +
                    `User Days : ${json.data[i].userLevelDays}</p>` +
                    `<p><hr style="display: inline;border: 7px solid ${totalDaysColor(json.data[i].totalDays)};" />` +
                    `Total Days : ${json.data[i].totalDays}</p>`;
                let action =
                  `<button onclick="view_data('${json.data[i].permohonanId}')" class="btn btn-xs btn-block btn-info">Lihat Detail Data</button>` +
                  `<button onclick="process_data('${json.data[i].permohonanId}')" class="btn btn-xs btn-block btn-success">Teruskan</button>` +
                  `<button onclick="reject_data('${json.data[i].permohonanId}')" class="btn btn-xs btn-block btn-warning">Kembalikan</button>`;

                data.push(dataTablePermohonanPemohonRow(json.data[i], info, action));
              }

              return data;
            },

            "data": function ( d ) {
              return configurePermohonanRequest(d, 'Permohonan/KepalaSubDirektoratPending');
            }
            }
        });
    });

    function viewRouting() {
      routing('pending_kasubdit');
    }

    function view_data(id){
      loadAndDisplayPermohonan(id, url_api_x, accesstoken);
    }

    function detail_nib(nib){
        localStorage.setItem("nib", nib);
        window.open(url);
    }

    function reject_data(id){
      permohonanKembalikan(id, url_api_x + 'Permohonan/KepalaSubDirektoratKembalikan', accesstoken);
    }

    function process_data(id){
      permohonanSetujui(id, url_api_x + 'Permohonan/KepalaSubDirektoratSetujui', accesstoken);
    }
</script>
