<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title" id="page-title">Sertifikat PSEF</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" id="list-breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Sertifikat PSEF</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center" id="refresh-page">
                <button onclick="routing('perizinan_user')" type="button" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fas fa-redo"></i> Segarkan Halaman</button>
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

    function view_data(id,id_izin){
        $.ajax({
            url: url_api_x+"PermohonanCurrentUser("+id+")",
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (data, textStatus, xhr) {
                $.ajax({
                    url: url_api_x+"PermohonanApotek("+id+")",
                    type: 'GET',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                    },
                    dataType: 'json',
                    success: function (datax, textStatus, xhr) {
                        $.ajax({
                            url: url_api_x+"PermohonanKlinik("+id+")",
                            type: 'GET',
                            beforeSend: function (xhr) {
                                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                            },
                            dataType: 'json',
                            success: function (datac, textStatus, xhr) {
                                $.ajax({
                                    url: url_api_x+"PermohonanRumahSakit("+id+")",
                                    type: 'GET',
                                    beforeSend: function (xhr) {
                                        xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                                    },
                                    dataType: 'json',
                                    success: function (datab, textStatus, xhr) {
                                        get_data_perizinan(data,datax,id_izin,datac,datab)
                                    },
                                    error: function (xhr, textStatus, errorThrown) {
                                        console.log('Error in Operation');
                                    }
                                });
                            },
                            error: function (xhr, textStatus, errorThrown) {
                                console.log('Error in Operation');
                            }
                        });
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        console.log('Error in Operation');
                    }
                });
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function get_data_perizinan(data,datax,id_izin,datac,datab){
        $.ajax({
            url: url_api_x+"Perizinan("+id_izin+")",
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (dataz, textStatus, xhr) {
                dataz.issuedAt = moment(dataz.issuedAt).format("YYYY-MM-DD");
                dataz.expiredAt = moment(dataz.expiredAt).format("YYYY-MM-DD");
                view_data_detail(data,datax,dataz,datac,datab)
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function view_data_detail(data_permohonan, data_apotek,data_izin,data_klinik, data_rs){
        let source = $("#view-data").html();
        let template = Handlebars.compile(source);
        let data =[];
        data.data_permohonan = data_permohonan
        data.data_apotek = data_apotek
        data.data_izin = data_izin
        data.data_klinik = data_klinik
        data.data_rs = data_rs
        data.data_permohonan.straExpiry = moment(data.data_permohonan.straExpiry).format("YYYY-MM-DD");
        let name_straUrl = data.data_permohonan.straUrl
        let name_suratPermohonanUrl = data.data_permohonan.suratPermohonanUrl
        let name_prosesBisnisUrl = data.data_permohonan.prosesBisnisUrl
        let name_dokumenApiUrl = data.data_permohonan.dokumenApiUrl
        let name_dokumenPseUrl = data.data_permohonan.dokumenPseUrl
        let name_spplUrl = data.data_permohonan.spplUrl
        let name_izinLokasiUrl = data.data_permohonan.izinLokasiUrl
        let name_imbUrl = data.data_permohonan.imbUrl
        let name_pembayaranPnbpUrl = data.data_permohonan.pembayaranPnbpUrl
        var split_straUrl = name_straUrl.split("/");
        var split_suratPermohonanUrl = name_suratPermohonanUrl.split("/");
        var split_prosesBisnisUrl = name_prosesBisnisUrl.split("/");
        var split_dokumenApiUrl = name_dokumenApiUrl.split("/");
        var split_dokumenPseUrl = name_dokumenPseUrl.split("/");
        var split_spplUrl = name_spplUrl.split("/");
        var split_izinLokasiUrl = name_izinLokasiUrl.split("/");
        var split_imbUrl = name_imbUrl.split("/");
        var split_pembayaranPnbpUrl = name_pembayaranPnbpUrl.split("/");
        data.data_permohonan.name_straUrl = split_straUrl[split_straUrl.length-1]
        data.data_permohonan.name_suratPermohonanUrl = split_suratPermohonanUrl[split_suratPermohonanUrl.length-1]
        data.data_permohonan.name_prosesBisnisUrl = split_prosesBisnisUrl[split_prosesBisnisUrl.length-1]
        data.data_permohonan.name_dokumenApiUrl = split_dokumenApiUrl[split_dokumenApiUrl.length-1]
        data.data_permohonan.name_dokumenPseUrl = split_dokumenPseUrl[split_dokumenPseUrl.length-1]
        data.data_permohonan.name_spplUrl = split_spplUrl[split_spplUrl.length-1]
        data.data_permohonan.name_izinLokasiUrl = split_izinLokasiUrl[split_izinLokasiUrl.length-1]
        data.data_permohonan.name_imbUrl = split_imbUrl[split_imbUrl.length-1]
        data.data_permohonan.name_pembayaranPnbpUrl = split_pembayaranPnbpUrl[split_pembayaranPnbpUrl.length-1]

        $('#load-data').html(template(data));

        if(data.data_apotek!==undefined){
            $.each(data.data_apotek.value, function( index, value ) {
                $(".detail-item").append(`<tr>
                                        <td>${index+1}</td>  
                                        <td>${value.name}</td>                                      
                                        <td>${value.siaNumber}</td>                                      
                                        <td>${value.apotekerName}</td>                                      
                                        <td>${value.straNumber}</td>                                      
                                        <td>${value.sipaNumber}</td>                                      
                                        <td>${value.address}</td>                                      
                                        <td>${value.provinsiName}</td>                                      
                                    </tr>`)
            });
        }
        if(data.data_klinik!==undefined){
            $.each(data.data_klinik.value, function( index, value ) {
                $(".detail-item-klinik").append(`<tr>
                                        <td>${index+1}</td>  
                                        <td>${value.name}</td>                                     
                                        <td>${value.apotekerName}</td>                                      
                                        <td>${value.straNumber}</td>                                      
                                        <td>${value.sipaNumber}</td>                                      
                                        <td>${value.address}</td>                                      
                                        <td>${value.provinsiName}</td>                                      
                                    </tr>`)
            });
        }
        if(data.data_rs!==undefined){
            $.each(data.data_rs.value, function( index, value ) {
                $(".detail-item-rs").append(`<tr>
                                        <td>${index+1}</td>  
                                        <td>${value.name}</td>                                  
                                        <td>${value.apotekerName}</td>                                      
                                        <td>${value.straNumber}</td>                                      
                                        <td>${value.sipaNumber}</td>                                      
                                        <td>${value.address}</td>                                      
                                        <td>${value.provinsiName}</td>                                      
                                    </tr>`)
            });
        }
    }
</script>
