<div class="row">
	<div class="col-lg-12">
   		<h3 class="page-header"><i class="fa fa-th-large" ></i> Detail data panitia </h3>
	</div>              
</div>
<div class="row">
	<div class="col-md-12">      
   		<div class="panel panel-default">
   			<div class="panel-body">
               <div class="table-responsive">
              	@foreach($data as $row)
                  <table  width="80%" cellpadding="0" cellspacing="0" border="0" class="table table-striped dataTable" id="panitia">
                        
                        <tr>
                           <th width="20%" >Nama Kepanitiaan</th>
                           <th width="80%" style="font-weight:normal">{{ $row->nama_pnt }}</th>
                        </tr>

                        <tr>
                           <th width="20%" >Satuan Kerja</th>
                           <th width="80%" style="font-weight:normal">{{ $row->nama_satker }}</th>
                        </tr>

                        <tr>
                           <th colspan="2" align="right" style="text-align:right">
                               <a href="{{ URL::to("admin/panitia/edit/".$row->id_pnt) }}" class="btn btn-primary" ><i class="fa fa-pencil" ></i>  Edit Data</a>
                               <a href="{{ URL::to("admin/panitia/") }}" class="btn btn-info" ><i class="fa fa-angle-double-left"></i>  Kembali</a>
                           </th>
                        </tr>
                   </table> 
                   @endforeach   
               </div>
   			</div>
   		</div>
	</div>              
			<div class="col-sm-12">
                  <div class="table-responsive">
                     <table  cellpadding="0" cellspacing="0" border="0" class="table table-hover table-striped table-bordered dataTable" id="detil_anggota">
                      <thead  style="font-size:13px;font-weight:1px;">
                        <tr>
                           <th>Nama Pegawai</th>
                           <th>NIP</th>
                           <th>Jabatan</th>
						   
                       </tr>
                     </thead>
                   </table>    
                  </div>
			</div>
</div>

@section('js')
   {{HTML::script('asset/themes/js/plugins/dataTables/jquery.dataTables.js')}}
    {{HTML::script('asset/themes/js/plugins/dataTables/dataTables.bootstrap.js')}}
    {{HTML::script('asset/themes/js/sb-admin-2.js')}} 
    <script type="text/javascript">
     
 
      $(function() {
          $("#detil_anggota").dataTable({
           "processing":true,
           "serverSide": true,
           "ajax":"{{ URL::to('admin/panitia/detilanggota/{id}') }}",
           "columnsDefs":[{
               "targets":"_all",
               "defaultContent":""
           }],
           "language": {
               "processing":"Please wait - loading...",
               "zeroRecords": '<div class="alert alert-danger" >Maaf Data yang anda cari tidak ditemukan</div>',
               "infoEmpty": '<div class="alert alert-danger" >Tidak terdapat data</div>',
               "infoFiltered": "(filtered from _MAX_ total records)"
           },
           "columns":[
               {"orderable":true,"searchable":true},
			   {"orderable":true,"searchable":true},
       		   {"orderable":false,"searchable":true}
           ]
           
       });
          
         $("#detil_anggota").on('click','#del',function(event){
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
