<?php
$isKemkesView = true;
$showRekamJejak = true;
$extraActions = 'validasi';

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
                datax.push(json.data[i].statusName);

                var actions = '<td><button onclick="view_data(\''+json.data[i].permohonanId+'\')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-info">Lihat Detail Data</button><button onclick="process_data(\''+json.data[i].permohonanId+'\')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-success">Proses Data</button></td>';

                datax.push(actions);

                data.push(datax);
                }
                return JSON.parse(JSON.stringify(data));

            },

            "data": function ( d ) {
              return configurePermohonanRequest(d, 'Permohonan/ValidatorSertifikatPending');
            }
            }
        });
    });

    function viewRouting() {
      routing('pending_validator');
    }

    function view_data(id){
      loadAndDisplayPermohonan(id, url_api_x, accesstoken);
    }

    function detail_nib(nib){
        localStorage.setItem("nib", nib);
        window.open(url);
    }

    function process_data(id){
        let data = {'permohonanId':parseInt(id)}
        swal({
            title: 'Penyetujuan Permohonan',
            text: "Apakah anda yakin ingin memproses permohonan ini ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Proses !',
            cancelButtonText: "Batal",
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: url_api_x+'Permohonan/ValidatorSelesaikan',
                    type: 'POST',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                    },
                    data: JSON.stringify(data),
                    contentType: 'application/json',
                    success: function (data, textStatus, xhr) {
                        if (xhr.status == '204') {
                            swal(
                                'Berhasil!',
                                'Permohonan di Proses',
                                'success'
                            )
                            routing('pending_validator')
                        }else{
                            swal({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Permohonan Gagal di Proses'
                            })
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        console.log('Error in Operation');
                    }
                });
            }
        })
    }
</script>
