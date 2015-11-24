<div class="row">
   <div class="col-lg-12">
         <h3 class="page-header"><i class="fa fa-th-large" ></i> Data Login {{ $data->nama_rkn }}</h3>
   </div>              
</div>
<div class="row">
   <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading">
               <div class="alert alert-info" style="margin-bottom:0px;">
                <p style="font-size:18px"><i class="fa fa-info-circle"></i> Informasi :</p>
                <ul type="square">
                  <li>Form ini dipergunakan mengubah data yang diperlukan untuk login rekanan.</li>
                  <li>Diharapkan mengisikan semua data perusahaan secara lengkap.</li>
                </ul>
              </div>
            </div>
            <div class="panel-body" style="height:250px;">
               <div class="alert alert-warning alert-dismissable" style="font-size:16px;display:none;" id="success"><i class="fa fa-check" style="margin-right:10px;"></i></div>
               <div class="alert alert-danger alert-dismissable" style="font-size:16px;display:none;" id="error"><i class="fa fa-timer" style="margin-right:10px;"></i></div>
               <form action="{{ URL::to('admin/rekanan/save_username/'.$data->id_rkn) }}" method="POST" class="form-horizontal" name="form1" id="form1">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <div class="col-sm-8" >
                     <div class="form-group">
                        {{ Form::label('nama','Username',['class'=>'col-sm-3']) }}
                        <div class="col-sm-6">
                           {{ Form::text('username',$data->email_rkn,array('class'=>'form-control','id'=>'username')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                     <div class="form-group">
                        {{ Form::label('nama','Password Baru',['class'=>'col-sm-3']) }}
                        <div class="col-sm-6">
                           {{ Form::input('password','password',null,array('class'=>'form-control','id'=>'password')) }}   
                        </div>
                        <div class="clearfix"></div>
                     </div>
                  </div>
                  <div class="col-sm-12" style="margin-top:10px">
                     {{ Form::submit('Simpan Data',array('class'=>'btn btn-success',"id"=>"simpan")) }}
                  </div>
               </form>
            </div>
         </div>
   </div>                
</div>




@section('js')
   {{HTML::script('asset/themes/js/jquery.validate.js')}}
   <script type="text/javascript">
      $(function() {
         
         setInterval(function(){
               $('#error').slideUp('slow');
         },4000);
         setInterval(function(){
               $('#success').slideUp('slow');
         },4000);

         $(document).ajaxStart(function(){
            $("#simpan").val("Proses Penyimpanan...")
            $("#form1 input").prop("disabled",true);
         }).ajaxStop(function(){
            $("#simpan").val("Simpan Data")
            $("#form1 input").prop("disabled",false);
         });

         $("#form1").validate({
              rules:{
                  'username':{required:true,email:true}
              },
              messages:{
                  'username':{email:'Format email belum benar',required:'Email Harus diisi'},
              },
               submitHandler: function(form){
                  var url = $("#form1").attr("action");
                  var data = $("#form1").serialize();

                  //alert(data);
                  $.post(url,data,function(data,status){
                     if(data =="ok"){
                        $("#error").hide();
                        $("#success").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check" style="margin-right:10px;"></i> Data Berhasil Disimpan..');
                        $("#success").slideDown();
                     }else if(status="error"){
                        $("#success").hide();
                        $("#error").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-timer" style="margin-right:10px;"></i> Data gagal disimpan');
                        $("#error").slideDown();
                     }else{
                        $("#success").hide();
                        $("#error").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-timer" style="margin-right:10px;"></i> Data gagal disimpan');
                        $("#error").slideDown();
                     }
                     $('#password').val('');
                  });
               }
         }); 

     });
   </script>
@stop
