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
        <br><br>
        <input type="checkbox" value="check" id="agree" required/> Dengan ini saya menyatakan bahwa data yang saya isi adalah benar
        <br><br>
        <input type="hidden" name="pemohonId" id="pemohonId" value="{{pemohonId}}">
        <input type="hidden" name="id" value="{{id}}">
        <button type="submit" class="btn btn-primary">Kirim</button>
        <button type="button" class="btn btn-danger" onclick="routing('rumusan_new')">Batal</button>
    </form>
</script>
