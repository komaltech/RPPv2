<div class="row">
	<div class="col-lg-12">
   		<h3 class="page-header"><i class="fa fa-check" ></i> Form Pemilihan Rekanan</h3>
	</div>              
</div>
<div class="row">
	<div class="col-md-12">  
      <div class="alert alert-info" >
        <h4>Judul Pengadaan :</h4>
        <p style="font-size:16px;">{{ isset($data->judul)?$data->judul:'' }}</p>
      </div>
   		<div class="panel panel-default">
        <div class="panel-heading">
          <div class="alert alert-warning" >
            <strong>Keterangan :</strong><br>
            Form ini dipergunakan untuk memilih rekanan atau perusahaan yang dianggap berkompetensi untuk mengerjakan proyek pengadaan.
          </div>
        </div>
   			<div class="panel-body">
            <div class="table-responsive">
                <table  cellpadding="0" cellspacing="0" border="0" class="table table-hover table-striped dataTable" id="rekanan" >
                    <thead>
                      <tr>
                         <th width="30%" >Rekanan</th>
                         <th width="10%">Telepon</th>
                         <th width="15%">Mobil-phone</th>   
                         <th width="15%"></th>             
                           
                      </tr>
                   </thead>
                 </table>    
             </div>  
   			</div>
        <div class="panel-footer" >
          <a href="{{ URL::to('admin/pengadaan/') }}" class="btn btn-success btn-block"><i class="fa fa-angle-left" style="margin-right:10px;" ></i>Kembali Ke Daftar Pengadaan</a>
        </div>
   		</div>
     
	</div>              
</div>

@section('js')
   {{HTML::style('asset/themes/jquery_ui/jquery-ui.css')}}   
   {{HTML::script('asset/themes/js/plugins/dataTables/jquery.dataTables.js')}}
    {{HTML::script('asset/themes/js/plugins/dataTables/dataTables.bootstrap.js')}}

   <script type="text/javascript">
      $(function(){
      
         $("#rekanan").dataTable({
           "processing":true,
           "serverSide": true,
           "sort":false,
           "filter":false,
           "bDeferRender": true,
           "ajax":'{{ URL::to("admin/pengadaan/rekananajax") }}',
           "drawCallback":function(settings){
                if(settings.fnRecordsTotal() < 10){     
                    $('.dataTables_paginate').hide();
                } else {
                    $('.dataTables_paginate').show(); 
                }
           },
           "columnsDefs":[{
               "targets":"_all",
               "defaultContent":""
           }],
           "language": {
               "processing":"Please wait - loading...",
               "search":"Pencarian&nbsp;&nbsp;",
               "lengthMenu": "_MENU_ data per halaman",
               "zeroRecords": '<div class="alert alert-danger" >Tidak Terdapat Data</div>',
               "info": "Tampilkan hal _PAGE_ dari _PAGES_ halaman",
               "infoEmpty": '<div class="alert alert-danger" >Tidak terdapat data</div>',
               "infoFiltered": "(filtered from _MAX_ total records)"
           },
           "createdRow":function(row,data,dataIndex){
              var rekanan = $(row).find("#pilih").attr("data-id");
              $(row).find("#pilih").attr("href",'{{URL::to("/admin/pengadaan/jadwal/add/".$data->id)}}/'+rekanan);
           },
          
         });

       
      $("#detil").on('click','#del',function(event){
            event.preventDefault();
            var url =$(this).attr("href");
            var msg = confirm("Apakah anda ingin menghapus data ini ?");
            //alert(url);
            if(msg == true){
               $.get(url).done(function(data){
                  detil_table.api().ajax.reload();
               }).fail(function(data){
                  alert("gagal terkoneksi ke server");
               });
            }
      });
     
     
   });

   </script>
@stop