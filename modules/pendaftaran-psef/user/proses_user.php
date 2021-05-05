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

<?php include('../template/view_permohonan.html'); ?>
<?php include('view_permohonan_script.html'); ?>

<script>
   var accesstoken = <?php echo json_encode($_COOKIE['accesstoken']); ?>;
   var arr_detail_add = [];
   var arr_detail_add_x = [];
   var id_detail_add = 0;
   var cc;
   $(document).ready(function() {
      $('#zero_config').on('xhr.dt', function(e, settings, json, xhr) {
         json.data = json.rows;
         json.recordsTotal = json.recordsFiltered = json.total;
      }).DataTable({
         "processing": true,
         "columnDefs": [{
            "targets": [4],
            "orderable": false,
         }],
         "serverSide": true,
         "scrollY": '100vh',
         "scrollX": true,
         "ajax": {
            "url": url_api_php,
            "type": "POST",
            "dataSrc": function(json) {
               var data = [];
               for (var i = 0, ien = json.data.length; i < ien; i++) {
                  var datax = [];

                  datax.push(json.data[i].permohonanNumber);
                  datax.push(json.data[i].domain);
                  datax.push(json.data[i].straNumber);
                  let data_straExpiry = moment(json.data[i].straExpiry).format("YYYY-MM-DD");
                  datax.push(data_straExpiry);
                  datax.push(json.data[i].pemohonStatusName);

                  var actions = '<td><button onclick="viewPermohonan(\'' + json.data[i].id + '\')" type="button" class="btn btn-xs btn-block waves-effect waves-light btn-info">Lihat Detail Data</button>';

                  datax.push(actions);

                  data.push(datax);
               }
               return JSON.parse(JSON.stringify(data));

            },

            "data": function(d) {
               var order_name = []

               order_name.push('permohonanNumber');
               order_name.push('domain');
               order_name.push('straNumber');
               order_name.push('straExpiry');
               order_name.push('statusName');
               order_name.push('id');

               var data = {};

               data.fpage = (parseInt(d.start) + parseInt(d.length)) / parseInt(d.length);
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

   function viewRouting() {
      routing('proses_user');
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
</script>
