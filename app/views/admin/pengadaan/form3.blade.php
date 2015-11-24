
<div class="row">
  <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa-calendar" ></i> Atur Jadwal Tahapan Pengadaan</h3>
  </div>              
</div>
<div class="row">
   <div class="col-lg-12" >
      <div class="alert alert-info" >
        <h4>Judul Pengadaan :</h4>
        <p style="font-size:16px;">{{ isset($data->judul)?$data->judul:'' }}</p>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading">
           <div class="alert alert-warning" >
              <strong>Keterangan :</strong><br>
              <p>
                Form ini dipergunakan untuk mengatur Jadwal Tahapan pengadaan<br>
                Hal - hal yang perlu diperhatikan dalam mengatur jadwal :<br>
                <i>- Harap mengisi seluruh jadwal pada semua tahapan pengadaan, jangan biarkan ada tahapan yang kosong jadwalnya</i>
                
              </p>
            </div>
        </div>
        <div class="panel-body">
           <div class="table-responsive">
              <form method="post" id="form" action="{{ URL::to("admin/pengadaan/jadwal/simpan/".$data->id) }}" name="form">
              <table  cellpadding="0" cellspacing="0" border="0" class="table table-striped" >
                  <thead>
                    <tr>
                       <th width="3%" >No</th>
                       <th width="47%" >Jenis Tahapan</th>
                       <th width="15%">Mulai</th>
                       <th width="15%">Selesai</th>        
                    </tr>
                 </thead>
                 @if($data->page=="add")
                 <tbody>
                    <tr>
                     <td>1</td>
                     <td>Surat perintah Pengadaan Langsung disertai HPS, dan Dok. Teknis</td>
                     <td>{{ Form::text('thp1_dari',$data->thp1_dari,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp1_dari")) }}</td>
                     <td>{{ Form::text('thp1_smp',$data->thp1_smp,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp1_smp")) }}</td>
                   </tr>
                    <tr>
                     <td>2</td>
                     <td>Undangan Pengadaan Langsung disertai dokumen pemilihan penyedia Barang / Jasa</td>
                     <td>{{ Form::text('thp2_dari',null,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp2_dari")) }}</td>
                     <td>{{ Form::text('thp2_smp',null,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp2_smp")) }}</td>
                   </tr>
                    <tr>
                     <td>3</td>
                     <td>Pemasukan Dokumen Penawaran</td>
                     <td>{{ Form::text('thp3_dari',null,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp3_dari")) }}</td>
                     <td>{{ Form::text('thp3_smp',null,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp3_smp")) }}</td>
                   </tr>
                    <tr>
                     <td>4</td>
                     <td>Pembukaan Penawaran, Evaluasi Penawaran, Berita Acara Ev.Penawaran</td>
                     <td>{{ Form::text('thp4_dari',null,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp4_dari")) }}</td>
                     <td>{{ Form::text('thp4_smp',null,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp4_smp")) }}</td>
                   </tr>
                    <tr>
                     <td>5</td>
                     <td>Klarifikasi Teknis</td>
                     <td>{{ Form::text('thp5_dari',null,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp5_dari")) }}</td>
                     <td>{{ Form::text('thp5_smp',null,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp5_smp")) }}</td>
                   </tr>
                    <tr>
                     <td>6</td>
                     <td>Negosiasi Harga dan Biaya</td>
                     <td>{{ Form::text('thp6_dari',null,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp6_dari")) }}</td>
                     <td>{{ Form::text('thp6_smp',null,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp6_smp")) }}</td>
                   </tr>
                    <tr>
                     <td>7</td>
                     <td>Berita Acara Hasil Pengadaan Langsung</td>
                     <td>{{ Form::text('thp7_dari',null,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp7_dari")) }}</td>
                     <td>{{ Form::text('thp7_smp',null,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp7_smp")) }}</td>
                   </tr>
                   <tr>
                     <td>8</td>
                     <td>Penetapan Penyedia Barang</td>
                     <td>{{ Form::text('thp8_dari',null,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp8_dari")) }}</td>
                     <td>{{ Form::text('thp8_smp',null,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp8_smp")) }}</td>
                   </tr>
                   <tr>
                     <td>9</td>
                     <td>Penyeraha Dokumen dari PP ke KPA</td>
                     <td>{{ Form::text('thp9_dari',null,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp9_dari")) }}</td>
                     <td>{{ Form::text('thp9_smp',null,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp9_smp")) }}</td>
                   </tr>
                   <tr>
                     <td>10</td>
                     <td>Surat Penunjukan Penyedia Barang / Jasa (SPPBJ)</td>
                     <td>{{ Form::text('thp10_dari',null,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp10_dari")) }}</td>
                     <td>{{ Form::text('thp10_smp',null,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp10_smp")) }}</td>
                   </tr>
                   <tr>
                     <td>11</td>
                     <td>SPK</td>
                     <td>{{ Form::text('thp11_dari',null,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp11_dari")) }}</td>
                     <td>{{ Form::text('thp11_smp',null,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp11_smp")) }}</td>
                   </tr>
                   </td>
                     <td colspan="4">
                        <input type="hidden" name="page" value="{{ $data->page }}"> 
                        {{ Form::submit('Simpan Jadwal & Lanjutkan kirim email',array('class'=>'btn btn-success')) }}
                        <a href="{{ URL::to("admin/pengadaan/pilih/".$data->id) }}" class="btn btn-primary" >Lewati & Lanjutkan Kirim email <i class="fa fa-chevron-right" style="margin-left:6px;font-size:11px;"></i></a>
                     </td>
                   </tr>
                 </tbody>
                 @else
                 <tbody>
                   <tr>
                     <td>1</td>
                     <td>Surat perintah Pengadaan Langsung disertai HPS, dan Dok. Teknis</td>
                     <td>{{ Form::text('thp1_dari',$data->thp1_dari,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp1_dari")) }}</td>
                     <td>{{ Form::text('thp1_smp',$data->thp1_smp,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp1_smp")) }}</td>
                   </tr>
                    <tr>
                     <td>2</td>
                     <td>Undangan Pengadaan Langsung disertai dokumen pemilihan penyedia Barang / Jasa</td>
                     <td>{{ Form::text('thp2_dari',$data->thp2_dari,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp2_dari")) }}</td>
                     <td>{{ Form::text('thp2_smp',$data->thp2_smp,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp2_smp")) }}</td>
                   </tr>
                    <tr>
                     <td>3</td>
                     <td>Pemasukan Dokumen Penawaran</td>
                     <td>{{ Form::text('thp3_dari',$data->thp3_dari,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp3_dari")) }}</td>
                     <td>{{ Form::text('thp3_smp',$data->thp3_smp,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp3_smp")) }}</td>
                   </tr>
                    <tr>
                     <td>4</td>
                     <td>Pembukaan Penawaran, Evaluasi Penawaran, Berita Acara Ev.Penawaran</td>
                     <td>{{ Form::text('thp4_dari',$data->thp4_dari,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp4_dari")) }}</td>
                     <td>{{ Form::text('thp4_smp',$data->thp4_smp,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp4_smp")) }}</td>
                   </tr>
                    <tr>
                     <td>5</td>
                     <td>Klarifikasi Teknis</td>
                     <td>{{ Form::text('thp5_dari',$data->thp5_dari,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp5_dari")) }}</td>
                     <td>{{ Form::text('thp5_smp',$data->thp5_smp,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp5_smp")) }}</td>
                   </tr>
                    <tr>
                     <td>6</td>
                     <td>Negosiasi Harga dan Biaya</td>
                     <td>{{ Form::text('thp6_dari',$data->thp6_dari,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp6_dari")) }}</td>
                     <td>{{ Form::text('thp6_smp',$data->thp6_smp,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp6_smp")) }}</td>
                   </tr>
                    <tr>
                     <td>7</td>
                     <td>Berita Acara Hasil Pengadaan Langsung</td>
                     <td>{{ Form::text('thp7_dari',$data->thp7_dari,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp7_dari")) }}</td>
                     <td>{{ Form::text('thp7_smp',$data->thp7_smp,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp7_smp")) }}</td>
                   </tr>
                   <tr>
                     <td>8</td>
                     <td>Penetapan Penyedia Barang</td>
                     <td>{{ Form::text('thp8_dari',$data->thp8_dari,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp8_dari")) }}</td>
                     <td>{{ Form::text('thp8_smp',$data->thp8_smp,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp8_smp")) }}</td>
                   </tr>
                   <tr>
                     <td>9</td>
                     <td>Penyeraha Dokumen dari PP ke KPA</td>
                     <td>{{ Form::text('thp9_dari',$data->thp9_dari,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp9_dari")) }}</td>
                     <td>{{ Form::text('thp9_smp',$data->thp9_smp,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp9_smp")) }}</td>
                   </tr>
                   <tr>
                     <td>10</td>
                     <td>Surat Penunjukan Penyedia Barang / Jasa (SPPBJ)</td>
                     <td>{{ Form::text('thp10_dari',$data->thp10_dari,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp10_dari")) }}</td>
                     <td>{{ Form::text('thp10_smp',$data->thp10_smp,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp10_smp")) }}</td>
                   </tr>
                   <tr>
                     <td>11</td>
                     <td>SPK</td>
                     <td>{{ Form::text('thp11_dari',$data->thp11_dari,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp11_dari")) }}</td>
                     <td>{{ Form::text('thp11_smp',$data->thp11_smp,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"thp11_smp")) }}</td>
                   </tr>
                   <tr>
                     <td colspan="4">
                      <input type="hidden" name="page" value="{{ $data->page }}"> 
                        {{ Form::submit('Update data Jadwal',array('class'=>'btn btn-success')) }}
                        <a href="{{ URL::to('admin/pengadaan/') }}" class="btn btn-primary" ><i class="fa fa-remove" style="margin-left:6px;font-size:11px;"></i> Batal Update </a>
                     </td>
                   </tr>
                 </tbody>
                 @endif
               </table> 
               </form>   
           </div>
        </div>
      </div>
   </div>              
</div>


@section('js')
    {{HTML::style('asset/themes/css/datepicker3.css')}}
    {{HTML::script('asset/themes/js/bootstrap-datepicker.js')}}
    {{HTML::script('asset/themes/js/locales/bootstrap-datepicker.id.js')}}
    {{HTML::script('asset/themes/js/sb-admin-2.js')}}
    {{HTML::script('asset/themes/js/jquery.validate.js')}}
   <script type="text/javascript">
      $(function() {
        var validator = $("#form").validate({
           rules:{
              "thp1_dari":{required:true},
              "thp1_smp":{required:true},
              "thp2_dari":{required:true},
              "thp2_smp":{required:true},
              "thp3_dari":{required:true},
              "thp3_smp":{required:true},
              "thp4_dari":{required:true},
              "thp4_smp":{required:true},
              "thp5_dari":{required:true},
              "thp5_smp":{required:true},
              "thp6_dari":{required:true},
              "thp6_smp":{required:true},
              "thp7_dari":{required:true},
              "thp7_smp":{required:true},
              "thp8_dari":{required:true},
              "thp8_smp":{required:true},
              "thp9_dari":{required:true},
              "thp9_smp":{required:true},
              "thp10_dari":{required:true},
              "thp10_smp":{required:true},
              "thp11_dari":{required:true},
              "thp11_smp":{required:true}
           },
           messages:{
              "thp1_dari":'Tanggal harus diisi',
              "thp1_smp":'Tanggal harus diisi',
              "thp2_dari":'Tanggal harus diisi',
              "thp2_smp":'Tanggal harus diisi',
              "thp3_dari":'Tanggal harus diisi',
              "thp3_smp":'Tanggal harus diisi',
              "thp4_dari":'Tanggal harus diisi',
              "thp4_smp":'Tanggal harus diisi',
              "thp5_dari":'Tanggal harus diisi',
              "thp5_smp":'Tanggal harus diisi',
              "thp6_dari":'Tanggal harus diisi',
              "thp6_smp":'Tanggal harus diisi',
              "thp7_dari":'Tanggal harus diisi',
              "thp7_smp":'Tanggal harus diisi',
              "thp8_dari":'Tanggal harus diisi',
              "thp8_smp":'Tanggal harus diisi',
              "thp9_dari":'Tanggal harus diisi',
              "thp9_smp":'Tanggal harus diisi',
              "thp10_dari":'Tanggal harus diisi',
              "thp10_smp":'Tanggal harus diisi',
              "thp11_dari":'Tanggal harus diisi',
              "thp11_smp":'Tanggal harus diisi'
           }
        }); 

        datePicker("#thp1_dari");
        datePicker("#thp1_smp");
        datePicker("#thp2_dari");
        datePicker("#thp2_smp");
        datePicker("#thp3_dari");
        datePicker("#thp3_smp");
        datePicker("#thp4_dari");
        datePicker("#thp4_smp");
        datePicker("#thp5_dari");
        datePicker("#thp5_smp");
        datePicker("#thp6_dari");
        datePicker("#thp6_smp");
        datePicker("#thp7_dari");
        datePicker("#thp7_smp");
        datePicker("#thp8_dari");
        datePicker("#thp8_smp");
        datePicker("#thp9_dari");
        datePicker("#thp9_smp");
        datePicker("#thp10_dari");
        datePicker("#thp10_smp");
        datePicker("#thp11_dari");
        datePicker("#thp11_smp");

        function datePicker(id){
         $(id).datepicker({
            format:'d MM yyyy',
            language:'id'
         });
        }
 
     });
   </script>
@stop