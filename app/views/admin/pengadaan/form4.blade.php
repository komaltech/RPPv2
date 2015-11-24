
<div class="row">
   <div class="col-lg-12" >
      <span class="col-sm-3 col-md-offset-4" id="loader" style="text-align:center;margin-top:250px;display:none;">
         {{ HTML::image('asset/img/loader1.GIF','a user',array('width'=>'35px','height'=>'35x','style'=>'margin-bottom:10px;')) }}<br>
         <p>Sedang Mengirim Email........</p>
      </span>
      <div class="alert alert-info col-sm-7" style="margin-top:35px;display:none;" id="success">
        <h3 ><i class="fa fa-check" style="margin-right:6px;" ></i> Info : Email Berhasil Dikirim</h3>
        <p>
          <ul>
            <li>Email telah dikirimkan ke PIHAK <strong>{{isset($data->rekanan)?$data->rekanan:''}}</strong> Dengan judul Pengadaan <strong>{{isset($data->judul)?$data->judul:''}}</strong></li>
            <li>Diharapkan segera menghubungi pihak <strong>{{isset($data->rekanan)?$data->rekanan:''}}</strong> agar segera memasukkan file yang diminta.</li>
          </ul>
        </p><br>
        <p style="text-align:right;">
          <a href="{{ URL::to('admin/pengadaan') }}" class="btn btn-primary"><i class="fa fa-chevron-left" style="margin-right:6px;font-size:11px;"></i> Kembali ke Daftar Pengadaan</a>
        </p>
      </div>
       <div class="alert alert-danger col-sm-7" style="margin-top:35px;display:none;" id="error">
        <h3 ><i class="fa fa-warning" style="margin-right:6px;" ></i> Terjadi Kesalahan : Email Gagal Dikirim</h3>
        <p>
          <ul>
            <li>Email tidak berhasil dikirim ke PIHAK <strong>{{isset($data->rekanan)?$data->rekanan:''}}</strong> Harap cek koneksi internet dan cek settingan email pada <strong>menu setting -> Email pada user level ADMIN</strong></li>
          </ul>
        </p><br>
        <p style="text-align:right;">
          <a href="{{ URL::to('admin/pengadaan') }}" class="btn btn-primary"><i class="fa fa-chevron-left" style="margin-right:6px;font-size:11px;"></i> Kembali ke Daftar Pengadaan</a>
          <a href="{{ URL::to('admin/pengadaan/pilih/'.$data->id) }}" class="btn btn-success"><i class="fa fa-envelope-o" style="margin-right:6px"></i> Kirim Ulang Email</a>
        </p>
      </div>
   </div>        
</div>


@section('js')
   {{HTML::script('asset/themes/js/plugins/dataTables/jquery.dataTables.js')}}
    {{HTML::script('asset/themes/js/plugins/dataTables/dataTables.bootstrap.js')}}
    {{HTML::script('asset/themes/js/sb-admin-2.js')}}
    <script type="text/javascript">
      $(function() {
          $(window).load(function(){
            $("#loader").show();
            $.get('{{ URL::to("/admin/pengadaan/pilihAjax/".$data->id) }}',function(data,status){
                if(data=="berhasil"){
                   $("#loader").hide();
                   $("#success").fadeIn();
                }else if(data=="gagal"){
                  $("#loader").hide();
                  $("#error").fadeIn();
                }
                
            });
          });
      });
    </script>
@stop