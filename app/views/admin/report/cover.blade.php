<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dokumen Pengadaan Langsung</title>

</head>

<body style="border:solid 1px #000;border-radius:20px;">

<p align="center" style="font-size: 24px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;text-transform:uppercase;">PEMERINTAH  KABUPATEN PASURUAN<br />
  BAGIAN {{ $data->unit_kerja }}<br />
  KABUPATEN PASURUAN</p>
<p align="center" style="font-size: 18px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">Jl.  Hayam Wuruk No. 14 Pasuruan</p>
<p align="center">&nbsp;</p>
<p align="center"><img src="asset/img/logo.jpg" width="145px" height="170px"></p>
<p align="center">&nbsp;</p>
<p align="center" style="font-size: 24px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">DOKUMEN PENGADAAN LANGSUNG</p>
<table align="center" cellpadding="1" cellspacing="0" style="font-size: 18px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">
  <tr >
    <td>NOMOR </td>
    <td> :  {{ $data->no_srt1 }}</td>
  </tr>
  <tr>
    <td>TANGGAL </td>
    <td> : {{ $data->tanggal }} </td>
  </tr>
</table>
<p align="center">&nbsp;</p>
<p align="center"style="font-size: 18px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">ANTARA</p>
<p align="center" style="font-size: 18px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;text-transform:uppercase;">KUASA PENGGUNA ANGGARAN<br />
  BAGIAN {{ $data->unit_kerja }}  SETDA.<br />
  KABUPATEN PASURUAN</p>
<p align="center" style="font-size: 18px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">DENGAN</p>
<p align="center" style="font-size: 18px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">{{ $data->rekanan }}<br />
  {{ $data->alamat_rkn }}</p>
<p align="center" style="font-size: 18px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">&nbsp;</p>
<table width="70%" align="center" cellpadding="1" cellspacing="0" style="font-size: 18px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">
  <tr>
    <td width="24%" valign="top">Kegiatan</td>
    <td width="1%" valign="top">: </td>
    <td width="75%" valign="top">  {{ $data->desk_kegiatan }}</td>
  </tr>
  <tr>
    <td valign="top">Lokasi</td>
    <td valign="top">:</td>
    <td valign="top"> {{ $data->lokasi_kegiatan }}</td>
  </tr>
  <tr>
    <td valign="top">Nilai Kontrak</td>
    <td valign="top">: </td>
    <td valign="top">  Rp. {{ number_format($data->hps_deal,0, ',', '.') }}</td>
  </tr>
</table>
<br>

<p align="center" style="font-size: 18px; font-weight: bold; font-family: Arial, Helvetica, sans-serif;">TAHUN ANGGARAN {{ $data->thn_anggaran }}</p>

</body>
</html>
