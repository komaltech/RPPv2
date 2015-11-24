@if($data->page =="add")
<div class="row">
	<div class="col-lg-12">
   		<h3 class="page-header"><i class="fa fa-envelope" ></i> Setting Email Sender</h3>
	</div>              
</div>
<div class="row">
	<div class="col-md-12">
          @if(Session::has('messages'))
             {{ Session::get('messages') }}
          @endif 
         <div class="panel panel-default">
            <div class="panel-heading">
               <div class="alert alert-warning" >
                  <strong>Keterangan :</strong><br>
                  Form ini dipergunakan untuk mengatur setting email server
                </div>
            </div>
   			<div class="panel-body">
               <form name="form" action="{{ URL::to('admin/setting/email/save') }}" class="form-horizontal" method="post" id="form">
                  <div class="col-sm-6" >
                     <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        {{ Form::label('nama','Email Sender',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('email',Input::old('email'),array('class'=>'form-control','id'=>'email')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        {{ Form::label('nama','Protokol',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('protokol',Input::old('orotokol'),array('class'=>'form-control','id'=>'protokol')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                    <div class="form-group">
                        {{ Form::label('nama','Host',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('host',Input::old('host'),array('class'=>'form-control','id'=>'host')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','User Email',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('user',Input::old('user'),array('class'=>'form-control','id'=>'user')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','Password Email',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('pass',Input::old('pass'),array('class'=>'form-control','id'=>'pass')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','Port',['class'=>'col-sm-4']) }}
                        <div class="col-sm-4">
                           {{ Form::text('port',Input::old('port'),array('class'=>'form-control','id'=>'port')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                      <div class="form-group">
                        {{ Form::label('nama','Enkripsi Email',['class'=>'col-sm-4']) }}
                        <div class="col-sm-4">
                           {{ Form::text('enkripsi',Input::old('enkripsi'),array('class'=>'form-control','id'=>'port')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::submit('Simpan',array('class'=>'btn btn-success')) }}   
                     </div>
                  </div>
               </form>
   			</div>
   		</div>
	</div>              
</div>
@else

<div class="row">
   <div class="col-lg-12">
         <h3 class="page-header"><i class="fa fa-envelope" ></i> Setting Email Sender</h3>
   </div>              
</div>
<div class="row">
   <div class="col-md-12">
         @if(Session::has('messages'))
             {{ Session::get('messages') }}
          @endif 
         <div class="panel panel-default">
            <div class="panel-heading">
               <div class="alert alert-warning" >
                  <strong>Keterangan :</strong><br>
                  Form ini dipergunakan untuk mengatur setting email server
                </div>
            </div>
            <div class="panel-body">
              <form name="form" action="{{ URL::to('admin/setting/email/save/'.$data->id_setting) }}" class="form-horizontal" method="post" id="form">
                  <div class="col-sm-6" >
                     <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        {{ Form::label('nama','Email Sender',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('email',$data->email_sender,array('class'=>'form-control','id'=>'email')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        {{ Form::label('nama','Protokol',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('protokol',$data->protokol,array('class'=>'form-control','id'=>'protokol')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                    <div class="form-group">
                        {{ Form::label('nama','Host',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('host',$data->host,array('class'=>'form-control','id'=>'host')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','User Email',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::text('user',$data->user_email,array('class'=>'form-control','id'=>'user')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','Password Email',['class'=>'col-sm-4']) }}
                        <div class="col-sm-8">
                           {{ Form::input('password','pass',$data->pass_email,array('class'=>'form-control','id'=>'password')) }}
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','Port',['class'=>'col-sm-4']) }}
                        <div class="col-sm-4">
                           {{ Form::text('port',$data->port,array('class'=>'form-control','id'=>'port')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','Enkripsi Email',['class'=>'col-sm-4']) }}
                        <div class="col-sm-4">
                           {{ Form::text('enkripsi',$data->enkripsi,array('class'=>'form-control','id'=>'port')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     
                     <div class="form-group">
                        {{ Form::submit('Simpan',array('class'=>'btn btn-success')) }}   
                     </div>
                  </div>
               </form>
            </div>
         </div>
   </div>              
</div> 
@endif

@section('js')
{{HTML::style('asset/themes/jquery_ui/jquery-ui.css')}}
{{HTML::script('asset/themes/jquery_ui/jquery-ui.js')}}
{{HTML::script('asset/themes/js/jquery.validate.js')}}

   <script type="text/javascript">
      $(function() {
       
        $("#form").validate({
         rules:{
            "email":{required:true},
            "protokol":{required:true},
            "host":{required:true},
            "user":{required:true},
            "pass":{required:true},
            "port":{required:true,number:true}
         },
         messages:{
            "email":'email harus diisi',
            "protokol":'email harus diisi',
            "host":'host harus diisi',
            "user":'user harus diisi',
            "pass":'password harus diisi',
            "port":{required:'port harus diisi',number:'Data harus diisi angka'}
         }
      });
     });
   </script>
@stop