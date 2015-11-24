<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8' />
	<title>.: Aplikasi RPP :.</title>
	<meta content='width=devices-width,initial-scale=1,maximum-scale=1' />
	{{HTML::style('asset/themes/css/bootstrap.min.css')}}
	{{HTML::style('asset/themes/css/plugins/metisMenu/metisMenu.min.css')}}
	{{HTML::style('asset/themes/css/sb-admin-2.css')}}
	{{HTML::style('asset/themes/font-awesome-4.1.0/css/font-awesome.min.css')}}
     @yield('css')
    
     
</head>
<body>
	 <div>

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;background-color:#428bca;">
            <div class="navbar-header">
                
                <a class="navbar-brand" href="" style="color:white;margin-left:15px;"><i class="fa fa-codepen"></i> 
				<strong>Aplikasi Pengajuan Paket Pengadaan Kabupaten Pasuruan v.1</strong></a>
            </div>
            <!-- /.navbar-header -->
            <div class="nav navbar-right">
                <a href="{{ URL::to('admin/logout') }}" class="btn btn-danger" style="margin-top:7px;margin-right:20px;">
                    <i class="fa fa-sign-out fa-fw"></i>Log Out
                </a>
            </div>
            
            <!-- /.navbar-top-links -->

            @include($menu)
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            @include($page)
        </div>
        <!-- /#page-wrapper -->

    </div>
	
    {{HTML::script('asset/themes/js/jquery-1.11.0.js')}}
    {{HTML::script('asset/themes/js/bootstrap.min.js')}}
    
    @yield('js')
    {{HTML::script('asset/themes/js/sb-admin-2.js')}}
    {{HTML::script('asset/themes/js/plugins/metisMenu/metisMenu.min.js')}}
</body>
</html>