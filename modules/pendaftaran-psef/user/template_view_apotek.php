<!-- Template show data apotek -->
<script id="edit-data-apotek" type="text/x-handlebars-template">
   <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title" id="page-title-apotek">Data Apotek</h4>
        </div>
        <div class="col-5 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center" id="add_data">
                <button onclick="routing('rumusan_user')" type="button" class="btn waves-effect waves-light btn-danger btn-add-data">Kembali ke Data Permohonan</button>
            </div>
        </div>
        <div class="col-2 align-self-center">
            <div class="d-flex no-block justify-content-end align-items-center" id="add_data">
                <button onclick="add_data_apotek('{{permohonanId}}','{{no_permohonan}}')" type="button" class="btn waves-effect waves-light btn-info btn-add-data">Tambah Data Apotek</button>
            </div>
        </div>
    </div><br>
    <table id="zero_config_apotek" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nama Apotek</th>
                <th>No SIA</th>
                <th>Nama Apoteker</th>
                <th>No STRA</th>
                <th>No SIPA</th>
                <th>Alamat</th>
                <th>Provinsi</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
            {{#value}}
                <tr id="rowApotek_{{id}}">
                    <td>{{name}}</td>
                    <td>{{siaNumber}}</td>
                    <td>{{apotekerName}}</td>
                    <td>{{straNumber}}</td>
                    <td>{{sipaNumber}}</td>
                    <td>{{address}}</td>
                    <td>{{provinsiName}}</td>
                    <td>
                        <center>
                            <button onclick="edit_data_apotek_permohonan('{{id}}','{{permohonanId}}','{{no_permohonan}}')" type="button" class="btn waves-effect waves-light btn-primary">Ubah Apotek</button>
                            <br>
                            <button onclick="delete_data_apotek_permohonan('{{id}}','{{permohonanId}}')" type="button" class="btn waves-effect waves-light btn-danger">Delete Apotek</button>
                        </center>
                    </td>
                </tr>
            {{/value}}
        </tbody>
    </table>
</script>
