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
<body style="font-family:Helvetica;color:black">
  <b>G. Data Pengalaman Perusahaan</b><br><br>
  <table cellpadding="0" cellspacing="0" border="1" class="table-report" width="100%">
     <tr>
       <th width="" rowspan="2">No</th>
       <th width="" rowspan="2">Nama Paket Pemasok Barang</th>
       <th width="" rowspan="2">Bidang / sub bidang perkerjaan</th>
       <th width="" rowspan="2">Lokasi</th>
       <th width="" colspan="2">Pemberi Tugas / Pengguna Jasa</th>
       <th width="" colspan="2">Kontrak</th>
       <th width="" colspan="2">Tanggal Selesai</th>
     </tr>
     <tr>
       <th>Nama</th>
       <th>Alamat / Telp</th>
       <th>Nomor / Tanggal</th>
       <th>Nilai</th>
       <th>Kontrak</th>
       <th>Ba Serah Terima (P1 dan P2)</th>
       
     </tr>
     <tr>
       <td align="center" width="2%">1</td>
       <td align="center" width="15%">1</td>
       <td align="center"  width="10%">1</td>
       <td align="center" width="8%">1</td>
       <td align="center" width="10%">1</td>
       <td align="center" width="10%">1</td>
       <td align="center" width="10%">1</td>
       <td align="center" width="10%">1</td>
       <td align="center" width="10%">1</td>
       <td align="center" width="10%">1</td>
     </tr>
     <?php $i=0; ?>
     @foreach($data->pengadaan as $row)
     <tr>
       <td align="center">{{ $i = $i+1 }}</td>
       <td>{{ $row->desk_kegiatan }}</td>
       <td>{{ $row->nama_rkn }}</td>
       <td>Pasuruan</td>
       <td>{{ $row->lokasi_kegiatan }}</td>
       <td>Pasuruan</td>
       <td>{{ $row->no_srt1 }}</td>
       <td align="right">Rp. {{ number_format($row->hps_deal,0,',','.') }}</td>
       <td></td>
       <td></td>
     </tr>
     @endforeach
  </table>
  <br>
  <br>
  <br>
  <table cellpadding="0" cellspacing="0" border="0" class="table-report" width="100%">
    <tr>
      <td width="70%"></td>
      <td width="30%" align="left">
        Pasuruan, {{ $data->tanggal }}<br>
        {{ $data->nama_rkn }}
        <br>
        <br>
        <br>
        <br>
        <p style="text-decoration:underline;margin-bottom:0px;">{{ $data->pemilik }}</p>
        {{ $data->jabatan }}
      </td>
    </tr>
  </table>
</body>
</html>