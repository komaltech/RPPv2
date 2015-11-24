<div class="row">
   <div class="col-lg-12">
         <h3 class="page-header"><i class="fa fa-clipboard"></i> Daftar Pengajuan Paket Pengadaan</h3>
   </div>              
</div>
<div class="row">
   <div class="col-lg-12">
         <div class="panel panel-default">
            <div class="panel-heading">
               <div class="row">
                  <div class="col-md-12">
                      <div class="alert alert-warning" >
                        <strong>Keterangan :</strong><br>
                        Form ini dipergunakan untuk melihat dan memantau proses dari pengadaan.
                      </div>
                  </div>
               </div>
            </div>
            <div class="panel-body">
               <div class="table-responsive">
                  <table  cellpadding="0" cellspacing="0" border="0" class="table table-hover table-striped dataTable" id="paket" >
                      <thead>
                        <tr>
                           <th width="30%" >Paket</th>
                           <th width="10%">Tahapan</th>
                           <th width="15%">Total Pagu</th>
							<th width="15%">Tahun Anggaran</th>						   
                           <th width="20%">Aksi</th>             
                        </tr>
                     </thead>
                   </table>    
               </div>
            </div>
         </div>
   </div>              
</div>


@section('js')
   {{HTML::script('asset/themes/js/plugins/dataTables/jquery.dataTables.js')}}
    {{HTML::script('asset/themes/js/plugins/dataTables/dataTables.bootstrap.js')}}
    {{HTML::script('asset/themes/js/sb-admin-2.js')}}
    <script type="text/javascript">
     
 
      $(function() {
          $("#paket").dataTable({
           "processing":true,
           "serverSide": true,
           "ajax":"{{ URL::to('admin/beranda/listAjax') }}",
           "columnsDefs":[{
               "targets":"_all",
               "defaultContent":""
           }],
           "language": {
               "processing":"Please wait - loading...",
               "search":"Pencarian&nbsp;&nbsp;",
               "lengthMenu": "_MENU_ data per halaman",
               "zeroRecords": '<div class="alert alert-danger" >Maaf Data yang anda cari tidak ditemukan</div>',
               "info": "Tampilkan hal _PAGE_ dari _PAGES_ halaman",
               "infoEmpty": '<div class="alert alert-danger" >Tidak terdapat data</div>',
               "infoFiltered": "(filtered from _MAX_ total records)"
           },
           "columns":[
               {"orderable":true,"searchable":true},
               {"orderable":false,"searchable":true},
               {"orderable":false,"searchable":true},
			    {"orderable":false,"searchable":true},
               {"orderable":false,"searchable":true}
           ]
           
       });
          
         $("#paket").on('click','#del',function(event){
            event.preventDefault();
            var url =$(this).attr("href");
            var msg = confirm("Apakah anda ingin menghapus data ini ?");
           
            if(msg == true){
               window.location = url;
            }
         });
      });
    </script>
@stop