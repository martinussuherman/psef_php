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
                <button onclick="routing('pending_kasi')" type="button" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fas fa-redo"></i> Segarkan Halaman</button>
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

<!-- Template show data -->
<script id="table-data" type="text/x-handlebars-template">
    <table id="zero_config" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nomor Permohonan</th>
                <th>Domain</th>
                <th>Stra Number</th>
                <th>Stra Expiry</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{#value}}
                <tr>
                    <td>{{permohonanNumber}}</td>
                    <td>{{domain}}</td>
                    <td>{{straNumber}}</td>
                    <td>{{straExpiry}}</td>
                    <td>{{statusName}}</td>
                    <td>
                        <button onclick="view_data('{{id}}')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-info">View Data</button>
                        <button onclick="process_data('{{id}}')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-success">Setujui</button>
                        <button onclick="reject_data('{{id}}')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-warning">Kembalikan</button>
                    </td>
                </tr>
            {{/value}}
        </tbody>
    </table>
</script>


<!-- Template for view -->
<script id="view-data" type="text/x-handlebars-template">
    <h4 class="card-title">Detail Data Permohonan</h4>
    <form class="m-t-30">
    <div class="col-sm-12">
            <div class="box" style="border: none; box-shadow: none">
                <div class="box-body" id="stepbar"></div>
            </div>
        </div>
        <br>
        <h4 class="card-title" style="font-weight: bold;">Data Pemohon</h4>
        <hr class="m-t-0">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Nomor Telepon Pemohon</label>
                    <input value="{{data_pemohon.phone}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input value="{{data_pemohon.email}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Nama Perusahaan</label>
                    <input value="{{data_pemohon.companyName}}" type="text" class="form-control" disabled> 
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" rows="4" disabled>{{data_pemohon.address}}</textarea>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">NIB</label>
                    <input value="{{data_pemohon.nib}}" type="text" class="form-control" name="nib" id="nib" disabled>
                    <small class="form-text text-muted"><div id="cek_nib" style="color:white;" ></div></small>
                </div>
            </div>
        </div>
        <div id="nib_view"></div>
        <input type="hidden" id="status_nib">
        <br>
        <h4 class="card-title" style="font-weight: bold;">Data Permohonan</h4>
        <hr class="m-t-0">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Nomor Permohonan</label>
                    <input type="text" class="form-control" value="{{data_permohonan.permohonanNumber}}"  disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Alamat Domain Web</label>
                    <input type="text" class="form-control" value="{{data_permohonan.domain}}" disabled>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Nama Sistem</label>
                    <input type="text" class="form-control" value="{{data_permohonan.systemName}}" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Nama Apoteker</label>
                    <input type="text" class="form-control" value="{{data_permohonan.apotekerName}}"  disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Email Apoteker</label>
                    <input type="text" class="form-control" value="{{data_permohonan.apotekerEmail}}"  disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Nomor Telepon Apoteker</label>
                    <input type="text" class="form-control" value="{{data_permohonan.apotekerPhone}}"  disabled> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">NIK Apoteker</label>
                    <input type="text" class="form-control" value="{{data_permohonan.apotekerNik}}"  disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Nomor STRA</label>
                    <input type="text" class="form-control" value="{{data_permohonan.straNumber}}"  disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Kedaluwarsa STRA</label>
                    <input type="text" class="form-control" value="{{data_permohonan.straExpiry}}"  disabled> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Salinan STRA</label>
                    <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                        <a href="https://psef.kemkes.go.id{{data_permohonan.straUrl}}">{{data_permohonan.name_straUrl}}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Surat Permohonan</label>
                    <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                        <a href="https://psef.kemkes.go.id{{data_permohonan.suratPermohonanUrl}}">{{data_permohonan.name_suratPermohonanUrl}}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Dokumen Proses Bisnis</label>
                    <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                        <a href="https://psef.kemkes.go.id{{data_permohonan.prosesBisnisUrl}}">{{data_permohonan.name_prosesBisnisUrl}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Dokumen Application Programmer Interface Sistem PSEF</label>
                    <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                        <a href="https://psef.kemkes.go.id{{data_permohonan.dokumenApiUrl}}">{{data_permohonan.name_dokumenApiUrl}}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Dokumen PSE Kominfo</label>
                    <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                        <a href="https://psef.kemkes.go.id{{data_permohonan.dokumenPseUrl}}">{{data_permohonan.name_dokumenPseUrl}}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">SPPL</label>
                    <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                        <a href="https://psef.kemkes.go.id{{data_permohonan.spplUrl}}">{{data_permohonan.name_spplUrl}}</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Izin Lokasi</label>
                    <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                        <a href="https://psef.kemkes.go.id{{data_permohonan.izinLokasiUrl}}">{{data_permohonan.name_izinLokasiUrl}}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">IMB</label>
                    <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                        <a href="https://psef.kemkes.go.id{{data_permohonan.imbUrl}}">{{data_permohonan.name_imbUrl}}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Pembayaran PNBP</label>
                    <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                        <a href="https://psef.kemkes.go.id{{data_permohonan.pembayaranPnbpUrl}}">{{data_permohonan.name_pembayaranPnbpUrl}}</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <h4 class="card-title" style="font-weight: bold;">Data Apotek Mitra</h4>
        <hr class="m-t-0">
        <div class="table-responsive" id="table-apotek">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Apotek</th>
                        <th>No SIA</th>
                        <th>Nama Apoteker</th>
                        <th>No STRA</th>
                        <th>No SIPA</th>
                        <th>Alamat</th>
                        <th>Provinsi</th>
                    </tr>
                </thead>
                    <tbody class="detail-item">
                        <!-- Isi detail-item -->
                    </tbody>
            </table>
        </div>
        <br>
        <h4 class="card-title" style="font-weight: bold;">Data Klinik</h4>
        <hr class="m-t-0">
        <div class="table-responsive" id="table-klinik">
            <table id="zero_config_klinik" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Klinik</th>
                        <th>Nama Apoteker</th>
                        <th>No STRA</th>
                        <th>No SIPA</th>
                        <th>Alamat</th>
                        <th>Provinsi</th>
                    </tr>
                </thead>
                    <tbody class="detail-item-klinik">
                        <!-- Isi detail-item -->
                    </tbody>
            </table>
        </div>
        <br>
        <h4 class="card-title" style="font-weight: bold;">Data Rumah Sakit</h4>
        <hr class="m-t-0">
        <div class="table-responsive" id="table-rs">
            <table id="zero_config_rs" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Rumah Sakit</th>
                        <th>Nama Apoteker</th>
                        <th>No STRA</th>
                        <th>No SIPA</th>
                        <th>Alamat</th>
                        <th>Provinsi</th>
                    </tr>
                </thead>
                    <tbody class="detail-item-rs">
                        <!-- Isi detail-item -->
                    </tbody>
            </table>
        </div>
        <br>
        <h4 class="card-title" style="font-weight: bold;">Rekam Jejak</h4>
        <hr class="m-t-0">
        <div class="table-responsive" id="table-history">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>Pengguna</th>
                        <th>Aksi</th>
                        <th>Catatan</th>
                    </tr>
                </thead>
                    <tbody class="detail-history">
                        <!-- Isi detail-item -->
                    </tbody>
            </table>
        </div>
        <button type="button" class="btn btn-danger" onclick="routing('pending_kasi')">Kembali</button>
        <button type="button" class="btn btn-success" onclick="process_data('{{data_permohonan.id}}')">Setujui</button>
        <button type="button" class="btn btn-warning" onclick="reject_data('{{data_permohonan.id}}')">Kembalikan</button>
    </form>
</script>

<!-- Template for modal nib -->
<div id="modal-nib" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detail NIB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-striped">
        <tbody>
            <tr>
                <td>Nama Perusahaan</td>
                <td>:</td>
                <td class="nib-np"></td>
            </tr>
            <tr>
                <td>NIB</td>
                <td>:</td>
                <td class="nib-nib"></td>
            </tr>
            <tr>
                <td>NPWP Perusahaan</td>
                <td>:</td>
                <td class="nib-npwpp"></td>
            </tr>
            <tr>
                <td>Nomor Telepon Perusahaan</td>
                <td>:</td>
                <td class="nib-ntp"></td>
            </tr>
            <tr>
                <td>Alamat Perusahaan</td>
                <td>:</td>
                <td class="nib-ap"></td>
            </tr>
        </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

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
                data.fmodul = 'Permohonan/KepalaSeksiPending';
                data.flsearch = 'permohonanNumber,domain,email,companyName';
                data.ftots = 4;
                return data;
            }
            }
        });
    });

    function view_data(id){
        $.ajax({
            url: url_api_x+"Permohonan("+id+")",
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
                                        get_data_pemohon(data,datax,datac,datab)
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

    function get_data_pemohon(data,datax,datac,datab){
        $.ajax({
            url: url_api_x+"Pemohon("+data.pemohonId+")",
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (datap, textStatus, xhr) {
                view_data_detail(data,datax,datap,datac,datab)
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function view_data_detail(data_permohonan, data_apotek, data_pemohon, data_klinik, data_rs){
        let source = $("#view-data").html();
        let template = Handlebars.compile(source);
        let data =[];
        data.data_permohonan = data_permohonan
        data.data_apotek = data_apotek
        data.data_klinik = data_klinik
        data.data_rs = data_rs
        data.data_pemohon = data_pemohon
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

        let nib = data.data_pemohon.nib

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

        $('#stepbar').stepbar({
            items: ["Pemohon", "Verifikasi", "KaSi", "KaSubDit", "DirYanFar", "Dirjen", "Finalisasi", "Selesai"],
            color: '#D2DC02',
            fontColor: '#000',
            selectedColor: '#16B3AC',
            selectedFontColor: '#fff',
            current: 3
        });

        $("#nib").blur(function() {
            cek_nib()
        });

        $.ajax({
            url: url_api_x+"OssInfo/OssFullInfo?id="+nib,
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (data, textStatus, xhr) {
                if(data.keterangan != "Data NIB tidak ditemukan" && data.keterangan !="NIB harus 13 karakter." && data.keterangan !="Api Key tidak valid"){
                    $("#cek_nib").css("color", "green");
                    $('#cek_nib').html('Data NIB Dapat di Gunakan<br><a onclick="detail_nib(`'+nib+'`)" style="color:blue;text-decoration: underline;cursor: pointer;">Periksa Detail NIB</p>')
                    $( "#nib" ).removeClass("form-control is-invalid").addClass("form-control is-valid");
                    $('#status_nib').val(1)
                    $('#nib_view').append(`<table class="table table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Nama Perusahaan</th>
                                                <th scope="col">NIB</th>
                                                <th scope="col">NPWP Perusahaan</th>
                                                <th scope="col">Nomor Telepon Perusahaan</th>
                                                <th scope="col">Alamat Perusahaan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>${data.namaPerseroan}</th>
                                                <th>${data.nib}</th>
                                                <th>${data.npwpPerseroan}</th>
                                                <th>${data.nomorTelponPerseroan}</th>
                                                <th>${data.alamatPerseroan}</th>
                                            </tr>
                                        </tbody>
                                    </table>`)
                }else{
                    $("#cek_nib").css("color", "red");
                    $('#cek_nib').html('Data NIB Tidak di Temukan')
                    $( "#nib" ).removeClass("form-control is-valid").addClass("form-control is-invalid");
                    $('#status_nib').val(0)
                }
            },
            error: function (xhr, textStatus, errorThrown) {
            }
        });

        $.ajax({
            url: url_api_x+"HistoryPermohonan/ByPermohonan(permohonanId="+data.data_permohonan.id+")",
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (datax, textStatus, xhr) {
                $.each(datax.value, function( ih, vh ) {
                    let date_history = moment(vh.updatedAt).format("YYYY-MM-DD, HH:mm:ss");
                    $(".detail-history").append(`<tr>
                                            <td>${date_history}</td>                                      
                                            <td>${vh.updatedBy}</td>                                      
                                            <td>${vh.statusName}</td>                                      
                                            <td>${vh.reason}</td>                                    
                                        </tr>`)
                });
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function cek_nib(){
        $('#nib_view').html('')
        let nib = $('#nib').val()
        $.ajax({
            url: url_api_x+"OssInfo/OssFullInfo?id="+nib,
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (data, textStatus, xhr) {
                if(data.keterangan != "Data NIB tidak ditemukan" && data.keterangan !="NIB harus 13 karakter." && data.keterangan !="Api Key tidak valid"){
                    $("#cek_nib").css("color", "green");
                    $('#cek_nib').html('Data NIB Dapat di Gunakan<br><a onclick="detail_nib(`'+nib+'`)" style="color:blue;text-decoration: underline;cursor: pointer;">Periksa Detail NIB</p>')
                    $( "#nib" ).removeClass("form-control is-invalid").addClass("form-control is-valid");
                    $('#status_nib').val(1)
                    $('#nib_view').append(`<table class="table table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">NIB</th>
                                                <th scope="col">NPWP</th>
                                                <th scope="col">SIUP</th>
                                                <th scope="col">Director</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>${data.name}</th>
                                                <th>${data.nib}</th>
                                                <th>${data.npwp}</th>
                                                <th>${data.siup}</th>
                                                <th>${data.director}</th>
                                            </tr>
                                        </tbody>
                                    </table>`)
                }else{
                    $("#cek_nib").css("color", "red");
                    $('#cek_nib').html('Data NIB Tidak di Temukan')
                    $( "#nib" ).removeClass("form-control is-valid").addClass("form-control is-invalid");
                    $('#status_nib').val(0)
                }
            },
            error: function (xhr, textStatus, errorThrown) {
               
            }
        });
    }
    function detail_nib(nib){
        localStorage.setItem("nib", nib);
        window.open(url);
    }

    function reject_data(id){
        Swal.mixin({
            input: 'text',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "Batal",
            confirmButtonText: 'Ya'
        }).queue([
            {
                title: 'Kembalikan Permohonan ?',
                text: 'Mohon isi catatan'
            }
        ]).then((result) => {
            if (result.value) {
                $.ajax({
                    url: url_api_x+'Permohonan/KepalaSeksiKembalikan',
                    type: 'POST',
                    data: JSON.stringify({reason:result.value[0], permohonanId: parseInt(id)}),
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                    },
                    contentType: 'application/json',
                    success: function (data, textStatus, xhr) {
                        if (xhr.status == '204') {
                            routing('pending_kasi');
                            toastr.success("Permohonan di Kembalikan", 'Berhasil!');
                        }else{
                            toastr.error("Permohonan di Kembalikan", 'Gagal!');
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        console.log('Error in Operation');
                    }
                });
            }
        })
            
    }

    function process_data(id){
        let data = {'permohonanId':parseInt(id)}
        swal({
            title: 'Penyetujuan Permohonan',
            text: "Apakah anda yakin ingin menyetujui permohonan ini ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Ajukan !',
            cancelButtonText: "Batal",
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: url_api_x+'Permohonan/KepalaSeksiSetujui',
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
                                'Permohonan di Setujui',
                                'success'
                            )
                            routing('pending_kasi')
                        }else{
                            swal({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Permohonan Gagal di Setujui'
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
