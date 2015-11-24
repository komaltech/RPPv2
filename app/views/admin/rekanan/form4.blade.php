<div class="row">
   <div class="col-lg-12" >
      <div class="alert alert-info col-sm-7" style="margin-top:35px;" id="success">
        <h3 ><i class="fa fa-check" style="margin-right:6px;" ></i> Info : Form Input Kualifikasi Rekanan</h3>
        <p>
          <ul>
            <li>Form Kualifikasi Rekanan <strong>{{isset($data->rekanan)?$data->rekanan:''}}</strong> Dengan judul Pengadaan <strong>{{isset($data->judul)?$data->judul:''}}</strong> berhasil dikirim</li>
            <li>Diharapkan segera menghubungi pihak Pejabat Pengadaan agar dilihat dan di proses lebih lanjut</li>
          </ul>
        </p><br>
        <p style="text-align:right;">
          <a href="{{ URL::to('admin/rekanan/beranda') }}" class="btn btn-primary"><i class="fa fa-chevron-left" style="margin-right:6px;font-size:11px;"></i> Kembali ke BERANDA</a>
        </p>
      </div>
   </div>        
</div>


