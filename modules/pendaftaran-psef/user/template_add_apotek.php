<!-- Template for add apotek -->
<script id="add-data-apotek-permohonan" type="text/x-handlebars-template">
   <h4 class="card-title">Tambah Data Apotek</h4>
    <form class="m-t-30" id="data-add-apotek" onsubmit="data_save_apotek(event)">
        <div class="form-group">
            <label>Nama Apotek</label>
            <input  type="text" class="form-control" id="name" name="name" placeholder="Masukan Nama Apotek" required>
        </div>
        <div class="form-group">
            <label>No SIA</label>
            <input  type="text" class="form-control" id="siaNumber" name="siaNumber" placeholder="Masukan No SIA" required>
        </div>
        <div class="form-group">
            <label>Nama Apoteker</label>
            <input  type="text" class="form-control" id="apotekerName" name="apotekerName" placeholder="Masukan Nama Apoteker" required>
        </div>
        <div class="form-group">
            <label>No STRA</label>
            <input  type="text" class="form-control" id="straNumber" name="straNumber" placeholder="Masukan No STRA" required>
        </div>
        <div class="form-group">
            <label>No SIPA</label>
            <input  type="text" class="form-control" id="sipaNumber" name="sipaNumber" placeholder="Masukan No SIPA" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <input  type="text" class="form-control" id="address" name="address" placeholder="Masukan Alamat" required>
        </div>
        <div class="form-group">
            <label>Provinsi</label>
            <select name="provinsiId" id="provinsiId" class="form-control" style="height: 36px;width: 100%;" required>
                <option value="" selected disabled>-- Pilih Provinsi --</option>
            </select>
        </div>
        <input type="hidden" id="no_permohonan" value="{{no_permohonan}}">
        <input type="hidden" name="permohonanId" value="{{permohonanId}}">
        <button type="submit" class="btn btn-primary">Kirim</button>
        <button type="button" class="btn btn-danger" onclick="edit_data_apotek('{{permohonanId}}','{{no_permohonan}}')">Batal</button>
    </form>
</script>
