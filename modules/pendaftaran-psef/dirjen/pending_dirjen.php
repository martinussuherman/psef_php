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
                var data=[];
                for ( var i=0, ien=json.data.length; i<ien ; i++ ) {
                var datax = [];

                datax.push(json.data[i].permohonanNumber);
                datax.push(json.data[i].domain);
                datax.push(json.data[i].companyName);
                datax.push(json.data[i].email);
                datax.push(moment(json.data[i].lastUpdate).format("YYYY-MM-DD"));

                let userLevelDays = json.data[i].userLevelDays
                let color_userLevelDays =''
                if(userLevelDays<2){
                    color_userLevelDays = 'green';
                }else if(userLevelDays<3){
                    color_userLevelDays = 'yellow';
                }else if(userLevelDays<4){
                    color_userLevelDays = 'red';
                }else{
                    color_userLevelDays = 'black';
                }

                let totalDays = json.data[i].totalDays
                let color_totalDays =''
                if(totalDays<5){
                    color_totalDays = 'green';
                }else if(totalDays<7){
                    color_totalDays = 'yellow';
                }else if(totalDays<9){
                    color_totalDays = 'red';
                }else{
                    color_totalDays = 'black';
                }

                datax.push('<p>'+json.data[i].statusName+'</p><hr style="display: inline;border: 7px solid '+color_userLevelDays+';">&nbsp;User Days : '+json.data[i].userLevelDays+'</hr><br><br><hr style="display: inline;border: 7px solid '+color_totalDays+';">&nbsp;Total Days : '+json.data[i].totalDays+'</hr>');

                var actions = '<td><button onclick="view_data(\''+json.data[i].permohonanId+'\')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-info">Lihat Detail Data</button><button onclick="process_data(\''+json.data[i].permohonanId+'\')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-success">Setujui</button><button onclick="reject_data(\''+json.data[i].permohonanId+'\')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-warning">Kembalikan</button></td>';

                datax.push(actions);

                data.push(datax);
                }
                return JSON.parse(JSON.stringify(data));

            },

            "data": function ( d ) {
              return configurePermohonanRequest(d, 'Permohonan/DirekturJenderalPending');
            }
            }
        });
    });

    function viewRouting() {
      routing('pending_dirjen');
    }

    function view_data(id){
      loadAndDisplayPermohonan(id, url_api_x, accesstoken);
    }

    function detail_nib(nib){
        localStorage.setItem("nib", nib);
        window.open(url);
    }

    function reject_data(id){
      permohonanKembalikan(id, url_api_x + 'Permohonan/DirekturJenderalKembalikan', accesstoken);
    }

    function process_data(id){
      permohonanSetujui(id, url_api_x + 'Permohonan/DirekturJenderalSetujui', accesstoken);
    }
</script>
