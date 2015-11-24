<div class="row">
   <div class="col-lg-12">
         <h3 class="page-header"><i class="fa fa-user" ></i> Edit Data {{ $data->nama }}</h3>
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
            <h4><i class="fa fa-exclamation-triangle" style="margin-right:10px;"></i> Peringatan...</h4>
            <ul type="square">
            @foreach($errors->all() as $error)
               <li style="margin-top:-10px;margin-bottom:-10px;">{{ $error }}</li>
               <br>
            @endforeach
            <ul>
            </div>
         @endif
         
         <div class="panel panel-default">
            <div class="panel-heading">
               <div class="alert alert-info" style="margin-bottom:0px;">
                <p style="font-size:18px"><i class="fa fa-info-circle"></i> Informasi :</p>
                <ul type="square">
                  <li>Form ini dipergunakan untuk mengedit data user</li>
                  <li>Diharapkan mengisikan semua data user</li>
                 
                </ul>
              </div>
            </div>
            <div class="panel-body">
               {{ Form::open(array('url'=>'admin/user/save/'.$data->nip,'files'=>true),['role'=>'role','class'=>'form-horizontal']) }}
                  <div class="col-sm-6" >
                     <div class="form-group">
                        {{ Form::label('nama','NIP',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('nip',isset($data->nip)?$data->nip: Input::old('nama'),array('class'=>'form-control','readonly')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     
                     <div class="form-group">
                        {{ Form::label('nama','Nama',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('nama',isset($data->nama)?$data->nama: Input::old('nama'),array('class'=>'form-control')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     
                     <div class="form-group">
                        {{ Form::label('nama','Alamat',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::textarea('alamat',isset($data->alamat)?$data->alamat : Input::old('alamat'),array('size'=>"20x5",'class'=>'form-control')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     
                     <div class="form-group">
                        {{ Form::label('nama','Phone',['class'=>'col-sm-4']) }}
                        <div class="col-sm-4">
                           {{ Form::text('phone',isset($data->phone)?$data->phone : Input::old('phone'),array('class'=>'form-control')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     
                     <div class="form-group">
                        {{ Form::label('nama','Mobile Phone',['class'=>'col-sm-4']) }}
                        <div class="col-sm-4">
                           {{ Form::text('mobile_phone',isset($data->mobile_phone)?$data->mobile_phone : Input::old('mobile_phone'),array('class'=>'form-control')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
					 
					 <div class="form-group">
                        {{ Form::label('nama','Jabatan',['class'=>'col-sm-4']) }}
                        <div class="col-sm-4">
                           {{ Form::text('jabatan',isset($data->jabatan)?$data->jabatan : Input::old('jabatan'),array('class'=>'form-control')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
					 
                     <div class="form-group">
                        {{ Form::label('nama','Golongan',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::select('golongan', array(
                                                            '0'=>'- Pilih Golongan -',
                                                            'II/a' => 'II/a',
															'II/b' => 'II/b',
															'II/c' => 'II/c',
															'II/d' => 'II/d',
															'III/a' => 'III/a', 
                                                            'III/b' => 'III/b',
                                                            'III/c' => 'III/c',
                                                            'III/d' => 'III/d',
                                                            'IV/a' => 'IV/a',
                                                            'IV/b' => 'IV/b',
                                                            'IV/c' => 'IV/c',
                                                            'IV/d' => 'IV/d'),
                              $data->golongan ,array('class'=>'form-control'))}}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','Email',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('email',isset($data->email)?$data->email : Input::old('email'),array('class'=>'form-control')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{Form::label('nama','File Foto',['class'=>'col-sm-4'])}}
                        <div class="col-sm-8">
                           {{ Form::file('foto','',array('class'=>'form-control')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{Form::label('nama','Username',['class'=>'col-sm-4'])}}
                        <div class="col-sm-8">
                           {{ Form::text('username',isset($data->username)?$data->username : Input::old('Username'),array('class'=>'form-control')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                      <div class="form-group">
                        {{Form::label('nama','Password',['class'=>'col-sm-4'])}}
                        <div class="col-sm-8">
                           {{ Form::input('password','password',null,array('class'=>'form-control')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     
                     <div class="form-group">
                        {{ Form::submit('Simpan Data',array('class'=>'btn btn-success')) }}   
                       <a href="{{URL::to('admin/beranda')}}" class="btn btn-info">Kembali</a>
                     </div>
                  </div>
               {{ Form::close() }}
            </div>
         </div>
   </div>       
</div>


@section('js')
{{HTML::style('asset/themes/jquery_ui/jquery-ui.css')}}

   {{HTML::script('asset/themes/jquery_ui/jquery-ui.js')}}

   <script type="text/javascript">
      $(function() {
       $( "#tanggal" ).datepicker({
         changeMonth: true,
         changeYear: true,
       });
     });
   </script>
@stop