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
  .kop2{
    display: block;
    padding:5px;
    line-height: 25px;
    text-align: center;
  }
  .kotak1{display:block;border:1px solid black;padding:10px 5px 10px 20px;font-weight:normal;}
  .wrapper{width: 960px;display:block;margin:50px auto ;}
  .table-report{margin:auto;}
  .table-report tr td{padding:3px;font-size: 15px;line-height:28px;vertical-align: top;}
  .table-report tr th{padding:15px;font-weight:normal;line-height:25px;text-align:center;}

  .bullet li{font-weight: bold;padding:0px;}
  .bullet2 li{font-weight: normal;padding:-5px;margin-bottom: 10px;}
  </style>
</head>
<body style="font-family:Helvetica; color:black">
  <h2 class="kop2">FORMULIR ISIAN KUALIFIKASI</h2>
  <table cellpadding="0" cellspacing="0" border="0" width="85%" class="table-report">
    <tr>
      <td colspan="3"> Saya yang bertanda tangan di bawah ini : </td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td width="30%">Nama</td> 
      <td width="1%">:</td> 
      <td width="69%">{{ $data->pemilik }}</td>
    </tr>
     <tr>
      <td >Jabatan</td> 
      <td>:</td> 
      <td >{{ $data->jabatan }}</td>
    </tr>
     <tr>
      <td>Bertindak untuk atas nama</td> 
      <td>:</td> 
      <td>{{ $data->nama_rkn }}</td>
    </tr>
    <tr>
      <td>Alamat</td> 
      <td>:</td> 
      <td>{{ $data->alamat }}</td>
    </tr>
    <tr>
      <td>Telepon</td> 
      <td>:</td> 
      <td>{{ $data->telp }}</td>
    </tr>
    <tr>
      <td>E-mail</td> 
      <td>:</td> 
      <td>{{ $data->email_rkn }}</td>
    </tr>
  </table>  
  <br>
  
  <table cellpadding="0" cellspacing="0" border="0" width="85%" class="table-report">
    <tr>
      <td align="justify"> 
       Menyatakan dengan sesungguhnya bahwa <br>
        <ol type="1" class="bullet2">
          <li >
              Saya secara hukum mempunyai kapasitas menanda tangani kontrak berdasarkan Akte Notaris<br>
              <table cellpadding="0" cellspacing="0" border="0" width="100%" class="table-report" style="margin-top:10px;">
                <tr>
                  <td width="10%">Notaris</td> 
                  <td width="1%">:</td> 
                  <td width="89%">{{ $data->notaris_akte }}</td>
                </tr>
                <tr>
                  <td>Tanggal</td> 
                  <td >:</td> 
                  <td>{{ date('d F Y',strtotime($data->tgl_akte)) }}</td>
                </tr>
                <tr>
                  <td >No</td> 
                  <td >:</td> 
                  <td>{{ $data->no_akte }}</td>
                </tr>
              </table>
          </li>
          <li>Saya bukan sebagai pegawai, Kementrian / Lembaga /S atuan Kerja Perangkat Daerah / Institusi manapun.</li>
          <li>Saya tidak pernah menjalani sanksi pidana.</li>
          <li>Saya tidak sedang dan tidak akan terlibat pertentangan kepentingan dengan para pihak yang terkait, langsung maupun tidak langsung dalam proses pengadaan ini.</li>
          <li>Badan usaha yang saya wakili tidka masuk dalam daftar Hitam, tidak dalam pengawasan Pengadilan, tidak pailit atau kegiatan usahanya tidak sedang dihentikan.</li>
          <li>Salah satu dan / atau semua pengurus badan usaha yang saya wakili tidak masuk dalam Daftar Hitam.</li>
          <li>Data - data saya / badan usaha yang saya wakili adalah sebagai berikut :</li>
        </ol>
      </td>
    </tr>
  </table>
  <table cellpadding="5" cellspacing="0" border="0" width="90%" style="margin-left:68px;margin-top:-10px;">
    <tr>
      <td width="3%" align="right">A.</td>
      <td width="97%" >Data Administrasi</td>
    </tr>
    <tr>
      <td></td>
      <td>1. UMUM</td>
    </tr>
    <tr>
      <td height="280px" >&nbsp;</td>
      <td valign="top">
        <div class="kotak1" >
          <table cellpadding="5" cellspacing="0" border="0" width="100%" >
            <tr>
              <td width="3%" valign="top">1.</td>
              <td width="35%" valign="top">Nama Perusahaan</td>
              <td width="2%" align="center" valign="top">:</td>
              <td width="55%" valign="top">{{ $data->nama_rkn }}</td>
            </tr>
            <tr>
              <td valign="top">2.</td>
              <td valign="top">Status Perusahaan</td>
              <td valign="top">:</td>
              <td valign="top">{{ $data->status_rekanan }}</td>
            </tr>
            <tr>
              <td valign="top">3.</td>
              <td valign="top">Alamat Perusahaan</td>
              <td valign="top">:</td>
              <td valign="top">{{ $data->alamat_rkn }}</td>
            </tr>
            <tr>
              <td valign="top">4.</td>
              <td valign="top">Nomor Telepon</td>
              <td valign="top">:</td>
              <td valign="top">{{ $data->telp_rkn }}</td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
    <tr>
      <td align="right">B.</td>
      <td>Ijin Usaha</td>
    </tr>
    <tr>
      <td ></td>
      <td valign="top">
        <div class="kotak1" >
          <table cellpadding="5" cellspacing="0" border="0" width="100%" >
            <tr>
              <td width="3%" valign="top">1.</td>
              <td width="35%" valign="top">No SIUP</td>
              <td width="2%" align="center" valign="top">:</td>
              <td width="55%" valign="top">{{ $data->ius_no }}</td>
            </tr>
            <tr>
              <td valign="top"></td>
              <td valign="top">Tanggal SIUP</td>
              <td valign="top">:</td>
              <td valign="top">{{ date('d F Y',strtotime($data->tgl_ius)) }}</td>
            </tr>
            <tr>
              <td valign="top">2.</td>
              <td valign="top">Masa Berlaku SIUP</td>
              <td valign="top">:</td>
              <td valign="top">{{ $data->ius_berlaku }}</td>
            </tr>
            <tr>
              <td valign="top">3.</td>
              <td valign="top">Instansi Pemberi Ijin</td>
              <td valign="top">:</td>
              <td valign="top">{{ $data->ius_instansi }}</td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
    <tr>
      <td align="right">C.</td>
      <td>Ijin Lainnya</td>
    </tr>
    <tr>
      <td ></td>
      <td>
        <div class="kotak1" >
          <table cellpadding="5" cellspacing="0" border="0" width="100%" >
            <tr>
              <td width="3%" valign="top">1.</td>
              <td width="35%" valign="top">No TDP</td>
              <td width="2%" align="center" valign="top">:</td>
              <td width="55%" valign="top">{{ $data->no_tdp }}</td>
            </tr>
            <tr>
              <td valign="top"></td>
              <td valign="top">Tanggal TDP</td>
              <td valign="top">:</td>
              <td valign="top">{{ date('d F Y',strtotime($data->tgl_tdp)) }}</td>
            </tr>
            <tr>
              <td valign="top">2.</td>
              <td valign="top">Masa Berlaku TDP</td>
              <td valign="top">:</td>
              <td valign="top">{{ date('d F Y',strtotime($data->masa_tdp)) }}</td>
            </tr>
            <tr>
              <td valign="top">3.</td>
              <td valign="top">Instansi Pemberi Ijin</td>
              <td valign="top">:</td>
              <td valign="top">{{ $data->instansi_tdp }}</td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
    <tr>
      <td align="right">D.</td>
      <td>Landasan Hukum Pendirian Usaha</td>
    </tr>
    <tr>
      <td ></td>
      <td valign="top">
        1. Akte Pendirian Perusahaan
        <div class="kotak1" >
          <table cellpadding="5" cellspacing="0" border="0" width="100%" >
            <tr>
              <td width="3%" valign="top">a.</td>
              <td width="35%" valign="top">No Akte</td>
              <td width="2%" align="center" valign="top">:</td>
              <td width="55%" valign="top">{{ $data->no_akte }}</td>
            </tr>
            <tr>
              <td valign="top">b.</td>
              <td valign="top">Tanggal</td>
              <td valign="top">:</td>
              <td valign="top">{{ date('d F y',strtotime($data->tgl_akte)) }}</td>
            </tr>
            <tr>
              <td valign="top">c.</td>
              <td valign="top">Nama Notaris</td>
              <td valign="top">:</td>
              <td valign="top">{{ $data->notaris_akte }}</td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
    <tr>
      <td align="right">E.</td>
      <td>Pengurus</td>
    </tr>
    <tr>
      <td valign="top" colspan="2">
        Direksi / Pengurus Badan Usaha
        <table cellpadding="0" cellspacing="0" border="1" width="100%" >
          <tr>
            <td width="5%" valign="middle" align="center" height="50px">No</td>
            <td width="35%" valign="middle" align="center">Nama</td>
            <td width="30%" align="center" valign="middle">Nomor KTP</td>
            <td width="25%" valign="middle" align="center">Jabatan Dalam Perusahaan</td>
          </tr>
          <?php $no = 0; ?>
          @foreach($data->pengurus as $row)
          <tr>
            <td height="30px" style="padding-left:5px">{{ $no = $no + 1 ."."}}</td>
            <td style="padding-left:5px">{{ $row->nama_pengurus }}</td>
            <td align="center">{{ $row->nik }}</td>
            <td align="center">{{ $row->jabatan }}</td>
          </tr>
          @endforeach
        </table>
      </td>
    </tr>
    <tr>
      <td align="right">F.</td>
      <td>Data Keuangan</td>
    </tr>
    <tr>
      <td valign="top" colspan="2">
        1. Susunan Kepemilikan Saham (untuk PT) / susunan Persero (untuk CV / Firma)<br>
        <table cellpadding="0" cellspacing="0" border="1" width="100%" >
          <tr>
            <td width="5%" valign="middle" align="center" height="50px">No</td>
            <td width="35%" valign="middle" align="center">Nama</td>
            <td width="30%" align="center" valign="middle">Nomor KTP</td>
            <td width="25%" valign="middle" align="center">Prosentase</td>
          </tr>
          <?php $no = 0; ?>
          @foreach($data->pengurus as $row)
          <tr>
            <td height="30px" style="padding-left:5px">{{ $no = $no + 1 ."." }}</td>
            <td style="padding-left:5px">{{ $row->nama_pengurus }}</td>
            <td align="center">{{ $row->nik }}</td>
            <td align="center">{{ $row->prosentase_shm }} %</td>
          </tr>
          @endforeach
        </table>
        <br>
        2.  Pajak<br>
        <div class="kotak1" >
          <table cellpadding="5" cellspacing="0" border="0" width="100%" >
            <tr>
              <td width="5%" valign="top" >1.</td>
              <td width="35%" valign="top" >Nomor Pokok Wajib Pajak</td>
              <td width="1%" valign="top">:</td>
              <td width="59%" valign="top" align="center">{{ $data->npwp }}</td>
            </tr>
            <tr>
              <td valign="top">2.</td>
              <td valign="top">Bukti Pelunasan Pajak Tahun Terakhir Nomor / Tanggal</td>
              <td valign="top">:</td>
              <td valign="top"></td>
            </tr>
             <tr>
              <td valign="top">3.</td>
              <td valign="top">Laporan Bulanan PPH/PPN tiga Bulan terakhir Nomor / Tanggal</td>
              <td valign="top">:</td>
              <td valign="top"></td>
            </tr>
            @foreach($data->pajak as $row)
            <tr>
              <td></td>
              <td valign="top">{{ $row->no_pajak }}</td>
              <td valign="top" colspan="2">{{ $row->jenis_pajak }}<br>{{ date('d F Y',strtotime($row->tgl_pajak)) }}</td>
            </tr>
            @endforeach
          </table>
        </div>
      </td>
    </tr>
  </table>
  <table cellpadding="0" cellspacing="0" border="0" width="85%" class="table-report">
    <tr>
      <td align="justify">
        Demikian pernyataan ini kami buat dengan sebenarnya dan penuh rasa tanggung jawab. Jika dikemudian hari ditemui bagwa data dokumen yang kami sampaikan tidak benar dan ada pemalsuan maka saya dan badan usaha yang saya wakili bersedia dikenakan sanksi administrasi, sanksi pencantuman dalam Daftar Hitam, gugatan secara perdata, dan / atau peaporan secara pidana keapada pihak berwenang sesuai dengan ketentuan peraturan perundang - undangan.
      </td>
    </tr>
  </table>
   <br>
  <br>
  <table cellpadding="0" cellspacing="0" border="0" width="85%" class="table-report">
    <tr>
      <td align="justify"> 
       Pasuruan, {{ $data->tanggal }}<br>
       <b>{{ $data->nama_rkn }}</b>
       <br>
       <br>
       <br>
       <p style="text-decoration:underline;margin-bottom:0px;font-weight:bold;">{{ $data->pemilik }}</p>
       {{ $data->jabatan }}
      </td>
    </tr>
  </table>

   
</body>
</html>