<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8' />
	<title>Login Sistem</title>
	<meta content='width=devices-width,initial-scale=1,maximum-scale=1' />
	{{HTML::style('asset/themes/css/bootstrap.min.css')}}
	{{HTML::style('asset/themes/css/plugins/metisMenu/metisMenu.min.css')}}
	{{HTML::style('asset/themes/css/sb-admin-2.css')}}
	{{HTML::style('asset/themes/font-awesome-4.1.0/css/font-awesome.min.css')}}
</head>
<body>
 <nav class="navbar navbar-default navbar-static-top" style="background-color:#428bca;color:white" >
     <div class="navbar-header" >
        <a class="navbar-brand" style="color:white;"><i class="fa fa-archive"></i> <strong>Aplikasi Pengajuan RPP v.1</strong></a>
    </div>
 </nav>
	<div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
            	
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-unlock"></i> Login Sistem </h3>
                    </div>

                    <div class="panel-body">
                    	@if(Session::has('messages'))
                    		{{ Session::get('messages') }}
                    	@endif
                    	@if(count($errors)>0)
                    		<div class="alert alert-danger alert-dismissable" >
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Peringatan...</strong><br>
                    		@foreach($errors->all() as $error)
                    			<i class="fa fa-times" ></i> {{  $error }}
                    			<br>
                    		@endforeach
                    		</div>
                    	@endif
                    	
                        {{ Form::open(array('url'=>'login')) }}
                            <fieldset>
                                <div class="form-group">
                                    {{ Form::text('username',Input::old('username'),array('class'=>'form-control','placeholder'=>'Masukan username...','autofocus')) }}
                                </div>
                                <div class="form-group">
                                    {{ Form::password('password',array('class'=>'form-control','placeholder'=>'Masukkan password...')) }}
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                	{{ Form::submit('Login',array('class'=>'btn btn-success btn-lg btn-block')) }}
                            </fieldset>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

	{{HTML::script('asset/themes/js/jquery-1.11.0.js')}}
	{{HTML::script('asset/themes/js/bootstrap.min.js')}}
	{{HTML::script('asset/themes/js/plugins/metisMenu/metisMenu.min.js')}}
	{{HTML::script('asset/themes/js/sb-admin-2.js')}}
</body>
</html>