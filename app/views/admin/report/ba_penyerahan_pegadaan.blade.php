<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Berita Acara Penyerahan Dokumen Pegadaan</title>
<style type="text/css">
<!--
.style1 {
	font-size: 20px;
	font-weight: bold;
}
.style2 {
font-size: 16px;}
-->
</style>
</head>

<body style="margin-left:40px;">
<p align="center" class="style1">PEJABAT PEGADAAN BARANG / JASA <br />
SEKRETARIAT DAERAH KABUPATEN PASURUAN</p>
<hr />
<p align="center" class="style2"><u><strong>BERITA ACARA PENYERAHAN DOKUMEN PENGADAAN</strong></u><br />
Nomor: {{ $data->no_penyerahan }}</p>
<p align="justify">Pada hari ini, <strong><em>{{ $data->hari }}</em></strong> tanggal <em><strong>{{ $data->tanggal_huruf }}</strong></em> Bulan <strong><em>{{ $data->bulan }}</em></strong> Tahun <strong><em>{{ $data->tahun }}</em></strong> kami yang bertanda tangan di bawah ini:</p>
<table width="100%" border="0" cellspacing="0" cellpadding="1" style="margin-bottom:10px;">
  <tr>
    <td width="11%">- Nama</td>
    <td width="1%">: </td>
    <td width="88%"> {{ $data->pejabat_pengadaan }}</td>
  </tr>
  <tr>
    <td>- Jabatan</td>
    <td>: </td>
    <td>Pejabat Pengadaan Barang/Jasa {{ $data->departement }} </td>
  </tr>
</table>
<p align="justify">Selanjutnya bertindak sebagai pihak yang menyerahkan Dokumen Pengadaan. </p>
<table width="100%" border="0" cellspacing="0" cellpadding="1" style="margin-bottom:10px;">
  <tr>
    <td width="11%">- Nama</td>
    <td width="1%">: </td>
    <td width="88%"> {{ $data->pejabat_komitmen }}</td>
  </tr>
  <tr>
    <td>- Jabatan</td>
    <td>: </td>
    <td>Kuasa Pengguna Anggaran </td>
  </tr>
</table>
<p align="justify">Selanjutnya bertindak sebagai pihak yang menerima Dokumen Pengadaan Langsung Asli.</p>
<p align="justify">Pejabat Pengadaan Barang/Jasa Sekretariat Daerah Kabupaten Pasuruan menyerahkan Dokumen Pengadaan Langsung Asli {{ $data->judul }} yang dipercayakan kepada {{ $data->rekanan }}, {{ $data->alamat_rkn }} yang dilaksanakan melalui Pengadaan Langsung.</p>
<p align="justify">Demikian Berita Acara ini dibuat dalam rangkap 3 (tiga) untuk dipergunakan sebagaimana mestinya.</p>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td align="center" valign="top">Yang Menyerahkan<br />
      PEJABAT PENGADAAN BARANG/JASA<br />
      SETDA. KABUPATEN PASURUAN<br />
      <br />
      <br />
      <br />
      <u><strong>{{ $data->pejabat_pengadaan }}</strong></u><br />
      NIP. {{ $data->nip_pejabat_pengadaan }} </td>
    <td align="center" valign="top"><p>Yang Menerima<br />
    KUASA PENGGUNA ANGGARAN<br />
      <br />
      <br />
      <br />
      <br />
      <u><strong>{{ $data->pejabat_komitmen }}</strong></u><br />
    NIP. {{ $data->nip_pejabat_komitmen }}<br />
</p>
    </td>
  </tr>
</table>
<p>&nbsp; </p>
</body>
</html>
