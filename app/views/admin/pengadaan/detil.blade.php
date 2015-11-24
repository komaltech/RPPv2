<div class="row">
	<div class="col-lg-12">
   		<h3 class="page-header">
            @if($data->page=="paket")
               <i class="fa fa-table" ></i> Detil Pengajuan Paket
            @else
               <i class="fa fa-clipboard" ></i> Detil Pengajuan Paket
            @endif
         </h3>
	</div>              
</div>
<div class="row">
	<div class="col-md-12">      
   		<div class="panel panel-default">
   			<div class="panel-body">
               <div class="table-responsive">
                  <div class="alert alert-info" >
                     <h4>
                        @if($data->page=="pengadaan")
                          Judul Pengadaan :
                        @else
                          Judul Permintaan :
                        @endif
                     </h4>
                     <p style="font-size:16px;">{{ $data->desk_kegiatan }}</p>
                  </div>
                  <table  width="80%" cellpadding="0" cellspacing="0" border="0" class="table table-striped dataTable" id="rekanan">
                        <tr>
                           <th width="17%" >Lokasi Pekerjaan</th>
                           <th width="3%">:</th>
                           <th width="80%" style="font-weight:normal">{{ $data->lokasi_kegiatan }}</th>
                        </tr>
                         <tr>
                           <th width="17%" >Alamat Pekerjaan</th>
                            <th width="3%">:</th>
                           <th width="80%" style="font-weight:normal">{{ $data->alamat_pengerjaan }}</th>
                        </tr>
                        <tr>
                           <th width="17%" >Kategori Pengadaan</th>
                            <th width="3%">:</th>
                           <th width="80%" style="font-weight:normal">{{ $data->cat_nama }}</th>
                        </tr>
                         <tr>
                           <th width="17%" >Nama Rekanan</th>
                            <th width="3%">:</th>
                           <th width="80%" style="font-weight:normal">
                              @if($data->status=="0" or $data->id_rekanan=="0")
                                 -- Rekanan belum dipilih --
                              @else
                                 {{ $data->nama_rkn }}
                              @endif   
                           </th>
                        </tr>
                       
                        <tr>
                           <th width="17%" >Telepon</th>
                            <th width="3%">:</th>
                           <th width="80%" style="font-weight:normal">{{ $data->telp_lokasi_pengerjaan }}</th>
                        </tr>
                        <tr>
                           <th width="17%" >Website</th>
                            <th width="3%">:</th>
                           <th width="80%" style="font-weight:normal" >{{ empty($data->website)?'-':$data->website }}</th>
                        </tr>
                        <tr>
                           <th width="17%" >Total PAGU</th>
                            <th width="3%">:</th>
                           <th width="80%" style="font-weight:normal">{{ String::formatMoney($data->pagu,"Rp.") }}</th>
                        </tr>
                        <tr>
                           <th width="17%" >HPS/OE</th>
                            <th width="3%">:</th>
                           <th width="80%" style="font-weight:normal">{{ String::formatMoney($data->hps,"Rp.") }}</th>
                        </tr>
                        <tr>
                           <th width="17%" >Harga Penawaran Pemenang</th>
                            <th width="3%">:</th>
                           <th width="80%" style="font-weight:normal">{{ String::formatMoney($data->hps_rkn,"Rp.") }}</th>
                        </tr>
                        <tr>
                           <th width="17%" >Harga Negosiasi</th>
                           <th width="3%">:</th>
                           <th width="80%" style="font-weight:normal">{{ String::formatMoney($data->hps_deal,"Rp.") }}</th>
                        </tr>
                        <tr>
                           <th width="17%" >Status</th>
                           <th width="3%">:</th>
                           <th width="80%" style="font-weight:normal">
                           @if($data->status=="0")
                              <h4><span class="label label-warning">Belum Divalidasi</span></h4>
                           @elseif($data->status =="1")
                              <h4><span class="label label-info">Rekanan Dipilih</span></h4>
                           @elseif($data->status=="2")
                              <h4><span class="label label-primary">Pengadaan di proses</span></h4>
                           @elseif($data->status=="3")
                              <h4><span class="label label-primary">Negosiasi</span></h4>
			 @else
                              <h4><span class="label label-primary">Pengadaan Selesai</span></h4>

                           @endif
                           </th>
                        </tr>
                        <tr>
                           <th width="17%" >File NPWP Terbaru</th>
                            <th width="3%">:</th>
                           <th width="80%" style="font-weight:normal">
                              {{ empty($data->file_npwp_terbaru)?"Tidak terdapat file NPWP":"Ada" }}
                           </th>
                        </tr>
                        <tr>
                           <th colspan="3" align="right" style="text-align:right">
                              @if($data->page =="pengadaan")
                                 <a href="{{ URL::to("admin/pengadaan") }}" class="btn btn-success" data-toggle="tooltip" ><i class="fa fa-chevron-left"  style="margin-right:6px;font-size:11px;"></i> Kembali Daftar Pengadaan </a>
                                 @if($data->aksi=="0")
                                    
                                    <a href="{{ URL::to("admin/pengadaan/proses/".$data->id) }}" class="btn btn-primary" data-toggle="tooltip" >Proses Pengadaan <i class="fa fa-chevron-right"  style="margin-right:6px;font-size:11px;" ></i></a>
                                 @elseif($data->aksi=="1")
                                    
                                    <a href="{{ URL::to("admin/pengadaan/jadwal/edit/".$data->id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-calendar"></i> Atur Jadwal</a>
                                    <a href="{{ URL::to("admin/pengadaan/pilih/".$data->id) }}" class="btn btn-primary" data-toggle="tooltip" ><i class="fa fa-envelope-square" ></i> Kirim Ulang Email </a>
                                 @else
                                    
                                    <a href="{{ URL::to("admin/pengadaan/jadwal/edit/".$data->id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-calendar"></i> Atur Jadwal</a>
                                    <a href="{{ URL::to("admin/pengadaan/no_surat/".$data->id) }}" class="btn btn-primary" data-toggle="tooltip" ><i class="fa fa-print" ></i> Cetak Laporan </a>
                                 @endif
                              @else
                                 <a href="{{ URL::to("admin/permintaan") }}" class="btn btn-info" ><i class="fa fa-chevron-left"  style="margin-right:6px;font-size:11px;"></i> Kembali ke daftar permintaan</a>
                                 @if($data->status =="0")
                                    <a href="{{ URL::to("admin/permintaan/edit/".$data->id) }}" class="btn btn-primary" ><i class="fa fa-pencil" ></i> Edit Data</a>
                                 @endif
                                 
                                 <a href="{{ URL::to("admin/permintaan/cetak/".$data->id) }}" class="btn btn-primary" ><i class="fa fa-print" ></i> Cetak</a>
                              @endif
                              
                           </th>
                        </tr>
                   </table>    
               </div>
               <div class="col-sm-12" >
                  <h3 class="page-header">
                     @if($data->page=="pengadaan")
                        <i class="fa fa-dropbox" ></i> Spesifikasi Pengadaan
                     @else
                        <i class="fa fa-dropbox" ></i> Spesifikasi Permintaan
                     @endif
                  </h3>
               </div>
                <div class="col-sm-12">
                  <div class="table-responsive">
                     <table  cellpadding="0" cellspacing="0" border="0" class="table table-hover table-striped table-bordered dataTable" id="detil">
                      <thead  style="font-size:13px;font-weight:1px;">
                        <tr>
                           <th width="25%" rowspan="2" style="vertical-align:middle;text-align:center;">SPESIFIKASI</th>
                           <th width="3%" rowspan="2" style="vertical-align:middle">Qty</th>
                           <th colspan="6" style="text-align:center">INFORMASI HARGA</th>
                                                                                                 
                                                                                                              
                        </tr>
                        <tr>
                            <th width="12%">Hrg HPS</th>   
                           <th width="12%">T Hrg HPS</th> 
                           <th width="12%">Hrg rkn</th>   
                           <th width="12%">T Hrg rkn</th> 
                           <th width="12%">Hrg Nego</th>   
                           <th width="12%">T Hrg Nego</th>            
                        </tr>
                     </thead>
                     <tbody style="font-size:12px;"></tbody>
                   </table>    
                  </div>
               </div>
   			</div>
   		</div>
	</div>              
</div>
@section('js')
   {{HTML::style('asset/themes/jquery_ui/jquery-ui.css')}}   
   {{HTML::script('asset/themes/js/plugins/dataTables/jquery.dataTables.js')}}
    {{HTML::script('asset/themes/js/plugins/dataTables/dataTables.bootstrap.js')}}


   <script type="text/javascript">
      $(function(){
         var detil_table = $("#detil").dataTable({
           "processing":true,
           "serverSide": true,
           "sort":false,
           "filter":false,
           "bDeferRender": true,
           "ajax":'{{ URL::to("admin/pengadaan/detilFull/".$data->id) }}',
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
      });

   </script>
@stop