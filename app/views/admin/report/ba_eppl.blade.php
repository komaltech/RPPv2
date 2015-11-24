<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <style type="text/css">
  .kop{
    display: block;
    padding:10px;
    line-height: 25px;
    border-bottom: 3px solid black;
    text-align: center;
  }
  .bullet li{margin-bottom:5px;vertical-align: top;line-height:23px;text-align: justify;}
  .table-report{margin:auto;}
  .wrapper{width: 960px;display:block;margin:50px auto ;}
  .table-report tr td{padding:4px;font-size: 15px;vertical-align: top;text-align: justify;}
  </style>
</head>
<body style="font-family:Times New Roman;color:black;font-size:15px;padding-left:40px;">
   <h3 class="kop">BERITA ACARA EVALUASI PENAWARAN PENGADAAN LANGSUNG<br>KEGIATAN APBD KABUPATEN PASURUAN</h3>
    <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-report" style="font-weight:bold">
      <tr>
        <td width="15%" >PEKERJAAN</td>
        <td width="1">:</td>
        <td width="84%">{{ $data->judul }}</td>
      </tr>      
    </table>  
    <br>
    <br>
    <table cellpadding="0" cellspacing="0" border="0" width="60%" class="table-report" style="font-weight:bold">
      <tr>
        <td width="25%">Nomor</td>
        <td width="1%">:</td>
        <td width="74%">{{ $data->nomor }}</td>
      </tr>
      <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td>{{ $data->tanggal }}</td>
      </tr>
    </table>
    <p style="line-height:23px;text-align:justify;">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada hari ini <strong style="text-transform:capitalize;font-style:italic">{{ $data->hari }}</strong> tanggal <strong style="text-transform:capitalize;font-style:italic">{{ $data->tgl_huruf }}</strong> Bulan <strong style="text-transform:capitalize;font-style:italic">{{ $data->bulan }}</strong> tahun
     <strong style="text-transform:capitalize;font-style:italic">{{ $data->tahun }}</strong> yang bertanda tangan dibawah ini Pejabat Pengadaan Barang / Jasa Sekretariat Daerah Kabupaten Pasuruan. Berdasarkan Keputusan Sekrtearis Daerah Kabupaten
      Pasuruan Nomor 027/019g/424.031/2014, tanggal 28 Januari 2014 telah mengadaakan evaluasi terhadap penawaran terlampir seperti dibawah ini:
      <ol type="A" class="bullet">
        <li>Uraian Evaluasi mengenai :<br>
          <ol type="1" >
            <li>Penelitian Administrasi</li>
            <li>Penelitian Teknis</li>
            <li>Penelitian Terhadap harga Penawaran</li>
          </ol>
        </li>
        <li>Kesimpulan sebagaimana terlampir</li>
        <li>
           Berdasarkan hasil evaluasi tersebut diatas, Pejabat Pengadaan Baran / Jasa Sekretariat Daerah Kabupaten Pasuruan, berkesimpulan memutuskan
            untuk mengusulkan Penyedia Baran / Jasa tersebut dibawah ini sebagai Penyedia barang/Jasa {{ $data->judul }}, adalah:
            <br>
            <br>
            
          <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-report" >
            <tr>
              <td width="20%" >Nama Perusahaan</td>
              <td width="1">:</td>
              <td width="79%">{{ $data->rekanan }}</td>
            </tr>  
            <tr>
              <td >Alamat</td>
              <td >:</td>
              <td >{{ $data->alamat_rkn }}</td>
            </tr>
            <tr>
              <td >Harga Penawaran</td>
              <td >:</td>
              <td >Rp. {{ number_format($data->total_penawaran,0,',','.') }} ({{ $data->huruf }})</td>
            </tr>
          </table>  
        </li>
      </ol>
      Demikian Berita Acara ini dibuat untuk dipergunakan sebagaimana mestinya.
    </p>
    <br>
    <br>
    <br>
    <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-report" >
      <tr>
        <td width="50%" ></td>
        <td width="50%">
          PEJABAT PENGADAAN BARANG / JASA <br>
          SETDA KABUPATEN PASURUAN
          <br>
          <br>
          <br>
          <br>
          <p style="text-decoration:underline;margin-bottom:-2px;">{{ $data->pegawai }}</p>
          NIP. {{ $data->nip }}
        </td>
      </tr>  
    </table>
</body>
</html>