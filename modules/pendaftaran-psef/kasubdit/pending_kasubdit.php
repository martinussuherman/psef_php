<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title" id="page-title">Permohonan (Tertunda)</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" id="list-breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Pendaftaran PSEF</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Permohonan (Tertunda)</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center" id="refresh-page">
                <button onclick="routing('pending_kasubdit')" type="button" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fas fa-redo"></i> Segarkan Halaman</button>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" id="load-data">
                    <div class="row">
                        <div class="col-5 align-self-center">
                            <h4 class="page-title">Data Permohonan (Tertunda)</h4>
                        </div>
                    </div><br>
                    <div class="table-responsive" id="table-data-here">
                        <table id="zero_config" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nomor Permohonan</th>
                                    <th>Domain</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Email</th>
                                    <th>Kedaluwarsa STRA</th>
                                    <th>Status</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$isKemkesView = true;
$showRekamJejak = true;
$extraActions = 'setujui';

// $pageTitle = 'Permohonan (Rumusan)';
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
                datax.push(json.data[i].companyName);
                datax.push(json.data[i].email);
                let data_straExpiry = moment(json.data[i].straExpiry).format("YYYY-MM-DD");
                datax.push(data_straExpiry);
                
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
                var order_name = []

                order_name.push('permohonanNumber');
                order_name.push('domain');
                order_name.push('companyName');
                order_name.push('email');
                order_name.push('straExpiry');
                order_name.push('statusName');
                order_name.push('permohonanId');

                var data={};

                data.fpage = (parseInt(d.start)+parseInt(d.length))/parseInt(d.length);
                data.frows = d.length;
                data.fsearch = d.search['value'];
                data.forder = 'lastUpdate';
                data.fsort = 'desc';
                data.fmodul = 'Permohonan/KepalaSubDirektoratPending';
                data.flsearch = 'permohonanNumber,domain,email,companyName';
                data.ftots = 4;
                return data;
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
