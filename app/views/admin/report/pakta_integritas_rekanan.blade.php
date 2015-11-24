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
  .kop2{
    display: block;
    padding:10px;
    line-height: 25px;
    text-decoration: underline;
    text-align: center;
  }
  .wrapper{width: 960px;display:block;margin:50px auto ;}
  .table-report{margin:auto;}
  .table-report tr td{padding:4px;font-size: 15px;line-height:25px;}
  </style>
</head>
<body style="font-family:Arial; color:black">
  <h2 class="kop2">PAKTA INTEGRITAS</h2>
  
  <table cellpadding="0" cellspacing="0" border="0" width="85%" class="table-report">
    <tr>
      <td colspan="3"> Saya yang bertanda tangan di bawah ini : </td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td width="20%">Nama</td> 
      <td width="1%">:</td> 
      <td width="79%">{{ $data->nama_pengurus }}</td>
    </tr>
     <tr>
      <td >Nomor Identitas</td> 
      <td>:</td> 
      <td >{{ $data->nik }}</td>
    </tr>
     <tr>
      <td >Jabatan</td> 
      <td>:</td> 
      <td >{{ $data->jabatan }}</td>
    </tr>
     <tr>
      <td>Bertindak</td> 
      <td>:</td> 
      <td>{{ $data->nama_rekanan }}</td>
    </tr>
  </table>  
  <br>
  <br>
  <table cellpadding="0" cellspacing="0" border="0" width="85%" class="table-report">
    <tr>
      <td align="justify"> 
        Dalam rangka <br>
        {{ $data->desk_kegiatan }}, dengan ini menyatakan bahwa saya :<br>
        <ol type="1">
          <li>Tidak Akan melakukan praktek Korupsi, Kolusi dan Nepotisme (KKN).</li>
          <li>Akan melaporkan kepada APIP Kabupaten Pasuruan dan/atau LKPP apabila mengetahui ada indikasi KKN didalam proses pengadaan ini.</li>
          <li>Akan mengikuti proses pengadaan secara bersih transparan dan profesional untuk memberikan hasil kerja terbaik sesuai ketentuan peraturan perundan-undangan.</li>
          <li>Apabila saya melanggar hal - hal yang telah saya katakan dalam PAKTA INTEGRITAS ini, saya bersedia menerima sanksi administrasi, menerima sanksi pencantuman dalam Daftar Hitam, digugat secara perdata dan / atau dilaporkan secara pidana.</li>
        </ol>
      </td>
    </tr>
  </table>
   <br>
  <br>
  <table cellpadding="0" cellspacing="0" border="0" width="85%" class="table-report">
    <tr>
      <td align="justify"> 
       Pasuruan, {{ $data->tanggal }}<br>
       <b>{{ $data->nama_rekanan }}</b>
       <br>
       <br>
       <br>
       <br>
       <p style="text-decoration:underline;margin-bottom:0px;font-weight:bold;">{{ $data->nama_pengurus }}</p>
       {{ $data->jabatan }}
      </td>
    </tr>
  </table>

   
</body>
</html>