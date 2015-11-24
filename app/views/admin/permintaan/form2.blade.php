<div class="row">
	<div class="col-lg-12">
   		<h3 class="page-header"><i class="fa fa-th-large" ></i> Tambah data Pengadaan</h3>
	</div>              
</div>
<div class="row">
	<div class="col-md-12">  
   		<div class="panel panel-default">
            <div class="panel-heading">
              <div class="alert alert-info" style="margin-bottom:0px;">
                <p style="font-size:18px"><i class="fa fa-info-circle"></i> Informasi :</p>
                <ul type="square">
                  <li>Form ini dipergunakan untuk membuat Tabel Penawaran.</li>
                  <li>Diharapkan mengisikan semua data spesifikasi agar permintaan dapat dikirim ke <strong>Bagian Pengadaan</strong>.</li>
                </ul>
              </div>
            </div>
   			      <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li  ><a href="#" data-toggle="tab">Tahap Pertama</a>
                    </li>
                    <li class="active"><a href="#" data-toggle="tab">Tahap Kedua</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane" id="input-one">
                        
                    </div>
                    <div class="tab-pane active in" id="input-two">
                          @if(Session::has('messages'))
                            {{ Session::get('messages') }}
                          @endif
                        
                        <div class="col-sm-6" style="margin-bottom:-30px;margin-top:10px;">
                          <div class="alert alert-warning" >
                            <h3 id="hps">TOTAL HPS : {{ $data->total }}</h3>
                          </div> 
                        </div>
                        <div class="col-sm-12" >   
                          <h4 class="page-header" >Membuat HPS
                          <button class="btn btn-primary" data-toggle="modal" data-target="#mymodal" style="margin-left:20px;">Tambah Spesifikasi</button></h4>
                        </div>
                        <div class="modal fade" id="mymodal" tabindex="1" role="dialog" style="display:none"  >
                           <div class="modal-dialog">
                           <form class="form-horizontal" id="form2" method="post" action="">
                              <div class="modal-content" >
                                 <div class="modal-header">
                                    <button class="close" data-dismiss="modal" aria-hidden="true" >x</button>
                                    <h4 class="modal-title" > Form Tambah Spesifikasi</h4>
                                 </div>
                                 <div class="modal-body">
                                    <div class="form-group" >
                                       <input type="hidden" name="id" value="{{ $data->id }}">
                                       {{ Form::label('no','Nama Barang',['class'=>'col-sm-3']) }}
                                       <div class="col-sm-8 ">
                                          {{ Form::text('nama_brg',Input::old('nama_brg'),array('class'=>"form-control",'id'=>"nama_brg")) }}
                                       </div>
                                       <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group" >
                                       <input type="hidden" name="id" value="{{ $data->id }}">
                                       {{ Form::label('no','Spesifikasi',['class'=>'col-sm-3']) }}
                                       <div class="col-sm-8 ">
                                          {{ Form::textarea('spesifikasi',Input::old('spesifikasi'),array('size'=>'70x10','id'=>'spesifikasi','class'=>"form-control")) }}
                                       </div>
                                       <div class="clearfix"></div>
                                    </div>
                                     <div class="form-group">
                                       {{ Form::label('no','Kebutuhan',['class'=>'col-sm-3']) }}
                                       <div class="col-sm-4 ">
                                          {{ Form::text('kebutuhan',Input::old('kebutuhan'),array('class'=>"form-control",'id'=>"kebutuhan","style"=>"text-align:right")) }}
                                       </div>
                                       <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                       {{ Form::label('no','Harga Satuan',['class'=>'col-sm-3']) }}
                                       <div class="col-sm-6 ">
                                          {{ Form::text('hrg_satuan',Input::old('hrg_satuan'),array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right")) }}
                                       </div>
                                       <div class="clearfix"></div>
                                    </div>
                                    <div class="form-group">
                                       {{ Form::label('no','Total Harga',['class'=>'col-sm-3']) }}
                                       <div class="col-sm-6 ">
                                          {{ Form::text('total_hrg',0,array('class'=>"form-control","id"=>"total_hrg","style"=>"text-align:right","readonly")) }}
                                       </div>
                                       <div class="clearfix"></div>
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                    {{ Form::submit('Tambah',array('class'=>'btn btn-success')) }}
                                    <button  class="btn btn-danger" data-dismiss="modal">Batal</button>
                                 </div>
                              </div>
                              </form>
                           </div>
                        </div>
                        <div class="col-sm-12">
                           <div class="table-responsive">
                              <table  cellpadding="0" cellspacing="0" border="0" class="table table-hover table-striped dataTable" id="detil">
                               <thead>
                                 <tr>
                                    <th width="30%">Spesifikasi</th>
                                    <th width="15%">Kebutuhan</th>
                                    <th width="20%">Harga Satuan</th>   
                                    <th width="20%">Total Harga</th>                         
                                    <th width="25%">Aksi</th>             
                                 </tr>
                              </thead>
                            </table>    
                           </div>
                        </div>
                    </div>
                </div>
   			</div>
            <div class="panel-footer" >
               <a href="{{ URL::to('admin/permintaan/edit/'.$data->id) }}" class="btn btn-success "><i class="fa fa-angle-double-left" ></i> Kembali ke form sebelumnya</a>
               <a href="{{ URL::to('admin/permintaan/save-all/'.$data->id)}}" class="btn btn-warning "><i class="fa fa-check" ></i> Selesaikan Tahapan</a>
            </div>
   		</div>
	</div>              
</div>

@section('js')
   {{HTML::style('asset/themes/jquery_ui/jquery-ui.css')}}   
   {{HTML::script('asset/themes/js/plugins/dataTables/jquery.dataTables.js')}}
    {{HTML::script('asset/themes/js/plugins/dataTables/dataTables.bootstrap.js')}}
   {{HTML::script('asset/themes/js/jquery.validate.js')}}
   {{HTML::script('asset/themes/tinymce/tinymce.min.js')}}

   <script type="text/javascript">
      $(function(){
         var detil_table = $("#detil").dataTable({
           "processing":true,
           "serverSide": true,
           "sort":false,
           "filter":false,
           "bDeferRender": true,
           "ajax":'{{ URL::to("admin/permintaan/detilajax/".$data->id) }}',
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
           },
          
         });

       tinymce.init({
          mode:"textareas",
          menubar : false,
          height:210,
          statusbar:true,
          resize:false,
          selector: "#spesifikasi",
          toolbar: " bold italic | bullist numlist outdent indent",
          setup:function(ed) {
                  ed.on('change', function(e){
                     tinymce.triggerSave();
                  });
          }
      });


      var validator = $("#form2").validate({
         rules:{
            "nama_brg":{required:true},
            "spesifikasi":{required:true},
            "kebutuhan":{required:true,number:true},
            "hrg_satuan":{required:true,number:true}
         },
         messages:{
            "spesifikasi":'Spesifikasi harus diisi',
            "nama_brg":'Nama Barang Harus Diisi',
            "kebutuhan":{required:'Kebutuhan harus diisi',number:'Data harus diisi angka'},
            "hrg_satuan":{required:'harga satuan harus diisi',number:'Data harus diisi angka'}
         },
         submitHandler: function(form){
            $.post("{{ URL::to('admin/permintaan/detil/add') }}",$("#form2").serialize()).done(function(data){
               $('#mymodal').modal('hide');
               $("#spesifikasi").val("");
               $("#kebutuhan").val("");
               $("#hrg_satuan").val("");
               $("#total_hrg").val("0");
               tinymce.get("spesifikasi").setContent("");
               get_hps();
               //alert(data);

               detil_table.api().ajax.reload();

            });
         }


      });
     $(window).on("hide.bs.modal",function(e){
         $("#spesifikasi").val("");
         $("#kebutuhan").val("");
         $("#hrg_satuan").val("");
         $("#total_hrg").val("0");
      })
     
      $("#kebutuhan").keyup(function(){
            var harga =$("#hrg_satuan").val();
            var kebutuhan =$(this).val();
            $("#total_hrg").val(harga * kebutuhan);
         })

         $("#hrg_satuan").keyup(function(){
            var harga =$(this).val();
            var kebutuhan =$("#kebutuhan").val();
            $("#total_hrg").val(harga * kebutuhan);
         })


      $("#detil").on('click','#del',function(event){
            event.preventDefault();
            var url =$(this).attr("href");
            var msg = confirm("Apakah anda ingin menghapus data ini ?");
            //alert(url);
            if(msg == true){
               $.get(url,function(data){
                  if(data =="ok"){
                    get_hps();
                    detil_table.api().ajax.reload();  
                  }else{
                    alert("data gagal di hapus");
                  }
               }).fail(function(data){
                  alert("gagal terkoneksi ke server");
               });
            }
      });
     
      function get_hps(){
         $.get('{{ URL::to("admin/permintaan/hps/".$data->id) }}',function(data,status){
            if(status =='success'){
              $("#hps").html("TOTAL HPS : "+data);
            }else{
              alert("error");
            }
        });
      }
   });

   </script>
@stop