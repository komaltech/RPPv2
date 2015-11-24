<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li style="display:block;text-align:center;padding:15px 0px 15px 0px">
                @if(empty(Session::get('foto')))
                    {{ HTML::image('asset/img/avatar.jpg','a user',array('class'=>'img-circle','width'=>'60px','height'=>'60px','style'=>'margin-bottom:10px;')) }}<br>
                @else
                    {{ HTML::image('asset/img/foto_user/thumbnail/'.Session::get('foto'),'a user',array('class'=>'img-circle','width'=>'60px','height'=>'60px','style'=>'margin-bottom:10px;')) }}<br>
                @endif
                
                <strong>Username :</strong><br>
                {{Session::get('username')}}<br>
                @if(Session::get('level')=="5")
                    Level : Pengguna Anggaran
				@elseif(Session::get('level')=="4")
                    Level : POKJA ULP
				@elseif(Session::get('level')=="3")
                    Level : Kepala ULP
				@elseif(Session::get('level')=="2")
                    Level : Sekretariat ULP
                @elseif(Session::get('level')=="1")
                    Level : Pejabat Pembuat Komitmen
                @elseif(Session::get('level')=="0")
                    Level : Administrator
                @endif
                
            </li>
            <li>
                <a href="{{ URL::to('admin/beranda') }}"><i class="fa fa-dashboard fa-fw"></i> Beranda</a>
            </li>
            @if(Session::get('level')>"1")
                <li>
                    <a href="{{ URL::to('admin/paket') }}"><i class="fa fa-table fa-fw"></i> Daftar Pengajuan Paket Pengadaan</a>
                </li>
                <li>
                    <a href="{{ URL::to('admin/user/edit/'.Session::get('user_id')) }}"><i class="fa fa-edit" ></i> Edit data user</a>
                </li>
            @elseif(Session::get('level')=="1")
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-clipboard"></i> Pengajuan Paket <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ URL::to('admin/paket/add') }}">Buat Paket Baru</a>
                        </li>
                         <li>
                            <a href="{{ URL::to('admin/paket') }}"> Daftar Paket</a>
                        </li>
                    </ul>
                </li>
                 <li>
                    <a href="{{ URL::to('admin/user/edit/'.Session::get('user_id')) }}"><i class="fa fa-edit" ></i> Edit data user</a>
                </li>
            @elseif(Session::get('level')=="0")
                 <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Menu Data<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                         <li>
                            <a href="{{ URL::to('admin/satker') }}"> Data Satuan Kerja</a>
                        </li> 
                        <li>
                            <a href="{{ URL::to('admin/pegawai') }}"> Data Pegawai</a>
                        </li>
						<li>
                            <a href="{{ URL::to('admin/panitia') }}"> Data Panitia</a>
                        </li>
				        <li>
                            <a href="{{ URL::to('admin/kategori') }}"> Kategori Paket</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="#"><i class="fa fa-cog fa-fw"></i> Setting<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ URL::to('admin/setting/email') }}"><i class="fa fa-envelope" ></i> Email</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
                <li>
                    <a href="{{ URL::to('admin/user/edit/'.Session::get('user_id')) }}"><i class="fa fa-edit" ></i> Edit data user</a>
                </li>
            @endif
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>