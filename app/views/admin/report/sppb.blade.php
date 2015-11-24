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
<p align="center" class="style1">PEMERINTAHAN KABUPATEN PASURUAN <br />
SEKRETARIAT DAERAH KABUPATEN PASURUAN</p>
<hr />
<p align="center" class="style2"><strong>SURAT PENUNJUKAN PENYEDIA BARANG<br />
( SPPB )</strong> </p>
<p align="center" class="style2">&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td width="64%">&nbsp;</td>
    <td width="36%">Pasuruan, {{ $data->tanggal }} </td>
  </tr>
</table>
<p align="left" class="style2">&nbsp;</p>
<table width="100%" border="0" cellspacing="0" cellpadding="1" style="margin-bottom:20px;">
  <tr>
    <td width="11%">Nomor</td>
    <td width="1%">: </td>
    <td width="88%">{{ $data->no_penunjukan }}</td>
  </tr>
  <tr>
    <td>Lampiran</td>
    <td>: </td>
    <td>1 (satu) berkas </td>
  </tr>
</table>
<p>Kepada Yth. <br />
  Sdr. Direktur {{ $data->rekanan }}<br />
di Pasuruan</p>
<table width="100%" border="0" cellspacing="0" cellpadding="1" style="margin-bottom:20px;">
  <tr>
    <td width="11%" valign="top">Perihal</td>
    <td width="1%" valign="top">: </td>
    <td width="88%" valign="top" align="justify">{{ $data->judul }} </td>
  </tr>
</table>
<p align="justify">Dengan ini kami beritahukan bahwa penawaran Saudara  tanggal {{ $data->tgl_penawaran }} tentang Surat Penawaran Paket Pekerjaan {{ $data->judul }} dengan nilai penawaran terkoreksi selama evaluasi sebesar Rp. {{ $data->hps_nego }} ({{ $data->hps_nego_huruf }}), kami nyatakan diterima/disetujui.</p>
<p align="justify">Sebagai tindak lanjut dari Surat Penunjukan Penyedia Jasa ini, Saudara diharuskan untuk segera menandatangani Surat Perintah Kerja (SPK) yang akan segera menyusul. Kegagalan Saudara untuk menerima penunjukan ini yang disusun berdasarkan evaluasi terrhadap penawaran Saudara, akan dikenakan sanksi sesuai ketentuan daam Peraturan Presiden Nomor 54 Tahun 2010 tentang Pengadaan Barng/Jasa Pemerintah</p>
<p>&nbsp;</p>
<p>BAGIAN KEUANGAN DAN PERLENGKAPAN<br />
SETDA. KABUPATEN PASURUAN<br />
  KUASA PENGGUNAAN ANGGARAN<br />
  <br />
  <br />
  <br />
  <br />
  <br />
  <u><strong>{{ $data->pegawai }}</strong></u><br />
  NIP. {{ $data->nip }}</p>
<p>&nbsp; </p>
</body>
</html>
