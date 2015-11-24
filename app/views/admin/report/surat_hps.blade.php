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
  .table-report{margin:auto;}
  
  .table-report tr td{padding:4px;font-size: 15px;vertical-align:top;}
  .table-report tr th{padding:8px;font-size: 15px;}
  </style>
</head>
<body style="font-family:Arial;color:black">
  <h4 class="kop"><i>OWNER ESTIMATE (OE)</i><br>HARGA PERKIRAAN SENDIRI (HPS)</h4>
  <table cellpadding="0" cellspacing="0" border="0" class="table-report" width="90%">
     <tr>
       <td width="15%">Pekerjaan</td>
       <td width="1%">:</td> 
       <td width="84%">{{ $data->deskripsi }}</td>
     </tr>
     <tr>
       <td>Propinsi</td>
       <td>:</td>
       <td>Jawa Timur</td>
     </tr>
     <tr>
       <td>Kabupaten</td>
       <td>:</td>
       <td>Pasuruan</td>
     </tr>
     <tr>
       <td>Unit Kerja</td>
       <td>:</td>
       <td>{{ $data->departement  }}</td>
     </tr>
  </table>
  <br>
  <br>

  <table cellpadding="0" cellspacing="0" border="1" class="table-report" width="90%">
    <tr>
      <th width="10%">No</th>
      <th width="40%">Uraian Pekerjaan</th>
      <th width="15%">Kuantitas</th>
      <th width="20%">Harga Satuan</th>
      <th width="25%">Total Harga</th>
    </tr>
     <?php $no =0;  ?>
     @foreach($data->detil as $row)
     
    <tr>
      <td align="center">{{ $no = $no +1 }}</td>
      <td > {{ $row->nama_brg }}</td>
      <td align="center"> {{ $row->kebutuhan }}</td>
      <td align="right"> {{ $row->hrg_satuan_hps }}</td>
      <td align="right"> {{ $row->total_hrg_hps }}</td>
    </tr>
    @endforeach
    <tr>
      <td colspan="4">&nbsp;</td>
      <td align="right">{{ $data->hps }}</td>
      
    </tr>
    <tr>
      <td colspan="5" style="text-transform:capitalize"><i><b>Terbilang  : {{ $data->huruf }} Rupiah</b></i></td>
    </tr>
    </table>
    <br>
    <br>
    
    <table cellpadding="0" cellspacing="0" border="0" class="table-report" width="90%">
     <tr>
      <td colspan="2" ><i><b>Ket : Harga sudah termasuk Pajak dan Ongkos Kirim</b></i></td>
    </tr>
    <tr>
      <td colspan="2" >&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" >&nbsp;</td>
    </tr>
    <tr>
      <td width="60%" >&nbsp;</td>
      <td width="40%" align="left" style="line-height:20px;">
        Pasuruan, {{ $data->tanggal }}<br>
        Menetapkan / Mengesahkan<br>
        <b>Kuasa Pengguna Anggaran</b>
        <br>
        <br>
        <br>
        <br>
        <p style="margin-bottom:0px;font-weight:bold;text-decoration:underline;">{{ $data->pegawai }}</p>
        NIP. {{ $data->nik }}
      </td>
    </tr>
  </table>

</body>
</html>