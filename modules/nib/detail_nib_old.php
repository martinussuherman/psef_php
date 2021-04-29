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
        <div class="form-group">
            <label>Agama User Proses</label>
            <input value="{{agamaUserProses}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Alamat Perseroan</label>
            <input value="{{alamatPerseroan}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Alamat User Proses</label>
            <input value="{{alamatUserProses}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Daerah Id User Proses</label>
            <input value="{{daerahIdUserProses}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Dalam Bentuk Lain</label>
            <input value="{{dalamBentukLain}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Dalam Bentuk Uang</label>
            <input value="{{dalamBentukUang}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Email Perusahaan</label>
            <input value="{{emailPerusahaan}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Email User Proses</label>
            <input value="{{emailUserProses}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Flag Ekspor</label>
            <input value="{{flagEkspor}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Flag Impor</label>
            <input value="{{flagImpor}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Flag Perusahaan</label>
            <input value="{{flagPerusahaan}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Gabung Negara</label>
            <input value="{{gabungNegara}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Hp User Proses</label>
            <input value="{{hpUserProses}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Jangka Waktu</label>
            <input value="{{jangkaWaktu}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Jenis Api</label>
            <input value="{{jenisApi}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Jenis Id User Proses</label>
            <input value="{{jenisIdUserProses}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Jenis Kawasan</label>
            <input value="{{jenisKawasan}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Jenis Pelaku Usaha</label>
            <input value="{{jenisPelakuUsaha}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Jenis Perseroan</label>
            <input value="{{jenisPerseroan}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Jenis Kelamin User Proses</label>
            <input value="{{jnsKelaminUserProses}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Kd Kawasan</label>
            <input value="{{kdKawasan}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Kelurahan Perseroan</label>
            <input value="{{kelurahanPerseroan}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Keterangan</label>
            <input value="{{keterangan}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Kode Pos Perseroan</label>
            <input value="{{kodePosPerseroan}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>nama Perseroan</label>
            <input value="{{namaPerseroan}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Nama Singkatan</label>
            <input value="{{namaSingkatan}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Nama User Proses</label>
            <input value="{{namaUserProses}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Negara Pma Dominan</label>
            <input value="{{negaraPmaDominan}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>NIB</label>
            <input value="{{nib}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Nilai Pma Dominan</label>
            <input value="{{nilaiPmaDominan}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Nilai Pmdn</label>
            <input value="{{nilaiPmdn}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>No Akta Lama</label>
            <input value="{{noAktaLama}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>No Id User Proses</label>
            <input value="{{noIdUserProses}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>No Npp</label>
            <input value="{{noNpp}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>No Pengesahan</label>
            <input value="{{noPengesahan}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>No Pengesahan Lama</label>
            <input value="{{noPengesahanLama}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>No Va</label>
            <input value="{{noVa}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>No Wlkp</label>
            <input value="{{noWlkp}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Nomor Telpon Perseroan</label>
            <input value="{{nomorTelponPerseroan}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>NPWP Perseroan</label>
            <input value="{{npwpPerseroan}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Oss Id</label>
            <input value="{{ossId}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Pekerjaan User Proses</label>
            <input value="{{pekerjaanUserProses}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Persen Pma</label>
            <input value="{{persenPma}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Persen Pmdn</label>
            <input value="{{persenPmdn}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Perseroan Daerah Id</label>
            <input value="{{perseroanDaerahId}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Rt Rw Perseroan</label>
            <input value="{{rtRwPerseroan}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Rt Rw User Proses</label>
            <input value="{{rtRwUserProses}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Status Badan Hukum</label>
            <input value="{{statusBadanHukum}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Status Nib</label>
            <input value="{{statusNib}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Status Penanaman Modal</label>
            <input value="{{statusPenanamanModal}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Status Perkawinan User Proses</label>
            <input value="{{statusPerkawinanUserProses}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>status Perseroan</label>
            <input value="{{statusPerseroan}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Tempat Lahir User Proses</label>
            <input value="{{tempatLahirUserProses}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Tgl Akta Lama</label>
            <input value="{{tglAktaLama}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Tgl Lahir User Proses</label>
            <input value="{{tglLahirUserProses}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Tgl Pengajuan Nib</label>
            <input value="{{tglPengajuanNib}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Tgl Pengesahan</label>
            <input value="{{tglPengesahan}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Tgl Pengesahan Lama</label>
            <input value="{{tglPengesahanLama}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Tgl Perubahan Nib</label>
            <input value="{{tglPerubahanNib}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Tgl Terbit Nib</label>
            <input value="{{tglTerbitNib}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Tipe Dokumen</label>
            <input value="{{tipeDokumen}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Total Modal Dasar</label>
            <input value="{{totalModalDasar}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Total Modal Ditempatkan</label>
            <input value="{{totalModalDitempatkan}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Total Pma</label>
            <input value="{{totalPma}}" type="text" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label>Versi Pia</label>
            <input value="{{versiPia}}" type="text" class="form-control" disabled>
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
                let source = $("#view-data").html();
                let template = Handlebars.compile(source);
                $('#load-data').html(template(data));
                localStorage.removeItem('nib')
            },
            error: function (xhr, textStatus, errorThrown) {
            }
        });
    });
    
</script>
