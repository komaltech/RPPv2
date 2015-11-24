<div class="row">
	<div class="col-lg-12">
   		<h3 class="page-header"><i class="fa fa-th-large" ></i> Detail data </h3>
	</div>              
</div>
<div class="row">
	<div class="col-md-12">      
   		<div class="panel panel-default">
   			<div class="panel-body">
               <div class="table-responsive">
              	@foreach($data as $row)
                  <table  width="80%" cellpadding="0" cellspacing="0" border="0" class="table table-striped dataTable" id="pegawai">
                        
                        <tr>
                           <th width="20%" >Nama</th>
                           <th width="80%" style="font-weight:normal">{{ $row->nama }}</th>
                        </tr>
						<tr>
                           <th width="20%" >NIP</th>
                           <th width="80%" style="font-weight:normal">{{ $row->nip }}</th>
                        </tr>
                        <tr>
                           <th width="20%" >Alamat</th>
                           <th width="80%" style="font-weight:normal">{{ $row->alamat }}</th>
                        </tr>
                        <tr>
                           <th width="20%" >Telepon</th>
                           <th width="80%" style="font-weight:normal">{{ $row->phone }}</th>
                        </tr>
                        <tr>
                           <th width="20%" >Mobile Phone</th>
                           <th width="80%" style="font-weight:normal">{{ $row->mobile_phone }}</th>
                        </tr>
                        <tr>
                           <th width="20%" >Satuan Kerja</th>
                           <th width="80%" style="font-weight:normal">{{ $row->nama_satker }}</th>
                        </tr>
                        <tr>
                           <th width="20%" >Jabatan</th>
                           <th width="80%" style="font-weight:normal">{{ $row->jabatan }}</th>
                        </tr>
                        <tr>
                           <th width="20%" >Golongan</th>
                           <th width="80%" style="font-weight:normal" >{{ $row->golongan }}</th>
                        </tr>
						<tr>
                           <th width="20%" >Pengangkatan Sebagai</th>
                           <th width="80%" style="font-weight:normal">
                           	@if($row->level=="1")
								Pejabat Pembuat Komitmen
                            @elseif($row->level=="2")
								Sekretariat ULP
                            @elseif($row->level=="3")
								Kepala ULP
                            @elseif($row->level=="4")
								POKJA ULP
                            @elseif($row->level=="5")
								Pengguna Anggaran
                            
							@endif
                            </th>
                        </tr>
                        <tr>
                           <th width="20%" >Email</th>
                           <th width="80%" style="font-weight:normal" >{{ $row->email }}</th>
                        </tr>
                        <tr>
                           <th colspan="2" align="right" style="text-align:right">
                               <a href="{{ URL::to("admin/pegawai/edit/".$row->nip) }}" class="btn btn-primary" ><i class="fa fa-pencil" ></i>  Edit Data</a>
                               <a href="{{ URL::to("admin/pegawai/") }}" class="btn btn-info" ><i class="fa fa-angle-double-left"></i>  Kembali</a>
                           </th>
                        </tr>
                   </table> 
                   @endforeach   
               </div>
   			</div>
   		</div>
	</div>              
</div>