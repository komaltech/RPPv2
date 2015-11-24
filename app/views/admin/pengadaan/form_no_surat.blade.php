
<div class="row">
  <div class="col-lg-12">
      <h3 class="page-header"><i class="fa fa-bookmark" ></i> Form Isian No Surat Pengadaan</h3>
  </div>              
</div>
<div class="row">
   <div class="col-lg-12" >

      <div class="alert alert-info" >
        <h4>Judul Pengadaan :</h4>
        <p style="font-size:16px;">{{ isset($data->desk_kegiatan)?$data->desk_kegiatan:'' }}</p>
        
      </div>
      <div class="alert alert-warning alert-dismissable" style="font-size:16px;display:none;" id="success"></div>
        <div class="alert alert-danger alert-dismissable" style="font-size:16px;display:none;" id="error"></div>
      <div class="panel panel-default">
        <div class="panel-heading">
           <div class="alert alert-warning" >
              <strong>Keterangan :</strong><br>
              <p>
                Form ini dipergunakan untuk menginputkan no surat atau berita acara<br>
                Hal - hal yang perlu diperhatikan dalam mengatur jadwal :<br>
                <i>- Harap mengisi seluruh no surat pada semua tahapan pengadaan, jangan biarkan ada no surat yang kosong </i>
                
              </p>
            </div>
        </div>
        <div class="panel-body">
        <div class="col-md-10" >
           <div class="table-responsive">
              <form method="post"  action="{{ URL::to('admin/pengadaan/no_surat/simpan/'.$data->id) }}" name="form1" id="form1">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <table  cellpadding="0" cellspacing="0" border="0" class="table table-striped" >
                  <thead>
                    <tr>
                       <th width="3%" >No</th>
                       <th width="43%" >Jenis Surat / Berita Acara</th>
                       <th width="55%">Nomor Surat / Berita Acara</th>
                              
                    </tr>
                 </thead>
                 <tbody>
                    <tr>
                     <td>1</td>
                     <td>Dokumen Pengadaan Langsung</td>
                     <td>{{ Form::text('srt1',empty($data->no_srt1)? null : $data->no_srt1 ,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"srt1")) }}</td>
                    </tr>
                     <tr>
                     <td>2</td>
                     <td>Pengadaan Langsung</td>
                     <td>{{ Form::text('srt2',empty($data->no_srt2)? null : $data->no_srt2 ,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"srt2")) }}</td>
                    </tr>
                     <tr>
                     <td>3</td>
                     <td>Standar Dokumen Pengadaan</td>
                     <td>{{ Form::text('srt3',empty($data->no_srt3)? null : $data->no_srt3 ,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"srt3")) }}</td>
                    </tr>
                     <tr>
                     <td>4</td>
                     <td>Pengadaan Barang dan jasa</td>
                     <td>{{ Form::text('srt4',empty($data->no_srt4)? null : $data->no_srt4 ,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"srt4")) }}</td>
                    </tr>
                     <tr>
                     <td>5</td>
                     <td>Penawaran Pengadaan</td>
                     <td>{{ Form::text('srt5',empty($data->no_srt5)? null : $data->no_srt5 ,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"srt5")) }}</td>
                    </tr>
                     <tr>
                     <td>6</td>
                     <td>Berita Acara Evaluasi Penawaran</td>
                     <td>{{ Form::text('srt6',empty($data->no_srt6)? null : $data->no_srt6 ,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"srt6")) }}</td>
                    </tr>
                     <tr>
                     <td>7</td>
                     <td>Berita Acara Klarifikasi</td>
                     <td>{{ Form::text('srt7',empty($data->no_srt7)? null : $data->no_srt7 ,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"srt7")) }}</td>
                    </tr>
                     <tr>
                     <td>8</td>
                     <td>Berita Acara Negosiasi</td>
                     <td>{{ Form::text('srt8',empty($data->no_srt8)? null : $data->no_srt8 ,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"srt8")) }}</td>
                    </tr>
                     <tr>
                     <td>9</td>
                     <td>Berita Acara Hasil Pengadaan Langsung</td>
                     <td>{{ Form::text('srt9',empty($data->no_srt9)? null : $data->no_srt9 ,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"srt9")) }}</td>
                    </tr>
                     <tr>
                     <td>10</td>
                     <td>Penetapan Penyedia Barang</td>
                     <td>{{ Form::text('srt10',empty($data->no_srt10)? null : $data->no_srt10 ,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"srt10")) }}</td>
                    </tr>
                     <tr>
                     <td>11</td>
                     <td>Berita Acara Penyerahan Dok Pengadaan</td>
                     <td>{{ Form::text('srt11',empty($data->no_srt11)? null : $data->no_srt11 ,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"srt11")) }}</td>
                    </tr>
                     <tr>
                     <td>12</td>
                     <td>SPPB</td>
                     <td>{{ Form::text('srt12',empty($data->no_srt12)? null : $data->no_srt12 ,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"srt12")) }}</td>
                    </tr>
                     <tr>
                     <td>13</td>
                     <td>Surat Pesanan</td>
                     <td>{{ Form::text('srt13',empty($data->no_srt13)? null : $data->no_srt13 ,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"srt13")) }}</td>
                    </tr>
                    <tr>
                     <td>14</td>
                     <td>Surat Perintah Kerja</td>
                     <td>{{ Form::text('srt14',empty($data->no_srt14)? null : $data->no_srt14 ,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"srt14")) }}</td>
                    </tr>
                    <tr>
                     <td>15</td>
                     <td>Nomor SK Pengguna Anggaran</td>
                     <td>{{ Form::text('srt15',empty($data->no_srt15)? null : $data->no_srt15 ,array('class'=>"form-control",'id'=>"hrg_satuan","style"=>"text-align:right","id"=>"srt15")) }}</td>
                    </tr>
                    <tr>
                      <td colspan="3" >
                        {{ Form::submit("Simpan data",array("class"=>"btn btn-primary","id"=>"simpan")) }}
                        <a href="{{ URL::to("/admin/pengadaan/") }}" class="btn btn-info">Kembali ke Daftar Pengadaan</a>
                      </td>
                    </tr>
                    
                  </tbody>
               </table> 
               </form>   
           </div>
           </div>
        </div>
      </div>
   </div>              
</div>


@section('js')
   
    {{HTML::script('asset/themes/js/sb-admin-2.js')}}
    {{HTML::script('asset/themes/js/jquery.validate.js')}}
   <script type="text/javascript">
      $(function() {
        setInterval(function(){
               $('#error').slideUp('slow');
         },5000);
         setInterval(function(){
               $('#success').slideUp('slow');
         },5000);

         $("#form1").submit(function(event){
            event.preventDefault();
            $("#simpan").val("Menyimpan jadwal...");
            $("#form1 :input").prop("readonly",true);
             
            var  data = $("#form1").serialize();
            var url = $("#form1").attr("action");

            
            $.post(url,data,function(msg){
              $("#simpan").val("Menyimpan Data...");
              $("#form1 :input").prop("readonly",false);            

              if(msg =="ok"){
                $("#error").hide();
                $("#success").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-timer" style="margin-right:10px;"></i> Data berhasil disimpan');
                $("#success").slideDown(function(){
                    window.location = "{{ URL::to('admin/pengadaan/cetak/'.$data->id) }}";
                });
                
              }else{
                $("#success").hide();
                $("#error").html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-timer" style="margin-right:10px;"></i> Data gagal disimpan');
                $("#error").slideDown();
               }
            });

         });

      
     });
   </script>
@stop