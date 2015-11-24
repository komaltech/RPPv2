<div class="row">
	<div class="col-lg-12">
   		<h3 class="page-header"><i class="fa fa-navicon" style="margin-right:15px;"></i> Form Pengisian Pajak PPH & PPN</h3>
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
              <li>Form ini dipergunakan Untuk Memasukan PPH dan PPN per 3 bulanan</li>
              <li>Diharapkan mengisikan Data PPH dan PPN secara Lengkap .</li>
              <li>Untuk menambah data tekan tombol <strong>Tambah Data</strong>.</li>
            </ul>
          </div>
   			</div>
   			<div class="panel-body">
            <div class="row">
              <div class="col-md-12" >
                <div class="alert alert-warning" >
	               	<table cellpadding="0" cellspacing="0" border="0" width="100%">
	               		<tr>
	               			<td width="20%">Nama Pengdaan</td>
	               			<td width="1%">:</td>
	               			<td width="79%">{{ $data->desk_kegiatan }}</td>
	               		</tr>
	               		<tr>
	               			<td>Lokasi Pengerjaan</td>
	               			<td>:</td>
	               			<td>{{ $data->lokasi_kegiatan }}</td>
	               		</tr>
	               		<tr>
	               			<td>HPS</td>
	               			<td>:</td>
	               			<td>{{ String::formatMoney($data->hps,'Rp.') }}</td>
	               		</tr>
	               		<tr>
	               			<td>HPS Rekanan</td>
	               			<td>:</td>
	               			<td>{{ String::formatMoney($data->hps_rkn,'Rp.') }}</td>
	               		</tr>
	               	</table>
                </div>
              </div>
            </div>
            <div class="col-md-10" >
              <div class="table-responsive" style="border-bottom:2px solid #ddd;margin-bottom:15px;">
                <table  cellpadding="0" cellspacing="0" border="0" class="table table-hover table-striped dataTable" id="pajak">
                    <thead>
                      <tr>

                         <th width="50%">Jenis pajak</th>
                         <th width="30%">No & tanggal Pajak</th>
                         <th width="10%">File</th>
                         <th width="10%"></th>   
                         
                      </tr>
                   </thead>
                 </table>    
              </div>
            </div>
            <div class="col-md-10" style="text-align:right;" >
              <button class="btn btn-primary" style="margin-bottom:20px;" id="tambah">Tambah Data</button>
              <form style="text-align:left;display:none;" class="form-horizontal" name="form1" id="form1" action="{{ URL::to('admin/rekanan/pajak/simpan/'.$data->id) }}" method="POST" enctype="multipart/form-data">
                <h3 class="page-header" style="text-align:left"><i class="fa fa-plus-square"></i> Form Tambah Data Pajak</h3>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <div class="form-group">
                    {{ Form::label('nama','No Pajak',['class'=>'col-sm-3']) }}
                    <div class="col-sm-6">
                       {{ Form::text('no_pajak',null,array('class'=>'form-control','id'=>'no_pajak')) }}
                    </div>
                    <div class="clearfix"></div>
                 </div>
                 <div class="form-group">
                    {{ Form::label('nama','Jenis Pajak',['class'=>'col-sm-3']) }}
                    <div class="col-sm-6">
                       {{ Form::text('jenis_pajak',null,array('class'=>'form-control','id'=>'jenis_pajak')) }}
                    </div>
                    <div class="clearfix"></div>
                 </div>
                 <div class="form-group">
                    {{ Form::label('nama','Tanggal Pajak',['class'=>'col-sm-3']) }}
                    <div class="col-sm-4">
                       {{ Form::text('tanggal',null,array('class'=>'form-control','id'=>'tanggal')) }}
                    </div>
                    <div class="clearfix"></div>
                 </div>
                 <div class="form-group">
                    {{ Form::label('nama','File NPWP',['class'=>'col-sm-3']) }}
                    <div class="col-sm-4">
                       {{ Form::file('file_npwp',null,array('class'=>'form-control','id'=>'file_npwp')) }}
                       <p class="help-block" style="font-size:12px;">* Masukkan data dalam bentuk gambar dengan ekstensi *.jpeg, *.png, *.jpg</p>   
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
          @if($data->page=="new")
            <a href="" class="btn btn-block btn-success" id="kirim">Selesaikan dan Kirim Kualifikasi</a>
          @else
            <a href="{{ URL::to('admin/rekanan/beranda') }}" class="btn btn-block btn-success">Kembali Ke beranda</a>
          @endif
          
        </div>
   		</div>
	</div>              
</div>


@section('js')
	{{HTML::script('asset/themes/js/jquery.form_2.js')}}
   	{{HTML::script('asset/themes/js/plugins/dataTables/jquery.dataTables.js')}}
    {{HTML::script('asset/themes/js/plugins/dataTables/dataTables.bootstrap.js')}}
    {{HTML::script('asset/themes/js/sb-admin-2.js')}}

   {{HTML::style('asset/themes/css/datepicker3.css')}}
    {{HTML::script('asset/themes/js/bootstrap-datepicker.js')}}
    {{HTML::script('asset/themes/js/locales/bootstrap-datepicker.id.js')}}
    {{HTML::script('asset/themes/js/jquery.validate.js')}}
    {{HTML::script('asset/themes/js/additional-methods.min.js')}}

    <script type="text/javascript">
      $(document).ready(function(){

      	$("#tanggal" ).datepicker({
            format:'d MM yyyy',
            language:'id'
         });
        var table = $("#pajak").dataTable({
        	"paginate":false,
           "processing":true,
           "serverSide": true,
           "filter":false,
           "pageLength":6,
           "ajax":"{{ URL::to('admin/rekanan/pajak/'.$data->id) }}",
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
		

 		var option = {
 				beforeSubmit :formValidate(),
             	success: function(data){
				    //alert(data);
				    if(data =="ok"){
				    	$('#form1').slideUp(function(){
           					clearForm();
				    		table.api().ajax.reload();
				    		$('#tambah').show();
				        });
				    }else if(data=="not"){
				    	alert("Anda sudah memasukan data pajak selama 3 bulan silahkan melanjutkan  proses");
				    }else{
				    	alert("error");
				    }
				}
        }

        $("#form1").ajaxForm(option);

		$(document).ajaxStart(function(){
			$("#simpan").val("Menyimpan Data...");
			$("#form1 input").prop("disabled",true);

		});
		$(document).ajaxStop(function(){
			$("#simpan").val("Simpan Data");
			$("#form1 input").prop("disabled",false);
		});

        $('#tambah').click(function(){
        	$('#form1').slideDown(function(){
					clearForm();
		            $('#tambah').hide();
		    });
			
        });
        $('#batal').click(function(event){
          event.preventDefault();
          $('#form1').slideUp(function(){
           
            $(".error").removeClass("error");
            clearForm();

            $('#tambah').show();
          });
        });
       
          
         $("#pajak").on('click','#hapus',function(event){
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
         $("#kirim").click(function(event){
         	event.preventDefault();
         	$.get('{{ URL::to("admin/rekanan/pajak/getCount/".$data->id) }}',function(data){
         		if (data <= 6) {
         			alert("Anda harus menginputkan pajak selama 3 bulan");
         		}else{
         			window.location.href= "{{ URL::to('admin/rekanan/pajak/selesai/'.$data->id) }}";
         		};
         	});
         });

         function clearForm(){
            $('#tambah').html("Tambah Data");
            $('#tambah').prop("disabled",false);
            $("#no_pajak").val("");
            $("#tanggal").val("");
            $("#jenis_pajak").val("");
            $("#simpan").val("Simpan Data");
             $(".error").removeClass("error");
            $("#form1 :input").prop("disabled",false);
         }

        function formValidate(){
        	$("#form1").validate({
	              rules:{
	                'no_pajak':{required:true},
	                'jenis_pajak':{required:true},
	                'tanggal':{required:true},
	                'file_npwp':{required:true,extension:'jpeg|png|jpg'}
	              },
	              messages:{
	                'no_pajak':{required:"No Pajak harus diisi"},
	                'jenis_pajak':{required:"Jenis pajak harus diisi"},
	                'tanggal':{required:"tanggal harus diisi"},
	                'file_npwp':{required:"file harus diisi",extension:"File harus berekstensikan .jpeg , .png , .jpg"}
	              }
             
         	});
        }
       
    });
</script>
@stop