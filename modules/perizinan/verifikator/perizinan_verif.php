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
                <button onclick="routing('perizinan_verif')" type="button" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fas fa-redo"></i> Segarkan Halaman</button>
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

<!-- Template for view -->
<script id="view-data" type="text/x-handlebars-template">
    <h4 class="card-title">Detail Data Sertifikat PSEF</h4>
    <form class="m-t-30">
    <div class="col-sm-12">
            <div class="box" style="border: none; box-shadow: none">
                <div class="box-body" id="stepbar"></div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal Terbit</label>
                    <input value="{{data_izin.issuedAt}}" type="text" class="form-control" disabled>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal Berakhir</label>
                    <input value="{{data_izin.expiredAt}}" type="text" class="form-control" disabled> 
                </div>
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
        <button type="button" class="btn btn-danger" onclick="routing('perizinan_verif')">Kembali</button>
        <button onclick="window.open('https://psef.kemkes.go.id{{data_izin.tandaDaftarUrl}}')" target="_blank" type="button" class="btn btn-success">Unduh Tanda Daftar</button>
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
                                        get_data_pemohon(data,datax,id_izin,datac,datab)
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

    function get_data_pemohon(data,datax,id_izin,datac,datab){
        $.ajax({
            url: url_api_x+"Pemohon("+data.pemohonId+")",
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (datap, textStatus, xhr) {
                get_data_perizinan(data,datax,datap,id_izin,datac,datab)
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function get_data_perizinan(data,datax,datap,id_izin,datac,datab){
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
                view_data_detail(data,datax,datap,dataz,datac,datab)
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function view_data_detail(data_permohonan, data_apotek, data_pemohon,data_izin,data_klinik, data_rs){
        let source = $("#view-data").html();
        let template = Handlebars.compile(source);
        let data =[];
        data.data_permohonan = data_permohonan
        data.data_apotek = data_apotek
        data.data_pemohon = data_pemohon
        data.data_klinik = data_klinik
        data.data_rs = data_rs
        data.data_izin = data_izin
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

        let cek_current_status = data_permohonan.statusId
        let current_status=3;
        if(cek_current_status==4){
            current_status = 1 
        }else if(cek_current_status==5){
            current_status = 4
        }else if(cek_current_status==6){
            current_status = 2
        }else if(cek_current_status==7){
            current_status = 5
        }else if(cek_current_status==8){
            current_status = 3
        }else if(cek_current_status==9){
            current_status = 6
        }else if(cek_current_status==10){
            current_status = 4
        }else if(cek_current_status==11){
            current_status = 7
        }else if(cek_current_status==12){
            current_status = 5
        }else if(cek_current_status==13){
            current_status = 9
        }else{
            current_status = cek_current_status
        }

        $('#stepbar').stepbar({
            items: ["Pemohon", "Verifikasi", "KaSi", "KaSubDit", "DirYanFar", "Dirjen", "Finalisasi", "Selesai"],
            color: '#D2DC02',
            fontColor: '#000',
            selectedColor: '#16B3AC',
            selectedFontColor: '#fff',
            current: current_status
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
</script>
