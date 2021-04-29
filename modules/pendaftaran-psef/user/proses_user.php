<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title" id="page-title">Permohonan (Dalam Proses)</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" id="list-breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Permohonan (Dalam Proses)</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center" id="refresh-page">
                <button onclick="routing('proses_user')" type="button" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fas fa-redo"></i> Segarkan Halaman</button>
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
                            <h4 class="page-title">Data Permohonan (Dalam Proses)</h4>
                        </div>
                        <!-- <div class="col-7 align-self-center">
                            <div class="d-flex no-block justify-content-end align-items-center" id="add_data">
                                <button onclick="add_data()" type="button" class="btn waves-effect waves-light btn-info btn-add-data">Add Data Permohonan</button>
                            </div>
                        </div> -->
                    </div><br>
                    <div class="table-responsive" id="table-data-here">
                        <table id="zero_config" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Nomor Permohonan</th>
                                    <th>Domain</th>
                                    <th>Nomor STRA</th>
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

<!-- Template for add -->
<script id="add-data" type="text/x-handlebars-template">
    <h4 class="card-title">Add Permohonan</h4>
    <form class="m-t-30" id="add-data-new" onsubmit="data_save(event)">
    <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nomor Permohonan</label>
                    <input type="text" class="form-control" placeholder="-" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Alamat Domain Web</label>
                    <input type="text" class="form-control" name="domain" placeholder="Input Domain." required> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nama Sistem</label>
                    <input type="text" class="form-control" name="systemName" placeholder="Input Name System." required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nama Apoteker</label>
                    <input type="text" class="form-control" name="apotekerName" placeholder="Input Name Apoteker." required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Email Apoteker</label>
                    <input type="email" class="form-control" name="apotekerEmail" placeholder="Input Email Apoteker." required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Phone Apoteker</label>
                    <input type="text" class="form-control" name="apotekerPhone" placeholder="Input Phone Apoteker." required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>NIK Apoteker</label>
                    <input type="text" class="form-control" name="apotekerNik" placeholder="Input NIK Apoteker." required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nomor STRA</label>
                    <input type="text" class="form-control" name="straNumber" placeholder="Input Nomor STRA." required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Expired STRA</label>
                    <input type="date" class="form-control" name="straExpiry" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label><b>Contoh Surat Permohonan</b></label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id/assets/doc/Tamplate%20PSE%20(KEMENKES%20PSEF).docx">Contoh Dokumen PSE Kominfo</a>
            </div>
        </div>
        <div class="form-group">
            <label>Salinan STRA</label>
            <input type="file" class="form-control" id="straUrl" required>
            <input type="hidden" name="straUrl" id="v-straUrl">
        </div>
        <div class="form-group">
            <label>Surat Permohonan</label>
            <input type="file" class="form-control" id="suratPermohonanUrl" required>
            <input type="hidden" name="suratPermohonanUrl" id="v-suratPermohonanUrl">
        </div>
        <div class="form-group">
            <label>Dok. Proses Bisnis</label>
            <input type="file" class="form-control" id="prosesBisnisUrl" required>
            <input type="hidden" name="prosesBisnisUrl" id="v-prosesBisnisUrl">
        </div>
        <div class="form-group">
            <label>Dokumen Application Programmer Interface Sistem PSEF</label>
            <input type="file" class="form-control" id="dokumenApiUrl" required>
            <input type="hidden" name="dokumenApiUrl" id="v-dokumenApiUrl">
        </div>
        <div class="form-group">
            <label>Dokumen PSE Kominfo</label>
            <input type="file" class="form-control" id="dokumenPseUrl" required>
            <input type="hidden" name="dokumenPseUrl" id="v-dokumenPseUrl">
        </div>
        <input type="hidden" name="data" id="data">
        <div class="row">
            <div class="col-5 align-self-center">
            </div>
            <div class="col-7 align-self-center">
                <div class="d-flex no-block justify-content-end align-items-center">
                    <button type="button" class="btn-open-modal btn waves-effect waves-light btn-info" data-toggle="modal" data-target="#myModal" style="display:none;">Add Apotek</button>
                    <button type="button" class="btn-trigger-modal btn waves-effect waves-light btn-info" >Add Apotek</button>
                </div>
            </div>
        </div>
        <br>
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
                        <th>Action</th>
                    </tr>
                </thead>
                    <tbody class="detail-item">
                        <!-- Isi detail-item -->
                    </tbody>
            </table>
        </div>
        <br><br>
        <input type="checkbox" value="check" id="agree" required/> Dengan ini saya menyatakan bahwa data yang saya isi adalah benar
        <br><br>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-danger" onclick="routing('proses_user')">Cancel</button>
    </form>
</script>

<!-- Template for view -->
<script id="view-data" type="text/x-handlebars-template">
    <h4 class="card-title">Detail Data Permohonan</h4>
    <form class="m-t-30">
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
        <button type="button" class="btn btn-danger" onclick="routing('proses_user')">Kembali</button>
    </form>
</script>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="card-title" id="title-modal">Add Apotek</h4>
                <form class="m-t-30" id="add_detail_data" onsubmit="detail_add(event)">
                    <div class="form-group">
                        <label>Nama Apotek</label>
                        <input  type="text" class="form-control" id="name" name="name" placeholder="Input Nama Apotek" required>
                    </div>
                    <div class="form-group">
                        <label>No SIA</label>
                        <input  type="text" class="form-control" id="siaNumber" name="siaNumber" placeholder="Input No SIA" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Apoteker</label>
                        <input  type="text" class="form-control" id="apotekerName" name="apotekerName" placeholder="Input Nama Apoteker" required>
                    </div>
                    <div class="form-group">
                        <label>No STRA</label>
                        <input  type="text" class="form-control" id="straNumber" name="straNumber" placeholder="Input No STRA" required>
                    </div>
                    <div class="form-group">
                        <label>No SIPA</label>
                        <input  type="text" class="form-control" id="sipaNumber" name="sipaNumber" placeholder="Input No SIPA" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input  type="text" class="form-control" id="address" name="address" placeholder="Input Alamat" required>
                    </div>
                    <div class="form-group">
                        <label>Provinsi</label>
                        <select name="provinsiId" id="provinsiId" class="form-control" style="height: 36px;width: 100%;" required>
                            <option value="" selected disabled>-- Choose Provinsi --</option>
                        </select>
                    </div>
                    <input type="hidden" name="editdetail" id="editdetail">
                    <input type="hidden" name="rowdetail" id="rowdetail">
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-default modal-close-conf" >Close</button>
                        <button type="button" class="btn btn-default modal-close" data-dismiss="modal" style="display:none">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="modal-pakta" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document" style="max-width: 80%;">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pakta Integritas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3 style="font-weight:bold;text-align: center;">PENDAFTARAN PERIZINAN</h3>
        <h3 style="font-weight:bold;text-align: center;">PADA DIREKTORAT PELAYANAN KEFARMASIAN</h3>
        <br><br><br>
        <h5>Dengan ini saya menyatakan akan melaksanakan ketentuan sebagai berikut :</h5>
        <br>
        <h5>1. Berperan secara proaktif dalam upaya pencegahan dan pemberantasan Korupsi, Kolusi dan Nepotisme (KKN).</h5>
        <h5>2. Tidak memberikan secara langsung atau tidak langsung berupa suap, hadiah, bantuan atau bentuk lainnya yang tidak sesuai dengan ketentuan yang berlaku kepada petugas Direktorat Pelayanan Kefarmasian.</h5>
        <h5>3. Akan mengikuti proses pendaftaran perizinan secara bersih, transparan dan sesuai dengan prosedur yang telah ditetapkan.</h5>
        <h5>4. Apabila melanggar hal-hal yang tertera dalam pakta integritas ini bersedia menerima sanksi sesuai peraturan yang berlaku.</h5>
      </div>
    </div>
  </div>
</div>

<script>
    var accesstoken = <?php echo json_encode($_COOKIE['accesstoken']); ?>; 
    var arr_detail_add = [];
    var arr_detail_add_x = [];
    var id_detail_add = 0;
    var cc;
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
                datax.push(json.data[i].pemohonStatusName);

                var actions = '<td><button onclick="view_data(\''+json.data[i].id+'\')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-info">Lihat Detail Data</button>';

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
                data.fmodul = 'PermohonanCurrentUser/Progress';
                data.flsearch = 'permohonanNumber,domain,straNumber';
                data.ftots = 3;
                return data;
            }
            }
        });
    });

    function add_data() {
        let source = $("#add-data").html();
        let template = Handlebars.compile(source);
        let cek_open = 0;
        
        $('#load-data').html(template());
        $('.btn-trigger-modal').click(function() {
            $('.btn-open-modal').click()
            $('#title-modal').html('Add Apotek')
            if(cek_open==0){
                $.ajax({
                    url: url_api+'Provinsi',
                    type: 'GET',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                    },
                    dataType: 'json',
                    success: function (data, textStatus, xhr) {
                        $.each(data.value, function(i, v) {
                            $('select[name="provinsiId"]').append("<option value='" + v.id + "'>" + v.name + "</option>")
                        });
                        $('#provinsiId').select2()
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        console.log('Error in Operation');
                    }
                });
                cek_open=1;
            }
        })

        $('#straUrl').change(function() { 
           upload_stra()
        });
        $('#dokumenApiUrl').change(function() { 
           upload_dokapi()
        });
        $('#prosesBisnisUrl').change(function() { 
           upload_bisnis()
        });
        $('#suratPermohonanUrl').change(function() { 
           upload_permohonan()
        });
        $('#dokumenPseUrl').change(function() { 
           upload_dok_pse()
        });
        $('#modal-pakta').modal('show');
    }

    function upload_stra(data){
        var formData = new FormData();
        formData.append('file', $('#straUrl')[0].files[0]);
        var val_upload = $('#straUrl').val().toLowerCase(),
        regex = new RegExp("(.*?)\.(pdf)$");

        if(regex.test(val_upload) || val_upload==''){
            $.ajax({
                url: 'https://psef.kemkes.go.id/psefapifile/File',
                type: 'POST',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function (datax, textStatus, xhr) {
                    $('#v-straUrl').val(datax)
                    if(data=='edit'){
                        let split_dokumen = datax.split("/");
                        let name_dokumen = split_dokumen[5]
                        $('#close-straUrl').html(name_dokumen)
                        $("#close-straUrl").attr("href", "https://psef.kemkes.go.id"+datax);
                        $("#straUrl").prop('required',true);
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    $('#close-straUrl').html('No file chosen')
                    $("#close-straUrl").attr("href", "#");
                    $('#v-straUrl').val('')
                }
            });
        }else{
            if(data=='edit'){
                $("#straUrl").prop('required',true);
            }
            $("#straUrl").val('');
            $('#close-straUrl').html('No file chosen')
            $("#close-straUrl").attr("href", "#");
            $('#v-straUrl').val('')
            swal({
                type: 'error',
                title: 'Maaf !',
                text: 'Pastikan file yang anda upload berupa PDF',
            })
        }
    }

    function upload_dokapi(data){
        var formData = new FormData();
        formData.append('file', $('#dokumenApiUrl')[0].files[0]);
        var val_upload = $('#dokumenApiUrl').val().toLowerCase(),
        regex = new RegExp("(.*?)\.(pdf)$");

        if(regex.test(val_upload) || val_upload==''){
            $.ajax({
                url: 'https://psef.kemkes.go.id/psefapifile/File',
                type: 'POST',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function (datax, textStatus, xhr) {
                    $('#v-dokumenApiUrl').val(datax)
                    if(data=='edit'){
                        let split_dokumen = datax.split("/");
                        let name_dokumen = split_dokumen[5]
                        $('#close-dokumenApiUrl').html(name_dokumen)
                        $("#close-dokumenApiUrl").attr("href", "https://psef.kemkes.go.id"+datax);
                        $("#dokumenApiUrl").prop('required',true);
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    $('#close-dokumenApiUrl').html('No file chosen')
                    $("#close-dokumenApiUrl").attr("href", "#");
                    $('#v-dokumenApiUrl').val('')
                }
            });
        }else{
            if(data=='edit'){
                $("#dokumenApiUrl").prop('required',true);
            }
            $("#dokumenApiUrl").val('');
            $('#close-dokumenApiUrl').html('No file chosen')
            $("#close-dokumenApiUrl").attr("href", "#");
            $('#v-dokumenApiUrl').val('')
            swal({
                type: 'error',
                title: 'Maaf !',
                text: 'Pastikan file yang anda upload berupa PDF',
            })
        }
    }

    function upload_bisnis(data){
        var formData = new FormData();
        formData.append('file', $('#prosesBisnisUrl')[0].files[0]);
        var val_upload = $('#prosesBisnisUrl').val().toLowerCase(),
        regex = new RegExp("(.*?)\.(pdf)$");
        
        if(regex.test(val_upload) || val_upload==''){
            $.ajax({
                url: 'https://psef.kemkes.go.id/psefapifile/File',
                type: 'POST',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function (datax, textStatus, xhr) {
                    $('#v-prosesBisnisUrl').val(datax)
                    if(data=='edit'){
                        let split_dokumen = datax.split("/");
                        let name_dokumen = split_dokumen[5]
                        $('#close-prosesBisnisUrl').html(name_dokumen)
                        $("#close-prosesBisnisUrl").attr("href", "https://psef.kemkes.go.id"+datax);
                        $("#prosesBisnisUrl").prop('required',true);
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    $('#close-prosesBisnisUrl').html('No file chosen')
                    $("#close-prosesBisnisUrl").attr("href", "#");
                    $('#v-prosesBisnisUrl').val('')
                }
            });
        }else{
            if(data=='edit'){
                $("#prosesBisnisUrl").prop('required',true);
            }
            $("#prosesBisnisUrl").val('');
            $('#close-prosesBisnisUrl').html('No file chosen')
            $("#close-prosesBisnisUrl").attr("href", "#");
            $('#v-prosesBisnisUrl').val('')
            swal({
                type: 'error',
                title: 'Maaf !',
                text: 'Pastikan file yang anda upload berupa PDF',
            })
        }
    }

    function upload_dok_pse(data){
        var formData = new FormData();
        formData.append('file', $('#dokumenPseUrl')[0].files[0]);
        var val_upload = $('#dokumenPseUrl').val().toLowerCase(),
        regex = new RegExp("(.*?)\.(pdf)$");
       
        if(regex.test(val_upload) || val_upload==''){
            $.ajax({
                url: 'https://psef.kemkes.go.id/psefapifile/File',
                type: 'POST',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function (datax, textStatus, xhr) {
                    $('#v-dokumenPseUrl').val(datax)
                    if(data=='edit'){
                        let split_dokumen = datax.split("/");
                        let name_dokumen = split_dokumen[5]
                        $('#close-dokumenPseUrl').html(name_dokumen)
                        $("#close-dokumenPseUrl").attr("href", "https://psef.kemkes.go.id"+datax);
                        $("#dokumenPseUrl").prop('required',true);
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    $('#close-dokumenPseUrl').html('No file chosen')
                    $("#close-dokumenPseUrl").attr("href", "#");
                    $('#v-dokumenPseUrl').val('')
                }
            });
        }else{
            if(data=='edit'){
                $("#dokumenPseUrl").prop('required',true);
            }
            $("#dokumenPseUrl").val('');
            $('#close-dokumenPseUrl').html('No file chosen')
            $("#close-dokumenPseUrl").attr("href", "#");
            $('#v-dokumenPseUrl').val('')
            swal({
                type: 'error',
                title: 'Maaf !',
                text: 'Pastikan file yang anda upload berupa PDF',
            })
        }
    }

    function upload_permohonan(data){
        var formData = new FormData();
        formData.append('file', $('#suratPermohonanUrl')[0].files[0]);
        var val_upload = $('#suratPermohonanUrl').val().toLowerCase(),
        regex = new RegExp("(.*?)\.(pdf)$");
       
        if(regex.test(val_upload) || val_upload==''){
            $.ajax({
                url: 'https://psef.kemkes.go.id/psefapifile/File',
                type: 'POST',
                beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                },
                data: formData,
                processData: false,
                contentType: false,
                success: function (datax, textStatus, xhr) {
                    $('#v-suratPermohonanUrl').val(datax)
                    if(data=='edit'){
                        let split_dokumen = datax.split("/");
                        let name_dokumen = split_dokumen[5]
                        $('#close-suratPermohonanUrl').html(name_dokumen)
                        $("#close-suratPermohonanUrl").attr("href", "https://psef.kemkes.go.id"+datax);
                        $("#suratPermohonanUrl").prop('required',true);
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    $('#close-suratPermohonanUrl').html('No file chosen')
                    $("#close-suratPermohonanUrl").attr("href", "#");
                    $('#v-suratPermohonanUrl').val('')
                }
            });
        }else{
            if(data=='edit'){
                $("#suratPermohonanUrl").prop('required',true);
            }
            $("#suratPermohonanUrl").val('');
            $('#close-suratPermohonanUrl').html('No file chosen')
            $("#close-suratPermohonanUrl").attr("href", "#");
            $('#v-suratPermohonanUrl').val('')
            swal({
                type: 'error',
                title: 'Maaf !',
                text: 'Pastikan file yang anda upload berupa PDF',
            })
        }
    }

    $('.modal-close-conf').click(function() {
        close_modals();
    })

    function close_modals() {
        $('.modal-close').click();
        $('#name').val('')
        $('#siaNumber').val('')
        $('#apotekerName').val('')
        $('#straNumber').val('')
        $('#sipaNumber').val('')
        $('#address').val('')
        $('select[name="provinsiId"]').val(null).trigger("change");
    }

    function detail_add(e){
        e.preventDefault();
        var data = $('#add_detail_data').serializeFormJSON();
        let name_provinsi = $('#provinsiId').select2('data');

        if(data.editdetail=='deletedetail'){
            
            $('#'+data.rowdetail).remove()

            $.each(arr_detail_add, function( indexa, valuea ) {
                if(data.rowdetail==valuea.iddetail){
                    cc=indexa
                }
            });

            Array.prototype.remove = function(indexcc) {
                this.splice(indexcc, 1);
            }

            arr_detail_add.remove(cc)

            var s_detail = [];

            arr_detail_add.map((val, index) => {
                s_detail.push(val)
            })
            arr_detail_add = s_detail
            arr_detail_add_x.detail = s_detail;
        }

        arr_detail_add.push(
            {"name": data.name,"permohonanId": 0,"siaNumber": data.siaNumber,"apotekerName": data.apotekerName,"straNumber": data.straNumber,"sipaNumber": data.sipaNumber,"address": data.address,"provinsiId": data.provinsiId,"iddetail":id_detail_add}
        )

        arr_detail_add_x = {detail:arr_detail_add}

        $('#data').val(JSON.stringify(arr_detail_add_x))
        $(".detail-item").append(`<tr id="${id_detail_add}">
                                    <td>${data.name}</td>                                      
                                    <td>${data.siaNumber}</td>                                      
                                    <td>${data.apotekerName}</td>                                      
                                    <td>${data.straNumber}</td>                                      
                                    <td>${data.sipaNumber}</td>                                      
                                    <td>${data.address}</td>                                      
                                    <td>${name_provinsi[0].text}</td>                                      
                                    <td>
                                        <button onclick="edit_detail_add('${id_detail_add}')" type="button" class="btn waves-effect waves-light btn-primary" iddadd="${id_detail_add}">Edit Detail</button>
                                        <button onclick="delete_detail_add('${id_detail_add}')" type="button" class="btn waves-effect waves-light btn-danger" iddadd="${id_detail_add}">Delete</button>
                                    </td>
                                </tr>`)
        id_detail_add++;
        close_modals()
    }

    function edit_detail_add(id){
        $.each(arr_detail_add, function( i, v ) {
            if(id==v.iddetail){
                $("#name").val(v.name)
                $("#siaNumber").val(v.siaNumber)
                $("#apotekerName").val(v.apotekerName)
                $("#straNumber").val(v.straNumber)
                $("#sipaNumber").val(v.sipaNumber)
                $("#address").val(v.address)
                $('select[name="provinsiId"]').val(v.provinsiId).trigger("change");
                $('#title-modal').html('Edit Apotek')
                $("#editdetail").val('deletedetail')
                $("#rowdetail").val(v.iddetail)
            }
        });
        $('.btn-open-modal').click()  
    }

    function delete_detail_add(id){
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    success: function (data, textStatus, xhr) {
                        swal(
                            'Deleted!',
                            data.CrudMsg,
                            'success'
                        )

                        $('#'+id).remove()

                        $.each(arr_detail_add, function( indexa, valuea ) {
                            if(id==valuea.iddetail){
                                cc=indexa
                            }
                        });

                        Array.prototype.remove = function(indexcc) {
                            this.splice(indexcc, 1);
                        }

                        arr_detail_add.remove(cc)

                        var s_detail = [];

                        arr_detail_add.map((val, index) => {
                            s_detail.push(val)
                        })
                        arr_detail_add = s_detail
                        arr_detail_add_x.detail = s_detail;

                        $('#data').val('')
                        $('#data').val(JSON.stringify(arr_detail_add_x))
                    }
                });
            }
        })
    }

    function data_save(e) {
        e.preventDefault();
        var data = $('#add-data-new').serializeFormJSON();
        data.typeId = 1;
        let detail_data_save = JSON.parse(data.data)
        delete data.data

        $.ajax({
            url: url_api_x+'PermohonanCurrentUser',
            type: 'POST',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            data: JSON.stringify(data),
            contentType: 'application/json',
            success: function (datax, textStatus, xhr) {

                $.each(detail_data_save.detail, function( indexa, valuea ) {
                    detail_data_save.detail[indexa].permohonanId = datax.id
                    delete detail_data_save.detail[indexa].iddetail
                });
                
                detail_data_save.apotek = detail_data_save.detail
                delete detail_data_save.detail
                detail_data_save.permohonanId = datax.id

                $.ajax({
                    url: url_api_x+'PermohonanApotek',
                    type: 'POST',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                    },
                    data: JSON.stringify(detail_data_save),
                    contentType: 'application/json',
                    success: function (datac, textStatus, xhrx) {
                        if (xhrx.status == '204') {
                            routing('rumusan_user');
                            toastr.success("Add Permohonan", 'Success!');
                        }else{
                            toastr.error("Gagal Add Permohonan", 'Error!');
                        }
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

    function view_data(id){
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
                                                view_data_detail(data,datax,datac,datab)
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
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });

       
    }

    function view_data_detail(data_permohonan, data_apotek, data_klinik, data_rs){
        let source = $("#view-data").html();
        let template = Handlebars.compile(source);
        let data =[];
        data.data_permohonan = data_permohonan
        data.data_apotek = data_apotek
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
