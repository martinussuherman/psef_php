<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title" id="page-title">Perizinan</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" id="list-breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Perizinan</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center" id="refresh-page">
                <button onclick="routing('perizinan_admin')" type="button" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fas fa-redo"></i> Refresh Page</button>
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
                            <h4 class="page-title">Data Perizinan</h4>
                        </div>
                    </div><br>
                    <div class="table-responsive" id="table-data-here">
                        <table id="zero_config" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nomor Perizinan</th>
                                    <th>Tanggal Terbit</th>
                                    <th>Tanggal Berakhir</th>
                                    <th>Action</th>
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
    <h4 class="card-title">Detail Data Perizinan</h4>
    <form class="m-t-30">
        <div class="col-sm-12">
            <div class="box" style="border: none; box-shadow: none">
                <div class="box-body" id="stepbar"></div>
            </div>
        </div>
        <br>
        <div class="form-group">
            <label>Tanggal Terbit</label>
            <input value="{{data_izin.issuedAt}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Tanggal Berakhir</label>
            <input value="{{data_izin.expiredAt}}" type="text" class="form-control" disabled>
        </div>
        <hr class="m-t-0">
        <h4 class="card-title" style="font-weight: bold;">Data Pemohon</h4>
        <div class="form-group">
            <label>Phone Number</label>
            <input value="{{data_pemohon.phone}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input value="{{data_pemohon.email}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Address</label>
            <input value="{{data_pemohon.address}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Company name</label>
            <input value="{{data_pemohon.companyName}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>NIB</label>
            <input value="{{data_pemohon.nib}}" type="text" class="form-control" name="nib" id="nib" disabled>
            <small class="form-text text-muted"><div id="cek_nib" style="color:white;" ></div></small>
        </div>
        <div id="nib_view"></div>
        <input type="hidden" id="status_nib">
        <hr class="m-t-0">
        <h4 class="card-title" style="font-weight: bold;">Data Permohonan</h4>
        <div class="form-group">
            <label>Nomor Permohonan</label>
            <input type="text" class="form-control" value="{{data_permohonan.permohonanNumber}}" disabled>
        </div>
        <div class="form-group">
            <label>Alamat Domain Web</label>
            <input type="text" class="form-control" value="{{data_permohonan.domain}}" disabled>
        </div>
        <div class="form-group">
            <label>Nama Sistem</label>
            <input type="text" class="form-control" value="{{data_permohonan.systemName}}" disabled>
        </div>
        <div class="form-group">
            <label>Nama Apoteker</label>
            <input type="text" class="form-control" value="{{data_permohonan.apotekerName}}" disabled>
        </div>
        <div class="form-group">
            <label>Email Apoteker</label>
            <input type="email" class="form-control" value="{{data_permohonan.apotekerEmail}}" disabled>
        </div>
        <div class="form-group">
            <label>Phone Apoteker</label>
            <input type="text" class="form-control" value="{{data_permohonan.apotekerPhone}}" disabled>
        </div>
        <div class="form-group">
            <label>NIK Apoteker</label>
            <input type="text" class="form-control" value="{{data_permohonan.apotekerNik}}" disabled>
        </div>
        <div class="form-group">
            <label>Nomor STRA</label>
            <input type="text" class="form-control" value="{{data_permohonan.straNumber}}" disabled>
        </div>
        <div class="form-group">
            <label>Expired STRA</label>
            <input type="text" class="form-control" value="{{data_permohonan.straExpiry}}" disabled>
        </div>
        <div class="form-group">
            <label>Salinan STRA</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{data_permohonan.straUrl}}">{{data_permohonan.name_straUrl}}</a>
            </div>
        </div>
        <div class="form-group">
            <label>Surat Permohonan</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{data_permohonan.suratPermohonanUrl}}">{{data_permohonan.name_suratPermohonanUrl}}</a>
            </div>
        </div>
        <div class="form-group">
            <label>Dok. Proses Bisnis</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{data_permohonan.prosesBisnisUrl}}">{{data_permohonan.name_prosesBisnisUrl}}</a>
            </div>
        </div>
        <div class="form-group">
            <label>Dokumen Application Programmer Interface Sistem PSEF</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{data_permohonan.dokumenApiUrl}}">{{data_permohonan.name_dokumenApiUrl}}</a>
            </div>
        </div>
        <div class="form-group">
            <label>Dokumen PSE Kominfo</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{data_permohonan.dokumenPseUrl}}">{{data_permohonan.name_dokumenPseUrl}}</a>
            </div>
        </div>
        <hr class="m-t-0">
        <h4 class="card-title" style="font-weight: bold;">Data Apotek Mitra</h4>
        <div class="table-responsive" id="table-apotek">
            <table id="zero_config" class="table table-striped table-bordered">
                <thead>
                    <tr>
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
        <hr class="m-t-0">
        <h4 class="card-title" style="font-weight: bold;">Rekam Jejak</h4>
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
        <button type="button" class="btn btn-danger" onclick="routing('perizinan_admin')">Back</button>
        <button onclick="window.open('https://psef.kemkes.go.id{{data_izin.tandaDaftarUrl}}')" target="_blank" type="button" class="btn btn-success">Download Tanda Daftar</button>
    </form>
</script>

<!-- Template for edit -->
<script id="edit-data" type="text/x-handlebars-template">
    <h4 class="card-title">Edit Data Perizinan</h4>
    <form class="m-t-30" id="data-update" onsubmit="update_data(event)">
        <div class="form-group">
            <label>Tanggal Terbit</label>
            <input type="date" value= "{{issuedAt}}" class="form-control" name="issuedAt" required>
        </div>
        <div class="form-group">
            <label>Tanggal Berakhir</label>
            <input type="date" value= "{{expiredAt}}" class="form-control" name="expiredAt" required>
        </div>
        <input type="hidden" name="id" value="{{id}}">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-danger" onclick="routing('perizinan_admin')">Cancel</button>
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
                <td>Nama Perseroan</td>
                <td>:</td>
                <td class="nib-np"></td>
            </tr>
            <tr>
                <td>NIB</td>
                <td>:</td>
                <td class="nib-nib"></td>
            </tr>
            <tr>
                <td>NPWP Perseroan</td>
                <td>:</td>
                <td class="nib-npwpp"></td>
            </tr>
            <tr>
                <td>Nomor Telpon Perseroan</td>
                <td>:</td>
                <td class="nib-ntp"></td>
            </tr>
            <tr>
                <td>Alamat Perseroan</td>
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

                var actions = '<td><button onclick="view_data(\''+json.data[i].permohonanId+'\',\''+json.data[i].id+'\')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-info">View Data</button><button onclick="edit_data(\''+json.data[i].id+'\',\''+json.data[i].id+'\')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-primary">Edit Data</button><button onclick="window.open(\'https://psef.kemkes.go.id'+json.data[i].tandaDaftarUrl+'\')" target="_blank" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-success">Download Tanda Daftar</button></td>';

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
                        get_data_pemohon(data,datax,id_izin)
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

    function get_data_pemohon(data,datax,id_izin){
        $.ajax({
            url: url_api_x+"Pemohon("+data.pemohonId+")",
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (datap, textStatus, xhr) {
                get_data_perizinan(data,datax,datap,id_izin)
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function get_data_perizinan(data,datax,datap,id_izin){
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
                view_data_detail(data,datax,datap,dataz)
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function view_data_detail(data_permohonan, data_apotek, data_pemohon,data_izin){
        let source = $("#view-data").html();
        let template = Handlebars.compile(source);
        let data =[];
        data.data_permohonan = data_permohonan
        data.data_apotek = data_apotek
        data.data_pemohon = data_pemohon
        data.data_izin = data_izin
        data.data_permohonan.straExpiry = moment(data.data_permohonan.straExpiry).format("YYYY-MM-DD");
        let name_straUrl = data.data_permohonan.straUrl
        let name_suratPermohonanUrl = data.data_permohonan.suratPermohonanUrl
        let name_prosesBisnisUrl = data.data_permohonan.prosesBisnisUrl
        let name_dokumenApiUrl = data.data_permohonan.dokumenApiUrl
        let name_dokumenPseUrl = data.data_permohonan.dokumenPseUrl
        var split_straUrl = name_straUrl.split("/");
        var split_suratPermohonanUrll = name_suratPermohonanUrl.split("/");
        var split_prosesBisnisUrl = name_prosesBisnisUrl.split("/");
        var split_dokumenApiUrl = name_dokumenApiUrl.split("/");
        var split_dokumenPseUrl = name_dokumenPseUrl.split("/");
        data.data_permohonan.name_straUrl = split_straUrl[5]
        data.data_permohonan.name_suratPermohonanUrl = split_suratPermohonanUrll[5]
        data.data_permohonan.name_prosesBisnisUrl = split_prosesBisnisUrl[5]
        data.data_permohonan.name_dokumenApiUrl = split_dokumenApiUrl[5]
        data.data_permohonan.name_dokumenPseUrl = split_dokumenPseUrl[5]

        let nib = data.data_pemohon.nib

        $('#load-data').html(template(data));

        $.each(data.data_apotek.value, function( index, value ) {
            $(".detail-item").append(`<tr>
                                    <td>${value.name}</td>                                      
                                    <td>${value.siaNumber}</td>                                      
                                    <td>${value.apotekerName}</td>                                      
                                    <td>${value.straNumber}</td>                                      
                                    <td>${value.sipaNumber}</td>                                      
                                    <td>${value.address}</td>                                      
                                    <td>${value.provinsiId}</td>                                      
                                </tr>`)
        });

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
                    $('#cek_nib').html('Data NIB Dapat di Gunakan<br><a onclick="detail_nib(`'+nib+'`)" style="color:blue;text-decoration: underline;cursor: pointer;">Check Detail NIB</p>')
                    $( "#nib" ).removeClass("form-control is-invalid").addClass("form-control is-valid");
                    $('#status_nib').val(1)
                    $('#nib_view').append(`<table class="table table-bordered">
                                        <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Nama Perseroan</th>
                                                <th scope="col">NIB</th>
                                                <th scope="col">NPWP Perseroan</th>
                                                <th scope="col">Nomor Telpon Perseroan</th>
                                                <th scope="col">Alamat Perseroan</th>
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
                    $('#cek_nib').html('Data NIB Dapat di Gunakan<br><a onclick="detail_nib(`'+nib+'`)" style="color:blue;text-decoration: underline;cursor: pointer;">Check Detail NIB</p>')
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

    function edit_data(id) {
        $.ajax({
            url: url_api_x+"Perizinan("+id+")",
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (data, textStatus, xhr) {
                edit(data)
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }
    function edit(data) {
        let source = $("#edit-data").html();
        let template = Handlebars.compile(source);
        data.expiredAt = moment(data.expiredAt).format("YYYY-MM-DD");
        data.issuedAt = moment(data.issuedAt).format("YYYY-MM-DD");

        $('#load-data').html(template(data));
    }
    function update_data(e) {
        e.preventDefault();
        var data = $('#data-update').serializeFormJSON();
        data.id = parseInt(data.id)
        let id_perizinan = data.id
        console.log(data)
       
        $.ajax({
            url: url_api_x+'Perizinan('+id_perizinan+')',
            type: 'PATCH',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            data: JSON.stringify(data),
            contentType: 'application/json',
            success: function (data, textStatus, xhr) {
                if (xhr.status == '204' || xhr.status == '200') {
                    routing('perizinan_admin');
                    toastr.success("Update Perizinan", 'Success!');
                }else{
                    toastr.error("Gagal Update Perizinan", 'Error!');
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
        
    }
</script>
