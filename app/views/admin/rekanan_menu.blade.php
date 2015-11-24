<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li style="display:block;text-align:center;padding:15px 0px 15px 0px">
                {{ HTML::image('asset/img/avatar.jpg','a user',array('class'=>'img-circle','width'=>'60px','height'=>'60px','style'=>'margin-bottom:10px;')) }}<br>
                <strong>Username</strong><br>
                Dashboard<br>
                Level : Rekanan
            </li>
            <li>
                <a href="{{ URL::to("admin/rekanan/beranda")}}"><i class="fa fa-home"></i> Beranda</a>
            </li>
            
            <li>
                <a href="{{ URL::to("admin/rekanan/user_edit/".Session::get('id_user')) }}"><i class="fa fa-edit"></i> Edit Data Rekanan</a>
            </li> 
          
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>