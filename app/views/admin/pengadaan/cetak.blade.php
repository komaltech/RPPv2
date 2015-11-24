<div class="row">
   <div class="col-lg-12">
         <h3 class="page-header"><i class="fa fa-print"></i> Cetak Pengadaan</h3>
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
                        <strong>Lokasi Pekerjaan           :</strong><br>
                        {{$data->lokasi_kegiatan}}<br>
                        <strong>Jumlah PAGU                 :</strong>
                        {{ String::formatMoney($data->pagu,"Rp.") }}<br>
                        <strong>Harga Perkiraan Sendiri     :</strong>
                        {{ String::formatMoney($data->hps,"Rp.") }}<br>
                        <strong>Harga Penawaran Rekanan                  :</strong>
                        {{ String::formatMoney($data->hps_rkn,"Rp.") }}<br>
                        <strong>Harga Negosiasi                 :</strong>
                        {{ String::formatMoney($data->hps_deal,"Rp.") }}<br>
                      </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12" >
                    <div class="table-responsive" >
                      <table  cellpadding="0" cellspacing="0" border="0" class="table table-striped dataTable">
                        <tbody>
                          <tr>
                             <td width="25%">Sampul Laporan Pengadaan </td>
                             <td width="25%">
                               <a href="#" class="btn btn-info" id="sampul">
                                <i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen
                                </a>
                             </td>
                             <td width="25%">Lampiran Penawaran Rekanan</td>
                             <td width="25%">
                               <a href="" class="btn btn-info" id="lamp_penawaran_rkn">
                                <i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen</a>
                             </td>
                          </tr>
                          <tr>
                             <td >Standart Dokumen Pengadaan</td>
                             <td >
                               <a href="{{ URL::to('admin/pengadaan/cetak_pi_rekanan/'.$data->id) }}" class="btn btn-info"><i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen</a>
                             </td>
                             <td >Berita Acara Evaluasi Penawaran</td>
                             <td >
                               <a href="" class="btn btn-info" id="baepl">
                                <i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen</a>
                             </td>
                          </tr>
                           <tr>
                             <td >Spesifikasi Teknis Dan Gambar</td>
                             <td >
                               <!-- <a href="" class="btn btn-info">
                                <i class="fa fa-print" style="margin-right:10px;" ></i> Cetak Dokumen</a> -->
                             </td>
                              <td >Lampiran Evaluasi Penawaran</td>
                             <td >
                              <a href="" class="btn btn-info" id="lamp_eval_tawar" >
                                <i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen
                              </a>
                             </td>
                          </tr>
                          <tr>
                             <td >Undangan Pengadaan</td>
                             <td >
                               <!-- <a href="{{ URL::to('admin/pengadaan/cetak_pi_rekanan/'.$data->id) }}" class="btn btn-info"><i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen</a> -->
                             </td>
                              <td >Berita Acara Klarifikasi</td>
                             <td >
                               <a class="btn btn-info" id="ba_klarifikasi">
                                <i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen
                                </a>
                             </td>
                          </tr>
                           <tr>
                             <td >Sampul Formulir Kualifikasi Rekanan</td>
                             <td >
                               <a href="#" class="btn btn-info" id="sampul_fik">
                                  <i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen
                                </a>
                             </td>
                              <td >Berita Acara Negosiasi</td>
                             <td >
                               <a href="{{ URL::to('admin/pengadaan/cetak_pi_rekanan/'.$data->id) }}" class="btn btn-info" id="ba_negosiasi">
                                  <i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen</a>
                             </td>
                          </tr>                        
                          <tr>
                             <td >Pakta Integritas Rekanan</td>
                             <td >
                               <a href="#" class="btn btn-info" id="pi_rekanan"><i class="fa fa-print" style="margin-right:10px;" ></i> Cetak Dokumen</a>
                             </td>
                               <td >Lampiran BA Negosiasi</td>
                             <td >
                              <a href="" class="btn btn-info" id="lampiran_negosiasi">
                                <i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen
                              </a>
                             </td>
                          </tr>
                          <tr>
                             <td >Form Isian Kualifikasi Rekanan</td>
                             <td >
                              <a href="{{ URL::to('admin/pengadaan/cetak_fik_rekanan/'.$data->id) }}" class="btn btn-info" id="fik">
                                <i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen
                              </a>
                             </td>
                              <td >BAHPL</td>
                             <td >
                               <a href="" class="btn btn-info" id="bahpl">
                                <i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen</a>
                             </td>
                          </tr>
                          <tr>
                             <td >Data Pengalaman Rekanan</td>
                             <td >
                               <a href="{{ URL::to('admin/pengadaan/cetak_pengalaman_rekanan/'.$data->id) }}" class="btn btn-info"><i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen</a>
                             </td>
                              <td >Penetapan Penyedia Barang</td>
                             <td >
                               <a href="" class="btn btn-info" id="ba_penetapan"><i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen</a>
                             </td>
                          </tr>
                          <tr>
                             <td >Pakta Integritas Dinas</td>
                             <td >
                               <a href="{{ URL::to('admin/pengadaan/cetak_pi_dinas/'.$data->id) }}" class="btn btn-info"><i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen</a>
                             </td>
                              <td >Lampiran Penetapan Penyedia</td>
                             <td >
                               <a href="" class="btn btn-info" id="lamp_penetapan_penyedia">
                                <i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen
                              </a>
                             </td>
                          </tr>
                           <tr>
                             <td >Akta Pendirian Perusahaan</td>
                             <td >
                              <a href="" class="btn btn-info" id="akta">
                                <i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen
                              </a>
                             </td>
                            <td >Berita Acara Penyerahan Dokumen</td>
                             <td >
                               <a href="" class="btn btn-info" id="ba_penyerahan">
                               <i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen</a>
                             </td>
                          </tr>
                           <tr>
                             <td >Lampiran Pajak 3 Bulan</td>
                             <td >
                               <a href="" class="btn btn-info" id="pajak">
                                <i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen
                                </a>
                             </td>
                              <td >Surat Penunjukan Penyedia Barang</td>
                             <td >
                               <a href="" class="btn btn-info" id="srt_penujukan">
                                <i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen</a>
                             </td>
                          </tr>
                           <tr>
                             <td >Lampiran SIUP</td>
                             <td >
                               <a href="" class="btn btn-info" id="siup">
                                <i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen
                                </a>
                             </td>
                            <!--   <td >Surat Pesanan</td>
                             <td >
                               <a href="" class="btn btn-info"><i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen</a>
                             </td> -->
                          </tr>
                           <tr>
                             <td >Lampiran Kartu NPWP</td>
                             <td >
                               <a href="" class="btn btn-info" id="npwp">
                                <i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen
                                </a>
                             </td>
                           <!--    <td >Lampiran Surat Pesanan</td>
                             <td >
                               <a href="" class="btn btn-info"><i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen</a>
                             </td> -->
                          </tr>
                           <tr>
                             <td >Lampiran TDP</td>
                             <td >
                               <a href="" class="btn btn-info" id="tdp">
                                <i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen
                              </a>
                             </td>
                            <!--   <td >Surat Perintah Kerja</td>
                             <td >
                               <a href="" class="btn btn-info"><i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen</a>
                             </td> -->
                          </tr>
                          <tr>
                             <td >Lampiran SKT</td>
                             <td >
                              <a href="" class="btn btn-info" id="rkt">
                                <i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen
                              </a>
                             </td>
                            <!--  <td >Lampiran SPK</td>
                             <td >
                               <a href="" class="btn btn-info"><i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen</a>
                             </td> -->
                          </tr>
                          <tr>
                             <td >Foto Kopi KTP</td>
                             <td >
                              <a href="" class="btn btn-info" id="ktp">
                                  <i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen
                              </a>
                             </td>
                             <!--  <td >Standart Ketentuan SPK</td>
                             <td >
                               <a href="" class="btn btn-info"><i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen</a>
                             </td> -->
                          </tr>
                          <tr>
                             <td >Sampul Dokumen Penawaran</td>
                             <td >
                               <a href="" class="btn btn-info" id="sampul_penawaran"><i class="fa fa-print" style="margin-right:10px;" ></i> Cetak Dokumen</a>
                             </td>
                              <!-- <td >Faktur Kirim</td>
                             <td >
                               <a href="" class="btn btn-info"><i class="fa fa-print" style="margin-right:10px;"></i> Cetak Dokumen</a>
                             </td> -->
                          </tr>
                          <tr>
                             <td >Surat Penawaran Rekanan</td>
                             <td colspan="3">
                               <a href="" class="btn btn-info" id="surat_penawaran">
                               <i class="fa fa-print" style="margin-right:10px;" >
                                  </i> Cetak Dokumen
                              </a>
                             </td>
                          </tr>
                       </tbody>
                     </table>    
                    </div>
                  </div>
                </div>
              </div>
              <div class="panel-footer" >
                <a href="{{ URL::to('admin/pengadaan') }}" class="btn btn-primary btn-block" ><i class="fa fa-chevron-left" style="margin-right:6px;font-size:11px;"></i> Kembali Ke Daftar Pengadaan</a>
                <a href="{{ URL::to('admin/pengadaan/no_surat/'.$data->id) }}" class="btn btn-success btn-block" ><i class="fa fa-calendar-o" style="margin-right:6px;"></i> Edit No Surat</a>
              </div>
            </div>
         </div>
   </div>              
</div>

@section('js')
<script type="text/javascript">
  $(function(){

      cek('#sampul','{{ URL::to("admin/pengadaan/cek_sampul/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_sampul/'.$data->id) }}");
      cek('#sampul_fik','{{ URL::to("admin/pengadaan/cek_sampul_fik/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_sampul_fik/'.$data->id) }}");
      cek('#pi_rekanan','{{ URL::to("admin/pengadaan/cek_pi_rekanan/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_pi_rekanan/'.$data->id) }}");
      cek('#fik','{{ URL::to("admin/pengadaan/cek_lap_fik/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_fik_rekanan/'.$data->id) }}");
      cek('#akta','{{ URL::to("admin/pengadaan/cek_akte/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_akte/'.$data->id) }}");
      cek('#pajak','{{ URL::to("admin/pengadaan/cek_pajak/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_pajak/'.$data->id) }}");
      cek('#siup','{{ URL::to("admin/pengadaan/cek_siup/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_siup/'.$data->id) }}");
      cek('#npwp','{{ URL::to("admin/pengadaan/cek_npwp/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_npwp/'.$data->id) }}");
      cek('#tdp','{{ URL::to("admin/pengadaan/cek_tdp/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_tdp/'.$data->id) }}");
      cek('#rkt','{{ URL::to("admin/pengadaan/cek_rkt/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_rkt/'.$data->id) }}");
      cek('#ktp','{{ URL::to("admin/pengadaan/cek_ktp/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_ktp/'.$data->id) }}");
      cek('#sampul_penawaran','{{ URL::to("admin/pengadaan/cek_sampul_penawaran/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_sampul_penawaran/'.$data->id) }}");
      cek('#surat_penawaran','{{ URL::to("admin/pengadaan/cek_surat_penawaran/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_surat_penawaran/'.$data->id) }}");
      cek('#lamp_penawaran_rkn','{{ URL::to("admin/pengadaan/cek_lampiran_rekanan/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_lampiran_rekanan/'.$data->id) }}");
      cek('#baepl','{{ URL::to("admin/pengadaan/cek_baepl/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_baepl/'.$data->id) }}");
      cek('#lamp_eval_tawar','{{ URL::to("admin/pengadaan/cek_lampiran_evaluasi_tawar/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_lampiran_evaluasi_tawar/'.$data->id) }}");
      cek('#ba_klarifikasi','{{ URL::to("admin/pengadaan/cek_ba_klarifikasi/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_ba_klarifikasi/'.$data->id) }}");
      cek('#ba_negosiasi','{{ URL::to("admin/pengadaan/cek_ba_negosiasi/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_ba_negosiasi/'.$data->id) }}");
      cek('#lampiran_negosiasi','{{ URL::to("admin/pengadaan/cek_lampiran_negosiasi/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_lampiran_negosiasi/'.$data->id) }}");
      cek('#bahpl','{{ URL::to("admin/pengadaan/cek_bahpl/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_bahpl/'.$data->id) }}");
      cek('#ba_penetapan','{{ URL::to("admin/pengadaan/cek_ba_penetapan/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_ba_penetapan/'.$data->id) }}");
      cek('#lamp_penetapan_penyedia','{{ URL::to("admin/pengadaan/cek_lampiran_penetapan/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_lampiran_penetapan/'.$data->id) }}");
      cek('#ba_penyerahan','{{ URL::to("admin/pengadaan/cek_ba_penyerahan/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_ba_penyerahan/'.$data->id) }}");
      cek('#srt_penujukan','{{ URL::to("admin/pengadaan/cek_srt_penunjukan/".$data->id) }}',"{{ URL::to('admin/pengadaan/cetak_srt_penunjukan/'.$data->id) }}");


      function cek(id,url,action){
        $(id).click(function(event){
          event.preventDefault();

          $.get(url,function(data){
          //alert(data);
            if(data=="ok"){
              window.open(action);
            }else{
              alert(data);
            }
          });  

        });
        
      }


  });
</script>
@stop
