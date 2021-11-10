<?php
require_once("../template/template.php");
?>

<!-- Template for edit -->
<script id="edit-data" type="text/x-handlebars-template">
    <h4 class="card-title">Ubah Data Sertifikat PSEF</h4>
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
        <button type="submit" class="btn btn-primary">Kirim</button>
        <button type="button" class="btn btn-danger" onclick="routing('perizinan_admin')">Batal</button>
    </form>
</script>

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

                var actions = '<td><button onclick="view_data(\''+json.data[i].permohonanId+'\',\''+json.data[i].id+'\')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-info">Lihat Detail Data</button><button onclick="edit_data(\''+json.data[i].id+'\',\''+json.data[i].id+'\')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-primary">Ubah Data</button><button onclick="window.open(\'https://psef.kemkes.go.id'+json.data[i].tandaDaftarUrl+'\')" target="_blank" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-success">Unduh Tanda Daftar</button></td>';

                datax.push(actions);

                data.push(datax);
                }
                return JSON.parse(JSON.stringify(data));

            },

            "data": function ( d ) {
              return configurePerizinanRequest(d);
            }
            }
        });
    });

    function viewRouting() {
      routing('perizinan_admin');
    }

    function view_data(id, id_izin){
      loadAndDisplayPerizinan(id, id_izin, url_api_x, accesstoken);
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
