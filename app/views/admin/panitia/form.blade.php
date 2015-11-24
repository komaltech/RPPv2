@if($data->page =="tambah")
<div class="row">
	<div class="col-lg-12">
   		<h3 class="page-header"><i class="fa fa-th-large" ></i> Tambah Data Panitia</h3>
	</div>              
</div>
<div class="row">
	<div class="col-md-12">
         @if(Session::has('messages'))
                        {{ Session::get('messages') }}
         @endif
         @if(count($errors)>0)
            <div class="alert alert-danger alert-dismissable" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Peringatan...</strong><br>
            @foreach($errors->all() as $error)
               {{ $error }}
               <br>
            @endforeach
            </div>
         @endif
         
   		<div class="panel panel-default">
            <div class="panel-heading">Form untuk menambah data kepanitiaan</div>
   			<div class="panel-body">
               {{ Form::open(array('url'=>'admin/panitia/save'),['role'=>'role','class'=>'form-horizontal']) }}
                  
                  <div class="col-sm-6" >
                     
                     <div class="form-group">
                        {{ Form::label('nama','Nama Kepanitiaan',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('nama_pnt',Input::old('nama_pnt'),array('class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     
                     <div class="form-group">
                        {{Form::label('nama','Satuan Kerja',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{Form::select('id_satker',$data->satker,null, array('class'=>'form-control'))}}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     
                     <div class="form-group">
                        {{ Form::submit('Simpan',array('class'=>'btn btn-success')) }}   
                        <a href="{{URL::to('admin/panitia')}}" class="btn btn-info">Batal</a>
                     </div>
                  </div>
               {{ Form::close() }}
   			</div>
   		</div>
	</div>              
</div>
@else
  <div class="row">
   <div class="col-lg-12">
         <h3 class="page-header"><i class="fa fa-th-large" ></i> Edit Data </h3>
   </div>              
</div>
<div class="row">
   <div class="col-md-12">
         @if(Session::has('messages'))
                        {{ Session::get('messages') }}
         @endif
         @if(count($errors)>0)
            <div class="alert alert-danger alert-dismissable" >
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Peringatan...</strong><br>
            @foreach($errors->all() as $error)
               {{ $error }}
               <br>
            @endforeach
            </div>
         @endif
         
         <div class="panel panel-default">
            <div class="panel-heading">Form untuk mengupdate data panitia</div>
            <div class="panel-body">
               {{ Form::open(array('url'=>'admin/panitia/update/'.$data->id_pnt),['role'=>'role','class'=>'form-horizontal']) }}
                  <div class="col-sm-6" >
                                          
                     <div class="form-group">
                        {{ Form::label('nama','Nama Kepantiaan',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('nama_pnt',isset($data->nama_pnt)?$data->nama_pnt: Input::old('nama_pnt'),
                           array('class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                 
                     <div class="form-group">
                        {{Form::label('nama','Satuan Kerja',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{Form::select('id_satker',$data->satker, $data->id_satker, array('class'=>'form-control'))}}
                        </div>
                        <div class="clearfix"></div>
                     </div>
 
                     <div class="form-group">
                        {{ Form::submit('Simpan',array('class'=>'btn btn-success')) }}  
                        <a href="{{URL::to('admin/panitia')}}" class="btn btn-info">Kembali</a>
						<a href="{{URL::to('admin/panitia/pilihanggota/'.$data->id_pnt)}}" class="btn btn-primary">Tambah Anggota</a>
						<a href="{{URL::to('admin/panitia/hapusanggota')}}" class="btn btn-danger">Hapus Anggota</a>
                     </div>
					 
					 <div class="panel-body">
   		      <div class="table-responsive">
                  <table  cellpadding="0" cellspacing="0" border="0" class="table table-hover table-striped dataTable" id="anggota">
                      <thead>
                        <tr>
                           <th>Nama Pegawai</th>
                           <th>NIP</th>
						   <th>Jabatan</th>
                           <th>Actions</th>             
                        </tr>
                     </thead>
                   </table>    
               </div>
   			</div>
                  </div>
               {{ Form::close() }}
            </div>
         </div>
   </div>  
</div>

@endif

@section('js')
   {{HTML::script('asset/themes/js/plugins/dataTables/jquery.dataTables.js')}}
    {{HTML::script('asset/themes/js/plugins/dataTables/dataTables.bootstrap.js')}}
    {{HTML::script('asset/themes/js/sb-admin-2.js')}}
    <script type="text/javascript">
     
 
      $(function() {
          $("#anggota").dataTable({
           "processing":true,
           "serverSide": true,
           "ajax":"{{ URL::to('admin/panitia/anggotaAjax') }}",
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
			   {"orderable":true,"searchable":true},
			   {"orderable":true,"searchable":true},
       		   {"orderable":false,"searchable":true}
           ]
           
       });
          
         $("#anggota").on('click','#del',function(event){
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
