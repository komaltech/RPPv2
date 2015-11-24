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
  .wrapper{width: 960px;display:block;margin:50px auto ;}
  .table-report tr td{padding:4px;font-size: 15px;}
  </style>
</head>
<body style="font-family:Times New Roman;color:black">
   <h2 class="kop">SEKRETARIAT DAERAH KABUPATEN PASURUAN<br>BAGIAN KEUANGAN DAN KELENGKAPAN</h2>
   <!-- <div class="wrapper"> -->
      <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-report">
        <tr>
          <td colspan="3"></td>
          <td width="30%">Pasuruan, {{ $data->tanggal }}</td>
        </tr>
        <tr>
          <td width="20%">&nbsp;</td>
          <td width="30%"></td>
          <td width="15%"></td>
          <td width="45%"></td>
        </tr>
        <tr>
          <td >&nbsp;</td>
          <td ></td>
          <td ></td>
          <td ></td>
        </tr>
        <tr>
          <td colspan="2" valign="top">
            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-report">
                <tr>
                  <td width="40%">&nbsp;</td>
                  <td width="2%"></td>
                  <td width="58%"></td>
                </tr>
                <tr>
                  <td width="40%">Nomor</td>
                  <td width="2%">:</td>
                  <td width="58%">{{ $data->no_srt_permintaan }}</td>
                </tr>
                <tr>
                  <td width="40%">Sifat</td>
                  <td width="2%">:</td>
                  <td width="58%">Segera</td>
                </tr>
                <tr>
                  <td width="40%">Lampiran</td>
                  <td width="2%">:</td>
                  <td width="58%">--</td>
                </tr>
                <tr>
                  <td width="40%">Perihal</td>
                  <td width="2%">:</td>
                  <td width="58%">Pengadaan Langsung</td>
                </tr>
            </table>
          </td>
          <td ></td>
          <td  valign="top">
            <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-report">
              <tr>
                <td colspan="2">Kepada</td>
              </tr>
              <tr>
                <td width="5%" valign="top">Yth.</td>
                <td width="95%" style="line-height:25px;">
                  Sdr. Pejabat Pengadaan Barang / Jasa<br>
                  Setda. Kabupaten Pasuruan<br>
                  di.
                  <p style="text-align:center;font-weight:bold;text-decoration:underline;">PASURUAN</p>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td >&nbsp;</td>
          <td ></td>
          <td ></td>
          <td ></td>
        </tr>
        <tr>
          <td >&nbsp;</td>
          <td colspan="3" align="justify" style="line-height:25px;">
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Berkaitan dengan rencana pelaksanan kegiatan di Bagian {{ $data->departement }} Sekretariat Daerah Kabupaten Pasuruan, maka diperlukan Pengadaan Barang / Jasa, sehubungan dengan hal tersebut bersama ini mohon dilakukan proses pemilihan Penyedia Barang / Jasa sebagai berikut :
          </td>
        </tr>
        <tr>
          <td >&nbsp;</td>
          <td valign="top" style="line-height:25px;">- Kegiatan</td>
          <td colspan="2" valign="top" style="line-height:25px;" align="justify">
            : &nbsp;
            {{ $data->desk_kegiatan }}.
          </td>
        </tr>
        <tr>
          <td >&nbsp;</td>
          <td valign="top" style="line-height:25px;">- Lokasi Kegiatan</td>
          <td colspan="2" valign="top" style="line-height:25px;" align="justify">
            : &nbsp;
            {{ $data->lokasi_kegiatan }}
          </td>
        </tr>
        <tr>
          <td >&nbsp;</td>
          <td valign="top" style="line-height:25px;">- Kegiatan</td>
          <td colspan="2" valign="top" style="line-height:25px;" align="justify">
            : &nbsp;
            {{ $data->desk_kegiatan }}
          </td>
        </tr>
        <tr>
          <td >&nbsp;</td>
          <td valign="top" style="line-height:25px;">- Pagu</td>
          <td colspan="2" valign="top" style="line-height:25px;" align="justify">
            : &nbsp;
            {{ String::formatMoney($data->pagu,'Rp.') }}
          </td>
        </tr>
        <tr>
          <td >&nbsp;</td>
          <td valign="top" style="line-height:25px;">- HPS</td>
          <td colspan="2" valign="top" style="line-height:25px;" align="justify">
            : &nbsp;
            {{ String::formatMoney($data->hps,'Rp.') }}
          </td>
        </tr>
        <tr>
          <td >&nbsp;</td>
          <td ></td>
          <td ></td>
          <td ></td>
        </tr>
        <tr>
          <td >&nbsp;</td>
          <td colspan="3" align="justify" style="line-height:25px;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bersama ini kami lampirkan dokumen teknis dan riwayat Harga Perhitungan Sendiri (HPS).
          </td>
        </tr>
        <tr>
          <td >&nbsp;</td>
          <td colspan="3" align="justify" style="line-height:25px;">
            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;Oleh karena itu agar dilakukan proses <b>Pengadaan Langsung</b> sesuai ketentuan yang berlaku dan atas perhatiannya disampaikan terima kasih.
          </td>
        </tr>
        <tr>
          <td >&nbsp;</td>
          <td ></td>
          <td ></td>
          <td ></td>
        </tr>
        <tr>
          <td >&nbsp;</td>
          <td ></td>
          <td ></td>
          <td ></td>
        </tr>
        <tr>
          <td >&nbsp;</td>
          <td ></td>
          <td ></td>
          <td ></td>
        </tr>
        <tr>
          <td >&nbsp;</td>
          <td ></td>
          <td align="left" style="line-height:25px;" colspan="2">
            <b style="text-transform:uppercase">{{ $data->departement }}<br>
            SETDA. KABUPATEN PASURUAN<br>
            KUASA PENGGUNA ANGGARAN</b>
            <br>
            <br>
            <br>
            <p style="margin-bottom:-5px;font-weight:bold;text-decoration:underline;">{{ $data->pegawai }}.</p>
            NIP. {{ $data->id_users }}
          </td>
        </tr>
      </table>  
<!--    </div> -->
   
</body>
</html>