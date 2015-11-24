
<div class="row">
  <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa-calendar" ></i> Atur Jadwal Tahapan Pengadaan Rekanan</h3>
  </div>              
</div>
<div class="row">
   <div class="col-lg-12" >

      <div class="alert alert-info" >
        <h4>Judul Pengadaan :</h4>
        <p style="font-size:16px;">{{ isset($data->judul)?$data->judul:'' }}</p>
        
      </div>
      <div class="alert alert-warning alert-dismissable" style="font-size:16px;display:none;" id="success"></div>
        <div class="alert alert-danger alert-dismissable" style="font-size:16px;display:none;" id="error"></div>
      <div class="panel panel-default">
        <div class="panel-heading">
           <div class="alert alert-warning" >
              <strong>Keterangan :</strong><br>
              <p>
                Form ini dipergunakan untuk mengatur Jadwal Tahapan rekanan<br>
                Hal - hal yang perlu diperhatikan dalam mengatur jadwal :<br>
                <i>- Harap mengisi seluruh jadwal pada semua tahapan pengadaan, jangan biarkan ada tahapan yang kosong jadwalnya</i>
                
              </p>
            </div>
        </div>
        <div class="panel-body">
        <div class="col-md-9" >
           <div class="table-responsive">
              <form method="post"  action="{{ URL::to('admin/rekanan/jadwal/simpan/'.$data->id) }}" name="form1" id="form1">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <table  cellpadding="0" cellspacing="0" border="0" class="table table-striped" >
                  <thead>
                    <tr>
                       <th width="3%" >No</th>
                       <th width="20%" >Jenis Tahapan</th>
                       <th width="15%">Mulai</th>
                       <th width="15%">Selesai</th>        
                    </tr>
                 </thead>
                 <tbody>
                    <tr>
                     <td>1</td>
                     <td>Persiapan</td>
                     <td>{{ Form::text('thp1_dari',$data->thp1_dari,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp1_dari")) }}</td>
                     <td>{{ Form::text('thp1_smp',$data->thp1_smp,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp1_smp")) }}</td>
                   </tr>
                    <tr>
                     <td>2</td>
                     <td>Pelaksanaan Pekerjaan</td>
                     <td>{{ Form::text('thp2_dari',$data->thp2_dari,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp2_dari")) }}</td>
                     <td>{{ Form::text('thp2_smp',$data->thp2_smp,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp2_smp")) }}</td>
                   </tr>
                    <tr>
                     <td>3</td>
                     <td>Pengiriman Barang</td>
                     <td>{{ Form::text('thp3_dari',$data->thp3_dari,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp3_dari")) }}</td>
                     <td>{{ Form::text('thp3_smp',$data->thp1_smp,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp3_smp")) }}</td>
                   </tr>
                    <tr>
                     <td>4</td>
                     <td>Penerimaan Barang</td>
                     <td>{{ Form::text('thp4_dari',$data->thp4_dari,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp4_dari")) }}</td>
                     <td>{{ Form::text('thp4_smp',$data->thp4_smp,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp4_smp")) }}</td>
                   </tr>
                   <tr>
                     <td colspan="4" >
                        
                       {{ Form::submit("Simpan Jadwal",array("class"=>"btn btn-primary","id"=>"simpan")) }}
                       <a href="{{ URL::to("/admin/rekanan/beranda") }}" class="btn btn-info">Kembali ke beranda</a>
                     </td>
                   </tr>
                  </tbody>
               </table> 
               </form>   
           </div>
           </div>
        </div>
      </div>
   </div>              
</div>


@section('js')
    {{HTML::style('asset/themes/css/datepicker3.css')}}
    {{HTML::script('asset/themes/js/bootstrap-datepicker.js')}}
    {{HTML::script('asset/themes/js/locales/bootstrap-datepicker.id.js')}}
    {{HTML::script('asset/themes/js/sb-admin-2.js')}}
    {{HTML::script('asset/themes/js/jquery.validate.js')}}
   <script type="text/javascript">
      $(function() {
        setInterval(function(){
               $('#error').slideUp('slow');
         },5000);
         setInterval(function(){
               $('#success').slideUp('slow');
         },5000);

        var validator = $("#form1").validate({
           rules:{
              "thp1_dari":{required:true},
              "thp1_smp":{required:true},
              "thp2_dari":{required:true},
              "thp2_smp":{required:true},
              "thp3_dari":{required:true},
              "thp3_smp":{required:true},
              "thp4_dari":{required:true},
              "thp4_smp":{required:true}
             
           },
           messages:{
              "thp1_dari":'Tanggal harus diisi',
              "thp1_smp":'Tanggal harus diisi',
              "thp2_dari":'Tanggal harus diisi',
              "thp2_smp":'Tanggal harus diisi',
              "thp3_dari":'Tanggal harus diisi',
              "thp3_smp":'Tanggal harus diisi',
              "thp4_dari":'Tanggal harus diisi',
              "thp4_smp":'Tanggal harus diisi'
              
           },
           submitHandler:function(form){
              $("#simpan").val("Menyimpan jadwal...");
              $("#form1 :input").prop("readonly",true);
             
              var  data = $(form).serialize();
              var url = $("#form1").attr("action");

              
              $.post(url,data,function(msg){
                $("#simpan").val("Simpan Jadwal");
                $("#form1 :input").prop("readonly",false);            

                if(msg =="ok"){
                  $("#error").hide();
                  $("#success").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check" style="margin-right:10px;"></i> Jadwal Berhasil disimpan');
                  $("#success").slideDown();
                }else{
                  $("#success").hide();
                  $("#error").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-timer" style="margin-right:10px;"></i> Jadwal gagal disimpan');
                  $("#error").slideDown();
                 }
              });

           }
        }); 


        getDatePicker("#thp1_dari");
        getDatePicker("#thp1_smp");
        getDatePicker("#thp2_dari");
        getDatePicker("#thp2_smp");
        getDatePicker("#thp3_smp");
        getDatePicker("#thp3_dari");
        getDatePicker("#thp4_dari");
        getDatePicker("#thp4_smp");

        
        function getDatePicker(id){
         $(id).datepicker({
            format:'d MM yyyy',
            language:'id'
         });
        }
     });
   </script>
@stop