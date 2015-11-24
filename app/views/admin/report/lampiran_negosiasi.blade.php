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
    text-align: center;
  }
  .table-report{margin:auto;}
  
  .table-report tr td{padding:4px;font-size: 13px;vertical-align:top;}
  .table-report tr th{padding:8px;font-size: 14px;}
  </style>
</head>
<body style="font-family:Helvetica;color:black;font-size:14px;">
  <table cellpadding="1" cellspacing="0" border="0"  width="100%">
    <tr>
      <td width="59%" valign="top" align="right">Lampiran</td>
      <td width="1%" valign="top">:</td>
      <td width="40%" valign="top">
        Berita Acara Negosiasi
        <table cellpadding="1" cellspacing="0" border="0" width="100%">
          <tr>
            <td width="20%" valign="top">Nomor</td>
            <td width="1%" valign="top">:</td>
            <td width="79%" valign="top">{{ $data->nomor_lampiran }}</td>
          </tr>
          <tr>
            <td  valign="top">Tanggal</td>
            <td  valign="top">:</td>
            <td  valign="top">{{ $data->tanggal }}</td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <br>
  <br>
  <table cellpadding="0" cellspacing="0" border="1" class="table-report" width="100%">
    <tr>
      <th width="5%">NO</th>
      <th width="25%">NAMA BARANG</th>
      <th width="20%">SPESIFIKASI</th>
      <th width="10%">KEBUTUHAN</th>
      <th width="20%">HARGA SATUAN</th>
      <th width="20%">TOTAL HARGA</th>
    </tr>
    <?php $i =0; ?>
    @foreach($data->detil as $row)
    <tr>
      <td valign="top">{{ $i = $i + 1 .'.' }}</td>
      <td valign="top">{{ $row->nama_brg }}</td>
      <td valign="top">{{ $row->spesifikasi }}</td>
      <td valign="top" align="center">{{ $row->kebutuhan }}</td>
      <td valign="top" align="right">Rp. {{ number_format($row->hrg_satuan_deal,0,',','.') }}</td>
      <td valign="top" align="right">Rp. {{ number_format($row->total_hrg_deal,0,',','.') }}</td>
    </tr>
    @endforeach
    <tr>
      <td colspan="5">&nbsp;</td>
      <td align="right">Rp. {{ number_format($data->total_nego,0,',','.') }}</td>
      
    </tr>
    <tr>
      <td colspan="6" ><i><b>Terbilang  : {{ $data->total_huruf }}</b></i></td>
    </tr>
    </table>
    <br>
    <br>
    
    <table cellpadding="0" cellspacing="0" border="0" width="100%" >
      <tr>
        <td width="50%" align="center" style="line-height:25px;"><br>
          PIHAK KEDUA<br>
          {{ $data->rekanan }}
          <br>
          <br>
          <br>
          <p style="text-decoration:underline;margin-bottom:-2px;">{{ $data->pengurus }}</p>
          {{ $data->jabatan }}
        </td>
        <td width="50%" align="center" style="line-height:25px;">
          PIHAK KESATU<br>
          PEJABAT PENGADAAN BARANG / JASA <br>
          SETDA KABUPATEN PASURUAN
          <br>
          <br>
          <br>
          
          <p style="text-decoration:underline;margin-bottom:-2px;">{{ $data->pegawai }}</p>
          NIP {{ $data->nip }}
        </td>
      </tr>  
    </table>
</body>
</html>