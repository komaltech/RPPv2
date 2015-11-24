<div class="row">
   <div class="col-lg-12">
         <h3 class="page-header"><i class="fa fa-print"></i> Cetak Permintaan</h3>
   </div>              
</div>
<div class="row">
   <div class="col-lg-12">
         <div class="panel panel-default">
            <div class="panel-body">
               <div class="row">
                  <div class="col-md-12">
                      <div class="alert alert-warning" >
                        <strong>Judul Permintaan Pengadaan  :</strong><br>
                        {{$data->desk_kegiatan}}<br>
                        <strong>Lokasi Pengerjaan           :</strong><br>
                        {{$data->lokasi_kegiatan}}<br>
                        <strong>Jumlah PAGU                 :</strong>
                        {{ String::formatMoney($data->pagu,"Rp.") }}<br>
                        <strong>Jumlah HPS                  :</strong>
                        {{ String::formatMoney($data->hps,"Rp.") }}<br>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="table-responsive" >
                    <table  cellpadding="0" cellspacing="0" border="0" class="table table-hover table-striped dataTable">
                      <tbody>
                        <tr>
                           <td width="20%">SK Permintaan Pengadaan</td>
                           <td width="80%">
                             <a href="{{ URL::to('admin/permintaan/cetak_sk/'.$data->id) }}" class="btn btn-info"><i class="fa fa-print"></i> Cetak</a>
                           </td>
                        </tr>
                        <tr>
                           <td width="20%">Tabel Perkiraan HPS</td>
                           <td width="80%">
                             <a href="{{ URL::to('admin/permintaan/cetak_hps/'.$data->id) }}" class="btn btn-info"><i class="fa fa-print"></i> Cetak</a>
                           </td>
                        </tr>
                     </tbody>
                   </table>    
                  </div>
                </div>
              </div>
              <div class="panel-footer" >
                <a href="{{ URL::to('admin/permintaan') }}" class="btn btn-primary btn-block" ><i class="fa fa-chevron-left" style="margin-right:6px;font-size:11px;"></i> Kembali Ke Daftar Permintaan</a>
              </div>
            </div>
         </div>
   </div>              
</div>


