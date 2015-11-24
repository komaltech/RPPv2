<div class="row">
	<div class="col-lg-12">
   		<h3 class="page-header"><i class="fa fa-navicon" style="margin-right:15px;"></i> Daftar direksi Perusahaan</h3>
          @if(Session::has('messages'))
             {{ Session::get('messages') }}
          @endif 
	</div>              
</div>
<div class="row">
	<div class="col-lg-12">
   		<div class="panel panel-default">
   			<div class="panel-heading">
          <div class="alert alert-info" style="margin-bottom:0px;">
            <p style="font-size:18px"><i class="fa fa-info-circle"></i> Informasi :</p>
            <ul type="square">
              <li>Form ini dipergunakan menambah Direksi pada perusahaan.</li>
              <li>Diharapkan mengisikan Data direksi secara lengkap.</li>
              <li>Untuk menambah data tekan tombol <strong>Tambah Data</strong>.</li>
            </ul>
          </div>
   			</div>
   			<div class="panel-body">
            <div class="row">
              <div class="col-md-12" >
                <div class="alert alert-warning" >
                   <p style="font-size:16px;line-height:25px;">Nama Perusahaan :<br>{{ $data->nama_rkn }} </p>
                   
                </div>
              </div>
            </div>
            <div class="col-md-10" >
              <div class="table-responsive" style="border-bottom:2px solid #ddd;margin-bottom:15px;">
                <table  cellpadding="0" cellspacing="0" border="0" class="table table-hover table-striped dataTable" id="pengurus">
                    <thead>
                      <tr>

                         <th width="50%" >Nama</th>
                         <th width="20%">Jabatan</th>
                         <th width="15%">Saham</th>   
                         <th width="15%"></th>             
                      </tr>
                   </thead>
                 </table>    
              </div>
            </div>
            <div class="col-md-10" style="text-align:right;" >
              <button class="btn btn-primary" style="margin-bottom:20px;" id="tambah">Tambah Data</button>
              <form style="text-align:left;display:none;" class="form-horizontal" name="form1" id="form1" action="{{ URL::to('admin/rekanan/pengurus/save/'.$data->id_rkn) }}" method="POST">
                <h3 class="page-header" style="text-align:left"><i class="fa fa-plus-square"></i> Form Tambah Data</h3>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group">
                    {{ Form::label('nama','Nama Lengkap',['class'=>'col-sm-3']) }}
                    <div class="col-sm-6">
                       {{ Form::text('nama',Input::old('nama'),array('class'=>'form-control','id'=>'nama')) }}
                    </div>
                    <div class="clearfix"></div>
                 </div>
                 <div class="form-group">
                    {{ Form::label('nama','NIK',['class'=>'col-sm-3']) }}
                    <div class="col-sm-6">
                       {{ Form::text('nik',Input::old('nik'),array('class'=>'form-control','id'=>'nik')) }}
                       <p class="help-block" style="font-size:12px;text-align:left">* Isikan NIK sesuai dengan KTP</p>
                    </div>
                    <div class="clearfix"></div>
                 </div>
                 <div class="form-group">
                    {{ Form::label('nama','Jabatan di Perusahaan',['class'=>'col-sm-3']) }}
                    <div class="col-sm-4">
                       {{ Form::select('jabatan', array(''=>'-- Pilih Jabatan --','Direktur' => 'Direktur', 'Lain' => 'Lainnya'), null, array('class'=>'form-control','id'=>'jabatan')) }}
                    </div>
                    <div class="clearfix"></div>
                 </div>
                 <div class="form-group" id="lain" style="display:none;">
                    {{ Form::label('nama','Jabatan Lainnya',['class'=>'col-sm-3']) }}
                    <div class="col-sm-6">
                       {{ Form::text('jabatan_lainnya',null,array('class'=>'form-control','id'=>'jabatan_lainnya')) }}
                    </div>
                    <div class="clearfix"></div>
                 </div>
                 <div class="form-group">
                    {{ Form::label('nama','Alamat',['class'=>'col-sm-3']) }}
                    <div class="col-sm-6">
                       {{ Form::textarea('alamat',Input::old('deskripsi'),array('size'=>"20x2",'class'=>'form-control','id'=>'alamat')) }}
                    </div>
                    <div class="clearfix"></div>
                 </div>
                 <div class="form-group">
                    {{ Form::label('nama','No Telp / Handphone',['class'=>'col-sm-3']) }}
                    <div class="col-sm-4">
                       {{ Form::text('telp',Input::old('telp'),array('class'=>'form-control','id'=>'telp')) }}
                    </div>
                    <div class="clearfix"></div>
                 </div>
                 <div class="form-group">
                    {{ Form::label('nama','Prosentase Saham',['class'=>'col-sm-3']) }}
                    <div class="col-sm-2">
                       {{ Form::text('saham',Input::old('telp'),array('class'=>'form-control','id'=>'saham')) }} 
                    </div>
                    <div class="clearfix"></div>
                 </div>
                 <div class="col-sm-12" style="text-align:left;margin-top:20px">
                     {{ Form::submit('Simpan Data ',array('class'=>'btn btn-success','id'=>'simpan')) }}
                     <button class="btn btn-primary" id="batal">Batal</button>
                 </div>
              </form>
            </div>
   			</div>
        <div class="panel-footer" >
          <a href="{{ URL::to('admin/rekanan/pengurus/selesai/'.$data->id_rkn) }}" class="btn btn-block btn-success">Selesaikan dan simpan data Rekanan</a>
        </div>
   		</div>
	</div>              
</div>


@section('js')
   {{HTML::script('asset/themes/js/plugins/dataTables/jquery.dataTables.js')}}
    {{HTML::script('asset/themes/js/plugins/dataTables/dataTables.bootstrap.js')}}
    {{HTML::script('asset/themes/js/sb-admin-2.js')}}
    {{HTML::script('asset/themes/js/jquery.validate.js')}}
    <script type="text/javascript">
     
 
      $(document).ready(function(){
        var table = $("#pengurus").dataTable({
           "processing":true,
           "serverSide": true,
           "filter":false,
           "pageLength":5,
           "ajax":"{{ URL::to('admin/rekanan/pengurusajax/'.$data->id_rkn) }}",
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

      var validator = $("#form1").validate({
              rules:{
                'nama':{required:true},
                'nik':{required:true,number:true},
                'jabatan':{required:true},
                'alamat':{required:true},
                'telp':{required:true},
                'saham':{required:true}
              },
              messages:{
                'nama':{required:"Data Nama harus diisi"},
                'nik':{required:"Data Nik harus diisi",number:"Data nik harus diisi angka"},
                'jabatan':{required:"Jabatan harus dipilih"},
                'alamat':{required:"Data alamat harus diisi"},
                'telp':{required:"Data telp harus diisi"},
                'saham':{required:"Data saham harus diisi"}
              },
              submitHandler: function(form){
                var url = $("#form1").attr("action");
                var data =  $("#form1").serialize();
               // alert(url +"_"+ data);

               $.post(url,data,function(data,status){
                  $("#form1 :input").prop("disabled",true);
                  $("#simpan").val("Saving Data....")
                  
                  if(data =="ok"){
                    $('#form1').slideUp(function(){
                      $(".error").removeClass("error");
                      clearForm();
                      table.api().ajax.reload();
                      $('#tambah').show();
                    });

                  }else if(status=="timeout"){
                    alert("Timeout");
                  }else if(status=="error"){
                    alert("error");
                  }else if(data =="error"){
                    alert("error");
                  }

                });

              }
           }); 
        $('#tambah').click(function(){
          $('#form1').slideDown(function(){
            $('#tambah').hide();
          });
        });
        $('#batal').click(function(event){
          event.preventDefault();
          $('#form1').slideUp(function(){
            validator.resetForm();
            $(".error").removeClass("error");
            clearForm();

            $('#tambah').show();
          });
        });
        $('#jabatan').change(function(){
          var opt = $('#jabatan option:selected').val();
          if(opt=='Lain'){
            $('#lain').show();
          }else{
            $('#lain').hide();
          }
        });
          
         $("#pengurus").on('click','#hapus',function(event){
            event.preventDefault();
            var url =$(this).attr("href");
            var msg = confirm("Apakah anda ingin menghapus data ini ?");
           
            if(msg){
              $.get(url,function(data,status){
                if(data == "ok"){
                 /* alert("ok");*/
                  table.api().ajax.reload();
                }else{
                  alert("error");
                }
              });
            }
            
         });

          $("#pengurus").on('click','#edit',function(event){
            event.preventDefault();
            var url =$(this).attr("href");
            
            $('#tambah').html("getting Data");
            $('#tambah').prop("disabled",true);

            $.get(url,function(data,status){
            
              //alert(data['jabatan']);
              if(status =="success"){
                $("#nama").val(data['nama_pengurus']);
                $("#nik").val(data['nik']);
                $("#alamat").val(data['alamat']);
                $("#telp").val(data['telp']);
                $("#saham").val(data['prosentase_shm']);
                $("#jabatan").val("");
                $("#form1").attr("action",'{{ URL::to("admin/rekanan/pengurus/update") }}/'+data['id_pengurus']);
                $('#form1').slideDown(function(){
                  if(data['jabatan']=="Direktur"){
                    $("#jabatan").val("Direktur");
                  }else{
                    $("#jabatan").val("Lain");
                    $("#jabatan_lainnya").val(data['jabatan']);
                    $("#lain").show();
                  }
                  $('#tambah').hide();
                });

              }else{
                alert("error");
              }

            },"json");
            
         });

         function clearForm(){
            $("#form1").attr("action",'{{ URL::to("admin/rekanan/pengurus/save/".$data->id_rkn) }}');
            $('#tambah').html("Tambah Data");
            $('#tambah').prop("disabled",false);
            $("#nama").val("");
            $("#nik").val("");
            $("#lain").val("");
            $("#alamat").val("");
            $("#telp").val("");
            $("#saham").val("");
            $("#jabatan").val("");
            $("#lain").hide();
            $("#jabatan_lainnya").val("");
            $("#simpan").val("Simpan Data");
            $("#form1 :input").prop("disabled",false);
         }
      });
    </script>
@stop