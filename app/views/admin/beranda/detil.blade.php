
<div class="row">
  <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa-user" ></i> Detail data</h3>
  </div>              
</div>
<div class="row">
  <div class="col-md-12">      
      <div class="panel panel-default">
        <div class="panel-body">
              <div class="row">
                <div class="col-sm-2" >
                  @if(empty($data->foto))
                    <div class="thumbnail">{{ HTML::image('/asset/img/user.png','a user',array('style'=>'height:170px;')) }}</div>
                  @else
                    <div class="thumbnail">{{ HTML::image('/asset/img/foto_user/'.$data->foto,'a user',array('style'=>'height:170px;')) }}</div>
                  @endif
                </div>
                 <div class="col-sm-10" >
                    <div class="table-responsive">
                      <table width="80%" class="table table-striped dataTable" id="pegawai" >
                        <tr>
                          <td width="13%">NIP</td>
                          <td width="1%">:</td>
                          <td width="38%">{{ $data->nip }}</td>
                          <td width="13%">Golongan</td>
                          <td width="1%">:</td>
                          <td width="38%">{{ $data->golongan }}</td>
                        </tr>
                        <tr>
                          <td>Nama</td>
                          <td>:</td>
                          <td>{{ $data->nama }}</td>
                          <td>Level</td>
                          <td>:</td>
                          <td>
                            @if($data->level =="0")
                              Administrator
                            @elseif($data->level =="1")
                              Pejabat Pembuat Komitmen
                            @elseif($data->level =="2")
                              Sekretariat ULP
							@elseif($data->level =="3")
                              Kepala ULP
							@elseif($data->level =="4")
                              POKJA
							@elseif($data->level =="5")
                              Pengguna Anggaran
                            @endif
                          </td>
                        </tr>
                        <tr>
                          <td>Alamat</td>
                          <td>:</td>
                          <td>{{ $data->alamat}}</td>
                          <td>Email</td>
                          <td>:</td>
                          <td>{{ $data->email }}</td>
                        </tr>
                        <tr>
                          <td>Mobile Phone</td>
                          <td>:</td>
                          <td>{{ $data->mobile_phone }}</td>
                          <td>Satuan Kerja</td>
                          <td>:</td>
                          <td>{{ $data->nama_satker }}</td>
                        </tr>
                       
                        <tr>
                          <td colspan="6" align="left">
                            <a href="{{ URL::to('admin/user/edit/'.Session::get('user_id')) }}" class="btn btn-primary"><i class="fa fa-edit" style="margin-right:10px" ></i> Edit User</a>
                          </td>
                        </tr>
                      </table>
                  </div>
                </div>
              </div>
             <div class="row" >
                <div class="col-sm-10">
                  <div class="page-header ">
                    <h4>
                        @if(Session::get('level')>0)
                          <i class="fa fa-table" style="margin-right:10px" ></i> DAFTAR PENGAJUAN PAKET
                        @endif
                        
                    </h4>
                  </div>
                </div>
             </div>
             @if(Session::get('level')>0)
              <div class="row">
                <div class="col-sm-12" >
                  <div class="table-responsive">
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped dataTable" id="paket">
                      <thead>
                          <tr>
                             <th width="28%" >Paket</th>
                             <th width="10%">Tahapan</th>
                             <th width="15%">Total Pagu</th>
							 <th width="15%">Tahun Anggaran</th>	
                             <th width="22%">Aksi</th>             
                          </tr>
                       </thead>
                    </table>
                  </div>
                </div>
              </div>
            @endif
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
          $('#paket').dataTable({
           "processing":true,
           "serverSide": true,
           "ajax":"{{ URL::to('admin/beranda/listAjax') }}",
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
               {"orderable":true,"searchable":true},
               {"orderable":false,"searchable":true},
			    {"orderable":false,"searchable":true},
               {"orderable":false,"searchable":true}
           ]
           
       });
          
         $("#paket").on('click','#del',function(event){
            event.preventDefault();
            var url =$(this).attr("href");
            var msg = confirm("Apakah anda ingin menghapus data ini ?");
           
            if(msg == true){
               window.location = url;
            }
         });
      });
    </script>
@stop