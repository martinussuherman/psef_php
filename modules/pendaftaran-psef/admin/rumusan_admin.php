<?php
$isKemkesView = true;
$showRekamJejak = true;

$pageTitle = 'Permohonan (Rumusan)';
include('../template/template_kemkes.php');
include('../template/common_script.php');
include('../template/view_permohonan.php');
include('../template/modal_nib.php');
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
                  datax.push(json.data[i].straNumber);
                  let data_straExpiry = moment(json.data[i].straExpiry).format("YYYY-MM-DD");
                  datax.push(data_straExpiry);
                  datax.push(json.data[i].statusName);

                  var actions = '<td><button onclick="view_data(\''+json.data[i].id+'\')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-info">Lihat Detail Data</button></td>';

                  datax.push(actions);

                  data.push(datax);
                }
                return JSON.parse(JSON.stringify(data));

              },

              "data": function ( d ) {
                var order_name = []

                order_name.push('permohonanNumber');
                order_name.push('domain');
                order_name.push('straNumber');
                order_name.push('straExpiry');
                order_name.push('statusName');
                order_name.push('id');

                var data={};

                data.fpage = (parseInt(d.start)+parseInt(d.length))/parseInt(d.length);
                data.frows = d.length;
                data.fsearch = d.search['value'];
                data.forder = 'lastUpdate';
                data.fsort = 'desc';
                data.fmodul = 'Permohonan/Rumusan';
                data.flsearch = 'permohonanNumber,domain,straNumber';
                data.ftots = 3;
                return data;
              }
            }
        });

    });

    function viewRouting() {
      routing('rumusan_admin');
    }

    function view_data(id){
      loadAndDisplayPermohonan(id, url_api_x, accesstoken);
    }

    function detail_nib(nib){
        localStorage.setItem("nib", nib);
        window.open(url);
    }
</script>
