<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title" id="page-title">Permohonan (Dikembalikan)</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" id="list-breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Permohonan (Dikembalikan)</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center" id="refresh-page">
                <button onclick="routing('dikembalikan_user')" type="button" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fas fa-redo"></i> Segarkan Halaman</button>
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
                            <h4 class="page-title">Data Permohonan (Dikembalikan)</h4>
                        </div>
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
        <button type="button" class="btn btn-danger" onclick="routing('dikembalikan_user')">Kembali</button>
        <button type="button" class="btn btn-success" onclick="ajukan_permohonan('{{data_permohonan.id}}')">Ajukan Permohonan</button>
    </form>
</script>

<!-- Template for edit -->
<script id="edit-data" type="text/x-handlebars-template">
    <h4 class="card-title">Ubah Data Permohonan</h4>
    <form class="m-t-30" id="data-update" onsubmit="update_data(event)">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nomor Permohonan</label>
                    <input type="text" value= "{{permohonanNumber}}" class="form-control" name="permohonanNumber" disabled>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Alamat Domain Web</label>
                     <input type="text" value= "{{domain}}" class="form-control" name="domain" placeholder="Masukan Alamat Domain Web." required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nama Sistem</label>
                    <input type="text" value= "{{systemName}}" class="form-control" name="systemName" placeholder="Masukan Nama Sistem." required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nama Apoteker</label>
                    <input type="text" value= "{{apotekerName}}" class="form-control" name="apotekerName" placeholder="Masukan Nama Apoteker." required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Email Apoteker</label>
                    <input type="email" value= "{{apotekerEmail}}" class="form-control" name="apotekerEmail" placeholder="Masukan Email Apoteker." required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nomor Telepon Apoteker</label>
                    <input type="text" value= "{{apotekerPhone}}" class="form-control" name="apotekerPhone" placeholder="Masukan Nomor Telepon Apoteker." required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label>NIK Apoteker</label>
                    <input type="text" value= "{{apotekerNik}}" class="form-control" name="apotekerNik" placeholder="Masukan NIK Apoteker." required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Nomor STRA</label>
                    <input type="text" value= "{{straNumber}}" class="form-control" name="straNumber" placeholder="Masukan Nomor STRA." required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>Kedaluwarsa STRA</label>
                    <input type="date" value= "{{straExpiry}}" class="form-control" name="straExpiry" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label><b>Contoh Surat</b></label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id/assets/doc/Contoh%20Surat%20Permohonan%20Tanda%20Daftar%20PSEF.docx">Contoh Surat Permohonan</a>
            </div>
            <br>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id/assets/doc/Contoh%20Dokumen%20PSE%20Kominfo.docx">Contoh Dokumen PSE Kominfo</a>
            </div>
        </div>
        <div class="form-group">
            <label>Salinan STRA</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{straUrl}}" id="close-straUrl">{{name_straUrl}}</a>
            </div>
            <input type="file" class="form-control" id="straUrl">
            <small class="form-text text-muted">*Berkas yang anda upload wajib PDF & size file maksimal 5 MB</small>
            <input type="hidden" name="straUrl" id="v-straUrl">
        </div>
        <div class="form-group">
            <label>Surat Permohonan</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{suratPermohonanUrl}}" id="close-suratPermohonanUrl">{{name_suratPermohonanUrl}}</a>
            </div>
            <input type="file" class="form-control" id="suratPermohonanUrl">
            <small class="form-text text-muted">*Berkas yang anda upload wajib PDF & size file maksimal 5 MB</small>
            <input type="hidden" name="suratPermohonanUrl" id="v-suratPermohonanUrl">
        </div>
        <div class="form-group">
            <label>Dokumen Proses Bisnis</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{prosesBisnisUrl}}" id="close-prosesBisnisUrl">{{name_prosesBisnisUrl}}</a>
            </div>
            <input type="file" class="form-control" id="prosesBisnisUrl">
            <small class="form-text text-muted">*Berkas yang anda upload wajib PDF & size file maksimal 5 MB</small>
            <input type="hidden" name="prosesBisnisUrl" id="v-prosesBisnisUrl">
        </div>
        <div class="form-group">
            <label>Dokumen Application Programmer Interface Sistem PSEF</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{dokumenApiUrl}}" id="close-dokumenApiUrl">{{name_dokumenApiUrl}}</a>
            </div>
            <input type="file" class="form-control" id="dokumenApiUrl">
            <small class="form-text text-muted">*Berkas yang anda upload wajib PDF & size file maksimal 5 MB</small>
            <input type="hidden" name="dokumenApiUrl" id="v-dokumenApiUrl">
        </div>
        <div class="form-group">
            <label>Dokumen PSE Kominfo</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{dokumenPseUrl}}" id="close-dokumenPseUrl">{{name_dokumenPseUrl}}</a>
            </div>
            <input type="file" class="form-control" id="dokumenPseUrl">
            <small class="form-text text-muted">*Berkas yang anda upload wajib PDF & size file maksimal 5 MB</small>
            <input type="hidden" name="dokumenPseUrl" id="v-dokumenPseUrl">
        </div>
        <div class="form-group">
            <label>SPPL</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{spplUrl}}" id="close-spplUrl">{{name_spplUrl}}</a>
            </div>
            <input type="file" class="form-control" id="spplUrl">
            <small class="form-text text-muted">*Berkas yang anda upload wajib PDF & size file maksimal 5 MB</small>
            <input type="hidden" name="spplUrl" id="v-spplUrl">
        </div>
        <div class="form-group">
            <label>Izin Lokasi</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{izinLokasiUrl}}" id="close-izinLokasiUrl">{{name_izinLokasiUrl}}</a>
            </div>
            <input type="file" class="form-control" id="izinLokasiUrl">
            <small class="form-text text-muted">*Berkas yang anda upload wajib PDF & size file maksimal 5 MB</small>
            <input type="hidden" name="izinLokasiUrl" id="v-izinLokasiUrl">
        </div>
        <div class="form-group">
            <label>IMB</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{imbUrl}}" id="close-imbUrl">{{name_imbUrl}}</a>
            </div>
            <input type="file" class="form-control" id="imbUrl">
            <small class="form-text text-muted">*Berkas yang anda upload wajib PDF & size file maksimal 5 MB</small>
            <input type="hidden" name="imbUrl" id="v-imbUrl">
        </div>
        <div class="form-group">
            <label>Pembayaran PNBP</label>
            <div class="border p-10" style="background-color: #e9ecef;padding: .375rem .75rem;">
                <a href="https://psef.kemkes.go.id{{pembayaranPnbpUrl}}" id="close-pembayaranPnbpUrl">{{name_pembayaranPnbpUrl}}</a>
            </div>
            <input type="file" class="form-control" id="pembayaranPnbpUrl">
            <small class="form-text text-muted">*Berkas yang anda upload wajib PDF & size file maksimal 5 MB</small>
            <input type="hidden" name="pembayaranPnbpUrl" id="v-pembayaranPnbpUrl">
        </div>
        <br><br>
        <input type="checkbox" value="check" id="agree" required/> Dengan ini saya menyatakan bahwa data yang saya isi adalah benar
        <br><br>
        <input type="hidden" name="pemohonId" id="pemohonId" value="{{pemohonId}}">
        <input type="hidden" name="id" value="{{id}}">
        <button type="submit" class="btn btn-primary">Kirim</button>
        <button type="button" class="btn btn-danger" onclick="routing('dikembalikan_user')">Batal</button>
    </form>
</script>

<?php include ('../template/add_apotek.html'); ?>
<?php include ('../template/edit_apotek.html'); ?>
<?php include ('../template/view_apotek.html'); ?>
<?php include ('../template/modal_apotek.html'); ?>

<?php include ('../template/add_klinik.html'); ?>
<?php include ('../template/edit_klinik.html'); ?>
<?php include ('../template/view_klinik.html'); ?>
<?php include ('../template/modal_klinik.html'); ?>

<?php include ('../template/add_rumah_sakit.html'); ?>
<?php include ('../template/edit_rumah_sakit.html'); ?>
<?php include ('../template/view_rumah_sakit.html'); ?>
<?php include ('../template/modal_rumah_sakit.html'); ?>

<script>
    var accesstoken = <?php echo json_encode($_COOKIE['accesstoken']); ?>;
    var arr_detail_add = [];
    var arr_detail_add_x = [];
    var arr_detail_add_klinik = [];
    var arr_detail_add_klinik_x = [];
    var arr_detail_add_rs = [];
    var arr_detail_add_rs_x = [];
    var id_detail_add = 0;
    var id_detail_add_klinik = 0;
    var id_detail_add_rs = 0;
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

                var actions = '<td><button onclick="view_data(\''+json.data[i].id+'\')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-info">Lihat Detail Data</button><button onclick="edit_data_permohonan(\''+json.data[i].id+'\')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-primary">Ubah Permohonan</button><button onclick="edit_data_apotek(\''+json.data[i].id+'\',\''+json.data[i].permohonanNumber+'\')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-secondary">Ubah Apotek</button><button onclick="edit_data_klinik(\''+json.data[i].id+'\',\''+json.data[i].permohonanNumber+'\')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-warning">Ubah Klinik</button><button onclick="edit_data_rs(\''+json.data[i].id+'\',\''+json.data[i].permohonanNumber+'\')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-danger">Ubah Rumah Sakit</button><button onclick="ajukan_permohonan(\''+json.data[i].id+'\')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-success">Ajukan Permohonan</button></td>';

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
                data.fmodul = 'PermohonanCurrentUser/Dikembalikan';
                data.flsearch = 'permohonanNumber,domain,straNumber';
                data.ftots = 3;
                return data;
            }
            }
        });
    });

    function upload_stra(data){
        var formData = new FormData();
        formData.append('file', $('#straUrl')[0].files[0]);
        var data_upload =  $('#straUrl')[0].files[0];
        console.log(data_upload)
        var val_upload = $('#straUrl').val().toLowerCase(),
        regex = new RegExp("(.*?)\.(pdf)$");

        if(regex.test(val_upload) || val_upload==''){
            if(data_upload.size<5300000 && data_upload.size>0){
                $.ajax({
                    url: url_api_x+'UploadUserFile',
                    type: 'POST',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (datax, textStatus, xhr) {
                        $('#v-straUrl').val(datax.value)
                        if(data=='edit'){
                            let split_dokumen = datax.value.split("/");
                            let name_dokumen = split_dokumen[split_dokumen.length-1]
                            $('#close-straUrl').html(name_dokumen)
                            $("#close-straUrl").attr("href", "https://psef.kemkes.go.id"+datax.value);
                            $("#straUrl").prop('required',true);
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
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
                            text: 'Pastikan Berkas yang anda upload sesuai dengan ketentuan!',
                        })
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
                    text: 'Pastikan berkas yang anda upload maksimal 1MB',
                })
            }
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
                text: 'Pastikan berkas yang anda upload berupa PDF',
            })
        }
    }

    function upload_dokapi(data){
        var formData = new FormData();
        formData.append('file', $('#dokumenApiUrl')[0].files[0]);
        var data_upload =  $('#dokumenApiUrl')[0].files[0];
        var val_upload = $('#dokumenApiUrl').val().toLowerCase(),
        regex = new RegExp("(.*?)\.(pdf)$");

        if(regex.test(val_upload) || val_upload==''){
            if(data_upload.size<5300000 && data_upload.size>0){
                $.ajax({
                    url: url_api_x+'UploadUserFile',
                    type: 'POST',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (datax, textStatus, xhr) {
                        $('#v-dokumenApiUrl').val(datax.value)
                        if(data=='edit'){
                            let split_dokumen = datax.value.split("/");
                            let name_dokumen = split_dokumen[split_dokumen.length-1]
                            $('#close-dokumenApiUrl').html(name_dokumen)
                            $("#close-dokumenApiUrl").attr("href", "https://psef.kemkes.go.id"+datax.value);
                            $("#dokumenApiUrl").prop('required',true);
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
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
                            text: 'Pastikan Berkas yang anda upload sesuai dengan ketentuan!',
                        })
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
                    text: 'Pastikan berkas yang anda upload maksimal 1MB',
                })
            }
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
                text: 'Pastikan berkas yang anda upload berupa PDF',
            })
        }
    }

    function upload_bisnis(data){
        var formData = new FormData();
        formData.append('file', $('#prosesBisnisUrl')[0].files[0]);
        var data_upload =  $('#prosesBisnisUrl')[0].files[0];
        var val_upload = $('#prosesBisnisUrl').val().toLowerCase(),
        regex = new RegExp("(.*?)\.(pdf)$");

        if(regex.test(val_upload) || val_upload==''){
            if(data_upload.size<5300000 && data_upload.size>0){
                $.ajax({
                    url: url_api_x+'UploadUserFile',
                    type: 'POST',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (datax, textStatus, xhr) {
                        $('#v-prosesBisnisUrl').val(datax.value)
                        if(data=='edit'){
                            let split_dokumen = datax.value.split("/");
                            let name_dokumen = split_dokumen[split_dokumen.length-1]
                            $('#close-prosesBisnisUrl').html(name_dokumen)
                            $("#close-prosesBisnisUrl").attr("href", "https://psef.kemkes.go.id"+datax.value);
                            $("#prosesBisnisUrl").prop('required',true);
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
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
                            text: 'Pastikan Berkas yang anda upload sesuai dengan ketentuan!',
                        })
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
                    text: 'Pastikan berkas yang anda upload maksimal 1MB',
                })
            }
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
                text: 'Pastikan berkas yang anda upload berupa PDF',
            })
        }
    }

    function upload_dok_pse(data){
        var formData = new FormData();
        formData.append('file', $('#dokumenPseUrl')[0].files[0]);
        var data_upload =  $('#dokumenPseUrl')[0].files[0];
        var val_upload = $('#dokumenPseUrl').val().toLowerCase(),
        regex = new RegExp("(.*?)\.(pdf)$");

        if(regex.test(val_upload) || val_upload==''){
            if(data_upload.size<5300000 && data_upload.size>0){
                $.ajax({
                    url: url_api_x+'UploadUserFile',
                    type: 'POST',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (datax, textStatus, xhr) {
                        $('#v-dokumenPseUrl').val(datax.value)
                        if(data=='edit'){
                            let split_dokumen = datax.value.split("/");
                            let name_dokumen = split_dokumen[split_dokumen.length-1]
                            $('#close-dokumenPseUrl').html(name_dokumen)
                            $("#close-dokumenPseUrl").attr("href", "https://psef.kemkes.go.id"+datax.value);
                            $("#dokumenPseUrl").prop('required',true);
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
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
                            text: 'Pastikan Berkas yang anda upload sesuai dengan ketentuan!',
                        })
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
                    text: 'Pastikan berkas yang anda upload maksimal 1MB',
                })
            }
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
                text: 'Pastikan berkas yang anda upload berupa PDF',
            })
        }
    }

    function upload_permohonan(data){
        var formData = new FormData();
        formData.append('file', $('#suratPermohonanUrl')[0].files[0]);
        var data_upload =  $('#suratPermohonanUrl')[0].files[0];
        var val_upload = $('#suratPermohonanUrl').val().toLowerCase(),
        regex = new RegExp("(.*?)\.(pdf)$");

        if(regex.test(val_upload) || val_upload==''){
            if(data_upload.size<5300000 && data_upload.size>0){
                $.ajax({
                    url: url_api_x+'UploadUserFile',
                    type: 'POST',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (datax, textStatus, xhr) {
                        $('#v-suratPermohonanUrl').val(datax.value)
                        if(data=='edit'){
                            let split_dokumen = datax.value.split("/");
                            let name_dokumen = split_dokumen[split_dokumen.length-1]
                            $('#close-suratPermohonanUrl').html(name_dokumen)
                            $("#close-suratPermohonanUrl").attr("href", "https://psef.kemkes.go.id"+datax.value);
                            $("#suratPermohonanUrl").prop('required',true);
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
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
                            text: 'Pastikan Berkas yang anda upload sesuai dengan ketentuan!',
                        })
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
                    text: 'Pastikan berkas yang anda upload maksimal 1MB',
                })
            }
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
                text: 'Pastikan berkas yang anda upload berupa PDF',
            })
        }
    }

    function upload_sppl(data){
        var formData = new FormData();
        formData.append('file', $('#spplUrl')[0].files[0]);
        var data_upload =  $('#spplUrl')[0].files[0];
        var val_upload = $('#spplUrl').val().toLowerCase(),
        regex = new RegExp("(.*?)\.(pdf)$");

        if(regex.test(val_upload) || val_upload==''){
            if(data_upload.size<5300000 && data_upload.size>0){
                $.ajax({
                    url: url_api_x+'UploadUserFile',
                    type: 'POST',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (datax, textStatus, xhr) {
                        $('#v-spplUrl').val(datax.value)
                        if(data=='edit'){
                            let split_dokumen = datax.value.split("/");
                            let name_dokumen = split_dokumen[split_dokumen.length-1]
                            $('#close-spplUrl').html(name_dokumen)
                            $("#close-spplUrl").attr("href", "https://psef.kemkes.go.id"+datax.value);
                            $("#spplUrl").prop('required',true);
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        if(data=='edit'){
                            $("#spplUrl").prop('required',true);
                        }
                        $("#spplUrl").val('');
                        $('#close-spplUrl').html('No file chosen')
                        $("#close-spplUrl").attr("href", "#");
                        $('#v-spplUrl').val('')
                        swal({
                            type: 'error',
                            title: 'Maaf !',
                            text: 'Pastikan Berkas yang anda upload sesuai dengan ketentuan!',
                        })
                    }
                });
            }else{
                if(data=='edit'){
                    $("#spplUrl").prop('required',true);
                }
                $("#spplUrl").val('');
                $('#close-spplUrl').html('No file chosen')
                $("#close-spplUrl").attr("href", "#");
                $('#v-spplUrl').val('')
                swal({
                    type: 'error',
                    title: 'Maaf !',
                    text: 'Pastikan berkas yang anda upload maksimal 1MB',
                })
            }
        }else{
            if(data=='edit'){
                $("#spplUrl").prop('required',true);
            }
            $("#spplUrl").val('');
            $('#close-spplUrl').html('No file chosen')
            $("#close-spplUrl").attr("href", "#");
            $('#v-spplUrl').val('')
            swal({
                type: 'error',
                title: 'Maaf !',
                text: 'Pastikan berkas yang anda upload berupa PDF',
            })
        }
    }

    function upload_izin_lokasi(data){
        var formData = new FormData();
        formData.append('file', $('#izinLokasiUrl')[0].files[0]);
        var data_upload =  $('#izinLokasiUrl')[0].files[0];
        var val_upload = $('#izinLokasiUrl').val().toLowerCase(),
        regex = new RegExp("(.*?)\.(pdf)$");

        if(regex.test(val_upload) || val_upload==''){
            if(data_upload.size<5300000 && data_upload.size>0){
                $.ajax({
                    url: url_api_x+'UploadUserFile',
                    type: 'POST',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (datax, textStatus, xhr) {
                        $('#v-izinLokasiUrl').val(datax.value)
                        if(data=='edit'){
                            let split_dokumen = datax.value.split("/");
                            let name_dokumen = split_dokumen[split_dokumen.length-1]
                            $('#close-izinLokasiUrl').html(name_dokumen)
                            $("#close-izinLokasiUrl").attr("href", "https://psef.kemkes.go.id"+datax.value);
                            $("#izinLokasiUrl").prop('required',true);
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        if(data=='edit'){
                            $("#izinLokasiUrl").prop('required',true);
                        }
                        $("#izinLokasiUrl").val('');
                        $('#close-izinLokasiUrl').html('No file chosen')
                        $("#close-izinLokasiUrl").attr("href", "#");
                        $('#v-izinLokasiUrl').val('')
                        swal({
                            type: 'error',
                            title: 'Maaf !',
                            text: 'Pastikan Berkas yang anda upload sesuai dengan ketentuan!',
                        })
                    }
                });
            }else{
                if(data=='edit'){
                    $("#izinLokasiUrl").prop('required',true);
                }
                $("#izinLokasiUrl").val('');
                $('#close-izinLokasiUrl').html('No file chosen')
                $("#close-izinLokasiUrl").attr("href", "#");
                $('#v-izinLokasiUrl').val('')
                swal({
                    type: 'error',
                    title: 'Maaf !',
                    text: 'Pastikan berkas yang anda upload maksimal 1MB',
                })
            }
        }else{
            if(data=='edit'){
                $("#izinLokasiUrl").prop('required',true);
            }
            $("#izinLokasiUrl").val('');
            $('#close-izinLokasiUrl').html('No file chosen')
            $("#close-izinLokasiUrl").attr("href", "#");
            $('#v-izinLokasiUrl').val('')
            swal({
                type: 'error',
                title: 'Maaf !',
                text: 'Pastikan berkas yang anda upload berupa PDF',
            })
        }
    }

    function upload_imb(data){
        var formData = new FormData();
        formData.append('file', $('#imbUrl')[0].files[0]);
        var data_upload =  $('#imbUrl')[0].files[0];
        var val_upload = $('#imbUrl').val().toLowerCase(),
        regex = new RegExp("(.*?)\.(pdf)$");

        if(regex.test(val_upload) || val_upload==''){
            if(data_upload.size<5300000 && data_upload.size>0){
                $.ajax({
                    url: url_api_x+'UploadUserFile',
                    type: 'POST',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (datax, textStatus, xhr) {
                        $('#v-imbUrl').val(datax.value)
                        if(data=='edit'){
                            let split_dokumen = datax.value.split("/");
                            let name_dokumen = split_dokumen[split_dokumen.length-1]
                            $('#close-imbUrl').html(name_dokumen)
                            $("#close-imbUrl").attr("href", "https://psef.kemkes.go.id"+datax.value);
                            $("#imbUrl").prop('required',true);
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        if(data=='edit'){
                            $("#imbUrl").prop('required',true);
                        }
                        $("#imbUrl").val('');
                        $('#close-imbUrl').html('No file chosen')
                        $("#close-imbUrl").attr("href", "#");
                        $('#v-imbUrl').val('')
                        swal({
                            type: 'error',
                            title: 'Maaf !',
                            text: 'Pastikan Berkas yang anda upload sesuai dengan ketentuan!',
                        })
                    }
                });
            }else{
                if(data=='edit'){
                    $("#imbUrl").prop('required',true);
                }
                $("#imbUrl").val('');
                $('#close-imbUrl').html('No file chosen')
                $("#close-imbUrl").attr("href", "#");
                $('#v-imbUrl').val('')
                swal({
                    type: 'error',
                    title: 'Maaf !',
                    text: 'Pastikan berkas yang anda upload maksimal 1MB',
                })
            }
        }else{
            if(data=='edit'){
                $("#imbUrl").prop('required',true);
            }
            $("#imbUrl").val('');
            $('#close-imbUrl').html('No file chosen')
            $("#close-imbUrl").attr("href", "#");
            $('#v-imbUrl').val('')
            swal({
                type: 'error',
                title: 'Maaf !',
                text: 'Pastikan berkas yang anda upload berupa PDF',
            })
        }
    }

    function upload_pnbp(data){
        var formData = new FormData();
        formData.append('file', $('#pembayaranPnbpUrl')[0].files[0]);
        var data_upload =  $('#pembayaranPnbpUrl')[0].files[0];
        var val_upload = $('#pembayaranPnbpUrl').val().toLowerCase(),
        regex = new RegExp("(.*?)\.(pdf)$");

        if(regex.test(val_upload) || val_upload==''){
            if(data_upload.size<5300000 && data_upload.size>0){
                $.ajax({
                    url: url_api_x+'UploadUserFile',
                    type: 'POST',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (datax, textStatus, xhr) {
                        $('#v-pembayaranPnbpUrl').val(datax.value)
                        if(data=='edit'){
                            let split_dokumen = datax.value.split("/");
                            let name_dokumen = split_dokumen[split_dokumen.length-1]
                            $('#close-pembayaranPnbpUrl').html(name_dokumen)
                            $("#close-pembayaranPnbpUrl").attr("href", "https://psef.kemkes.go.id"+datax.value);
                            $("#pembayaranPnbpUrl").prop('required',true);
                        }
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        if(data=='edit'){
                            $("#pembayaranPnbpUrl").prop('required',true);
                        }
                        $("#pembayaranPnbpUrl").val('');
                        $('#close-pembayaranPnbpUrl').html('No file chosen')
                        $("#close-pembayaranPnbpUrl").attr("href", "#");
                        $('#v-pembayaranPnbpUrl').val('')
                        swal({
                            type: 'error',
                            title: 'Maaf !',
                            text: 'Pastikan Berkas yang anda upload sesuai dengan ketentuan!',
                        })
                    }
                });
            }else{
                if(data=='edit'){
                    $("#pembayaranPnbpUrl").prop('required',true);
                }
                $("#pembayaranPnbpUrl").val('');
                $('#close-pembayaranPnbpUrl').html('No file chosen')
                $("#close-pembayaranPnbpUrl").attr("href", "#");
                $('#v-pembayaranPnbpUrl').val('')
                swal({
                    type: 'error',
                    title: 'Maaf !',
                    text: 'Pastikan berkas yang anda upload maksimal 1MB',
                })
            }
        }else{
            if(data=='edit'){
                $("#pembayaranPnbpUrl").prop('required',true);
            }
            $("#pembayaranPnbpUrl").val('');
            $('#close-pembayaranPnbpUrl').html('No file chosen')
            $("#close-pembayaranPnbpUrl").attr("href", "#");
            $('#v-pembayaranPnbpUrl').val('')
            swal({
                type: 'error',
                title: 'Maaf !',
                text: 'Pastikan berkas yang anda upload berupa PDF',
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
        let name_provinsi = $('#provinsiIdApotek').select2('data');

        if(data.editdetail=='deletedetail'){

            $('#apotek_'+data.rowdetail).remove()

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
        $(".detail-item").append(`<tr id="apotek_${id_detail_add}">
                                    <td>${data.name}</td>
                                    <td>${data.siaNumber}</td>
                                    <td>${data.apotekerName}</td>
                                    <td>${data.straNumber}</td>
                                    <td>${data.sipaNumber}</td>
                                    <td>${data.address}</td>
                                    <td>${name_provinsi[0].text}</td>
                                    <td>
                                        <button onclick="edit_detail_add('${id_detail_add}')" type="button" class="btn waves-effect waves-light btn-primary" iddadd="${id_detail_add}">Ubah Apotek</button>
                                        <button onclick="delete_detail_add('${id_detail_add}')" type="button" class="btn waves-effect waves-light btn-danger" iddadd="${id_detail_add}">Hapus</button>
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
                $('#provinsiIdApotek').val(v.provinsiId).trigger("change");
                $('#title-modal').html('Ubah Apotek')
                $("#editdetail").val('deletedetail')
                $("#rowdetail").val(v.iddetail)
            }
        });
        $('.btn-open-modal').click()
    }

    function delete_detail_add(id){
        swal({
            title: 'Hapus Apotek',
            text: "Apakah Anda yakin menghapus apotek ini ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "Batal",
            confirmButtonText: 'Ya, Hapus !'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    success: function (data, textStatus, xhr) {
                        swal(
                            'Berhasil!',
                            'Apotek dihapus',
                            'success'
                        )

                        $('#apotek_'+id).remove()

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

    function detail_add_klinik(e){
        e.preventDefault();
        var data = $('#add_detail_data_klinik').serializeFormJSON();
        let name_provinsi = $('#provinsiIdKlinik').select2('data');

        if(data.editdetail=='deletedetail'){

            $('#klinik_'+data.rowdetail).remove()

            $.each(arr_detail_add_klinik, function( indexa, valuea ) {
                if(data.rowdetail==valuea.iddetail){
                    cc=indexa
                }
            });

            Array.prototype.remove = function(indexcc) {
                this.splice(indexcc, 1);
            }

            arr_detail_add_klinik.remove(cc)

            var s_detail = [];

            arr_detail_add_klinik.map((val, index) => {
                s_detail.push(val)
            })
            arr_detail_add_klinik = s_detail
            arr_detail_add_klinik_x.detail = s_detail;
        }

        arr_detail_add_klinik.push(
            {"name": data.name,"permohonanId": 0,"apotekerName": data.apotekerName,"straNumber": data.straNumber,"sipaNumber": data.sipaNumber,"address": data.address,"provinsiId": data.provinsiId,"iddetail":id_detail_add_klinik}
        )

        arr_detail_add_klinik_x = {detail:arr_detail_add_klinik}

        $('#data_klinik').val(JSON.stringify(arr_detail_add_klinik_x))
        $(".detail-item-klinik").append(`<tr id="klinik_${id_detail_add_klinik}">
                                    <td>${data.name}</td>
                                    <td>${data.apotekerName}</td>
                                    <td>${data.straNumber}</td>
                                    <td>${data.sipaNumber}</td>
                                    <td>${data.address}</td>
                                    <td>${name_provinsi[0].text}</td>
                                    <td>
                                        <button onclick="edit_detail_add_klinik('${id_detail_add_klinik}')" type="button" class="btn waves-effect waves-light btn-primary" iddadd="${id_detail_add_klinik}">Ubah Klinik</button>
                                        <button onclick="delete_detail_add_klinik('${id_detail_add_klinik}')" type="button" class="btn waves-effect waves-light btn-danger" iddadd="${id_detail_add_klinik}">Hapus</button>
                                    </td>
                                </tr>`)
        id_detail_add_klinik++;
        close_modals()
    }

    function edit_detail_add_klinik(id){
        $.each(arr_detail_add_klinik, function( i, v ) {
            if(id==v.iddetail){
                $("#name_klinik").val(v.name)
                $("#apotekerName_klinik").val(v.apotekerName)
                $("#straNumber_klinik").val(v.straNumber)
                $("#sipaNumber_klinik").val(v.sipaNumber)
                $("#address_klinik").val(v.address)
                $('#provinsiIdKlinik').val(v.provinsiId).trigger("change");
                $('#title-modal-klinik').html('Ubah Klinik')
                $("#editdetail_klinik").val('deletedetail')
                $("#rowdetail_klinik").val(v.iddetail)
            }
        });
        $('.btn-open-modal-klinik').click()
    }

    function delete_detail_add_klinik(id){
        swal({
            title: 'Hapus Klinik',
            text: "Apakah Anda yakin menghapus klinik ini ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "Batal",
            confirmButtonText: 'Ya, Hapus !'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    success: function (data, textStatus, xhr) {
                        swal(
                            'Berhasil!',
                            'Klinik dihapus',
                            'success'
                        )

                        $('#klinik_'+id).remove()

                        $.each(arr_detail_add_klinik, function( indexa, valuea ) {
                            if(id==valuea.iddetail){
                                cc=indexa
                            }
                        });

                        Array.prototype.remove = function(indexcc) {
                            this.splice(indexcc, 1);
                        }

                        arr_detail_add_klinik.remove(cc)

                        var s_detail = [];

                        arr_detail_add_klinik.map((val, index) => {
                            s_detail.push(val)
                        })
                        arr_detail_add_klinik = s_detail
                        arr_detail_add_klinik_x.detail = s_detail;

                        $('#data_klinik').val('')
                        $('#data_klinik').val(JSON.stringify(arr_detail_add_klinik_x))
                    }
                });
            }
        })
    }
    function detail_add_rs(e){
        e.preventDefault();
        var data = $('#add_detail_data_rs').serializeFormJSON();
        let name_provinsi = $('#provinsiIdRs').select2('data');

        if(data.editdetail=='deletedetail'){

            $('#rs_'+data.rowdetail).remove()

            $.each(arr_detail_add_rs, function( indexa, valuea ) {
                if(data.rowdetail==valuea.iddetail){
                    cc=indexa
                }
            });

            Array.prototype.remove = function(indexcc) {
                this.splice(indexcc, 1);
            }

            arr_detail_add_rs.remove(cc)

            var s_detail = [];

            arr_detail_add_rs.map((val, index) => {
                s_detail.push(val)
            })
            arr_detail_add_rs = s_detail
            arr_detail_add_rs_x.detail = s_detail;
        }

        arr_detail_add_rs.push(
            {"name": data.name,"permohonanId": 0,"apotekerName": data.apotekerName,"straNumber": data.straNumber,"sipaNumber": data.sipaNumber,"address": data.address,"provinsiId": data.provinsiId,"iddetail":id_detail_add_rs}
        )

        arr_detail_add_rs_x = {detail:arr_detail_add_rs}

        $('#data_rs').val(JSON.stringify(arr_detail_add_rs_x))
        $(".detail-item-rs").append(`<tr id="rs_${id_detail_add_rs}">
                                    <td>${data.name}</td>
                                    <td>${data.apotekerName}</td>
                                    <td>${data.straNumber}</td>
                                    <td>${data.sipaNumber}</td>
                                    <td>${data.address}</td>
                                    <td>${name_provinsi[0].text}</td>
                                    <td>
                                        <button onclick="edit_detail_add_rs('${id_detail_add_rs}')" type="button" class="btn waves-effect waves-light btn-primary" iddadd="${id_detail_add_rs}">Ubah Rumah Sakit</button>
                                        <button onclick="delete_detail_add_rs('${id_detail_add_rs}')" type="button" class="btn waves-effect waves-light btn-danger" iddadd="${id_detail_add_rs}">Hapus</button>
                                    </td>
                                </tr>`)
        id_detail_add_rs++;
        close_modals()
    }

    function edit_detail_add_rs(id){
        $.each(arr_detail_add_rs, function( i, v ) {
            if(id==v.iddetail){
                $("#name_rs").val(v.name)
                $("#apotekerName_rs").val(v.apotekerName)
                $("#straNumber_rs").val(v.straNumber)
                $("#sipaNumber_rs").val(v.sipaNumber)
                $("#address_rs").val(v.address)
                $('#provinsiIdRs').val(v.provinsiId).trigger("change");
                $('#title-modal-rs').html('Ubah Rumah Sakit')
                $("#editdetail_rs").val('deletedetail')
                $("#rowdetail_rs").val(v.iddetail)
            }
        });
        $('.btn-open-modal-rs').click()
    }

    function delete_detail_add_rs(id){
        swal({
            title: 'Hapus Rumah Sakit',
            text: "Apakah Anda yakin menghapus rumah sakit ini ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "Batal",
            confirmButtonText: 'Ya, Hapus !'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    success: function (data, textStatus, xhr) {
                        swal(
                            'Berhasil!',
                            'Rumah Sakit dihapus',
                            'success'
                        )

                        $('#rs_'+id).remove()

                        $.each(arr_detail_add_rs, function( indexa, valuea ) {
                            if(id==valuea.iddetail){
                                cc=indexa
                            }
                        });

                        Array.prototype.remove = function(indexcc) {
                            this.splice(indexcc, 1);
                        }

                        arr_detail_add_rs.remove(cc)

                        var s_detail = [];

                        arr_detail_add_rs.map((val, index) => {
                            s_detail.push(val)
                        })
                        arr_detail_add_rs = s_detail
                        arr_detail_add_rs_x.detail = s_detail;

                        $('#data_rs').val('')
                        $('#data_rs').val(JSON.stringify(arr_detail_add_rs_x))
                    }
                });
            }
        })
    }

    function edit_data_permohonan(id) {
        $.ajax({
            url: url_api_x+"PermohonanCurrentUser("+id+")",
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (data, textStatus, xhr) {
                edit_permohonan(data)
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function edit_permohonan(data) {
        let source = $("#edit-data").html();
        let template = Handlebars.compile(source);
        let nib = data.nib
        data.straExpiry = moment(data.straExpiry).format("YYYY-MM-DD");
        let name_straUrl = data.straUrl
        let name_suratPermohonanUrl = data.suratPermohonanUrl
        let name_prosesBisnisUrl = data.prosesBisnisUrl
        let name_dokumenApiUrl = data.dokumenApiUrl
        let name_dokumenPseUrl = data.dokumenPseUrl
        let name_spplUrl = data.spplUrl
        let name_izinLokasiUrl = data.izinLokasiUrl
        let name_imbUrl = data.imbUrl
        let name_pembayaranPnbpUrl = data.pembayaranPnbpUrl
        var split_straUrl = name_straUrl.split("/");
        var split_suratPermohonanUrl = name_suratPermohonanUrl.split("/");
        var split_prosesBisnisUrl = name_prosesBisnisUrl.split("/");
        var split_dokumenApiUrl = name_dokumenApiUrl.split("/");
        var split_dokumenPseUrl = name_dokumenPseUrl.split("/");
        var split_spplUrl = name_spplUrl.split("/");
        var split_izinLokasiUrl = name_izinLokasiUrl.split("/");
        var split_imbUrl = name_imbUrl.split("/");
        var split_pembayaranPnbpUrl = name_pembayaranPnbpUrl.split("/");
        data.name_straUrl = split_straUrl[split_straUrl.length-1]
        data.name_suratPermohonanUrl = split_suratPermohonanUrl[split_suratPermohonanUrl.length-1]
        data.name_prosesBisnisUrl = split_prosesBisnisUrl[split_prosesBisnisUrl.length-1]
        data.name_dokumenApiUrl = split_dokumenApiUrl[split_dokumenApiUrl.length-1]
        data.name_dokumenPseUrl = split_dokumenPseUrl[split_dokumenPseUrl.length-1]
        data.name_spplUrl = split_spplUrl[split_spplUrl.length-1]
        data.name_izinLokasiUrl = split_izinLokasiUrl[split_izinLokasiUrl.length-1]
        data.name_imbUrl = split_imbUrl[split_imbUrl.length-1]
        data.name_pembayaranPnbpUrl = split_pembayaranPnbpUrl[split_pembayaranPnbpUrl.length-1]

        $('#load-data').html(template(data));
        $('#v-straUrl').val(name_straUrl)
        $('#v-suratPermohonanUrl').val(name_suratPermohonanUrl)
        $('#v-prosesBisnisUrl').val(name_prosesBisnisUrl)
        $('#v-dokumenApiUrl').val(name_dokumenApiUrl)
        $('#v-dokumenPseUrl').val(name_dokumenPseUrl)
        $('#v-spplUrl').val(name_spplUrl)
        $('#v-izinLokasiUrl').val(name_izinLokasiUrl)
        $('#v-imbUrl').val(name_imbUrl)
        $('#v-pembayaranPnbpUrl').val(name_pembayaranPnbpUrl)

        $('#straUrl').change(function() {
           upload_stra('edit')
        });
        $('#dokumenApiUrl').change(function() {
           upload_dokapi('edit')
        });
        $('#prosesBisnisUrl').change(function() {
           upload_bisnis('edit')
        });
        $('#suratPermohonanUrl').change(function() {
           upload_permohonan('edit')
        });
        $('#dokumenPseUrl').change(function() {
            upload_dok_pse('edit')
        });
        $('#spplUrl').change(function() {
            upload_sppl('edit')
        });
        $('#izinLokasiUrl').change(function() {
            upload_izin_lokasi('edit')
        });
        $('#imbUrl').change(function() {
            upload_imb('edit')
        });
        $('#pembayaranPnbpUrl').change(function() {
            upload_pnbp('edit')
        });
    }

    function update_data(e) {
        e.preventDefault();
        var data = $('#data-update').serializeFormJSON();
        data.typeId = 1;
        data.pemohonId = parseInt(data.pemohonId)
        data.id = parseInt(data.id)
        let id_permohonan = data.id

        $.ajax({
            url: url_api_x+'PermohonanCurrentUser('+id_permohonan+')',
            type: 'PATCH',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            data: JSON.stringify(data),
            contentType: 'application/json',
            success: function (data, textStatus, xhr) {
                if (xhr.status == '204' || xhr.status == '200') {
                    routing('dikembalikan_user');
                    toastr.success("Memperbarui Permohonan", 'Berhasil!');
                }else{
                    toastr.error("Memperbarui Permohonan", 'Gagal!');
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });

    }

    //apotek
    function edit_data_apotek(id, no_permohonan) {
        $.ajax({
            url: url_api_x+"PermohonanApotek("+id+")",
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (data, textStatus, xhr) {
                edit_apotek(data, no_permohonan, id)
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function edit_apotek(data, no_permohonan, permohonanId) {
        let source = $("#edit-data-apotek").html();
        let template = Handlebars.compile(source);
        data.permohonanId = permohonanId
        data.no_permohonan = no_permohonan
        $.each(data.value, function(i, v) {
            data.value[i].no_permohonan = no_permohonan
        });
        $('#load-data').html(template(data));
        $('#zero_config_apotek').DataTable({
            "scrollY": '100vh',
            "scrollX": true,
        });

        $('#page-title-apotek').html('Data Apotek Nomor Permohonan ('+no_permohonan+')')
        $('#page-title').html('Apotek')
        $('#refresh-page').html(`<button onclick="edit_data_apotek('${permohonanId}','${no_permohonan}')" type="button" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fas fa-redo"></i> Segarkan Halaman</button>`)

        $('#new-breadcrumb').remove()
        $("#list-breadcrumb").append(`<li class="breadcrumb-item" id="new-breadcrumb"><a href="javascript:void(0)">Apotek</a></li>`)
    }

    function edit_data_apotek_permohonan(id, id_permohonan,no_permohonan) {
        $.ajax({
            url: url_api_x+"PermohonanApotek("+id_permohonan+")",
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (data, textStatus, xhr) {
                let data_apotek= [];
                $.each(data.value, function(i, v) {
                    if(v.id==id){
                        data_apotek = v
                    }
                });
                edit_apotek_permohonan(data_apotek,no_permohonan)
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function edit_apotek_permohonan(data,no_permohonan) {
        let source = $("#edit-data-apotek-permohonan").html();
        let template = Handlebars.compile(source);
        data.no_permohonan = no_permohonan

        $('#load-data').html(template(data));

        $.ajax({
            url: url_api+'Provinsi',
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (datax, textStatus, xhr) {
                $.each(datax.value, function(i, v) {
                    $('select[name="provinsiId"]').append("<option value='" + v.id + "'>" + v.name + "</option>")
                });
                $('#provinsiId').select2()
                $("#provinsiId option").removeAttr('selected');
                $('#provinsiId').val(data.provinsiId).trigger('change');
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function add_data_apotek(id,no_permohonan){
        let source = $("#add-data-apotek-permohonan").html();
        let template = Handlebars.compile(source);
        let data =[]
        data.no_permohonan = no_permohonan
        data.permohonanId = id

        $('#load-data').html(template(data));

        $.ajax({
            url: url_api+'Provinsi',
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (datax, textStatus, xhr) {
                $.each(datax.value, function(i, v) {
                    $('select[name="provinsiId"]').append("<option value='" + v.id + "'>" + v.name + "</option>")
                });
                $('#provinsiId').select2()
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function data_save_apotek(e) {
        e.preventDefault();
        var data = $('#data-add-apotek').serializeFormJSON();
        let no_permohonan = $('#no_permohonan').val()
        data.permohonanId = parseInt(data.permohonanId)
        let add_apotek={};
        var add_detail_apotek = [];
        add_detail_apotek.push(data)
        add_apotek.apotek = add_detail_apotek
        add_apotek.permohonanId = data.permohonanId
        $.ajax({
            url: url_api_x+'PermohonanApotek',
            type: 'POST',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            data: JSON.stringify(add_apotek),
            contentType: 'application/json',
            success: function (datax, textStatus, xhr) {
                if (xhr.status == '204' || xhr.status == '201') {
                    edit_data_apotek(''+data.permohonanId+'', ''+no_permohonan+'');
                    toastr.success("Tambah Apotek", 'Berhasil!');
                }else{
                    toastr.error("Tambah Apotek", 'Gagal!');
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function update_data_apotek(e) {
        e.preventDefault();
        var data = $('#data-update-apotek').serializeFormJSON();
        data.permohonanId = parseInt(data.permohonanId)
        data.id = parseInt(data.id)
        data.provinsiId = parseInt(data.provinsiId)
        let id_apotek = data.id
        let no_permohonan = $('#no_permohonan').val()
        let update_apotek={};
        var update_detail_add = [];
        update_detail_add.push(data)
        update_apotek.permohonanId = data.permohonanId
        update_apotek.apotek = update_detail_add

        $.ajax({
            url: url_api_x+"PermohonanApotek("+id_apotek+")",
            type: 'PUT',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            data: JSON.stringify(update_apotek),
            contentType: 'application/json',
            success: function (datax, textStatus, xhr) {
                if (xhr.status == '204' || xhr.status == '200') {
                    edit_data_apotek(''+data.permohonanId+'', ''+no_permohonan+'');
                    toastr.success("Memperbarui Apotek", 'Berhasil!');
                }else{
                    toastr.error("Memperbarui Apotek", 'Gagal!');
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });

    }

    function delete_data_apotek_permohonan(id,id_permohonan){
        swal({
            title: 'Hapus Apotek',
            text: "Apakah Anda yakin menghapus apotek ini ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "Batal",
            confirmButtonText: 'Ya, Hapus !'
            }).then((result) => {
            if (result.value) {
                let delete_apotek={};
                let delete_detail_apotek = [];
                id = parseInt(id)
                id_permohonan = parseInt(id_permohonan)
                delete_detail_apotek.push( {"id":id,"permohonanId":id_permohonan})
                delete_apotek.apotek = delete_detail_apotek
                delete_apotek.permohonanId = id_permohonan
                $.ajax({
                    url: url_api_x+'PermohonanApotek('+id+')',
                    type: 'DELETE',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                    },
                    data: JSON.stringify(delete_apotek),
                    contentType: 'application/json',
                    success: function (data, textStatus, xhr) {
                        if (xhr.status == '204') {
                            swal(
                                'Berhasil!',
                                'Apotek dihapus',
                                'success'
                            )
                            $('#rowApotek_'+id).remove()
                        }else{
                            swal({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Gagal Delete Apotek'
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

    //klinik
    function edit_data_klinik(id, no_permohonan) {
        $.ajax({
            url: url_api_x+"PermohonanKlinik("+id+")",
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (data, textStatus, xhr) {
                edit_klinik(data, no_permohonan, id)
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function edit_klinik(data, no_permohonan, permohonanId) {
        let source = $("#edit-data-klinik").html();
        let template = Handlebars.compile(source);
        data.permohonanId = permohonanId
        data.no_permohonan = no_permohonan
        $.each(data.value, function(i, v) {
            data.value[i].no_permohonan = no_permohonan
        });
        $('#load-data').html(template(data));
        $('#zero_config_klinik').DataTable({
            "scrollY": '100vh',
            "scrollX": true,
        });

        $('#page-title-klinik').html('Data Klinik Nomor Permohonan ('+no_permohonan+')')
        $('#page-title').html('Klinik')
        $('#refresh-page').html(`<button onclick="edit_data_klinik('${permohonanId}','${no_permohonan}')" type="button" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fas fa-redo"></i> Segarkan Halaman</button>`)

        $('#new-breadcrumb').remove()
        $("#list-breadcrumb").append(`<li class="breadcrumb-item" id="new-breadcrumb"><a href="javascript:void(0)">Klinik</a></li>`)
    }

    function edit_data_klinik_permohonan(id, id_permohonan,no_permohonan) {
        $.ajax({
            url: url_api_x+"PermohonanKlinik("+id_permohonan+")",
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (data, textStatus, xhr) {
                let data_klinik= [];
                $.each(data.value, function(i, v) {
                    if(v.id==id){
                        data_klinik = v
                    }
                });
                edit_klinik_permohonan(data_klinik,no_permohonan)
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function edit_klinik_permohonan(data,no_permohonan) {
        let source = $("#edit-data-klinik-permohonan").html();
        let template = Handlebars.compile(source);
        data.no_permohonan = no_permohonan

        $('#load-data').html(template(data));

        $.ajax({
            url: url_api+'Provinsi',
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (datax, textStatus, xhr) {
                $.each(datax.value, function(i, v) {
                    $('select[name="provinsiId"]').append("<option value='" + v.id + "'>" + v.name + "</option>")
                });
                $('#provinsiId').select2()
                $("#provinsiId option").removeAttr('selected');
                $('#provinsiId').val(data.provinsiId).trigger('change');
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function add_data_klinik(id,no_permohonan){
        let source = $("#add-data-klinik-permohonan").html();
        let template = Handlebars.compile(source);
        let data =[]
        data.no_permohonan = no_permohonan
        data.permohonanId = id

        $('#load-data').html(template(data));

        $.ajax({
            url: url_api+'Provinsi',
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (datax, textStatus, xhr) {
                $.each(datax.value, function(i, v) {
                    $('select[name="provinsiId"]').append("<option value='" + v.id + "'>" + v.name + "</option>")
                });
                $('#provinsiId').select2()
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function data_save_klinik(e) {
        e.preventDefault();
        var data = $('#data-add-klinik').serializeFormJSON();
        let no_permohonan = $('#no_permohonan').val()
        data.permohonanId = parseInt(data.permohonanId)
        let add_klinik={};
        var add_detail_klinik = [];
        add_detail_klinik.push(data)
        add_klinik.klinik = add_detail_klinik
        add_klinik.permohonanId = data.permohonanId
        $.ajax({
            url: url_api_x+'PermohonanKlinik',
            type: 'POST',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            data: JSON.stringify(add_klinik),
            contentType: 'application/json',
            success: function (datax, textStatus, xhr) {
                if (xhr.status == '204' || xhr.status == '201') {
                    edit_data_klinik(''+data.permohonanId+'', ''+no_permohonan+'');
                    toastr.success("Tambah Klinik", 'Berhasil!');
                }else{
                    toastr.error("Tambah Klinik", 'Gagal!');
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function update_data_klinik(e) {
        e.preventDefault();
        var data = $('#data-update-klinik').serializeFormJSON();
        data.permohonanId = parseInt(data.permohonanId)
        data.id = parseInt(data.id)
        data.provinsiId = parseInt(data.provinsiId)
        let id_klinik = data.id
        let no_permohonan = $('#no_permohonan').val()
        let update_klinik={};
        var update_detail_add = [];
        update_detail_add.push(data)
        update_klinik.permohonanId = data.permohonanId
        update_klinik.klinik = update_detail_add

        $.ajax({
            url: url_api_x+"PermohonanKlinik("+id_klinik+")",
            type: 'PUT',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            data: JSON.stringify(update_klinik),
            contentType: 'application/json',
            success: function (datax, textStatus, xhr) {
                if (xhr.status == '204' || xhr.status == '200') {
                    edit_data_klinik(''+data.permohonanId+'', ''+no_permohonan+'');
                    toastr.success("Memperbarui Klinik", 'Berhasil!');
                }else{
                    toastr.error("Memperbarui Klinik", 'Gagal!');
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });

    }

    function delete_data_klinik_permohonan(id,id_permohonan){
        swal({
            title: 'Hapus Klinik',
            text: "Apakah Anda yakin menghapus klinik ini ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "Batal",
            confirmButtonText: 'Ya, Hapus !'
            }).then((result) => {
            if (result.value) {
                let delete_klinik={};
                let delete_detail_klinik = [];
                id = parseInt(id)
                id_permohonan = parseInt(id_permohonan)
                delete_detail_klinik.push( {"id":id,"permohonanId":id_permohonan})
                delete_klinik.klinik = delete_detail_klinik
                delete_klinik.permohonanId = id_permohonan
                $.ajax({
                    url: url_api_x+'PermohonanKlinik('+id+')',
                    type: 'DELETE',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                    },
                    data: JSON.stringify(delete_klinik),
                    contentType: 'application/json',
                    success: function (data, textStatus, xhr) {
                        if (xhr.status == '204') {
                            swal(
                                'Berhasil!',
                                'Klinik dihapus',
                                'success'
                            )
                            $('#rowKlinik_'+id).remove()
                        }else{
                            swal({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Gagal Delete Klinik'
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

    //rs
    function edit_data_rs(id, no_permohonan) {
        $.ajax({
            url: url_api_x+"PermohonanRumahSakit("+id+")",
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (data, textStatus, xhr) {
                edit_rs(data, no_permohonan, id)
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function edit_rs(data, no_permohonan, permohonanId) {
        let source = $("#edit-data-rs").html();
        let template = Handlebars.compile(source);
        data.permohonanId = permohonanId
        data.no_permohonan = no_permohonan
        $.each(data.value, function(i, v) {
            data.value[i].no_permohonan = no_permohonan
        });
        $('#load-data').html(template(data));
        $('#zero_config_rs').DataTable({
            "scrollY": '100vh',
            "scrollX": true,
        });

        $('#page-title-rs').html('Data Rumah Sakit Nomor Permohonan ('+no_permohonan+')')
        $('#page-title').html('Rumah Sakit')
        $('#refresh-page').html(`<button onclick="edit_data_rs('${permohonanId}','${no_permohonan}')" type="button" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fas fa-redo"></i> Segarkan Halaman</button>`)

        $('#new-breadcrumb').remove()
        $("#list-breadcrumb").append(`<li class="breadcrumb-item" id="new-breadcrumb"><a href="javascript:void(0)">Rumah Sakit</a></li>`)
    }

    function edit_data_rs_permohonan(id, id_permohonan,no_permohonan) {
        $.ajax({
            url: url_api_x+"PermohonanRumahSakit("+id_permohonan+")",
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (data, textStatus, xhr) {
                let data_rs= [];
                $.each(data.value, function(i, v) {
                    if(v.id==id){
                        data_rs = v
                    }
                });
                edit_rs_permohonan(data_rs,no_permohonan)
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function edit_rs_permohonan(data,no_permohonan) {
        let source = $("#edit-data-rs-permohonan").html();
        let template = Handlebars.compile(source);
        data.no_permohonan = no_permohonan

        $('#load-data').html(template(data));

        $.ajax({
            url: url_api+'Provinsi',
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (datax, textStatus, xhr) {
                $.each(datax.value, function(i, v) {
                    $('select[name="provinsiId"]').append("<option value='" + v.id + "'>" + v.name + "</option>")
                });
                $('#provinsiId').select2()
                $("#provinsiId option").removeAttr('selected');
                $('#provinsiId').val(data.provinsiId).trigger('change');
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function add_data_rs(id,no_permohonan){
        let source = $("#add-data-rs-permohonan").html();
        let template = Handlebars.compile(source);
        let data =[]
        data.no_permohonan = no_permohonan
        data.permohonanId = id

        $('#load-data').html(template(data));

        $.ajax({
            url: url_api+'Provinsi',
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (datax, textStatus, xhr) {
                $.each(datax.value, function(i, v) {
                    $('select[name="provinsiId"]').append("<option value='" + v.id + "'>" + v.name + "</option>")
                });
                $('#provinsiId').select2()
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function data_save_rs(e) {
        e.preventDefault();
        var data = $('#data-add-rs').serializeFormJSON();
        let no_permohonan = $('#no_permohonan').val()
        data.permohonanId = parseInt(data.permohonanId)
        let add_rs={};
        var add_detail_rs = [];
        add_detail_rs.push(data)
        add_rs.rumahSakit = add_detail_rs
        add_rs.permohonanId = data.permohonanId
        $.ajax({
            url: url_api_x+'PermohonanRumahSakit',
            type: 'POST',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            data: JSON.stringify(add_rs),
            contentType: 'application/json',
            success: function (datax, textStatus, xhr) {
                if (xhr.status == '204' || xhr.status == '201') {
                    edit_data_rs(''+data.permohonanId+'', ''+no_permohonan+'');
                    toastr.success("Tambah Rumah Sakit", 'Berhasil!');
                }else{
                    toastr.error("Tambah Rumah Sakit", 'Gagal!');
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });
    }

    function update_data_rs(e) {
        e.preventDefault();
        var data = $('#data-update-rs').serializeFormJSON();
        data.permohonanId = parseInt(data.permohonanId)
        data.id = parseInt(data.id)
        data.provinsiId = parseInt(data.provinsiId)
        let id_rs = data.id
        let no_permohonan = $('#no_permohonan').val()
        let update_rs={};
        var update_detail_add = [];
        update_detail_add.push(data)
        update_rs.permohonanId = data.permohonanId
        update_rs.rumahSakit = update_detail_add

        $.ajax({
            url: url_api_x+"PermohonanRumahSakit("+id_rs+")",
            type: 'PUT',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            data: JSON.stringify(update_rs),
            contentType: 'application/json',
            success: function (datax, textStatus, xhr) {
                if (xhr.status == '204' || xhr.status == '200') {
                    edit_data_rs(''+data.permohonanId+'', ''+no_permohonan+'');
                    toastr.success("Memperbarui Rumah Sakit", 'Berhasil!');
                }else{
                    toastr.error("Memperbarui Rumah Sakit", 'Gagal!');
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });

    }

    function delete_data_rs_permohonan(id,id_permohonan){
        swal({
            title: 'Hapus Rumah Sakit',
            text: "Apakah Anda yakin menghapus rumah sakit ini ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "Batal",
            confirmButtonText: 'Ya, Hapus !'
            }).then((result) => {
            if (result.value) {
                let delete_rs={};
                let delete_detail_rs = [];
                id = parseInt(id)
                id_permohonan = parseInt(id_permohonan)
                delete_detail_rs.push( {"id":id,"permohonanId":id_permohonan})
                delete_rs.rumahSakit = delete_detail_rs
                delete_rs.permohonanId = id_permohonan
                $.ajax({
                    url: url_api_x+'PermohonanRumahSakit('+id+')',
                    type: 'DELETE',
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
                    },
                    data: JSON.stringify(delete_rs),
                    contentType: 'application/json',
                    success: function (data, textStatus, xhr) {
                        if (xhr.status == '204') {
                            swal(
                                'Berhasil!',
                                'Rumah Sakit dihapus',
                                'success'
                            )
                            $('#rowRs_'+id).remove()
                        }else{
                            swal({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Gagal Delete Rumah Sakit'
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

    function ajukan_permohonan(id){
        let data = {'permohonanId':parseInt(id)}
        swal({
            title: 'Ajukan Permohonan',
            text: "Apakah anda yakin ingin mengajukan permohonan ini ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "Batal",
            confirmButtonText: 'Ya, Ajukan !'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: url_api_x+'PermohonanCurrentUser/Ajukan',
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
                                'Permohonan di Ajukan',
                                'success'
                            )
                            routing('dikembalikan_user')
                        }else{
                            swal({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Permohonan Gagal di Ajukan'
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
