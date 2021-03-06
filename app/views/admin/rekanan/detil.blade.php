<div class="row">
	<div class="col-lg-12">
   		<h3 class="page-header"><i class="fa fa-chain" ></i> Detail data {{ $data->nama_rkn }}</h3>
	</div>              
</div>
<div class="row">
	<div class="col-md-12">      
   		<div class="panel panel-default">
   			<div class="panel-body">
               <div class="col-sm-12" >
                  <div class="table-responsive">
                     <table  width="80%" cellpadding="0" cellspacing="0" border="0" class="table table-striped dataTable" id="rekanan">
                        <tr>
                           <td colspan="6" ><h4 style="margin-top:5px;margin-bottom:5px;">Data Administratif</h4></td>
                        </tr>
                        <tr>
                           <td width="15%">Nama Perusahaan</td>
                           <td width="1%">:</td>
                           <td width="39%">{{ $data->nama_rkn }}</td>
                           <td width="13%">No Faximilie</td>
                           <td width="1%">:</td>
                           <td width="31%">{{ empty($data->fax_rkn)?"belum diisi":$data->fax_rkn }}</td>
                        </tr>
                        <tr>
                           <td>Alamat Perusahaan</td>
                           <td>:</td>
                           <td>{{ $data->alamat_rkn }}</td>
                           <td>Email Perusahaan</td>
                           <td>:</td>
                           <td>{{ $data->email_rkn }}</td>
                        </tr>
                        <tr>
                           <td>Status Perusahaan</td>
                           <td>:</td>
                           <td>{{ empty($data->status_rekanan)?"--- Segera isi Data ---":$data->status_rekanan }}</td>
                           <td>NPWP</td>
                           <td>:</td>
                           <td>{{ empty($data->npwp_rkn)?"--segera isi data--":$data->npwp_rkn }}</td>
                        </tr>
                         <tr>
                           <td>No Telepon</td>
                           <td>:</td>
                           <td>{{ empty($data->telp_rkn)?"--segera isi data--":$data->telp_rkn }}</td>
                           <td>File NPWP</td>
                           <td>:</td>
                           <td>{{ empty($data->file_npwp)?"File Belum Di Upload":$data->file_npwp }}</td>
                        </tr>
                        <tr>
                           <td>No Handphone</td>
                           <td>:</td>
                           <td colspan="4" >{{ empty($data->mobile_phone_rkn)?"--segera isi data--":$data->mobile_phone_rkn }}</td>
                        </tr>
                        <tr>
                           <td colspan="6" >&nbsp;</td>
                        </tr>
                        <tr>
                           <td colspan="6" ><h4 style="margin-top:5px;margin-bottom:5px;">Ijin Usaha Perusahaan</h4></td>
                        </tr>
                        <tr>
                           <td>No SIUP</td>
                           <td>:</td>
                           <td>{{ empty($data->ius_no)?"--segera isi data--":$data->ius_no }}</td>
                           <td>Instansi Pemberi SIUP</td>
                           <td>:</td>
                           <td>{{ empty($data->ius_instansi)?"--segera isi data--":$data->ius_instansi }}</td>
                        </tr>
                        <tr>
                           <td>Tanggal SIUP</td>
                           <td>:</td>
                           <td>{{ date("d-M-Y",strtotime($data->telp_rkn)) }}</td>
                           <td>File SIUP</td>
                           <td>:</td>
                           <td>{{ empty($data->file_siup)?"File Belum Di upload":$data->file_siup }}</td>
                        </tr>
                        <tr>
                           <td>Masa Berlaku SIUP</td>
                           <td>:</td>
                           <td colspan="4" >{{ empty($data->ius_berlaku)?"--segera isi data--":$data->ius_berlaku }}</td>
                        </tr>
                        <tr>
                           <td colspan="6" >&nbsp;</td>
                        </tr>
                        <tr>
                           <td colspan="6" ><h4 style="margin-top:5px;margin-bottom:5px;">Ijin TDP  </h4></td>
                        </tr>
                        <tr>
                           <td>No TDP</td>
                           <td>:</td>
                           <td>{{ empty($data->no_tdp)?"--segera isi data--":$data->no_tdp }}</td>
                           <td>Instansi Pemberi TDP</td>
                           <td>:</td>
                           <td>{{ empty($data->instansi_tdp)?"--segera isi data--":$data->instansi_tdp }}</td>
                        </tr>
                        <tr>
                           <td>Tanggal TDP</td>
                           <td>:</td>
                           <td>{{ date('d-M-y',strtotime($data->tgl_tdp)) }}</td>
                           <td>File TDP</td>
                           <td>:</td>
                           <td>{{ empty($data->file_tdp)?"File Belum Di upload":$data->file_tdp }}</td>
                        </tr>
                        <tr>
                           <td>Masa Berlaku TDP</td>
                           <td>:</td>
                           <td colspan="4" >{{ empty($data->masa_tdp)?"--segera isi data--":$data->masa_tdp }}</td>
                        </tr>
                        <tr>
                           <td colspan="6" >&nbsp;</td>
                        </tr>
                         <tr>
                           <td colspan="6" ><h4 style="margin-top:5px;margin-bottom:5px;">Akte Pendirian Usaha</h4></td>
                        </tr>
                        <tr>
                           <td>No Akte</td>
                           <td>:</td>
                           <td>{{ empty($data->no_akte)?"--segera isi data--":$data->no_akte }}</td>
                           <td>Nama Notaris</td>
                           <td>:</td>
                           <td>{{ empty($data->notaris_akte)?"--segera isi data--":$data->notaris_akte }}</td>
                        </tr>
                        <tr>
                           <td>Tanggal Akte</td>
                           <td>:</td>
                           <td>{{ date('d-M-y',strtotime($data->tgl_akte)) }}</td>
                           <td>File SIUP</td>
                           <td>:</td>
                           <td>{{ empty($data->file_akte)?"File Belum Di upload":$data->file_akte }}</td>
                        </tr>
                        <tr>
                           <td colspan="6" align="right">
                              @if(Session::get('level') < 3)
                                 <a href="{{ URL::to('admin/rekanan') }}" class="btn btn-primary"><i class="fa fa-chevron-left" style="margin-left:15px"></i> Kembali ke daftar rekanan</a>
                              @endif
                           </td>
                        </tr>
                        
                     </table>    
                  </div>
               </div>
               <div class="col-sm-9" >
                  <h3 class="page-header">
                     <i class="fa fa-table" ></i> Daftar Kepengurusan Perusahaan 
                     @if(Session::get('level')=="3")
                     <a href="{{ URL::to('admin/rekanan/edit_pengurus/'.$data->id_rkn) }}" class="btn btn-primary">Edit Pengurus</a>
                     @endif
                  </h3>

               </div>
                <div class="col-sm-9">
                  <div class="table-responsive">
                     <table  cellpadding="0" cellspacing="0" border="0" class="table table-hover table-striped dataTable" id="detil">
                       <thead>
                         <tr>

                            <th width="50%" >Nama</th>
                            <th width="20%">Jabatan</th>
                            <th width="15%">Saham</th>   
                         </tr>
                      </thead>
                   </table>    
                  </div>
               </div>
               <div class="col-sm-9" >
                  <h3 class="page-header">
                     <i class="fa fa-table" ></i> Daftar Pengadaan
                  </h3>

               </div>
                <div class="col-sm-9">
                  <div class="table-responsive">
                     <table  cellpadding="0" cellspacing="0" border="0" class="table table-hover table-striped dataTable" id="pengadaan">
                       <thead>
                         <tr>
                            <th width="60%" >Deskripsi Pengadaan</th>
                            <th width="20%">Status</th>
                         </tr>
                      </thead>
                   </table>    
                  </div>
               </div>
   			</div>
   		</div>
	</div>              
</div>
@section('js')
   {{HTML::script('asset/themes/js/plugins/dataTables/jquery.dataTables.js')}}
    {{HTML::script('asset/themes/js/plugins/dataTables/dataTables.bootstrap.js')}}
    {{HTML::script('asset/themes/js/sb-admin-2.js')}}
    <script type="text/javascript">
     
 
      $(function() {
          $("#pengadaan").dataTable({
           "responsive":true,
           "processing":true,
           "serverSide": true,
           "filter":false,
           "pageLength":5,
           "ajax":"{{ URL::to('/admin/rekanan/detil/pengadaanAjax/'.$data->id_rkn) }}",
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
               {"orderable":false,"searchable":true}
           ]
         });

          $("#detil").dataTable({
           "responsive":true,
           "processing":true,
           "serverSide": true,
           "filter":false,
           "pageLength":5,
           "ajax":"{{ URL::to('/admin/rekanan/pengurus/list/'.$data->id_rkn) }}",
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
               {"orderable":false,"searchable":true}
           ]
         });
      });
    </script>
@stop