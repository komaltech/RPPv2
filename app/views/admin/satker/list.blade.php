<div class="row">
	<div class="col-lg-12">
   		<h3 class="page-header"><i class="fa fa-navicon"></i> Data Unit kerja</h3>
          @if(Session::has('messages'))
             {{ Session::get('messages') }}
          @endif 
	</div>              
</div>
<div class="row">
	<div class="col-lg-12">
   		<div class="panel panel-default">
   			<div class="panel-heading">
   				<div class="row">
   					<div class="col-md-12">
   						<button class="btn btn-primary" data-toggle="modal" data-target="#mymodal">Tambah Unit Kerja</button>
   					</div>
   				</div>
   			</div>
   			<div class="panel-body"> 
   		   <div class="table-responsive">
                  <table  cellpadding="0" cellspacing="0" border="0" class="table table-hover table-striped dataTable" id="table_satker" width="50%">
                      <thead>
                        <tr>
                           <th>Unit Kerja</th>
                           <th>Aksi</th>
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
   <form class="form-horizontal" id="form2" method="post" action="{{URL::to('admin/satkerajax/add')}}">
      <div class="modal-content" >
         <div class="modal-header">
            <button class="close" data-dismiss="modal" aria-hidden="true" >x</button>
            <h4 class="modal-title" > Form Tambah Unit Kerja</h4>
         </div>
         <div class="modal-body">
            <div class="form-group" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
               {{ Form::label('no','Unit Kerja',['class'=>'col-sm-4']) }}
               <div class="col-sm-8 ">
                  {{ Form::text('satker',null,array('id'=>'satker','class'=>"form-control")) }}
               </div>
               <div class="clearfix"></div>
            </div>
           <div class="modal-footer">
              {{ Form::submit('Tambah',array('class'=>'btn btn-success')) }}
              <button  class="btn btn-danger" data-dismiss="modal">Batal</button>
           </div>
          </div>
      </div>
    </form>
   </div>   
</div>
<div class="modal fade" id="modaledit" tabindex="1" role="dialog" style="display:none"  >
  <div class="modal-dialog">
   <form class="form-horizontal" id="form3" method="post" action="">
      <div class="modal-content" >
         <div class="modal-header">
            <button class="close" data-dismiss="modal" aria-hidden="true" >x</button>
            <h4 class="modal-title" > Form Edit Unit Kerja</h4>
         </div>
         <div class="modal-body">
            <div class="form-group" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
               {{ Form::label('no','Unit Kerja',['class'=>'col-sm-3']) }}
               <div class="col-sm-8 ">
                  {{ Form::text('satker',null,array('id'=>'satker_edit','class'=>"form-control")) }}
               </div>
               <div class="clearfix"></div>
            </div>
           <div class="modal-footer">
              {{ Form::submit('Tambah',array('class'=>'btn btn-success')) }}
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
    {{HTML::script('asset/themes/js/jquery.validate.js')}}
    
    <script type="text/javascript">
      $(function() {
          var satker_table = $("#table_satker").dataTable({
           "processing":true,
           "serverSide": true,
           "filter":false,
           "bDeferRender": true,
           "ajax":"{{url::to('admin/satkerajax')}}",
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
               "zeroRecords": '<div class="alert alert-danger" >Maaf Data yang anda cari tidak ditemukan</div>',
               "info": "Tampilkan hal _PAGE_ dari _PAGES_ halaman",
               "infoEmpty": '<div class="alert alert-danger" >Tidak terdapat data</div>',
               "infoFiltered": "(filtered from _MAX_ total records)"
           },
           "columns":[
               {"orderable":true,"searchable":true},
               {"orderable":false,"searchable":false}
           ]
       });

     
      $("#form3").validate({
         rules:{
            "satker":{required:true},
         },
         messages:{
            "satker":'Nama Kategori harus diisi',
         },
         submitHandler: function(form){
           //$("#form3").attr("action",'');
            //alert($("#form3").attr("action"));
            $.post($("#form3").attr("action"),$("#form3").serialize()).done(function(data){
              $('#modaledit').modal('hide');
              satker_table.api().ajax.reload();
            });
         }
      });   
      $(window).on("hide.bs.modal",function(e){
         $("#satker").val("");
      })

       $("#table_satker").on('click','#edit',function(event){
          event.preventDefault();
          var id = $(this).closest("tr").find("span").attr("data");
          $("#satker_edit").val($(this).closest("tr").find("span").html());
          $("#form3").attr("action",'{{URL::to("admin/satker/update")}}/'+id);
          $("#modaledit").modal('show');
        });
      });
    </script>
    {{HTML::script('asset/themes/js/sb-admin-2.js')}}
@stop