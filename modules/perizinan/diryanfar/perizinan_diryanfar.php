<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title" id="page-title">Sertifikat PSEF</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" id="list-breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Sertifikat PSEF</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center" id="refresh-page">
                <button onclick="routing('perizinan_diryanfar')" type="button" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fas fa-redo"></i> Segarkan Halaman</button>
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
                            <h4 class="page-title">Data Sertifikat PSEF</h4>
                        </div>
                    </div><br>
                    <div class="table-responsive" id="table-data-here">
                        <table id="zero_config" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nomor Sertifikat PSEF</th>
                                    <th>Tanggal Terbit</th>
                                    <th>Tanggal Berakhir</th>
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
include('../../template/common_script.php');
include('../../template/modal_nib.php');
include('../template/view_perizinan.php');
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
                var data=[];
                for ( var i=0, ien=json.data.length; i<ien ; i++ ) {
                var datax = [];
                datax.push(json.data[i].perizinanNumber);
                let data_issuedAt = moment(json.data[i].issuedAt).format("YYYY-MM-DD");
                datax.push(data_issuedAt);
                let data_expiredAt = moment(json.data[i].expiredAt).format("YYYY-MM-DD");
                datax.push(data_expiredAt);

                var actions = '<td><button onclick="view_data(\''+json.data[i].permohonanId+'\',\''+json.data[i].id+'\')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-info">Lihat Detail Data</button><button onclick="window.open(\'https://psef.kemkes.go.id'+json.data[i].tandaDaftarUrl+'\')" target="_blank" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-success">Unduh Tanda Daftar</button></td>';

                datax.push(actions);

                data.push(datax);
                }
                return JSON.parse(JSON.stringify(data));

            },

            "data": function ( d ) {
                var order_name = []

                order_name.push('perizinanNumber');
                order_name.push('issuedAt');
                order_name.push('expiredAt');

                var data={};

                data.fpage = (parseInt(d.start)+parseInt(d.length))/parseInt(d.length);
                data.frows = d.length;
                data.fsearch = d.search['value'];
                data.forder = order_name[d.order[0]['column']];
                data.fsort = 'desc';
                data.fmodul = 'Perizinan';
                data.flsearch = 'perizinanNumber';
                data.ftots = 1;
                return data;
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

    function detail_nib(nib){
        localStorage.setItem("nib", nib);
        window.open(url);
    }
</script>
