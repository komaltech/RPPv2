
<div class="row">
	<div class="col-lg-12">
   		<h3 class="page-header"><i class="fa fa-th-large" ></i> Unggah berkas pengajuan paket pengadaan</h3>
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

											<form class="form-horizontal" action="{{ URL::to('admin/paket/tambah_dok/'.$data->id)}}" method="post" enctype="multipart/form-data" }}">

												<div class="form-group">
													<input type="hidden" name="id" value="{{ $data->id }}">
												{{Form::label('nama','Pilih Jenis Dokumen',['class'=>'col-sm-2'])}}
												<div class="col-sm-4 ">
												{{ Form::select('jenis', array(						 'Surat Pengajuan Paket Pengadaan' => 'Surat Pengajuan Paket Pengadaan',
																																	 'HPS/OE (Harga Perkiraan Sendiri)' => 'HPS/OE (Harga Perkiraan Sendiri)',
																																	 'Printscreen RUP dari Website SiRUP' => 'Printscreen RUP dari Website SiRUP',
																																	 'KAK (Kerangka Acuan Kerja)' => 'KAK (Kerangka Acuan Kerja)',
																																	 'BQ (Daftar Kuantitas)' => 'BQ (Daftar Kuantitas)',
																																	 'Spesifikasi Teknis' => 'Spesifikasi Teknis',
																																	 'Gambar' => 'Gambar',
																																	 'Rancangan Kontrak' => 'Rancangan Kontrak',
																																	 'Syarat-syarat umum kontrak'	=>	'Syarat-syarat umum kontrak',
																																	 'Syarat-syarat khusus kontrak'	=>	'Syarat-syarat khusus kontrak',
																																	 'Dokumen pendukung lain' => 'Dokumen pendukung lain'),
																																	 null ,array('class'=>'form-control'))}}
												</div>
												<div class="col-sm-8">
												   {{ Form::file('dokumen','',array('class'=>'form-control','id'=>'dokumen')) }}
												</div>
												<div class="clearfix"></div>
												</div>

												<div class="form-group">
													<div class="col-sm-5">
														 {{ Form::submit('Simpan',array('class'=>'btn btn-success')) }}
													</div>
											 </div>
								    </form>


	<div class="row">

     <div class="col-sm-8">
		<div class="thumbnail">
            <p><a href="{{route('getentry', $data->original_filename)}}">{{$data->jenis}}</a></p>
		</div>
	</div>

 </div>

	</div>
				</div>

			</div>
		</div>
	</div>
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
