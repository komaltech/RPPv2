<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Penetapan Penyedia Barang</title>
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

<body style="margin-left:40px">
<p align="center" class="style1">PEMERINTAH KABUPATEN PASURUAN<br />
SEKRETARIAT DAERAH KABUPATEN PASURUAN</p>
<hr width="75%" />
<p align="center" class="style2"><u><strong>PENETAPAN PENYEDIA BARANG</strong></u><br />
Nomor:{{ $data->nomor }}</p>

<p align="center" class="style2"><strong>PEJABAT PENGADAAN BARANG/JASA<br />
SEKRETARIAT DAERAH KABUPATEN PASURUAN</strong></p>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td width="17%" valign="top">Untuk pekerjaan </td>
    <td width="1%" valign="top">: </td>
    <td width="82%" valign="top" align="justify">{{ $data->judul }}</td>
  </tr>
  <tr>
    <td valign="top">Tahun Anggaran </td>
    <td valign="top">: </td>
    <td valign="top" align="justify">{{ $data->thn_anggaran }}</td>
  </tr>
  <tr>
    <td valign="top">Berdasarkan</td>
    <td valign="top">: </td>
    <td valign="top" align="justify"><ol style="margin-top:0px;">
      <li>Keputusan Penadaan Anggaran dengan Nomor {{ $data->no_pengguna }} tentang Pejabat Pengadaan Barang / Jasa pada Sekretariat Daerah Kabupaten Pasuruan</li>
      <li>Berita Acara Evaluasi Penawaran Nomor : {{ $data->no_penawaran }} tanggal {{ $data->tgl_penawaran }}</li>
      <li>Berita Acara Hasil Pengadaan Langsung Nomor : {{ $data->no_bahpl }} tanggal {{ $data->tgl_bahpl }}   </li>
    </ol></td>
  </tr>
</table>
<p>Menetapkan : </p>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="29%" valign="top">- Nama Perusahan </td>
    <td width="1%" valign="top">: </td>
    <td width="70%" valign="top" align="justify"> <strong>{{ $data->rekanan }}</strong></td>
  </tr>
  <tr>
    <td valign="top">- Nama Direktur </td>
    <td valign="top">: </td>
    <td valign="top" align="justify"><strong>{{ $data->pengurus }}</strong></td>
  </tr>
  <tr>
    <td valign="top">- Alamat Perusahaan </td>
    <td valign="top">: </td>
    <td valign="top" align="justify">{{ $data->alamat_rkn }}</td>
  </tr>
  <tr>
    <td valign="top">- HPS</td>
    <td width="1%" valign="top">: </td>
    <td valign="top" align="justify">Rp. {{ $data->hps }} ({{ $data->hps_huruf }}) </td>
  </tr>
  <tr>
    <td valign="top">- Harga Penawaran </td>
    <td valign="top">: </td>
    <td valign="top" align="justify">Rp. {{ $data->hps_rkn }} ({{ $data->hps_rkn_huruf }}) </td>
  </tr>
  <tr>
    <td valign="top">- Harga Hasil Negosiasi </td>
    <td valign="top">: </td>
    <td valign="top" align="justify">Rp. {{ $data->hps_nego }} ({{ $data->hps_nego_huruf }}) </td>
  </tr>
  <tr>
    <td valign="top">- NPWP</td>
    <td valign="top">: </td>
    <td valign="top" align="justify">{{ $data->npwp }}</td>
  </tr>
</table>
<p align="justify">Demikian Penetapan/Penunjukan ini dibuat untuk dipegunakan sebagaimana mestinya, dengan catatan apabila terdapat kekeliruan maka akan diubah dan dibetulkan kembali sebagaimana mestinya. </p>
<p>&nbsp;</p>
<table width="80%" border="0" align="center" cellpadding="1" cellspacing="0">
  <tr>
    <td width="51%">&nbsp;</td>
    <td width="21%">Ditetapkan di <br />
    Tanggal</td>
    <td width="28%"> : PASURUAN <br />
    : {{ $data->tanggal }} </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><hr /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">PEJABAT PENGADAAN BARANG/JASA<br />
      SEKRETARIAT DAERAH KABUPATEN PASURUAN<br />
      <br />
      <br />
      <br />
      <u><strong>{{ $data->pegawai }}</strong></u><br />
      NIP. {{ $data->nip }} </td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
