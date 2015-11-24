@if($data->page=="add")
<div class="row">
	<div class="col-lg-12">
   		<h3 class="page-header"><i class="fa fa-file" ></i> Buat Pengajuan Paket Pengadaan</h3>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
   		<div class="panel panel-default">
            <div class="panel-heading">
              <div class="alert alert-info" style="margin-bottom:0px;">
                <p style="font-size:18px"><i class="fa fa-info-circle"></i> Informasi :</p>
                <ul type="square">
                  <li>Form ini dipergunakan untuk membuat pengajuan paket baru yang nantinya akan dikirim ke <strong>Unit Layanan Pengadaan</strong>.</li>
                  <li>Diharapkan mengisikan semua data yang terdapat dalam Form Pengajuan, jangan sampai ada yang belum terisi.</li>
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
                              <h4 class="page-header" >Input Pengajuan Paket</h4>
                           </div>
                        </div>
                         <form class="form-horizontal" id="form1" method="post" action="{{ URL::to('admin/paket/save') }}">
                           <div class="form-group">
                              {{Form::label('nama','Jenis Pengadaan',['class'=>'col-sm-2']) }}
                              <div class="col-sm-5">
                                 {{Form::select('jenis',$data->kategori,null, array('class'=>'form-control'))}}
                              </div>
                              <div class="clearfix"></div>
                            </div>
						   							<div class="form-group">
                               {{ Form::label('nama','Nama Paket',['class'=>'col-sm-2']) }}
                               <div class="col-sm-5 ">
                                 {{ Form::text('nama_paket',Input::old('nama_paket'),array('class'=>'form-control')) }}
                               </div>
                               <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                               {{ Form::label('nama','Sumber Dana',['class'=>'col-sm-2']) }}
                               <div class="col-sm-5 ">
															 {{ Form::select('sumber_dana', array(	''=>'- Pilih Sumber Dana -',
																																					'APBD' => 'APBD',
																																					'APBN' => 'APBN',
																																					'BUMD' => 'BUMD',
																																					'BUMN' => 'BUMN',
																																					'BLUD' => 'BLUD',
																																					'BLU' => 'BLU',
																																					'APBDP' => 'APBDP',
																																					'APBNP' => 'APBNP',
																																					'PNBP'	=>	'PNBP',
																																					'PHLN'	=>	'PHLN'),
																																					null ,array('class'=>'form-control'))}}
                               </div>
                               <div class="clearfix"></div>
                            </div>
                           <div class="form-group">
                                 {{ Form::label('no','Tahun Anggaran',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5">
																 {{ Form::select('thn_anggaran', array(	''=>'- Pilih Tahun Anggaran -',
	  																																					'2014' => '2014',
	  																																					'2015' => '2015',
	  																																					'2016' => '2016',
	  																																					'2017' => '2017',
	  																																					'2018' => '2018',
	  																																					'2019' => '2019',
	  																																					'2020' => '2020'),
	  																																					null ,array('class'=>'form-control'))}}
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
                                 {{ Form::label('no','Kode Rekening',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5">
                                    {{ Form::text('kode_rek',null,array('class'=>'form-control')) }}
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                             <div class="form-group">
                                 {{ Form::label('no','Kode RUP',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5">
                                    {{ Form::text('kode_rup',null,array('class'=>'form-control')) }}
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
							  							<div class="form-group">
                                 {{ Form::label('nama','Jenis Pembayaran',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5">
                                    {{ Form::text('jenis_bayar',null,array('class'=>'form-control')) }}
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
      <h3 class="page-header"><i class="fa fa-file" ></i> Edit Pengajuan Paket Baru</h3>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
      <div class="panel panel-default">
            <div class="panel-heading">
              <div class="alert alert-info" style="margin-bottom:0px;">
                <p style="font-size:18px"><i class="fa fa-info-circle"></i> Informasi :</p>
                <ul type="square">
									<li>Form ini dipergunakan untuk memperbarui pengajuan paket baru yang nantinya akan dikirim ke <strong>Unit Layanan Pengadaan</strong>.</li>
                  <li>Diharapkan mengisikan semua data yang terdapat dalam Form Pengajuan, jangan sampai ada yang belum terisi.</li>
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
                         <form class="form-horizontal" id="form1" method="post" action="{{ URL::to('admin/paket/update/'.$data->id) }}">
                              <div class="form-group">
                                  {{Form::label('nama','Jenis Pengadaan',['class'=>'col-sm-2']) }}
                                  <div class="col-sm-5">
                                     {{Form::select('jenis',$data->kategori,$data->id_cat, array('class'=>'form-control'))}}
                                  </div>
                                  <div class="clearfix"></div>
                              </div>

							  						<div class="form-group">
                                 {{ Form::label('nama','Nama Paket',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5 ">
                                   {{ Form::text('nama_paket',$data->nama_paket,array('class'=>'form-control')) }}
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                              <div class="form-group">
                                 {{ Form::label('nama','Sumber Dana',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5 ">
                                    {{ Form::select('sumber_dana',array(				'APBD' => 'APBD',
		 																																					'APBN' => 'APBN',
		 																																					'BUMD' => 'BUMD',
		 																																					'BUMN' => 'BUMN',
		 																																					'BLUD' => 'BLUD',
		 																																					'BLU' => 'BLU',
		 																																					'APBDP' => 'APBDP',
		 																																					'APBNP' => 'APBNP',
		 																																					'PNBP'	=>	'PNBP',
		 																																					'PHLN'	=>	'PHLN'),$data->sumber_dana,array('class'=>'form-control')) }}
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
							  						<div class="form-group">
                                 {{ Form::label('no','Tahun Anggaran',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5">
                                  {{ Form::select('thn_anggaran', array(				'2014' => '2014',
	 	  																																					'2015' => '2015',
	 	  																																					'2016' => '2016',
	 	  																																					'2017' => '2017',
	 	  																																					'2018' => '2018',
	 	  																																					'2019' => '2019',
	 	  																																					'2020' => '2020'),$data->thn_anggaran,array('class'=>'form-control')) }}
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
                                 {{ Form::label('no','Kode Rekening',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5">
                                    {{ Form::text('kode_rek',$data->kode_rek,array('class'=>'form-control')) }}
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
                              <div class="form-group">
                                 {{ Form::label('no','Kode RUP',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5">
                                    {{ Form::text('kode_rup',$data->kode_rup,array('class'=>'form-control')) }}
                                 </div>
                                 <div class="clearfix"></div>
                              </div>
							  						<div class="form-group">
                                 {{ Form::label('nama','Jenis Pembayaran',['class'=>'col-sm-2']) }}
                                 <div class="col-sm-5">
                                    {{ Form::text('jenis_bayar',$data->jenis_bayar,array('class'=>'form-control')) }}
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

      $("#form1").validate({

         rules:{
            "jenis":{required:true},
            "nama_pkt":{required:true},
            "sumber_dana":{required:true},
            "thn_anggaran":{required:true,number:true},
            "pagu":{required:true},
            "kode_rek":{required:true},
            "kode_rup":{required:true},
            "jenis_bayar":{required:true}
            },
         messages:{
            "jenis":"Data jenis harus dipilih",
						"nama_pkt":"Nama Paket wajib diisi",
            "sumber_dana":"Sumber Dana harus diisi",
            "thn_anggaran":{required:"Tahun Anggaran harus diisi",number:"Tahun harus diisi dengan angka"},
						"pagu":"Data pagu kegiatan harus diisi",
            "kode_rek":"Data kode rekening kegiatan harus diisi",
            "kode_rup":"Data kode rup harus diisi",
            "jenis_bayar":"Data jenis pembayaran harus diisi"

         }
      });

   });

   </script>
@stop
