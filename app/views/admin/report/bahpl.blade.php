<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Berita Acara Hasil Pengadaan Langsung</title>
</head>

<body style="padding-left:40px">
<p align="center" style="font-size: 24px; font-weight:bold;">PEJABAT PENGADAAN BARANG/JASA<br /> 
SEKRETARIAT KABUPATEN PASURUAN</p>
<hr />
<p align="center" style="font-size: 18px; font-weight:bold;"><u>BERITA ACARA HASIL PENGADAAN LANGSUNG (BAHPL)</u></p>
<table width="100%" border="0" cellspacing="0" cellpadding="1">
  <tr>
    <td valign="top" width="14%"><strong>PEKERJAAN</strong></td>
    <td valign="top" width="1%"><strong>: </strong></td>
    <td valign="top" width="85%"><strong>&quot;{{ $data->judul }}&quot;</strong></td>
  </tr>
</table>

<table border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td valign="top">Nomor</td>
    <td valign="top">: </td>
    <td valign="top">{{ $data->no_bahpl }}</td>
  </tr>
  <tr>
    <td valign="top">Tanggal</td>
    <td valign="top">:</td>
    <td valign="top">{{ $data->tgl_bahpl }}</td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pada hari ini, <strong style="font-style:italic">{{ $data->hari }}</strong> tanggal <strong style="font-style:italic">{{ $data->tanggal_huruf }}</strong> bulan <strong style="font-style:italic">{{ $data->bulan }}</strong> tahun <strong style="font-style:italic">{{ $data->tahun }}</strong> yang bertanda tangan di bawah ini, Pejabat Pengadaan Barang/Jasa Sekretariat Daerah Kabupaten Pasuruan, berdasarkan Keputusan Sekretariat Daerah Kabupaten Pasuruan Nomor : 027/019g/424.031/2014, tanggal 28 Januari 2014 telah mengadakan Proses Pengadaan Langsung Pekerjaan <strong>&quot;Pengadaan Meja Kerja dan Kursi Kerja Keperluan Bagian Keuangan dan Perlengkapan Setda. Kabupaten Pasuruan Tahun Anggaran 2014&quot;</strong>, dengan hasil sebagai berikut:</p>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td width="2%" valign="top">A. </td>
    <td width="30%" valign="top">Nama Perusahaan</td>
    <td width="68%" valign="top">:<strong> {{ $data->rekanan }}</strong></td>
  </tr>
  <tr>
    <td valign="top">B. </td>
    <td valign="top">Alamat</td>
    <td valign="top">: {{ $data->alamat_rkn }}</td>
  </tr>
  <tr>
    <td valign="top">C. </td>
    <td valign="top">Harga Penawaran</td>
    <td valign="top">: Rp. {{ number_format($data->hps_rkn,0,',','.') }} ({{ $data->hps_rkn_huruf }})</td>
  </tr>
  <tr>
    <td valign="top">D. </td>
    <td valign="top">Harga Hasil Negosiasi</td>
    <td valign="top">: Rp. Rp. {{ number_format($data->hps_nego,0,',','.') }} ({{ $data->hps_nego_huruf }})</td>
  </tr>
  <tr>
    <td valign="top">E. </td>
    <td valign="top">Nomor Pokok Wajib Pajak</td>
    <td valign="top">: {{ $data->npwp }}</td>
  </tr>
  <tr>
    <td valign="top">F. </td>
    <td colspan="2" valign="top">Unsur-unsur yang dievaluasi:
      <ol>
      <li>Administrasi</li>
      <li>Teknis<br />
      </li>
      <li>Harga/Biaya</li>
      <li> Kualifikasi Badan Usaha</li>
      </ol>
  </td>
  </tr>
  <tr>
    <td valign="top">G. </td>
    <td colspan="2" valign="top">Bersama Berita Acara ini kami sampaikan pula berkas-berkas Pengadaan Langsung kepada KPA, antara lain:
      <ol>
        <li> Jadwal Pengadaan Langsung</li>
        <li>Dokumen Pengadaan Langsung, antara lain: Pengumuman/Undangan, IKPP, LDP, Bentuk Dokumen Penawaran, Surat Perintah Kerja, Bentuk Dokumen Kontrak dan Daftar Spesifikasi </li>
        <li>Berita Acara Evaluasi Penawaran Nomor:{{ $data->no_baepl }} tanggal {{ $data->tgl_baepl }}</li>
        <li>Berita Acara Klarifikasi Nomor: {{ $data->nomor_klarifikasi }} tanggal {{ $data->tgl_klarifikasi }}</li>
        <li>Berita Acara Negosiasi Nomor: {{ $data->nomor_negosiasi }} tanggal {{ $data->tgl_negosiasi }}</li>
      </ol>
      <p>&nbsp;</p></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="49%">&nbsp;</td>
    <td width="51%" align="center"><p>      PEJABAT PENGADAAN BARANG/JASA<br />
      SETDA KABUPATEN PASURUAN<br />
      <br />
      <br />
      <br />
      
    
      <b><u>{{ $data->pegawai }}</u></b><br />
      NIP. {{ $data->nip }} <br />
    </p></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
