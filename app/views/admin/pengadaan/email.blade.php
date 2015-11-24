<!DOCTYPE html>
<html>
<head>
  <title>Email Pemilihan Pengadaan langsung Pasuruan</title>
</head>
<body>
	<p>Kepada : {{ $rekanan }} </p><br>
	<p>
		Kami Bagian Pengadaan Kab. Pasuruan menunjuk perusahaan bapak / ibu <br>
		untuk menyediakan beberapa barang,dimana info tentang <br>
		pengadaan langsung tersebut sesuai dengan data di bawah ini :<br><br>
		<table width="80%" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="35%">Nama Pengadaan</td>
				<td width="5%">:</td>
				<td width="65%">{{$desk}}</td>
			</tr>
			<tr>
				<td width="35%">Lokasi Pengerjaan</td>
				<td width="5%">:</td>
				<td width="65%">{{$lokasi}}</td>
			</tr>
			<tr>
				<td width="35%">Alamat Pengerjaan</td>
				<td width="5%">:</td>
				<td width="65%">{{$alamat}}</td>
			</tr>
			<tr>
				<td width="35%">Jumlah HPS</td>
				<td width="5%">:</td>
				<td width="65%">{{  String::formatMoney($hps,"Rp.") }}</td>
			</tr>
		</table>
		<br>
		Sesuai dengan data diatas diharapkan PIHAK {{$rekanan}} membuka sistem kami dan segera memasukkan file yang dibutuhkan
		dan harga sesuai dengan yang diajukan untuk proses pengadaan lebih lanjut.<br><br>
		Informasi Username dan password anda pada sistem dapat dilihat data dibawah ini :<br><br>

		Username	: {{ $username }}<br>
		Password	: {{ $password }}<br><br>

		TerimaKasih


	</p>
</body>
</html>