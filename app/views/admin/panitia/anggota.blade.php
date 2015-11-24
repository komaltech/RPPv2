@if($data->page =="tambahanggota")
<div class="row">
	<div class="col-lg-12">
   		<h3 class="page-header"><i class="fa fa-th-large" ></i> Tambah Anggota Panitia</h3>
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
            <div class="panel-heading">Form untuk menambah anggota kepanitiaan</div>
   			<div class="panel-body">
               {{ Form::open(array('action'=>'PanitiaController@saveanggota'),['role'=>'role','class'=>'form-horizontal']) }}
                  
                  <div class="col-sm-6" >
                     
					 <div class="form-group">
                        {{ Form::label('nama','Nama Kepanitiaan',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::select('id_pnt',$data->panitia,null,array('class'=>'form-control','readonly'=>'readonly')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
					 
                     <div class="form-group">
                        {{ Form::label('nama','Nama Anggota',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::select('nip',$data->pegawai,null,array('class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     
                     <div class="form-group">
                        {{ Form::label('nama','Jabatan',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                          {{ Form::select('agp_jabatan', array(
                           											''=>'- Pilih Jabatan -',
                           											'K' => 'Ketua', 
                                                                    'W' => 'Wakil Ketua',
																	'S' => 'Sekretaris',
																	'A' => 'Anggota'
																	),
                              null ,array('class'=>'form-control'))}}
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
@endif