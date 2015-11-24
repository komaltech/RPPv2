@if($data->page=="add")
<div class="row">
	<div class="col-lg-12">
   		<h3 class="page-header"><i class="fa fa-file" ></i> Buat Permintaan Pengadaan</h3>
	</div>              
</div>
<div class="row">
	<div class="col-md-12">  
   		<div class="panel panel-default">
            <div class="panel-heading">
              <div class="alert alert-info" style="margin-bottom:0px;">
                <p style="font-size:18px"><i class="fa fa-info-circle"></i> Informasi :</p>
                <ul type="square">
                  <li>Form ini dipergunakan untuk membuat permintaan baru yang nantinya akan dikirim ke <strong>Bagian Pengadaan</strong>.</li>
                  <li>Diharapkan mengisikan semua data yang terdapat dalam Form Permintaan, jangan sampai ada yang belum terisi.</li>
                  <li>Untuk data jenis pengadaan apabila tidak terdapat pilihan, di mohon menghubungi <strong>Bagian Pengadaan</strong> agar ditambahkan dalam sistem.</li>
                </ul>
              </div>
              
            </div>
   			    <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active" ><a href="#" data-toggle="tab">Tahap Pertama</a>
                    </li>
                    <li ><a href="#" data-toggle="tab">Tahap Kedua</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active in" id="input-one">
                        <div class="row" >
                           <div class="col-sm-12" >
                              <h4 class="page-header" >Input Pengadaan</h4>
                           </div>
                        </div>
                         <form class="form-horizontal" id="form1" method="post" action="{{ URL::to('admin/permintaan/save') }}">
                            <div class="form-group">
                               {{ Form::label('no','No Surat Permintaan',['class'=>'col-sm-2']) }}
                               <div class="col-sm-5 ">
                                 {{ Form::text('no_permintaan',Input::old('no_permintaan'),array('class'=>'form-control')) }}
                               </div>
                               <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                               {{ Form::label('no','Sifat Surat',['class'=>'col-sm-2']) }}
                               <div class="col-sm-5 ">
                                  {{ Form::text('sifat',Input::old('sifat'),array('class'=>'form-control')) }}
                               </div>
                               <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                               {{ Form::label('no','Deskripsi Kegiatan',['class'=>'col-sm-2']) }}
                               <div class="col-sm-5">
                                  {{ Form::textarea('desk_keg',Input::old('desk_keg'),array('size'=>'40x5','class'=>'form-control')) }}
                               </div>
                               <div class="clearfix"></div>
                            </div>
                             <div class="form-group">
                               {{ Form::label('no','Lokasi Pengerjaan',['class'=>'col-sm-2']) }}
                               <div class="col-sm-5">
                                  {{ Form::text('lokasi',Input::old('lokasi'),array('class'=>'form-control')) }}
                               </div>
                               <div class="clearfix"></div>
                            </div>
                             <div class="form-group">
                               {{ Form::label('no','Alamat Pengerjaan',['class'=>'col-sm-2']) }}
                               <div class="col-sm-5">
                                  {{ Form::textarea('alamat',Input::old('alamat'),array('size'=>'40x5','class'=>'form-control')) }}
                               </div>
                               <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                              {{Form::label('nama','Jenis Pengadaan',['class'=>'col-sm-2']) }}
                              <div class="col-sm-5">
                                 {{Form::select('jenis',$data->kategori,null, array('class'=>'form-control'))}}
                              </div>
                              <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                               {{ Form::label('no','No Telepon',['class'=>'col-sm-2']) }}
                               <div class="col-sm-5">
                                  {{ Form::text('telp',Input::old('telp'),array('class'=>'form-control')) }}
                               </div>
                               <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                               {{ Form::label('no','Link Website',['class'=>'col-sm-2']) }}
                               <div class="col-sm-5">
                                  {{ Form::text('website',Input::old('website'),array('class'=>'form-control')) }}
                               </div>
                               <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                               {{ Form::label('no','Jumlah Pagu',['class'=>'col-sm-2']) }}
                               <div class="col-sm-5">
                                  {{ Form::text('pagu',Input::old('pagu'),array('class'=>'form-control')) }}
                               </div>
                               <div class="clearfix"></div>
                            </div>
                             <div class="form-group">
                                 {{ Form::label('no','Sumber Dana',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5">
                                    {{ Form::text('sumber_dana',null,array('class'=>'form-control')) }}
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                              <div class="form-group">
                                 {{ Form::label('no','Tahun Anggaran',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5">
                                    {{ Form::text('tahun',null,array('class'=>'form-control')) }}
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                             <div class="form-group">
                               <div class="col-sm-5">
                                  {{ Form::submit('Simpan dan lanjutkan',array('class'=>'btn btn-success')) }}   
                               </div> 
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="input-two">
                    </div>
                </div>
   			</div>
   		</div>
	</div>              
</div>
@else
<div class="row">
  <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa-file" ></i> Edit Permintaan</h3>
  </div>              
</div>
<div class="row">
  <div class="col-md-12">  
      <div class="panel panel-default">
            <div class="panel-heading">
              <div class="alert alert-info" style="margin-bottom:0px;">
                <p style="font-size:18px"><i class="fa fa-info-circle"></i> Informasi :</p>
                <ul type="square">
                  <li>Form ini dipergunakan untuk membuat permintaan baru yang nantinya akan dikirim ke <strong>Bagian Pengadaan</strong>.</li>
                  <li>Diharapkan mengisikan semua data yang terdapat dalam Form Permintaan, jangan sampai ada yang belum terisi.</li>
                  <li>Untuk data jenis pengadaan apabila tidak terdapat pilihan, di mohon menghubungi <strong>Bagian Pengadaan</strong> agar ditambahkan dalam sistem.</li>
                </ul>
              </div>
            </div>
              <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li class="active" ><a href="#" data-toggle="tab">Tahap Pertama</a>
                    </li>
                    <li ><a href="#" data-toggle="tab">Tahap Kedua</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active in" id="input-one">
                        <div class="row" >
                           <div class="col-sm-12" >
                              <h4 class="page-header" >Input Pengadaan</h4>
                           </div>
                        </div>
                         <form class="form-horizontal" id="form1" method="post" action="{{ URL::to('admin/permintaan/save/'.$data->id) }}">
                              <div class="form-group">
                                 {{ Form::label('no','No Surat Permintaan',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5 ">
                                   {{ Form::text('no_permintaan',$data->no_srt_permintaan,array('class'=>'form-control')) }}
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                              <div class="form-group">
                                 {{ Form::label('no','Sifat Surat',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5 ">
                                    {{ Form::text('sifat',$data->sifat,array('class'=>'form-control')) }}
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                              <div class="form-group">
                                 {{ Form::label('no','Deskripsi Kegiatan',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5">
                                    {{ Form::textarea('desk_keg',$data->desk_kegiatan,array('size'=>'40x5','class'=>'form-control')) }}
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                               <div class="form-group">
                                 {{ Form::label('no','Lokasi Pengerjaan',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5">
                                    {{ Form::text('lokasi',$data->lokasi_kegiatan,array('class'=>'form-control')) }}
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                               <div class="form-group">
                                 {{ Form::label('no','Alamat Pengerjaan',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5">
                                    {{ Form::textarea('alamat',$data->alamat_pengerjaan,array('size'=>'40x5','class'=>'form-control')) }}
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                              <div class="form-group">
                                  {{Form::label('nama','Jenis Pengadaan',['class'=>'col-sm-2']) }}
                                  <div class="col-sm-5">
                                     {{Form::select('jenis',$data->kategori,$data->id_cat, array('class'=>'form-control'))}}
                                  </div>
                                  <div class="clearfix"></div>
                              </div>
                              <div class="form-group">
                                 {{ Form::label('no','No Telepon',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5">
                                    {{ Form::text('telp',$data->telp_lokasi_pengerjaan,array('class'=>'form-control')) }}
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                              <div class="form-group">
                                 {{ Form::label('no','Link Website',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5">
                                    {{ Form::text('website',$data->website,array('class'=>'form-control')) }}
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                              <div class="form-group">
                                 {{ Form::label('no','Jumlah Pagu',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5">
                                    {{ Form::text('pagu',$data->pagu,array('class'=>'form-control')) }}
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                              <div class="form-group">
                                 {{ Form::label('no','Sumber Dana',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5">
                                    {{ Form::text('sumber_dana',$data->sumber_dana,array('class'=>'form-control')) }}
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                               <div class="form-group">
                                 {{ Form::label('no','Tahun Anggaran',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5">
                                    {{ Form::text('tahun',$data->thn_anggaran,array('class'=>'form-control')) }}
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                               <div class="form-group">
                                 <div class="col-sm-5">
                                    {{ Form::submit('Simpan dan lanjutkan',array('class'=>'btn btn-success')) }}   
                                 </div> 
                              </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="input-two">
                    </div>
                </div>
        </div>
      </div>
  </div>              
</div>
@endif

@section('js')
   {{HTML::style('asset/themes/jquery_ui/jquery-ui.css')}}   
   {{HTML::script('asset/themes/js/plugins/dataTables/jquery.dataTables.js')}}
    {{HTML::script('asset/themes/js/plugins/dataTables/dataTables.bootstrap.js')}}
   {{HTML::script('asset/themes/jquery_ui/jquery-ui.js')}}
   {{HTML::script('asset/themes/js/jquery.validate.js')}}

   <script type="text/javascript">
      $(function(){
       $( "#tanggal" ).datepicker({
         changeMonth: true,
         changeYear: true,
       });

      $("#form1").validate({
         
         rules:{
            "no_permintaan":{required:true},
            "sifat":{required:true},
            "desk_keg":{required:true},
            "lokasi":{required:true},
            "alamat":{required:true},
            "telp":{required:true},
            "pagu":{required:true},
            "jenis":{required:true},
            "tahun":{required:true,number:true}
         },
         messages:{
            "no_permintaan":'<i class="fa fa-remove"></i>Data no permintaan harus diisi',
            "sifat":"Data sifat surat harus diisi",
            "desk_keg":"Data deskripsi kegiatan harus diisi",
            "lokasi":"Data lokasi kegiatan harus diisi",
            "alamat":"Data alamat kegiatan harus diisi",
            "telp":"Data telepon harus diisi",
            "website":"Data website harus diisi",
            "pagu":"Data pagu harus diisi",
            "jenis":"Data jenis harus dipilih",
            "tahun":{required:"Data tahun harus diisi",number:"Tahun harus diisi dengan angka"}


         }
      });

   });

   </script>
@stop