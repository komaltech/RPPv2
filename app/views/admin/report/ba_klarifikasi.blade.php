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
  .table-report tr td{padding:4px;font-size: 15px;vertical-align: top;text-align: justify;line-height:25px;}
  </style>
</head>
<body style="font-family:Times New Roman;color:black;font-size:15px;padding-left:40px;">
   <h3 class="kop">PEJABAT PENGADAAN BARANG / JASA <br>SEKRETARIAT DAERAH KABUATEN PASURUAN</h3>
   <br>
   <table cellpadding="0" cellspacing="0" border="0" width="40%" style="margin:auto">
      <tr>
        <td style="text-decoration:underline;" align="center">BERITA ACARA KLARIFIKASI</td>
      </tr>
      <tr>
        <td align="center">Nomor : {{ $data->nomor_klarifikasi }}</td>
      </tr>
   </table> 
    <br>
    <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-report">
      <tr>
        <td width="15%" >PEKERJAAN</td>
        <td width="1">:</td>
        <td width="84%">{{ $data->judul }}</td>
      </tr>      
    </table>  
    <br>
    <p style="line-height:25px;text-align:justify" >
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada hari ini <strong style="font-style:italic";text-transform:uppercase;>{{ $data->hari }}</strong> tanggal <strong style="font-style:italic";text-transform:uppercase;>{{ $data->tanggal_huruf }}</strong> Bulan <strong style="font-style:italic";text-transform:capitalize;>{{ $data->bulan }} {{ $data->tahun }}</strong>, dengan mengambil
      tempat di Kantor Pemerintah Kabupaten pasuruan, kami yang bertanda tangan di bawah ini.<br>
      <ol type="1" class="bullet">
        <li>
          Pejabat Pengadaan barang / jasa Sekretariat daerah Kabupaten Pasuruan berdasarkan Keputusan Pengguna Anggaran Nomor :{{ $data->nomor_pengguna }}
          selanjutnya disebut PIHAK KESATU
        </li>
        <li>
          <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-report" style="margin-top:-4px;">
            <tr>
              <td width="15%" >Nama</td>
              <td width="1">:</td>
              <td width="84%">{{ $data->pengurus }}</td>
            </tr>   
            <tr>
              <td >Jabatan</td>
              <td >:</td>
              <td >{{ $data->jabatan }} {{ $data->rekanan }}</td>
            </tr>
            <tr>
              <td >Alamat</td>
              <td >:</td>
              <td >{{ $data->alamat_rkn }}</td>
            </tr>         
          </table>  
        </li>
      </ol>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berdasarkan hasil Evaluasi Penawaran tanggal {{ $data->tanggal }} Nomor : {{ $data->nomor_klarifikasi }},
       maka bersama ini diadakan klarifikasi dan kesanggupan melaksanakan pekerjaan sesuai dengan ketentuan dalam RKS dan Adendum Penjelasan dengan kesimpulan pernyataan dari PIHAK KEDUA sebagi berikut:
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       Adapun penilain kualifikasii perusahaan terhadap dokumen asli adalah sebagai berikut:
       <ol class="bullet" type="1">
         <li>SIUP Asli.</li>
         <li>TDP Asli.</li>
         <li>NPWP dan PKP Asli.</li>
         <li>Akte Pendirian Perusahaan Asli.</li>
         <li>Bukti Laporan Pajak Tahunan dan 3 bulan terakhir Asli.</li>
         <li>Surat Pengalaman Kerja Asli.</li>
       </ol>
       Demikian Berita Acara ini dibuat untuk dipergunakan sebagaimana mestinya.  
    </p>
    <br>
    <br>
    <table cellpadding="0" cellspacing="0" border="0" width="100%" >
      <tr>
        <td width="50%" align="center" style="line-height:25px;"><br>
          PIHAK KEDUA<br>
          <p style="text-transform:uppercase;margin-top:-10px;" >{{ $data->rekanan }}</p>
          <br>
          <br>
          <br>
          <p style="text-decoration:underline;margin-bottom:-2px;text-trasnform:uppercase;">{{ $data->pengurus }}</p>
          {{ $data->jabatan }}
        </td>
        <td width="50%" align="center" style="line-height:25px;">
          PIHAK KESATU<br>
          PEJABAT PENGADAAN BARANG / JASA <br>
          SETDA KABUPATEN PASURUAN
          <br>
          <br>
          <br>
          
          <p style="text-decoration:underline;margin-bottom:-2px;text-transform:uppercase;">{{ $data->pegawai }}</p>
          NIP {{ $data->nip }}
        </td>
      </tr>  
    </table>
</body>
</html>