<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lampiran Evaluasi Penawaran</title>
</head>

<body style="font-size: 16px; font-family: Arial, Helvetica, sans-serif;">
<p align="center"><b>LAMPIRAN EVALUASI PENAWARAN</b></p>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="15%" valign="top">PEKERJAAN</td>
    <td width="1%" valign="top">: </td>
    <td width="84%" valign="top">{{ $data->judul }}</td>
  </tr>
  <tr>
    <td valign="top">LOKASI</td>
    <td valign="top"> : </td>
    <td valign="top">{{ $data->lokasi }}</td>
  </tr>
  <tr>
    <td valign="top">HPS</td>
    <td valign="top"> : </td>
    <td valign="top">Rp. {{ number_format($data->hps,0,',','.') }}</td>
  </tr>
</table>
<p>1. Evaluasi Administrasi<br />
</p>
<table border="1" cellspacing="0" cellpadding="5">
  <tr>
    <td width="1%" rowspan="2" align="center">No.</td>
    <td width="30%" rowspan="2" align="center">Nama dan Lokasi Pekerjaan</td>
    <td colspan="5" align="center">Surat Penawaran</td>
  </tr>
  <tr>
    <td width="8%" align="center">Tanggal</td>
    <td width="14%" align="center">Tanda Tangan</td>
    <td width="6%" align="center">Harga</td>
    <td width="14%" align="center">Masa Berlaku</td>
    <td width="27%" align="center">Jangka Waktu Pelaksanaan</td>
  </tr>
  <tr>
    <td align="center">1</td>
    <td align="left">{{ $data->rekanan }}</td>
    <td align="center">v</td>
    <td align="center">v</td>
    <td align="center">v</td>
    <td align="center">v</td>
    <td align="center">v</td>
  </tr>
</table>
<p>&nbsp; </p>
<p>2. Teknis</p>
<table border="1" cellspacing="0" cellpadding="5">
  <tr>
    <td align="center">No.</td>
    <td align="center">Spektek</td>
    <td align="center">Jadwal Pelaksanaan Pekerjaan</td>
    <td align="center">Identitas Pekerjaan</td>
    <td align="center">Volume</td>
    <td align="center">Layanan Purna Jual</td>
    <td align="center">Tenaga Teknis</td>
    <td align="center">Peralatan</td>
  </tr>
  <tr>
    <td align="center">1</td>
    <td align="center">v</td>
    <td align="center">v</td>
    <td align="center">v</td>
    <td align="center">v</td>
    <td align="center">v</td>
    <td align="center">v</td>
    <td align="center">v</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>3. Harga</p>
<table border="1" cellspacing="0" cellpadding="5">
  <tr>
    <td align="center">No.</td>
    <td align="center">Harga Satuan Timpang</td>
    <td align="center">Harga Semula</td>
    <td align="center">Harga Terkoneksi</td>
    <td align="center">% dari HPS</td>
  </tr>
  <tr>
    <td align="center">1</td>
    <td align="center">-</td>
    <td align="center">Rp. {{ number_format($data->hps_rkn,0,',','.') }}</td>
    <td align="center">Rp. {{ number_format($data->hps_rkn,0,',','.') }}</td>
    <td align="center">93,07</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>4. Evaluasi</p>
<table border="1" cellpadding="5" cellspacing="0">
  <tr>
    <td width="3%" rowspan="2" align="center">No</td>
    <td width="32%" rowspan="2" align="center">Nama dan Lokasi Perusahaan</td>
    <td width="7%" rowspan="2" align="center">SIUP</td>
    <td width="9%" rowspan="2" align="center">NPWP</td>
    <td width="8%" rowspan="2" align="center">AKTA</td>
    <td width="41%" align="center">PAJAK</td>
  </tr>
  <tr>
    <td align="center">PPh 21, PPh 25, PPN dan Pajak Tahunan</td>
  </tr>
  <tr>
    <td align="center">1</td>
    <td align="center">{{ $data->rekanan }}</td>
    <td align="center">v</td>
    <td align="center">v</td>
    <td align="center">v</td>
    <td align="center">v</td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="62%">&nbsp;</td>
    <td width="38%"><p>Pasuruan, {{ $data->tanggal }}<br />
      PEJABAT PENGADAAN BARANG/JASA<br />
      SETDA KABUPATEN PASURUAN<br />
      <br />
      <br />
      <br />
      <br />
      <b><u>{{ $data->pejabat }}</u></b><br />
NIP. {{ $data->nip }}<br />
    </p></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
