@if($data->page =="add")
<div class="row">
	<div class="col-lg-12">
   		<h3 class="page-header"><i class="fa fa-th-large" ></i> Tambah Data Pegawai</h3>
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
            <div class="panel-heading">Form dipergunakan untuk menambah data pegawai</div>
   			<div class="panel-body">
               {{ Form::open(array('url'=>'admin/pegawai/save'),['role'=>'role','class'=>'form-horizontal']) }}

                  <div class="col-sm-6" >

                     <div class="form-group">
                        {{ Form::label('nama','Username',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('username',Input::old('username'),array('class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>

                     <div class="form-group">
                        {{ Form::label('nama','Password',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                            {{ Form::password('password',array('class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>

                     <div class="form-group">
                        {{ Form::label('nama','Nama',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('nama',Input::old('nama'),array('class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>

                     <div class="form-group">
                        {{ Form::label('nama','NIP',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('nip',Input::old('nip'),array('class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>

					 <div class="form-group">
                        {{ Form::label('nama','Alamat',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::textarea('alamat',Input::old('alamat'),array('size'=>"20x5",'class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <div class="col-sm-6" >
                     <div class="form-group">
                        {{ Form::label('nama','Telepon',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('phone',Input::old('phone'),array('class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>

                     <div class="form-group">
                        {{ Form::label('nama','HandPhone',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('mobile_phone',Input::old('mobile_phone'),array('class'=>'form-control')) }}
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
                        {{ Form::label('nama','Level',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                          {{ Form::select('level', array(
                           											''=>'- Pilih Jabatan -',
                           											'1' => 'Pejabat Pembuat Komitmen',
                                                                    '2' => 'Sekretariat ULP',
																	'3' => 'Kepala ULP',
																	'4' => 'POKJA',
																	'5' => 'Pengguna Anggaran'),
                              null ,array('class'=>'form-control'))}}
                        </div>
                        <div class="clearfix"></div>
                     </div>

					 <div class="form-group">
                        {{ Form::label('nama','Jabatan',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('jabatan',Input::old('jabatan'),array('class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>

                     <div class="form-group">
                        {{ Form::label('nama','Golongan',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::select('golongan', array(	'0'=>'- Pilih Golongan -',
                           											'II/a' => 'II/a','II/b' => 'II/b','II/c' => 'II/c','II/d' => 'II/d',
																	'III/a' => 'III/a',
                                                                    'III/b' => 'III/b',
                                                                    'III/c' => 'III/c',
                                                                    'III/d' => 'III/d',
                                                                    'IV/a' => 'IV/a',
                                                                    'IV/b' => 'IV/b',
                                                                    'IV/c' => 'IV/c',
                                                                    'IV/d' => 'IV/d'),
                              null ,array('class'=>'form-control'))}}
                        </div>
                        <div class="clearfix"></div>
                     </div>

                     <div class="form-group">
                        {{ Form::label('nama','Email',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('email',Input::old('email'),array('class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>

                     <div class="form-group">
                        {{ Form::submit('Simpan',array('class'=>'btn btn-success')) }}
                        <a href="{{URL::to('admin/pegawai')}}" class="btn btn-info">Batal</a>
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
         <h3 class="page-header"><i class="fa fa-th-large" ></i> Edit Data <b>{{ $data->nama }}</b></h3>
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
            <div class="panel-heading">Form dipergunakan untuk mengupdate data pegawai</div>
            <div class="panel-body">
               {{ Form::open(array('url'=>'admin/pegawai/update/'.$data->nip),['role'=>'role','class'=>'form-horizontal']) }}
                  <div class="col-sm-6" >
                     <div class="form-group">
                        {{ Form::label('nama','Username',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('username',isset($data->username)?$data->username: Input::old('username'),
                           array('class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>

                     <div class="form-group">
                        {{ Form::label('nama','Password',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                            {{ Form::password('password',array('class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>

                     <div class="form-group">
                        {{ Form::label('nama','Nama',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('nama',isset($data->nama)?$data->nama: Input::old('nama'),
                           array('class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>

                     <div class="form-group">
                        {{ Form::label('nama','NIP',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('nip',isset($data->nip)?$data->nip: Input::old('nama'),array('class'=>'form-control','readonly'=>'readonly')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>

                     <div class="form-group">
                        {{ Form::label('nama','Alamat',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::textarea('alamat',isset($data->alamat)?$data->alamat : Input::old('alamat'),
                           array('size'=>"20x5",'class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <div class="col-sm-6" >
                     <div class="form-group">
                        {{ Form::label('nama','Telepon',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('phone',isset($data->phone)?$data->phone : Input::old('phone'),
                           array('class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>

                     <div class="form-group">
                        {{ Form::label('nama','HandPhone',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('mobile_phone',isset($data->mobile_phone)?$data->mobile_phone: Input::old('mobile_phone'),array('class'=>'form-control')) }}
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
                        {{ Form::label('nama','Jabatan',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('jabatan',isset($data->jabatan)?$data->jabatan: Input::old('jabatan'),array('class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>

                     <div class="form-group">
                        {{Form::label('nama','Golongan',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::select('golongan', array( 'II/a' => 'II/a','II/b' => 'II/b','II/c' => 'II/c','II/d' => 'II/d',
																	  'III/a' => 'III/a',
                           											  'III/b' => 'III/b',
                                                                      'III/c' => 'III/c',
                                                                      'III/d' => 'III/d',
                                                                      'IV/a' => 'IV/a',
                                                                      'IV/b' => 'IV/b',
                                                                      'IV/c' => 'IV/c',
																	  'IV/d' => 'IV/d'),
                                                                      $data->golongan, array('class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>

                     @if($data->level=="0")
                        <input type="hidden" name="level" value="0">
                    @else
                     <div class="form-group">
                        {{ Form::label('nama','Level',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::select('level', array('1' => 'Pejabat Pembuat Komitmen',
														'2' => 'Sekretariat ULP',
														'3' => 'Kepala ULP',
														'4' => 'POKJA',
														'5' => 'Pengguna Anggaran'),
                                                      $data->level, array('class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                    @endif

                     <div class="form-group">
                        {{ Form::label('nama','Email',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('email',isset($data->email)?$data->email : Input::old('email'),array('class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>

                     <div class="form-group">
                        {{ Form::submit('Simpan',array('class'=>'btn btn-success')) }}
                        <a href="{{URL::to('admin/pegawai')}}" class="btn btn-info">Batal</a>
                     </div>
                  </div>
               {{ Form::close() }}
            </div>
         </div>
   </div>
</div>

@endif
