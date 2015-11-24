<div class="row">
   <div class="col-lg-12">
         <h3 class="page-header"><i class="fa fa-th-large" ></i> Edit data spesifiikasi</h3>
   </div>              
</div>
<div class="row">
   <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading">Form dipergunakan untuk mengedit detail spesifikasi</div>
            <div class="panel-body">
              <form class="form-horizontal" id="form1" method="post" action="{{ URL::to('admin/detil/save/'.$data->id_detil) }}">
                   <div class="form-group" >
                     <input type="hidden" name="id" value="{{ $data->id }}">
                     {{ Form::label('no','Nama Barang',['class'=>'col-sm-3']) }}
                     <div class="col-sm-8 ">
                        {{ Form::text('nama_brg',$data->nama_brg,array('class'=>"form-control",'id'=>"kebutuhan")) }}
                     </div>
                     <div class="clearfix"></div>
                  </div>
                  <div class="form-group" >
                     <input type="hidden" name="id" value="{{ $data->id_pengadaan }}">
                     {{ Form::label('no','Spesifikasi',['class'=>'col-sm-2']) }}
                     <div class="col-sm-5 ">
                        {{ Form::textarea('spesifikasi',$data->spesifikasi,array('size'=>'70x10','id'=>'spesifikasi','class'=>"form-control")) }}
                     </div>
                     <div class="clearfix"></div>
                  </div>
                   <div class="form-group">
                     {{ Form::label('no','Kebutuhan',['class'=>'col-sm-2']) }}
                     <div class="col-sm-2 ">
                        {{ Form::text('kebutuhan',$data->kebutuhan,array('class'=>"form-control",'id'=>"kebutuhan","style"=>"text-align:right")) }}
                     </div>
                     <div class="clearfix"></div>
                  </div>
                  <div class="form-group">
                     {{ Form::label('no','Harga Satuan',['class'=>'col-sm-2']) }}
                     <div class="col-sm-4 ">
                        {{ Form::text('hrg_satuan',$data->hrg_satuan_hps,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right")) }}
                     </div>
                     <div class="clearfix"></div>
                  </div>
                  <div class="form-group">
                     {{ Form::label('no','Total Harga',['class'=>'col-sm-2']) }}
                     <div class="col-sm-4 ">
                        {{ Form::text('total_hrg',$data->total_hrg_hps,array('class'=>"form-control","id"=>"total_hrg","style"=>"text-align:right","readonly")) }}
                     </div>
                     <div class="clearfix"></div>
                  </div>
                  <div class="form-group">
                     <div class="col-sm-4" >
                        {{ Form::submit('Simpan',array('class'=>'btn btn-info')) }}
                        <a href="{{ URL::to("admin/pengadaan/add/".$data->id) }}" class="btn btn-danger" >Batal</a>   
                     </div>
                     <div class="clearfix"></div>
                  </div>
               </form>
            </div>
         </div>
   </div>              
</div>
@section('js')
   {{HTML::style('asset/themes/jquery_ui/jquery-ui.css')}}   
   {{HTML::script('asset/themes/js/plugins/dataTables/jquery.dataTables.js')}}
    {{HTML::script('asset/themes/js/plugins/dataTables/dataTables.bootstrap.js')}}
   {{HTML::script('asset/themes/jquery_ui/jquery-ui.js')}}
   {{HTML::script('asset/themes/js/jquery.validate.js')}}
   {{HTML::script('asset/themes/tinymce/tinymce.min.js')}}

   <script type="text/javascript">
      $(function(){
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


      $("#form1").validate({
         rules:{
            "spesifikasi":{required:true},
            "kebutuhan":{required:true,number:true},
            "hrg_satuan":{required:true,number:true}
         },
         messages:{
            "spesifikasi":'Spesifikasi harus diisi',
            "kebutuhan":{required:'Kebutuhan harus diisi',number:'Data harus diisi angka'},
            "hrg_satuan":{required:'harga satuan harus diisi',number:'Data harus diisi angka'}
         }/*,
         submitHandler: function(form){
            $.post("{{ URL::to('admin/detilajax/add') }}",$("#form2").serialize()).done(function(data){
               $('#mymodal').modal('hide');
               $("#spesifikasi").val("");
               $("#kebutuhan").val("");
               $("#hrg_satuan").val("");
               $("#total_hrg").val("0");
               
            });
         }*/
      });
      
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
   });

   </script>
@stop