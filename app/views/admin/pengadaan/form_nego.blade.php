<div class="row">
	<div class="col-lg-12">
   		<h3 class="page-header"><i class="fa fa-check" ></i> Form Negosiasi</h3>
	</div>              
</div>
<div class="row">
	<div class="col-md-12">  
   		<div class="panel panel-default">
        <div class="panel-heading">
          <div class="alert alert-warning" style="margin-bottom:0px">
           <p style="font-size:18px"><i class="fa fa-info-circle"></i> Informasi :</p>
              <ul type="square">
                <li>Form ini dipergunakan untuk melakukan negosiasi harga dengan memasukkan harga negosiasi .</li>
                <li>Diharapkan mengisikan semua harga negosiasi secara lengkap.</li>
              </ul>
          </div>
        </div>
   			<div class="panel-body">
          <div class="col-lg-12">
            @if(Session::has('messages'))
               {{ Session::get('messages') }}
            @endif 
          </div>
           
          <div class="col-lg-12">
              <h4 class="page-header"><i class="fa fa-cubes" ></i> Data Pengadaan</h4>
          </div> 
           <div class="col-md-12" >
              <div class="table-responsive">
                <table  cellpadding="0" cellspacing="0" border="0" class="table table-striped dataTable" >
                    <thead>
                      <tr>
                         <td width="15%" >Judul Pengadaan</td>
                         <td width="1%">:</td>
                         <td width="84%">{{ $data->desk_kegiatan }}</td>     
                      </tr>
                      <tr>
                         <td  >Lokasi Pengerjaan</td>
                         <td >:</td>
                         <td >{{ $data->lokasi_kegiatan }}</td>     
                      </tr>
                      <tr>
                         <td  >Alamat Pengerjaan</td>
                         <td >:</td>
                         <td >{{ $data->alamat_pengerjaan }}</td>     
                      </tr>
                      <tr>
                         <td  >Nama Rekanan</td>
                         <td >:</td>
                         <td >{{ $data->rekanan }}</td>     
                      </tr>
                      <tr>
                         <td  >Sumber Dana</td>
                         <td >:</td>
                         <td >{{ $data->sumber_dana }}</td>     
                      </tr>
                      <tr>
                         <td >Total HPS</td>
                         <td >:</td>
                         <td >{{ String::formatMoney($data->hps,"Rp.") }}</td>     
                      </tr>
                      <tr>
                         <td >Total HPS Rekanan</td>
                         <td >:</td>
                         <td >{{ String::formatMoney($data->hps_rkn,"Rp.") }}</td>     
                      </tr>
                   </thead>
                 </table>    
             </div>  
           </div>
           <div class="col-lg-12">
              <h4 class="page-header"><i class="fa fa-table" ></i> Tabel Penawaran</h4>
              <div class="alert alert-warning" id="hps" style="font-size:25px;">
                TOTAL HPS NEGOSIASI : 
              </div>
          </div> 
           <div class="col-md-12" >
              <div class="table-responsive">
                <table  cellpadding="0" cellspacing="0" border="0" class="table table-striped dataTable table-bordered" id="detil" style="font-size:12px;">
                  <thead >
                    <tr>
                      <th rowspan="2" style="text-align:center;vertical-align:middle" width="18%">Nama Barang</th>
                      <th rowspan="2" style="text-align:center;vertical-align:middle" width="4%">QTY</th>
                      <th colspan="6" style="text-align:center;vertical-align:middle">Harga Barang</th>
                      <th width="5%" rowspan="2"></th>
                    </tr>
                    <tr>
                      <th style="text-align:center;vertical-align:middle" width="12%">Harga</th>
                      <th style="text-align:center;vertical-align:middle" width="12%">Total Harga</th>
                      <th style="text-align:center;vertical-align:middle" width="12%">Harga RKN</th>
                      <th style="text-align:center;vertical-align:middle" width="12%">Total RKN</th>
                      <th style="text-align:center;vertical-align:middle" width="12%">Harga Nego</th>
                      <th style="text-align:center;vertical-align:middle" width="12%">Total Nego</th>
                    </tr>
                  </thead>
                </table>
              </div>
          </div>
   			</div>
        <div class="panel-footer" >
          <form action="{{ URL::to('admin/pengadaan/negosiasi/simpan/'.$data->id) }}" method="post">
            <a href="{{ URL::to('admin/rekanan/beranda') }}" class="btn btn-primary"><i class="fa fa-angle-left" style="margin-right:10px;" ></i>Kembali & batalkan proses</a>  
            <input type="hidden" name="hps_negosiasi" id="hps_negosiasi" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="submit" value="Simpan Negosiasi" class="btn btn-success">
          </form> 
        </div>
   		</div>
     
	</div>              
</div>

<div class="modal fade" id="mymodal" tabindex="1" role="dialog" style="display:none"  >
 <div class="modal-dialog">
    <div class="modal-content" >
     <form class="form-horizontal" id="form2" method="post" action="">
       <div class="modal-header">
          <button class="close" data-dismiss="modal" aria-hidden="true" >x</button>
          <h4 class="modal-title" > Input Harga Negosiasi</h4>
       </div>
       <div class="modal-body">
        <div class="row" >
          <div class="col-md-12" >
             <div class="alert alert-info">
              <p id="nama_brg" ></p>
              <p id="spesifikasi" ></p>

            </div>
          </div>
        </div>
        <div class="row" >
          <div class="col-md-12" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <div class="form-group">
                 {{ Form::label('no','Kebutuhan',['class'=>'col-sm-4']) }}
                 <div class="col-sm-8">
                    {{ Form::text('kebutuhan',null,array('class'=>'form-control','readonly','id'=>'kebutuhan')) }}
                 </div>
                 <div class="clearfix"></div>
              </div>
               <div class="form-group">
                 {{ Form::label('no','Harga Negosiasi',['class'=>'col-sm-4']) }}
                 <div class="col-sm-8">
                    {{ Form::text('hrg',null,array('class'=>'form-control','id'=>'hrg')) }}
                 </div>
                 <div class="clearfix"></div>
              </div>
              <div class="form-group">
                 {{ Form::label('no','Total Harga',['class'=>'col-sm-4']) }}
                 <div class="col-sm-8">
                    {{ Form::text('total',null,array('class'=>'form-control','readonly','id'=>'total')) }}
                 </div>
                 <div class="clearfix"></div>
              </div>
             
             
          </div>
        </div>

       </div>
       <div class="modal-footer">
          {{ Form::submit("Simpan Data",array('class'=>'btn btn-primary')) }}
          <a href="#" class="btn btn-danger" id="batal">Batal</a>
      </div>
      </form> 
    </div>
  
  </div>
</div>

@section('js')
   {{HTML::style('asset/themes/jquery_ui/jquery-ui.css')}}   
   {{HTML::script('asset/themes/js/plugins/dataTables/jquery.dataTables.js')}}
    {{HTML::script('asset/themes/js/plugins/dataTables/dataTables.bootstrap.js')}}
    {{HTML::script('asset/themes/js/jquery.validate.js')}}

   <script type="text/javascript">
      $(function(){
      
        get_HPS();

         var detil = $("#detil").dataTable({
           "processing":true,
           "serverSide": true,
           "sort":false,
           "filter":false,
           "bDeferRender": true,
           "ajax":'{{ URL::to("/admin/pengadaan/negosiasiAjax/".$data->id) }}',
           "drawCallback":function(settings){
                if(settings.fnRecordsTotal() < 10){     
                    $('.dataTables_paginate').hide();
                } else {
                    $('.dataTables_paginate').show(); 
                }
           },
           "columnsDefs":[{
               "targets":"_all",
               "defaultContent":""
           }],
           "language": {
               "processing":"Please wait - loading...",
               "search":"Pencarian&nbsp;&nbsp;",
               "lengthMenu": "_MENU_ data per halaman",
               "zeroRecords": '<div class="alert alert-danger" >Tidak Terdapat Data</div>',
               "info": "Tampilkan hal _PAGE_ dari _PAGES_ halaman",
               "infoEmpty": '<div class="alert alert-danger" >Tidak terdapat data</div>',
               "infoFiltered": "(filtered from _MAX_ total records)"
           }/*,
           "createdRow":function(row,data,dataIndex){
              var rekanan = $(row).find("#pilih").attr("data-id");
              $(row).find("#pilih").attr("href",'{{URL::to("/admin/pengadaan/jadwal/add/".$data->id)}}/'+rekanan);
           },
          */
         });

      $("#batal").click(function(event){
          event.preventDefault();
          $("#mymodal").modal('hide');
      });
      $("#hrg").keyup(function(){
            var kebutuhan =$("#kebutuhan").val();
            var harga =$(this).val();
            $("#total").val(harga * kebutuhan);
      });

      $("#detil").on('click','#pilih',function(event){
          event.preventDefault();

          var url = $(this).attr('href');
          var id = $(this).attr('data-id');
          $("#form2").attr("action","{{ URL::to('admin/pengadaan/negosiasi/update_hrg_nego') }}/"+id);
          
          $.get(url,function(data,status ){
            if(status=='success'){
              $('#nama_brg').html('Nama Barang : '+data['nama_brg']);
              $('#spesifikasi').html('Spesifikasi:<br>'+data['spesifikasi']);
              $('#kebutuhan').val(data['kebutuhan']);
              $('#mymodal').modal('show');
              
            }else{
              alert('error');
            }
          },'json');

          return false;

      });
      $(window).on("hide.bs.modal",function(e){
          $('#hrg').val('');
          $('#total').val('');

          validator.resetForm();
          $(".error").removeClass("error");
      })
      var validator = $("#form2").validate({
         rules:{
            "hrg":{required:true,number:true}
         },
         messages:{
            "hrg":{required:'Harga harus diisi',number:' harus diisi angka'}
         },
         submitHandler: function(form){
            var url = $("#form2").attr('action');
            $.post(url,$("#form2").serialize()).done(function(data){
                if(data ="ok"){
                 $('#mymodal').modal('hide');
                 get_HPS(); 
                 detil.api().ajax.reload();
                }else{
                  alert("error");
                }
            });
         }
        });
      function get_HPS(){
        $.get("{{ URL::to('admin/pengadaan/get_hps_nego/'.$data->id) }}",function(data){
          $("#hps_negosiasi").val(data);
          $("#hps").html("TOTAL HPS NEGOSIASI : Rp."+data);
        });
      }
   });

   </script>
@stop