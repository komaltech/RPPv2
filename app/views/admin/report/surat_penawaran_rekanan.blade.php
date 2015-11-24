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
  .wrapper{width: 960px;display:block;margin:50px auto ;}
  .table-report tr td{padding:4px;font-size: 15px;}
  </style>
</head>
<body style="font-family:Helvetica;color:black;padding-left:50px;">
    <center><img src="{{ 'asset/img/rekanan/'.$data->id_rkn.'/'.$data->file_kop }}" width="700px" height="150px" ></center>
    <br>
    <br>
      <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-report">
        <tr>
          <td width="15%">Nomor</td>
          <td width="1%">:</td>
          <td width="50%"></td>
          <td width="34%">Pasuruan, {{ $data->tanggal }}</td>
        </tr>
        <tr>
          <td>Lampiran</td>
          <td>:</td>
          <td colspan="2">1 berkas</td>
        </tr>
      </table>   
      <br>
      <br>
      <p style="line-height:20px;">
        Kepada Yth.<br>
        Pejabat Pengadaan Barang / Jasa<br>
        Skretariat Daerah Kabupaten Pasuruan<br>
        Di<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PASURUAN
      </p>
      <br>
      <br>
      <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-report">
        <tr>
          <td width="10%" valign="top">Perihal</td>
          <td width="1%" valign="top">:</td>
          <td width="89%" valign="top" align="justify">{{ $data->judul }}</td>
        </tr>
      </table>
      <br>
      <p align="justify">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Sehubungan dengan undangan Pengadaan Langsung, dengan
        ini kami mengajukan penawaran untuk pekerjaan <b>{{ $data->judul }}</b> Sebesar <b>Rp. {{ number_format($data->total_penawaran,0,',','.') }}
        <i>({{ $data->huruf }})</i></b><br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Penawaran ini sudah memperhatikan ketentuan dan persyaratan yang tercantum dalam Dokumen Pengadaan Langsung untuk melaksanakan pekerjaan tersebut di atas.<br>
        Kami akan melaksanakan pekerjaan tersebut dengan jangka waktu pelaksaan pekerjaan selama 30 (tiga puluh) hari.<br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Penawaran ini berlaku selama 30(Tiga Puluh) hari kalender sejak tanggal surat penawaran ini.<br><br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Surat Penawaran beserta lampirannya kami sampaikan sebanyak 1 (satu) rangkap dokumen asli.<br><br>
        Dengan disampaikannya Surat Penawaran ini, maka kami menyatakan sanggup dan akan tuunduk pada semua ketentuan yang tercantum dalam Dokumen Pengadaan.
      </p>
      <br>
      <br>
      <br>
      <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-report">
        <tr>
          <td width="70%" valign="top"></td>
          <td width="30%" valign="top">
             {{ $data->nama_rkn }}
              <br>
              <br>
              <br>
              <br>
              <p style="text-decoration:underline;margin-bottom:0px;">{{ $data->pengurus }}</p>
              {{ $data->jabatan }}
          </td>
        </tr>
      </table>
</body>
</html>