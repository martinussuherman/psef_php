<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Pemohon</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Pemohon</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-7 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center">
                <button onclick="routing('pemohon_kasubdit')" type="button" class="btn waves-effect waves-light btn-rounded btn-primary"><i class="fas fa-redo"></i> Segarkan Halaman</button>
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
                            <h4 class="page-title">Master Data Pemohon</h4>
                        </div>
                    </div><br>
                    <div class="table-responsive" id="table-data-here">
                        <table id="zero_config" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Email Pemohon</th>
                                    <th>Nomor Telepon</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Alamat</th>
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
include('../../template/modal_nib.php');
include('../template/view_pemohon.php');
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
                  datax.push(json.foffset+i+1);
                  datax.push(json.data[i].email);
                  datax.push(json.data[i].phone);
                  datax.push(json.data[i].companyName);
                  datax.push(json.data[i].address);

                  var actions = '<td><button onclick="view_data(\''+json.data[i].id+'\')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-info">Lihat Detail Data</button></td>';
                  datax.push(actions);

                  data.push(datax);
                }
                return JSON.parse(JSON.stringify(data));

              },

              "data": function ( d ) {
                var order_name = []

                order_name.push('name');
                order_name.push('name');
                order_name.push('email');
                order_name.push('phone');
                order_name.push('address');
                order_name.push('id');

                var data={};

                data.fpage = (parseInt(d.start)+parseInt(d.length))/parseInt(d.length);
                data.frows = d.length;
                data.fsearch = d.search['value'];
                data.forder = order_name[d.order[0]['column']];
                data.fsort = d.order[0]['dir'];
                data.fmodul = 'Pemohon';
                data.flsearch = 'name,email,phone,address';
                data.ftots = 4;
                return data;
              }
            }
        });
    });

    function viewRouting() {
      routing('pemohon_kasubdit');
    }

    function view_data(id){
        $.ajax({
            url: url_api_x+"Pemohon("+id+")",
            type: 'GET',
            beforeSend: function (xhr) {
                xhr.setRequestHeader('Authorization', 'Bearer '+accesstoken+'');
            },
            dataType: 'json',
            success: function (data, textStatus, xhr) {
                view_data_detail(data)
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log('Error in Operation');
            }
        });

       
    }
    function view_data_detail(data) {
        let source = $("#view-data").html();
        let template = Handlebars.compile(source);
        let nib = data.nib

        $('#load-data').html(template(data));
        
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
