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
        <td style="text-decoration:underline;" align="center">BERITA ACARA NEGOSIASI</td>
      </tr>
      <tr>
        <td align="center">Nomor : {{ $data->nomor_negosiasi }}</td>
      </tr>
   </table> 
    <br>
    <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-report">
      <tr>
        <td width="20%" >PEKERJAAN</td>
        <td width="1%">:</td>
        <td width="74%">{{ $data->judul }}</td>
      </tr>      
       <tr>
        <td >Sumber dana</td>
        <td >:</td>
        <td>{{ $data->sumber }}</td>
      </tr>
       <tr>
        <td >Tahun Anggaran</td>
        <td >:</td>
        <td >{{ $data->tahun_anggaran }}</td>
      </tr>
    </table>  
    <p style="line-height:25px;text-align:justify" >
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada hari ini <strong style="font-style:italic" >{{ $data->hari }}</strong> tanggal <strong style="font-style:italic" >{{ $data->tanggal_huruf }}</strong> Bulan <strong style="font-style:italic" >{{ $data->bulan }}</strong> Tahun <strong style="font-style:italic" >{{ $data->tahun }}</strong>, dengan mengambil
      tempat di Kantor Pemerintah Kabupaten pasuruan, kami yang bertanda tangan di bawah ini.<br>
      <ol type="1" class="bullet">
        <li>
          Pejabat Pengadaan barang / jasa Sekretariat daerah Kabupaten Pasuruan berdasarkan Keputusan Pengguna Anggaran Nomor :{{ $data->nomor_pengguna }}
          selanjutnya disebut PIHAK KESATU
        </li>
        <li>
          <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-report">
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
      </p>
      <p style="line-height:25px;text-align:justify;" >
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       Berdasarkan undangan Pengadaan Langsung dari Pejabat Pengadaan Barang / Jasa Sekretariat daerah kabupaten pasuruan perihal undangan pengadaan langsung 
       <b>{{ $data->judul }}</b>sumber dana {{ $data->sumber }} Tahun Anggaran {{ $data->tahun_anggaran }}  dan pengajuan surat penawaran {{ $data->rekanan }} {{$data->alamat_rkn}}, maka
       setelah Pihak Kesatu mengadakan Evaluasi Penawaran dari Pihak Kedua dan mengadakan pertemuan Negosiasi Teknis, Harga dan Biaya.<br>
       Dalam pertemuan tesebut di dapat hal - hal sebagai berikut :
       <ol type="1" class="bullet">
         <li>
           Pihak Pertama menyatakan keberatan atas penawaran pihak kedua terhadap pekerjaan <strong style="margin-top:-50px;">{{ $data->judul }}</strong> sebesar <strong>Rp.{{ number_format($data->hps_rkn,0,',','.') }}
           <i>({{ $data->hps_rkn_huruf }})</i></strong>
         </li>
         <li>
           Setelah diadakan pembahasan bersama, Pihak Kesatu dan Pihak kedua telah menyetujui bahwa harga untuk pekerjaan tersebut adalah sebesar <b><i>Rp. {{ $data->hps_deal }} ({{ $data->hps_deal_huruf }})</i></b>
           sudah termasuk pajak, biaya pengiriman dan biaya pemasangan, kedua belah pihak juga sepakat untuk melakukan penyesuaian spesifikasi teknis terlampir.
         </li>
         <li>
            Pihak Kedua telah menyatakan kesanggupannya untuk melaksanakan pekerjaan tersebut dengan harga dan spesifikasi sebagaimana berita Acara Negosiasi ini.
        </li>
       </ol>
       </p>
       <p style="line-height:25px;text-align:justify; " >
       Adapun persyaratan teknis yang berlaku dan Rincian harga tersebut sudah termasuk pajak dan pengiriman sampai lokasi yang ditentukan.
     
    </p>
    <br>

    <table cellpadding="0" cellspacing="0" border="0" width="100%" >
      <tr>
        <td width="50%" align="center" style="line-height:25px;"><br>
          PIHAK KEDUA<br>
          <p style="text-transform:uppercase;margin-top:-10px;" >{{ $data->rekanan }}</p>
          <br>
          <br>
          <p style="text-decoration:underline;margin-bottom:-2px;text-transform:uppercase;">{{ $data->pengurus }}</p>
          {{ $data->jabatan }}
        </td>
        <td width="50%" align="center" style="line-height:20px;">
          PIHAK KESATU<br>
          PEJABAT PENGADAAN BARANG / JASA <br>
          SETDA KABUPATEN PASURUAN
          <br>
          <br>
          <br>
          
          <p style="text-decoration:underline;margin-bottom:-2px;text-transform:uppercases;">{{ $data->pegawai }}</p>
          NIP. {{ $data->nip }}
        </td>
      </tr>  
    </table>
</body>
</html>