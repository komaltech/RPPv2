<div class="row">
	<div class="col-lg-12">
   		<h3 class="page-header"><i class="fa fa-navicon"></i> Data Rekanan</h3>
          @if(Session::has('messages'))
             {{ Session::get('messages') }}
          @endif 
         <div class="alert alert-warning alert-dismissable" style="font-size:16px;display:none;" id="success"></div>
         <div class="alert alert-danger alert-dismissable" style="font-size:16px;display:none;" id="error"></div>
	</div>              
</div>
<div class="row">
	<div class="col-lg-12">
   		<div class="panel panel-default">
   			<div class="panel-heading">
   				<div class="row">
   					<div class="col-md-12">
   						<button class="btn btn-primary" data-toggle="modal" data-target="#mymodal">Tambah Rekanan</button>
   					</div>
   				</div>
   			</div>
   			<div class="panel-body">
   		      <div class="table-responsive">
                  <table  cellpadding="0" cellspacing="0" border="0" class="table table-hover table-striped dataTable" id="rekanan">
                      <thead>
                        <tr>

                           <th width="40%" >Rekanan</th>
                           <th width="15%">Mobile Phone</th>
                           <th width="15%">Telpon</th>   
                           <th width="25%">Actions</th>             
                        </tr>
                     </thead>
                   </table>    
               </div>
   			</div>
   		</div>
	</div>              
</div>
<div class="modal fade" id="mymodal" tabindex="1" role="dialog" style="display:none"  >
  <div class="modal-dialog">
   <form class="form-horizontal" id="form2" method="post" action="{{ URL::to('admin/rekanan/save') }}">
      <div class="modal-content" >
         <div class="modal-header">
            <button class="close" data-dismiss="modal" aria-hidden="true" >x</button>
            <h4 class="modal-title" > Form Tambah Rekanan</h4>
            <div class="alert alert-info" style="margin-top:10px;">
                <p style="font-size:18px"><i class="fa fa-info-circle"></i> Informasi :</p>
                <ul type="square">
                  <li>Form ini dipergunakan menambah data.</li>
                  <li>Diharapkan mengisikan semua data perusahaan secara lengkap.</li>
                </ul>
              </div>
         </div>
         <div class="modal-body">
            <div class="form-group" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
               {{ Form::label('no','Nama Rekanan',['class'=>'col-sm-3']) }}
               <div class="col-sm-8 ">
                  {{ Form::text('nama',null,array('class'=>"form-control","id"=>"nama")) }}
               </div>
               <div class="clearfix"></div>
            </div>
            <div class="form-group" >
               {{ Form::label('no','Email Rekanan',['class'=>'col-sm-3']) }}
               <div class="col-sm-8 ">
                  {{ Form::text('email',null,array('class'=>"form-control","id"=>"email")) }}
                  <p class="help-block" style="font-size:12px;">* Contoh format email : contoh@namadomain.com</p>
               </div>
               <div class="clearfix"></div>
            </div>
            <div class="form-group" >
               {{ Form::label('no','Telepon',['class'=>'col-sm-3']) }}
               <div class="col-sm-8 ">
                  {{ Form::text('telp',null,array('class'=>"form-control","id"=>"telp")) }}
                  <p class="help-block" style="font-size:12px;">* inputkan no telpon tanpa ada tanda pemisah</p>
               </div>
               <div class="clearfix"></div>
            </div>
            <div class="form-group" >
               {{ Form::label('no','Mobile Phone',['class'=>'col-sm-3']) }}
               <div class="col-sm-8 ">
                  {{ Form::text('mobile',null,array('class'=>"form-control","id"=>"mobile")) }}
               </div>
               <div class="clearfix"></div>
            </div>
           <div class="modal-footer" >
              {{ Form::submit('Simpan',array('class'=>'btn btn-success','id'=>'tambah')) }}
              <button  class="btn btn-danger" data-dismiss="modal">Batal</button>
           </div>
          </div>
      </div>
    </form>
   </div>   
</div>


@section('js')
   {{HTML::script('asset/themes/js/plugins/dataTables/jquery.dataTables.js')}}
    {{HTML::script('asset/themes/js/plugins/dataTables/dataTables.bootstrap.js')}}
    {{HTML::script('asset/themes/js/sb-admin-2.js')}}
     {{HTML::script('asset/themes/js/jquery.validate.js')}}
    <script type="text/javascript">
     
 
      $(function() {
        setInterval(function(){
             $('#error').slideUp('slow');
       },4000);
       setInterval(function(){
             $('#success').slideUp('slow');
       },4000);

          var table = $("#rekanan").dataTable({
           "processing":true,
           "serverSide": true,
           "ajax":"{{ URL::to('admin/rekananajax') }}",
           "columnsDefs":[{
               "targets":"_all",
               "defaultContent":""
           }],
           "language": {
               "processing":"Please wait - loading...",
               "search":"Pencarian&nbsp;&nbsp;",
               "lengthMenu": "_MENU_ data per halaman",
               "zeroRecords": '<div class="alert alert-danger" >Maaf Data yang anda cari tidak ditemukan</div>',
               "info": "Tampilkan hal _PAGE_ dari _PAGES_ halaman",
               "infoEmpty": '<div class="alert alert-danger" >Tidak terdapat data</div>',
               "infoFiltered": "(filtered from _MAX_ total records)"
           },
           "columns":[
               {"orderable":true,"searchable":true},
               {"orderable":false,"searchable":true},
               {"orderable":false,"searchable":true},
               {"orderable":false,"searchable":false}
           ]
           
       });
        var validator= $("#form2").validate({
              rules:{
                  'nama':{required:true},
                  'email':{required:true,email:true,remote:"{{ URL::to('admin/rekanan/cekemail') }}" 
                },
                  'telp':{required:true,number:true},
                  'mobile':{required:true,number:true}
              },
              messages:{
                  'nama':{required:'Nama rekanan Harus diisi'},
                  'email':{required:'email rekanan Harus diisi',email:'Format email belum terisi dengan benar',remote:jQuery.validator.format("{0} Sudah ada pada sistem,gunakan email lain.")},
                  'telp':{required:'telp rekanan Harus diisi',number:'telp harus diisi dengan angka'},
                  'mobile':{required:'mobile rekanan Harus diisi',number:'mobile harus diisi dengan angka'},
              },
               submitHandler: function(form){
                  var url = $("#form2").attr("action");
                  var data = $("#form2").serialize();

                  $("#tambah").val("Menyimpan data...");
                  $("#form2 :input").prop("readonly",true);

                  //alert(data);
                  $.post(url,data,function(data,status){
                     $("#tambah").val("Simpan")
                     $("#form2 :input").prop("readonly",false);
                     if(data =="ok"){
                       
                        $("#mymodal").modal("hide");
                        table.api().ajax.reload();

                        $("#error").hide();
                        $("#success").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check" style="margin-right:10px;"></i> Rekanan Berhasil Disimpan..');
                        $("#success").slideDown();
                     }else if(status="error"){
                      
                        $("#mymodal").modal("hide");
                        $("#success").hide();
                        $("#error").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-timer" style="margin-right:10px;"></i> Rekanan gagal disimpan');
                        $("#error").slideDown();
                     }else{
                     
                        $("#mymodal").modal("hide");
                        $("#success").hide();
                        $("#error").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-timer" style="margin-right:10px;"></i> Rekanan gagal disimpan');
                        $("#error").slideDown();
                     }
                      
                  });
               }
         });
          
         $("#rekanan").on('click','#del',function(event){
            event.preventDefault();
            var url =$(this).attr("href");
            var msg = confirm("Apakah anda ingin menghapus data ini ?");
           
            if(msg == true){
               window.location = url;
            }
         });

        $(window).on("hide.bs.modal",function(e){
          validator.resetForm();
          clearForm();
        })
         function clearForm(){
            $("#nama").val("");
            $("#email").val("");
            $("#telp").val("");
            $("#mobile").val("");
            $(".error").removeClass("error");

         }
      });
    </script>
@stop