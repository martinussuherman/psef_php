<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">NIB</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">NIB</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body" id="load-data">
                    <div class="table-responsive" id="table-data-here">
                        <!-- Table content goes here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Template for view -->
<script id="view-data" type="text/x-handlebars-template">
    <h4 class="card-title">Detail NIB</h4>
    <form class="m-t-30">
        <h4 class="card-title" style="font-weight: bold;">Data Perusahaan</h4>
        <hr class="m-t-0">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">NIB</label>
                    <input value="{{nib}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">OSS ID</label>
                    <input value="{{ossId}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Tanggal Pengajuan NIB</label>
                    <input value="{{tglPengajuanNib}}" type="text" class="form-control" disabled> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Tanggal Terbit NIB</label>
                    <input value="{{tglTerbitNib}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Tanggal Perubahan NIB</label>
                    <input value="{{tglPerubahanNib}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">No NPP</label>
                    <input value="{{noNpp}}" type="text" class="form-control" disabled> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">No VA</label>
                    <input value="{{noVa}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">No WLKP</label>
                    <input value="{{noWlkp}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Badan Hukum</label>
                    <input value="{{psef_statusBadanHukum}}" type="text" class="form-control" disabled> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Penanaman Modal</label>
                    <input value="{{psef_statusPenanamanModal}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">NPWP</label>
                    <input value="{{npwpPerseroan}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Nama Perusahaan</label>
                    <input value="{{namaPerseroan}}" type="text" class="form-control" disabled> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Badan Usaha</label>
                    <input value="{{psef_jenisPerseroan}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Alamat Perusahaan</label>
                    <textarea class="form-control" rows="7" disabled>{{alamatPerseroan}} RT/RW {{rtRwPerseroan}}, Kel.{{kelurahanPerseroan}} &#13;&#10;Kode Pos: {{kodePosPerseroan}}&#13;&#10;No. Telp: {{nomorTelponPerseroan}}&#13;&#10;Email : {{emailPerusahaan}}</textarea>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Jenis API</label>
                    <input value="{{jenisApi}}" type="text" class="form-control" disabled> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Dalam Bentuk Uang</label>
                    <input value="{{dalamBentukUang}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Dalam Bentuk Lain</label>
                    <input value="{{dalamBentukLain}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Total Modal Dasar</label>
                    <input value="{{totalModalDasar}}" type="text" class="form-control" disabled> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Total Modal Ditempatkan</label>
                    <input value="{{totalModalDitempatkan}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">No Pengesahan</label>
                    <input value="{{noPengesahan}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Tgl Pengesahan</label>
                    <input value="{{tglPengesahan}}" type="text" class="form-control" disabled> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">No Akta Lama</label>
                    <input value="{{noAktaLama}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Tgl Akta Lama</label>
                    <input value="{{tglAktaLama}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">No Pengesahan Lama</label>
                    <input value="{{noPengesahanLama}}" type="text" class="form-control" disabled> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Tgl Pengesahan Lama</label>
                    <input value="{{tglPengesahanLama}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Status NIB</label>
                    <input value="{{psef_statusNib}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Tipe Dokumen</label>
                    <input value="{{psef_tipeDokumen}}" type="text" class="form-control" disabled> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Jenis ID User</label>
                    <input value="{{psef_jenisIdUserProses}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">No ID</label>
                    <input value="{{noIdUserProses}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Nama User</label>
                    <input value="{{namaUserProses}}" type="text" class="form-control" disabled> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">Email User</label>
                    <input value="{{emailUserProses}}" type="text" class="form-control" disabled> 
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label class="control-label">No HP User</label>
                    <input value="{{hpUserProses}}" type="text" class="form-control" disabled> 
                </div>
            </div>
        </div>
        <br>
        <h4 class="card-title" style="font-weight: bold;">Data Proyek</h4>
        <hr class="m-t-0">
        <div class="table-responsive" id="table-proyek">
            <table id="zero_config_proyek" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="180px">ID PROYEK</th>
                        <th>KBLI</th>
                        <th>SEKTOR</th>
                        <th>URAIAN USAHA</th>
                        <th width="96px">JUMLAH TENAGA KERJA</th>
                        <th width="290px">INVESTASI</th>
                        <th>STATUS TANAH</th>
                        <th>ALAMAT</th>
                        <th>PRODUK</th>
                    </tr>
                </thead>
                    <tbody class="detail-item-proyek">
                        
                    </tbody>
            </table>
        </div>
        <br>
        <h4 class="card-title" style="font-weight: bold;">Data Pemegang Saham</h4>
        <hr class="m-t-0">
        <div class="table-responsive" id="table-ps">
            <table id="zero_config_ps" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>IDENTITAS PEMEGANG SAHAM</th>
                        <th>ALAMAT PEMEGANG SAHAM</th>
                        <th>TOTAL MODAL</th>
                    </tr>
                </thead>
                    <tbody class="detail-item-ps">
                       
                    </tbody>
            </table>
        </div>
        <br>
        <h4 class="card-title" style="font-weight: bold;">Data Penanggung Jawab</h4>
        <hr class="m-t-0">
        <div class="table-responsive" id="table-pj">
            <table id="zero_config_pj" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>IDENTITAS PENANGGUNG JAWAB</th>
                        <th>ALAMAT PENANGGUNG JAWAB</th>
                    </tr>
                </thead>
                    <tbody class="detail-item-pj">
                       
                    </tbody>
            </table>
        </div>
        <br>
        <h4 class="card-title" style="font-weight: bold;">Data LEGALITAS</h4>
        <hr class="m-t-0">
        <div class="table-responsive" id="table-legilitas">
            <table id="zero_config_legilitas" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>AKTA</th>
                        <th>NOTARIS</th>
                    </tr>
                </thead>
                    <tbody class="detail-item-legilitas">
                    </tbody>
            </table>
        </div>
        <br>
        <h4 class="card-title" style="font-weight: bold;">Data RPTKA</h4>
        <hr class="m-t-0">
        <div class="table-responsive" id="table-rptka">
            <table id="zero_config_rptka" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>JENIS RPTKA</th>
                        <th>NO RPTKA</th>
                        <th>RPTKA AWAL</th>
                        <th>RPTKA AKHIR</th>
                        <th>JUMLAH TKA RPTKA</th>
                        <th>JANGKA PENGGUNAAN WAKTU</th>
                        <th>JANGKA WAKTU PERMOHONAN RPTKA</th>
                    </tr>
                </thead>
                    <tbody class="detail-item-rptka">
                      
                    </tbody>
            </table>
        </div>
        <br>
        <h4 class="card-title" style="font-weight: bold;">Data DNI</h4>
        <hr class="m-t-0">
        <div class="table-responsive" id="table-dni">
            <table id="zero_config_dni" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>KODE DNI</th>
                    </tr>
                </thead>
                    <tbody class="detail-item-dni">
                      
                    </tbody>
            </table>
        </div>
        <br>
        <h4 class="card-title" style="font-weight: bold;">Data CHECKLIST</h4>
        <hr class="m-t-0">
        <div class="table-responsive" id="table-ck">
            <table id="zero_config_ck" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID IZIN</th>
                        <th>ID PROYEK</th>
                        <th>KODE IZIN</th>
                        <th>NAMA IZIN</th>
                        <th>CHECKLIST OSS</th>
                    </tr>
                </thead>
                    <tbody class="detail-item-ck">
                      
                    </tbody>
            </table>
        </div>
    </form>
</script>

<script>
    var accesstoken = <?php echo json_encode($_COOKIE['accesstoken']); ?>; 
    $(document).ready(function() { 
        var local_nib = localStorage.getItem("nib");
        $.ajax({
            url: url_api_x+"OssInfo/OssFullInfo?id="+local_nib,
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (data, textStatus, xhr) {
                data.dalamBentukUang = $.number(data.dalamBentukUang,0);
                data.totalModalDasar = $.number(data.totalModalDasar,0);
                data.totalModalDitempatkan = $.number(data.totalModalDitempatkan,0);
                data.tglPengajuanNib = moment(data.tglPengajuanNib).format("YYYY-MM-DD");
                data.tglAktaLama = moment(data.tglAktaLama).format("YYYY-MM-DD");
                data.tglLahirUserProses = moment(data.tglLahirUserProses).format("YYYY-MM-DD");
                data.tglPengesahan = moment(data.tglPengesahan).format("YYYY-MM-DD");
                data.tglPengesahanLama = moment(data.tglPengesahanLama).format("YYYY-MM-DD");
                data.tglPerubahanNib = moment(data.tglPerubahanNib).format("YYYY-MM-DD");
                data.tglTerbitNib = moment(data.tglTerbitNib).format("YYYY-MM-DD");

                if(data.statusBadanHukum=='01'){
                    data.psef_statusBadanHukum = 'Badan Hukum'
                }else{
                    data.psef_statusBadanHukum = 'Bukan Badan Hukum'
                }

                if(data.statusPenanamanModal=='01'){
                    data.psef_statusPenanamanModal = 'Penanaman Modal Asing'
                }else if(data.statusPenanamanModal=='02'){
                    data.psef_statusPenanamanModal = 'Penanaman Modal Dalam Negeri'
                }else{
                    data.psef_statusPenanamanModal = 'Bukan (PMA/PMDN)'
                }

                switch(data.jenisPerseroan) {
                    case "01":
                        data.psef_jenisPerseroan = 'Perusahaan Terbatas (PT)'
                    break;
                    case "02":
                        data.psef_jenisPerseroan = 'Perseroan Komanditer (CV)'
                    break;
                    case "04":
                        data.psef_jenisPerseroan = 'Badan Usaha Pemerintah'
                    break;
                    case "05":
                        data.psef_jenisPerseroan = 'Firma (Fa)'
                    break;
                    case "06":
                        data.psef_jenisPerseroan = 'Persekutuan Perdata'
                    break;
                    case "07":
                        data.psef_jenisPerseroan = 'Koperasi'
                    break;
                    case "10":
                        data.psef_jenisPerseroan = 'Yayasan'
                    break;
                    case "16":
                        data.psef_jenisPerseroan = 'Bentuk Usaha Tetap (BUT)'
                    break;
                    case "18":
                        data.psef_jenisPerseroan = 'Badan Layanan Umum (BLU)'
                    break;
                    case "19":
                        data.psef_jenisPerseroan = 'Badan Hukum (selain PT,Yayasan dan Koperasi)'
                    break;
                    case "16":
                        data.psef_jenisPerseroan = 'Yayasan'
                    break;
                    default:
                        data.psef_jenisPerseroan = '-'
                }

                switch(data.statusNib) {
                    case "01":
                        data.psef_statusNib = 'Aktif'
                    break;
                    case "02":
                        data.psef_statusNib = 'Belum Aktif'
                    break;
                    case "03":
                        data.psef_statusNib = 'Diizinkan Usaha'
                    break;
                    case "04":
                        data.psef_statusNib = 'Diizinkan Beroperasi'
                    break;
                    case "05":
                        data.psef_statusNib = 'Dibekukan'
                    break;
                    case "06":
                        data.psef_statusNib = 'Dicabut'
                    break;
                    default:
                        data.psef_statusNib = '-'
                }
                switch(data.tipeDokumen) {
                    case "9":
                        data.psef_tipeDokumen = 'Original'
                    break;
                    case "5":
                        data.psef_tipeDokumen = 'Update'
                    break;
                    case "3":
                        data.psef_tipeDokumen = 'Pencabutan,'
                    break;
                    case "4":
                        data.psef_tipeDokumen = 'Pembatalan'
                    break;
                    default:
                        data.psef_tipeDokumen = '-'
                }
                switch(data.jenisIdUserProses) {
                    case "01":
                        data.psef_jenisIdUserProses = 'Kartu Tanda Penduduk (KTP)'
                    break;
                    case "02":
                        data.psef_jenisIdUserProses = 'Paspor'
                    break;
                    default:
                        data.psef_jenisIdUserProses = '-'
                }

                $.each(data.dataProyek, function( index, value ) {
                    if(value.statusTanah=='01'){
                        data.dataProyek[index].psef_statusTanah = 'Sewa'
                    }else{
                        data.dataProyek[index].psef_statusTanah = 'Bukan Sewa'
                    }
                    if(value.satuanLuasTanah=='01'){
                        data.dataProyek[index].psef_satuanLuasTanah = 'M2'
                    }else{
                        data.dataProyek[index].psef_satuanLuasTanah = 'Ha'
                    }
                });

                $.each(data.legalitas, function( index, value ) {
                    data.legalitas[index].tglLegal =  moment(value.tglLegal).format("YYYY-MM-DD");
                    switch(value.jenisLegal) {
                        case "01":
                            data.legalitas[index].psef_jenisLegal = 'Akta Pendirian'
                        break;
                        case "02":
                            data.legalitas[index].psef_jenisLegal = 'Akta Perubahan'
                        break;
                        case "06":
                            data.legalitas[index].psef_jenisLegal = 'Kontrak'
                        break;
                        case "07":
                            data.legalitas[index].psef_jenisLegal = 'Peraturan'
                        break;
                        case "09":
                            data.legalitas[index].psef_jenisLegal = 'SK Penetapan'
                        break;
                        case "10":
                            data.legalitas[index].psef_jenisLegal = 'Akta Likuidasi'
                        break;
                        case "11":
                            data.legalitas[index].psef_jenisLegal = 'Akta Merger'
                        break;
                        case "12":
                            data.legalitas[index].psef_jenisLegal = 'Akta Pembubaran'
                        break;
                        default:
                            data.legalitas[index].psef_jenisLegal = '-'
                    }
                });

                let source = $("#view-data").html();
                let template = Handlebars.compile(source);
                $('#load-data').html(template(data));

                //data rptka
                if(data.dataRptka.length!==undefined){
                    $.each(data.dataRptka, function( index, value ) {
                        let jenis_rptka = ''
                        if(value.jenisRptka == '01'){
                            jenis_rptka = 'Baru'
                        }else if(value.jenisRptka == '02'){
                            jenis_rptka = 'Perubahan'
                        }else{
                            jenis_rptka = '-'
                        }
                        $('.detail-item-rptka').append(`<tr>
                                        <td>${jenis_rptka}</td>
                                        <td>${value.noRptka}</td>
                                        <td>${value.rptkaAwal}</td>
                                        <td>${value.rptkaAkhir}</td>
                                        <td>${value.jumlahTkaRptka}</td>
                                        <td>${value.jangkaPenggunaanWaktu}</td>
                                        <td>${value.jangkaWaktuPermohonanRptka}</td>
                                    </tr>`)
                    });
                }
                $('#zero_config_rptka').DataTable()

                //data dni 
                if(data.dataDni.length!==undefined){
                    $.each(data.dataDni, function( index, value ) {
                        $('.detail-item-dni').append(`<tr>
                                        <td>${value.kdDni}</td>
                                    </tr>`)
                    });
                }
                $('#zero_config_dni').DataTable()

                //data pemegang saham 
                if(data.pemegangSaham.length!==undefined){
                    $.each(data.pemegangSaham, function( index, value ) {
                        $('.detail-item-ps').append(`<tr>
                                        <td>${value.namaPemegangSaham}<br>NPWP : ${value.npwpPemegangSaham}<br>KTP/PASPOR : ${value.noIdentitasPemegangSaham}<br>Jabatan : ${value.jabatanPemegangSaham}</td>
                                        <td>${value.alamatPemegangSaham}<br>Fax : ${value.faxPemegangSaham}<br>E-mail : ${value.emailPemegangSaham}</td>
                                        <td>${$.number(value.totalModalPemegang,0)}</td>
                                    </tr>`)
                    });
                }
                $('#zero_config_ps').DataTable()

                //data pemegang penanggung jawab 
                if(data.penanggungJwb.length!==undefined){
                    $.each(data.penanggungJwb, function( index, value ) {
                        $('.detail-item-pj').append(` <tr>
                                        <td>${value.namaPenanggungJwb}<br>NPWP : ${value.npwpPenanggungJwb}<br>KTP/PASPOR : ${value.noIdentitasPenanggungJwb}<br>Jabatan : ${value.jabatanPenanggungJwb}</td>
                                        <td>${value.alamatPenanggungJwb} RT/RW ${value.rtRwPenanggungJwb}<br>Telp : ${value.noHpPenanggungJwb}<br>E-mail : ${value.emailPenanggungJwb}<br>Negara Asal : ${value.negaraAsalPenanggungJwb}</td>
                                    </tr>`)
                    });
                }
                $('#zero_config_pj').DataTable()

                //data legilitas penanggung jawab 
                if(data.legalitas.length!==undefined){
                    $.each(data.legalitas, function( index, value ) {
                        $('.detail-item-legilitas').append(`<tr>
                                        <td>Nomor Legal : ${value.noLegal}<br>Tgl Legal : ${value.tglLegal}<br>Jenis Legal : ${value.psef_jenisLegal}</td>
                                        <td>${value.namaNotaris}<br>${value.alamatNotaris}<br>Telp. ${value.teleponNotaris}</td>
                                    </tr>`)
                    });
                }
                $('#zero_config_legilitas').DataTable()

                //data proyek
                if(data.dataProyek.length!==undefined){
                    $.each(data.dataProyek, function( index, value ) {
                        $('.detail-item-proyek').append(`<tr>
                                        <td>${value.idProyek}</td>
                                        <td>${value.kbli}</td>
                                        <td>${value.sektor}</td>
                                        <td>${value.dataProyekProduk[0].jenisProduksi}</td>
                                        <td>TKI PRIA : ${value.jumlahTkiL}<br>TKI WANITA : ${value.jumlahTkiP}<br>TKA PRIA : ${value.jumlahTkaL}<br>TKA WANITA : ${value.jumlahTkaP}</td>
                                        <td>Pembelian Pematangan Tanah : Rp.${$.number(value.pembelianPematangTanah,0)}<br>Bangunan Gedung : Rp.${$.number(value.bangunanGedung,0)}<br>Mesin Peralatan : Rp.${$.number(value.mesinPeralatan,0)}<br>Mesin Peralatan : $.${value.mesinPeralatanUsd}<br>Sub Jumlah : Rp.${$.number(value.subJumlah,0)}<br>Modal Kerja : Rp.${$.number(value.modalKerja,0)}<br>Total Investasi : Rp.${$.number(value.jumlahInvestasi,0)}</td>
                                        <td>- ${value.psef_statusTanah}<br>- Luas Tanah : ${value.luasTanah} ${value.psef_satuanLuasTanah}</td>
                                        <td>${value.dataLokasiProyek[0].alamatUsaha}</td>
                                        <td>Kapasitas : ${value.dataProyekProduk[0].kapasitas}<br>Satuan : ${value.dataProyekProduk[0].satuan}<br>Merk Dagang : ${value.dataProyekProduk[0].merkDagang}<br>Jenis Produksi : ${value.dataProyekProduk[0].jenisProduksi}</td>
                                    </tr>`)
                    });
                }
                $('#zero_config_proyek').DataTable()

                //data checklist
                if(data.dataChecklist.length!==undefined){
                    $.each(data.dataChecklist, function( index, value ) {
                        $('.detail-item-ck').append(`<tr>
                                        <td>${value.idIzin}</td>
                                        <td>${value.idProyek}</td>
                                        <td>${value.kdIzin}</td>
                                        <td>${value.namaIzin}</td>
                                        <td>${value.flagChecklist}</td>
                                    </tr>`)
                    });
                }
                $('#zero_config_ck').DataTable()

                localStorage.removeItem('nib')
            },
            error: function (xhr, textStatus, errorThrown) {
            }
        });
    });
    
</script>
