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
<body style="font-family:Helvetica;color:black;margin-left:40px;">
  <h4 class="kop">LAMPIRAN PENAWARAN<br>(DAFTAR KUANTITAS DAN HARGA)</h4>
  <table cellpadding="0" cellspacing="0" border="1" class="table-report" width="100%">
    <tr>
      <th width="5%">NO</th>
      <th width="25%">NAMA BARANG</th>
      <th width="20%">SPESIFIKASI</th>
      <th width="10%">JUMLAH</th>
      <th width="20%">HARGA SATUAN</th>
      <th width="20%">TOTAL HARGA</th>
    </tr>
    <?php $i = 0;?>
    @foreach($data->detil as $row)
    <tr>
      <td>{{ $i = $i + 1 .'.' }}</td>
      <td valign="top">{{ $row->nama_brg }}</td>
      <td valign="top">{{ $row->spesifikasi }}</td>
      <td valign="top" align="center">{{ $row->kebutuhan }}</td>
      <td align="right">Rp. {{ number_format($row->hrg_satuan_rkn,0,',','.') }}</td>
      <td align="right">Rp. {{ number_format($row->total_hrg_rkn,0,',','.') }}</td>
    </tr>
    @endforeach
   
    <tr>
      <td colspan="5">&nbsp;</td>
      <td align="right">Rp. {{ number_format($data->total,0,',','.') }}</td>
      
    </tr>
    <tr>
      <td colspan="6" ><i><b>Terbilang  : {{ $data->huruf }}</b></i></td>
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
        <b>{{ $data->nama_rkn }}</b>
        <br>
        <br>
        <br>
        <br>
        <p style="margin-bottom:0px;font-weight:bold;text-decoration:underline;">{{ $data->pengurus }}</p>
        {{ $data->jabatan }}
      </td>
    </tr>
  </table>

</body>
</html>