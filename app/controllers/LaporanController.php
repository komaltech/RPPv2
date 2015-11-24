<?php

class LaporanController extends BaseController {

	function convert($number) {
	    
	    $hyphen      = '';
	    $conjunction = '  ';
	    $separator   = ' ';
	    $negative    = 'negatif ';
	    $decimal     = ' point ';
	    $dictionary  = array(
	        0                   => 'no',
	        1                   => 'satu',
	        2                   => 'dua',
	        3                   => 'tiga',
	        4                   => 'empat',
	        5                   => 'lima',
	        6                   => 'enam',
	        7                   => 'tujuh',
	        8                   => 'delapan',
	        9                   => 'sembilan',
	        10                  => 'sepuluh',
	        11                  => 'sebelas',
	        12                  => 'dua belas',
	        13                  => 'tiga belas',
	        14                  => 'empat belas',
	        15                  => 'lima belas',
	        16                  => 'enam belas',
	        17                  => 'tujuh belas',
	        18                  => 'delapan belas',
	        19                  => 'sembilan belas',
	        20                  => 'dua puluh',
	        30                  => 'tiga puluh',
	        40                  => 'empat puluh',
	        50                  => 'lima puluh',
	        60                  => 'enam puluh',
	        70                  => 'tujuh puluh',
	        80                  => 'delapan puluh',
	        90                  => 'sembilan puluh',
	        100                 => 'ratus',
	        1000                => 'ribu',
	        1000000             => 'juta',
	        1000000000          => 'milyar',
	        1000000000000       => 'triliun',
	        1000000000000000    => 'bilion',
	        1000000000000000000 => 'quintillion'
	    );
	    
	    if (!is_numeric($number)) {
	        return false;
	    }
	    
	    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
	        // overflow
	        trigger_error(
	            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
	            E_USER_WARNING
	        );
	        return false;
	    }

	    if ($number < 0) {
	        return $negative . $this->convert(abs($number));
	    }
	    
	    $string = $fraction = null;
	    
	    if (strpos($number, '.') !== false) {
	        list($number, $fraction) = explode('.', $number);
	    }
	    
	    switch (true) {
	        case $number < 21:
	            $string = $dictionary[$number];
	            break;
	        case $number < 100:
	            $tens   = ((int) ($number / 10)) * 10;
	            $units  = $number % 10;
	            $string = $dictionary[$tens];
	            if ($units) {
	                $string .= $hyphen .' '. $dictionary[$units];
	            }
	            break;
	        case $number < 1000:
	            $hundreds  = $number / 100;
	            $remainder = $number % 100;
	            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
	            if ($remainder) {
	                $string .= $conjunction . $this->convert($remainder);
	            }
	            break;
	        default:
	            $baseUnit = pow(1000, floor(log($number, 1000)));
	            $numBaseUnits = (int) ($number / $baseUnit);
	            $remainder = $number % $baseUnit;
	            $string = $this->convert($numBaseUnits) . ' ' . $dictionary[$baseUnit];
	            if ($remainder) {
	                $string .= $remainder < 100 ? $conjunction : $separator;
	                $string .= $this->convert($remainder);
	            }
	            break;
	    }
	    
	    if (null !== $fraction && is_numeric($fraction)) {
	        $string .= $decimal;
	        $words = array();
	        foreach (str_split((string) $fraction) as $number) {
	            $words[] = $dictionary[$number];
	        }
	        $string .= implode(' ', $words);
	    }
	    
	    return $string;
	}

	/*---------------------------------Fungsi Untuk mencetak Laporan------------------------------*/
	function cetak($id){
		$data = DB::table('pengadaans')->select('id','desk_kegiatan','lokasi_kegiatan','pagu','hps','hps_rkn','hps_deal')->where('id',$id)->first();
		return  View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.pengadaan.cetak'))->with('data',$data);
	}
	function cetakSampul($id){
		$data = new stdclass();
		$data = DB::table('pengadaans')
					->select('id','desk_kegiatan','id_rekanan','id_users','thn_anggaran','lokasi_kegiatan','no_srt1','hps_deal')
					->where('id',$id)->first();
		$rekanan =$this->get_rekanan($data->id_rekanan);
		$data->unit_kerja = $this->get_pegawai($data->id_users)->nama_departement;
		$data->rekanan = $rekanan->nama_rkn;
		$data->tanggal = Date::parse($this->get_jadwal($id)->thp11_dari)->format('j F Y');
		$data->alamat_rkn = $rekanan->alamat_rkn;
		
		$html =View::make('admin.report.cover')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->stream('sampul_'.$id.'.pdf');
	}
	function cetakSampulFIK($id){
		$data = new stdclass();
		$data = DB::table('pengadaans')
					->select('id','desk_kegiatan','id_rekanan','thn_anggaran')
					->where('id',$id)->first();
		$rekanan =$this->get_rekanan($data->id_rekanan);
		$data->rekanan = $rekanan->nama_rkn;
		$data->alamat_rkn = $rekanan->alamat_rkn;
		
		$html = View::make('admin.report.sampul_fik')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->stream('sampul_FIK_'.$id.'.pdf');
	}

	function cetakPi_rekanan($id){
		$data = new stdclass();
		$pengadaan = $this->get_pengadaan($id);
		$id_rekanan = $pengadaan->id_rekanan;
		$data = Pengurus::where('id_rekanan',$id_rekanan)->where('jabatan','Direktur')->first();
		$data->nama_rekanan=$this->get_rekanan($id_rekanan)->nama_rkn;
		$data->desk_kegiatan = $pengadaan->desk_kegiatan;
		$data->tanggal = Date::parse($this->get_jadwal($id)->thp2_dari)->format('j F Y');

		$html = View::make('admin.report.pakta_integritas_rekanan')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->stream('pi_rekanan.pdf');
	}
	function cetakPi_dinas($id){
		$data = new stdclass();
		$pengadaan = $this->get_pengadaan($id);
		$data->desk_kegiatan = $pengadaan->desk_kegiatan;
		$pembuat_komitmen = $this->get_pegawai($pengadaan->id_users);
		$data->user_pembuat = $pembuat_komitmen->nama;
		$data->nik = $pembuat_komitmen->nik;
		$pejabat_pengadaan = $this->get_pegawai(Session::get('id_user'));
		$data->user_pengadaan = $pejabat_pengadaan->nama;
		$data->nik_pengadaan = $pejabat_pengadaan->nik;

		$html = View::make('admin.report.pakta_integritas_dinas')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->stream('pi_dinas.pdf');
		
	}
	function cetakFik_rekanan($id){
		$data = new stdclass();
		$pengadaan = $this->get_pengadaan($id);
		$data = Rekanan::where('id_rkn',$pengadaan->id_rekanan)->first();
		$pengurus = $this->get_pengurus($pengadaan->id_rekanan);
		$pajak = $this->get_pajak($id);
		if(count($pajak)>0){
			$data->pajak = $pajak;	
		}
		
		$data->pemilik = $pengurus->nama_pengurus;
		$data->jabatan = $pengurus->jabatan;
		$data->nik = $pengurus->nik;
		$data->alamat = $pengurus->alamat;
		$data->telp = $pengurus->telp;
		$data->pengurus = $this->get_pengurus2($pengadaan->id_rekanan);
		$data->tanggal = Date::parse($this->get_jadwal($id)->thp2_dari)->format('j F Y');


		//print_r($data);
		$html =View::make('admin.report.fik_rekanan')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->stream('fik_rekanan.pdf');
	}
	function cetakPengalaman_rekanan($id){
		$data = new stdclass();
		$pengadaan = $this->get_pengadaan($id);
		$data->pengadaan = DB::table('pengadaans')
					->leftjoin('rekanans','pengadaans.id_rekanan','=','rekanans.id_rkn')
					->leftjoin('pegawai','pengadaans.id_users','=','pegawai.nik')
					->leftjoin('departements','pegawai.id_departement','=','departements.id_departement')
					->select('pengadaans.desk_kegiatan','pengadaans.id_rekanan','departements.nama_departement',
							'pengadaans.lokasi_kegiatan','pengadaans.id_users','rekanans.nama_rkn',
							'pengadaans.no_srt1','pengadaans.hps_deal')
					->where('pengadaans.id_users',$pengadaan->id_users)->where('pengadaans.status','4')->get();

		$data->tanggal = Date::parse($this->get_jadwal($id)->thp11_dari)->format('j F Y');
		$pengurus = $this->get_pengurus($pengadaan->id_rekanan);
		$data->nama_rkn=$this->get_rekanan($pengadaan->id_rekanan)->nama_rkn;
		$data->pemilik = $pengurus->nama_pengurus;
		$data->jabatan = $pengurus->jabatan;

		$html=View::make('admin.report.data_pengalaman_rekanan')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('landscape')->stream('pengalaman_perusahaan.pdf');
	}
	function cetakAkte_rekanan($id){
		$pengadaan = $this->get_pengadaan($id);
		$rekanan = Rekanan::where('id_rkn',$pengadaan->id_rekanan)->first();

		return Response::download(public_path('/asset/img/rekanan/'.$pengadaan->id_rekanan.'/'.$rekanan->file_akte));
	}
	function cetakPajak($id){
		$data = new stdclass();
		$data->pajak = Pajak::where('id_pengadaan',$id)->get();
		$data->id = $id;

		$html=View::make('admin.report.lampiran_pajak')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('portait')->stream($id.'_pajak.pdf');	
	}
	function cetakSiup($id){
		$pengadaan = $this->get_pengadaan($id);
		$data = Rekanan::where('id_rkn',$pengadaan->id_rekanan)->first();

		$html= View::make('admin.report.lampiran_siup')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('portait')->stream($id.'_SIUP_rekanan.pdf');
	}
	function cetakNpwp($id){
		$pengadaan = $this->get_pengadaan($id);
		$data = Rekanan::where('id_rkn',$pengadaan->id_rekanan)->first();

		$html= View::make('admin.report.lampiran_npwp')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('portait')->stream($id.'_npwp_rekanan.pdf');	
	}
	function cetakTdp($id){
		$pengadaan = $this->get_pengadaan($id);
		$data = Rekanan::where('id_rkn',$pengadaan->id_rekanan)->first();

		$html= View::make('admin.report.lampiran_tdp')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('portait')->stream($id.'_SIUP_rekanan.pdf');
	}
	function cetakRkt($id){
		$pengadaan = $this->get_pengadaan($id);
		$data = Rekanan::where('id_rkn',$pengadaan->id_rekanan)->first();

		$html= View::make('admin.report.lampiran_skt')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('portait')->stream($id.'_SKT_rekanan.pdf');
	}
	function cetakKtp($id){
		$pengadaan = $this->get_pengadaan($id);
		$data = Rekanan::where('id_rkn',$pengadaan->id_rekanan)->first();

		$html= View::make('admin.report.lampiran_ktp')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('portait')->stream($id.'_KTP_rekanan.pdf');
	}
	function cetakSampulPenawaran($id){
		$pengadaan = $this->get_pengadaan($id);
		$data = Rekanan::where('id_rkn',$pengadaan->id_rekanan)->first();
		$data->judul = $pengadaan->desk_kegiatan;

		$html= View::make('admin.report.dokumen_penawaran')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('portait')->stream($id.'_sampul_penawaran.pdf');
	}
	function cetakPenawaran_rekanan($id){
		$data=new stdclass();
		$pengadaan = $this->get_pengadaan($id);
		$rekanan = $this->get_rekanan($pengadaan->id_rekanan);
		$pengurus = $this->get_pengurus($rekanan->id_rkn);
		$data->id_rkn =$rekanan->id_rkn;
		$data->tanggal = Date::parse($this->get_jadwal($id)->thp3_smp)->format('j F Y');
		$data->file_kop = $rekanan->file_kop;
		$data->nama_rkn = $rekanan->nama_rkn;
		$data->pengurus = $pengurus->nama_pengurus;
		$data->jabatan = $pengurus->jabatan;
		$data->judul = $pengadaan->desk_kegiatan;
		$data->total_penawaran = $pengadaan->hps_rkn;
		$data->huruf = $this->convert($pengadaan->hps_rkn);

		$html= View::make('admin.report.surat_penawaran_rekanan')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('portait')->stream($id.'_surat_penawaran_rekanan.pdf');
	}
	function cetakLampiran_penawaran_rekanan($id){

		$data = new stdclass();
		$pengadaan = $this->get_pengadaan($id);
		$pengurus = $this->get_pengurus($pengadaan->id_rekanan);
		$data->detil = detil_pengadaan::where("id_pengadaan",$id)->get();
		$data->total = $this->get_pengadaan($id)->hps_rkn;
		$data->huruf = $this->convert($data->total);
		$data->nama_rkn =$this->get_rekanan($pengadaan->id_rekanan)->nama_rkn;
		$data->pengurus = $pengurus->nama_pengurus;
		$data->jabatan =$pengurus->jabatan;

		$html= View::make('admin.report.lampiran_penawaran_rekanan')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('portait')->stream($id.'Lampiran_penawaran_rekanan.pdf');	
	}
	function cetakBaepl($id){
		$data = new stdclass();
		$pengadaan = $this->get_pengadaan($id);
		$jadwal = $this->get_jadwal($id);
		$rekanan = $this->get_rekanan($pengadaan->id_rekanan);
		$pegawai = $this->get_pegawai($pengadaan->id_users);

		$data->judul = $pengadaan->desk_kegiatan;
		$data->tanggal = Date::parse($jadwal->thp4_smp)->format('j F Y');
		$data->nomor = $pengadaan->no_srt6;
		$data->hari =Date::parse($jadwal->thp4_smp)->format('l');
		$data->bulan =Date::parse($jadwal->thp4_smp)->format('F');
		$data->tgl_huruf =$this->convert(date('j',strtotime($jadwal->thp4_smp)));
		$data->tahun = Date::parse($jadwal->thp4_smp)->format('Y');
		$data->rekanan = $rekanan->nama_rkn;
		$data->alamat_rkn =$rekanan->alamat_rkn;
		$data->total_penawaran = $pengadaan->hps_rkn;
		$data->huruf = $this->convert($data->total_penawaran);
		$data->pegawai =$pegawai->nama;
		$data->nip = $pegawai->nik;

		$html=View::make('admin.report.ba_eppl')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('portait')->stream('baeppl.pdf');
	}
	function cetak_lampiran_evaluasi_tawar($id){
		$pengadaan = $this->get_pengadaan($id);
		$rekanan = $this->get_rekanan($pengadaan->id_rekanan);
		$pegawai= $this->get_pegawai(Session::get('id_user'));
		$jadwal = $this->get_jadwal($id);

		$data = new stdclass();
		$data->judul = $pengadaan->desk_kegiatan;
		$data->lokasi = $pengadaan->lokasi_kegiatan;
		$data->hps =$pengadaan->hps;
		$data->rekanan = $rekanan->nama_rkn;
		$data->hps_rkn = $pengadaan->hps_rkn;
		$data->tanggal =  Date::parse($jadwal->thp4_smp)->format('j F Y');
		$data->pejabat =$pegawai->nama;
		$data->jabatan = $pegawai->jabatan;
		$data->nip = $pegawai->nik;

		/*print_r($data);
		exit();
*/
		$html=View::make('admin.report.lembar_evaluasi_penawaran')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('portait')->stream('lembar_evaluasi_penawaran.pdf');
	}

	function cetakBa_klarifikasi($id){
		$pengadaan=$this->get_pengadaan($id);
		$jadwal =$this->get_jadwal($id);
		$rekanan = $this->get_rekanan($pengadaan->id_rekanan);
		$pengurus = $this->get_pengurus($pengadaan->id_rekanan);
		$pegawai = $this->get_pegawai(Session::get('id_user'));

		$data = new stdclass();
		$data->judul = $pengadaan->desk_kegiatan;
		$data->hari =  Date::parse($jadwal->thp5_smp)->format('l');
		$data->tanggal_huruf = $this->convert(date('j',strtotime($jadwal->thp5_smp)));
		$data->bulan = Date::parse($jadwal->thp5_smp)->format('F');
		$data->tahun = $this->convert(date('Y',strtotime($jadwal->thp5_smp)));
		$data->alamat_rkn = $rekanan->alamat_rkn;
		$data->pengurus = $pengurus->nama_pengurus;
		$data->jabatan = $pengurus->jabatan;
		$data->rekanan = $rekanan->nama_rkn;
		$data->pegawai = $pegawai->nama;
		$data->nip = $pegawai->nik;
		$data->tanggal = Date::parse($jadwal->thp4_smp)->format('j F Y');
		$data->nomor_klarifikasi = $pengadaan->no_srt6;
		$data->nomor_pengguna = $pengadaan->no_srt15;


		$html=View::make('admin.report.ba_klarifikasi')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('portait')->stream('ba_klarifikasi.pdf');
	}
	function cetakBa_negosiasi($id){
		$pengadaan=$this->get_pengadaan($id);
		$jadwal =$this->get_jadwal($id);
		$rekanan = $this->get_rekanan($pengadaan->id_rekanan);
		$pengurus = $this->get_pengurus($pengadaan->id_rekanan);
		$pegawai = $this->get_pegawai(Session::get('id_user'));


		$data = new stdclass();
		$data->judul = $pengadaan->desk_kegiatan;
		$data->sumber = $pengadaan->sumber_dana;
		$data->tahun_anggaran = $pengadaan->thn_anggaran;

		$data->hari = Date::parse($jadwal->thp6_smp)->format('l');
		$data->tanggal_huruf = $this->convert(date('j',strtotime($jadwal->thp6_smp)));
		$data->bulan = Date::parse($jadwal->thp6_smp)->format('F');
		$data->tahun = Date::parse($jadwal->thp6_smp)->format('Y');
		$data->alamat_rkn = $rekanan->alamat_rkn;
		$data->pengurus = $pengurus->nama_pengurus;
		$data->jabatan = $pengurus->jabatan;
		$data->rekanan = $rekanan->nama_rkn;
		$data->pegawai = $pegawai->nama;
		$data->nip = $pegawai->nik;
		$data->tanggal = Date::parse($jadwal->thp6_smp)->format('j F Y');
		$data->nomor_negosiasi = $pengadaan->no_srt8;
		$data->nomor_pengguna = $pengadaan->no_srt15;
		$data->hps_rkn = $pengadaan->hps_rkn;
		$data->hps_deal = $pengadaan->hps_deal;
		$data->hps_rkn_huruf = $this->convert($data->hps_rkn);
		$data->hps_deal_huruf = $this->convert($data->hps_deal);


		$html= View::make('admin.report.ba_negosiasi')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('portait')->stream('ba_negosiasi.pdf');
		
	}
	function cetakLampiran_negosiasi($id){
		$pengadaan=$this->get_pengadaan($id);
		$jadwal =$this->get_jadwal($id);
		$rekanan = $this->get_rekanan($pengadaan->id_rekanan);
		$pengurus = $this->get_pengurus($pengadaan->id_rekanan);
		$pegawai = $this->get_pegawai(Session::get('id_user'));
		$data = new stdclass();
		$data->tanggal = Date::parse($jadwal->thp6_smp)->format('j F Y');
		$data->nomor_lampiran = $pengadaan->no_srt8;
		$data->detil = detil_pengadaan::where('id_pengadaan',$id)->get();
		$data->total_nego = $pengadaan->hps_deal;
		$data->total_huruf = $this->convert($data->total_nego);
		$data->rekanan = $rekanan->nama_rkn;
		$data->pengurus =$pengurus->nama_pengurus;
		$data->jabatan =$pengurus->jabatan;
		$data->pegawai = $pegawai->nama;
		$data->nip = $pegawai->nik;

		$html=View::make('admin.report.lampiran_negosiasi')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('portait')->stream('lampiran_negosiasi.pdf');
	}
	function cetakBahpl($id){
		$pengadaan=$this->get_pengadaan($id);
		$jadwal =$this->get_jadwal($id);
		$rekanan = $this->get_rekanan($pengadaan->id_rekanan);
		$pengurus = $this->get_pengurus($pengadaan->id_rekanan);
		$pegawai = $this->get_pegawai(Session::get('id_user'));
		$data = new stdclass();
		$data->judul = $pengadaan->desk_kegiatan;
		$data->no_bahpl = $pengadaan->no_srt9;
		$data->tgl_bahpl = Date::parse($jadwal->thp7_smp)->format('j F Y');
		$data->hari = Date::parse($jadwal->thp7_smp)->format('l');
		$data->tanggal_huruf = $this->convert(date('j',strtotime($jadwal->thp7_smp)));
		$data->bulan = Date::parse($jadwal->thp7_smp)->format('F');
		$data->tahun = $this->convert(date('Y',strtotime($jadwal->thp7_smp)));
		$data->nomor_pengguna = $pengadaan->no_srt15;
		$data->rekanan = $rekanan->nama_rkn;
		$data->alamat_rkn = $rekanan->alamat_rkn;
		$data->hps_rkn = $pengadaan->hps_rkn;
		$data->hps_rkn_huruf = $this->convert($pengadaan->hps_rkn);
		$data->hps_nego = $pengadaan->hps_deal;
		$data->hps_nego_huruf = $this->convert($pengadaan->hps_deal);
		$data->npwp =$rekanan->npwp_rkn;
		$data->no_baepl =$pengadaan->no_srt6;
		$data->tgl_baepl =Date::parse($jadwal->thp4_smp)->format('j F Y');
		$data->nomor_klarifikasi =$pengadaan->no_srt7;
		$data->tgl_klarifikasi =Date::parse($jadwal->thp5_smp)->format('j F Y');
		$data->nomor_negosiasi =$pengadaan->no_srt8;
		$data->tgl_negosiasi =Date::parse($jadwal->thp6_smp)->format('j F Y');
		$data->pegawai=$pegawai->nama;
		$data->nip=$pegawai->nik;

		$html= View::make('admin.report.bahpl')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('portait')->stream('bahpl.pdf');
	}

	function cetak_ba_penetapan($id){
		$pengadaan=$this->get_pengadaan($id);
		$jadwal =$this->get_jadwal($id);
		$rekanan = $this->get_rekanan($pengadaan->id_rekanan);
		$pengurus = $this->get_pengurus($pengadaan->id_rekanan);
		$pegawai = $this->get_pegawai(Session::get('id_user'));

		$data = new stdclass();
		$data->judul = $pengadaan->desk_kegiatan;
		$data->thn_anggaran = $pengadaan->thn_anggaran;
		$data->nomor = $pengadaan->no_srt10;
		$data->no_pengguna = $pengadaan->no_srt15;
		$data->no_penawaran = $pengadaan->no_srt6;
		$data->tgl_penawaran = Date::parse($jadwal->thp4_smp)->format('j F Y');
		$data->no_bahpl =$pengadaan->no_srt9;
		$data->tgl_bahpl = Date::parse($jadwal->thp7_smp)->format('j F Y');
		$data->rekanan = $rekanan->nama_rkn;
		$data->pengurus = $pengurus->nama_pengurus;
		$data->alamat_rkn =$rekanan->alamat_rkn;
		$data->hps = number_format($pengadaan->hps,0,',','.');
		$data->hps_huruf = $this->convert($pengadaan->hps);
		$data->hps_rkn = number_format($pengadaan->hps_rkn,0,',','.');
		$data->hps_rkn_huruf = $this->convert($pengadaan->hps_rkn);
		$data->hps_nego = number_format($pengadaan->hps_deal,0,',','.');
		$data->hps_nego_huruf = $this->convert($pengadaan->hps_deal);
		$data->npwp = $rekanan->npwp_rkn;
		$data->tanggal = Date::parse($jadwal->thp8_smp)->format('j F Y');
		$data->pegawai = $pegawai->nama;
		$data->nip = $pegawai->nik;

		$html= View::make('admin.report.penetapan_penyedia_barang')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('portait')->stream('ba_penetapan_penyedia.pdf');
	}

	function cetak_lampiran_penetapan($id){
		$pengadaan=$this->get_pengadaan($id);
		$jadwal =$this->get_jadwal($id);
		$pegawai = $this->get_pegawai(Session::get('id_user'));		
		$detil = detil_pengadaan::where('id_pengadaan',$id)->get();

		$data = new stdclass();
		$data->nomor_penetapan = $pengadaan->no_srt10;
		$data->tanggal = Date::parse($jadwal->thp8_smp)->format('j F Y');
		$data->hps_nego = $pengadaan->hps_deal;
		$data->hps_nego_huruf = $this->convert($data->hps_nego);
		$data->detil = $detil;
		$data->pegawai = $pegawai->nama;
		$data->nip = $pegawai->nik;

		$html= View::make('admin.report.lampiran_penetapan')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('portait')->stream('lampiran_penetapan_penyedia.pdf');
	}
	function cetak_ba_penyerahan($id){
		$pengadaan=$this->get_pengadaan($id);
		$jadwal =$this->get_jadwal($id);
		$rekanan= $this->get_rekanan($pengadaan->id_rekanan);
		$pegawai = $this->get_pegawai(Session::get('id_user'));	
		$pejabat = $this->get_pegawai($pengadaan->id_users);

		$data  = new stdclass();
		$data->no_penyerahan = $pengadaan->no_srt11;
		$data->judul = $pengadaan->desk_kegiatan;
		$data->rekanan =$rekanan->nama_rkn;
		$data->alamat_rkn = $rekanan->alamat_rkn;
		$data->hari = Date::parse($jadwal->thp9_smp)->format('l');
		$data->tanggal_huruf = $this->convert(date('j',strtotime($jadwal->thp9_smp)));
		$data->bulan = Date::parse($jadwal->thp9_smp)->format('F');
		$data->tahun = $this->convert(date('Y',strtotime($jadwal->thp9_smp)));
		$data->pejabat_pengadaan = $pegawai->nama;
		$data->nip_pejabat_pengadaan = $pegawai->nik;
		$data->departement = $pegawai->nama_departement;
		$data->pejabat_komitmen = $pejabat->nama;
		$data->nip_pejabat_komitmen = $pejabat->nik;

		$html= View::make('admin.report.ba_penyerahan_pegadaan')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('portait')->stream('ba_penyeraahan_dok_pengadaan.pdf');
	}

	function cetak_surat_penunjukan($id){
		$pengadaan=$this->get_pengadaan($id);
		$jadwal =$this->get_jadwal($id);
		$rekanan= $this->get_rekanan($pengadaan->id_rekanan);
		$pegawai = $this->get_pegawai($pengadaan->id_users);	

		$data = new stdclass();
		$data->tanggal = Date::parse($jadwal->thp10_smp)->format('j F Y');
		$data->no_penunjukan = $pengadaan->no_srt12;
		$data->rekanan = $rekanan->nama_rkn;
		$data->judul = $pengadaan->desk_kegiatan;
		$data->thn_anggaran = $pengadaan->thn_anggaran;
		$data->tgl_penawaran = $jadwal->thp4_smp;
		$data->hps_nego = number_format($pengadaan->hps_deal,0,',','.');
		$data->hps_nego_huruf = number_format($pengadaan->hps_deal,0,',','.');
		$data->pegawai = $pegawai->nama;
		$data->nip = $pegawai->nik;

		$html= View::make('admin.report.sppb')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('portait')->stream('surat_penunjukan_penyedia.pdf');
	}

	function cetakLampiran_pesanan($id){
		return PDF::loadView('admin.report.lampiran_pesanan')->setPaper('legal')->setOrientation('portrait')->stream('baeppl.pdf');
	}

	function get_pengadaan($id){
		return Proyek::where('id',$id)->first();
	}

	function get_rekanan($id_rkn){
		return Rekanan::where('id_rkn',$id_rkn)->first();
	}

	function get_jadwal($id){
		return Jadwal::where('id_table',$id)->where('jenis_jadwal','pengadaan')->first();
	}

	function get_pegawai($id_user){
		return DB::table('pegawai')
					->leftjoin('departements','pegawai.id_departement','=','departements.id_departement')
					->select('pegawai.nik','pegawai.nama','departements.nama_departement','pegawai.jabatan')->where('pegawai.nik',$id_user)->first();
	}
	function get_pengurus($id_rekanan){
		$data = Pengurus::where('id_rekanan',$id_rekanan)->where('jabatan','Direktur')->first(); 
		if(count($data)>0){
			return $data;	
		}
		
	}
	function get_pengurus2($id_rekanan){
		return Pengurus::where('id_rekanan',$id_rekanan)->get();
	}

	function get_pajak($id){
		return Pajak::where('id_pengadaan',$id)->get();
	}

	function cek_sampul($id){
		if(Request::ajax()){
			$data = Proyek::where('id',$id)->first();
			$pengurus = DB::table('rekanan_pengurus')->where('id_rekanan',$data->id_rekanan)->get();

			if(null == $data->id_rekanan){
				echo "Rekanan Belum dipilih";
			}elseif(null ==$data->hps_deal){
				echo "Pengadaan belum melakukan negosiasi";
			}elseif(null == $data->no_srt1){
				echo "Anda belum mengisi no pengadaan";
			}else{
				echo "ok";
			}
		}
	}
	function cek_sampul_fik($id){
		if(Request::ajax()){
			$data = Proyek::where('id',$id)->first();

			if(null == $data->id_rekanan){
				echo "Rekanan Belum dipilih";
			}else{
				echo "ok";
			}
		}
	}
	function cek_pi_rekanan($id){
		$pengadaan = $this->get_pengadaan($id);
		$pengurus = DB::table('rekanan_pengurus')->where('id_rekanan',$pengadaan->id_rekanan)->get();

		if(null ==$pengadaan->id_rekanan){
			echo "Rekanan Belum dipilih";
		}elseif(count($pengurus)==0){
			echo "Rekanan Belum mengisi Form Pengurus";
		}else{
			echo "ok";
		}


	}

	function cek_lap_fik($id){
		$pengadaan = $this->get_pengadaan($id);
		$pengurus = DB::table('rekanan_pengurus')->where('id_rekanan',$pengadaan->id_rekanan)->get();
		$pajak = DB::table('pajak')->where('id_pengadaan',$id)->get();

		if(null ==$pengadaan->id_rekanan){
			echo "Rekanan Belum dipilih";
		}elseif(count($pengurus)==0){
			echo "Rekanan Belum mengisi Form Pengurus";
		}elseif(count($pajak)==0){
			echo "Rekanan belum mengisi pajak";
		}else{
			echo "ok";
		}
	}

	function cek_akte($id){
		$pengadaan = $this->get_pengadaan($id);
		$rekanan = Rekanan::where('id_rkn',$pengadaan->id_rekanan)->first();

		if(null ==$pengadaan->id_rekanan){
			echo "Rekanan Belum dipilih";
		}elseif(null ==$rekanan->file_akte){
			echo "File Akte Belum Dimasukan oleh Rekanan";
		}else{
			echo "ok";
		}
	}
	function cek_pajak($id){
		if(Request::ajax()){
			$pengadaan = $this->get_pengadaan($id);
			$pajak = Pajak::where('id_pengadaan',$id)->get();

			if(null ==$pengadaan->id_rekanan){
				echo "Rekanan Belum dipilih";
			}elseif(count($pajak)==0){
				echo "Rekanan Belum memasukkan file Pajak";
			}else{
				echo "ok";
			}	
		}
		
	}
	function cek_siup($id){
		if(Request::ajax()){
			$pengadaan = $this->get_pengadaan($id);
			$rekanan = Rekanan::where('id_rkn',$pengadaan->id_rekanan)->first();

			if(null ==$pengadaan->id_rekanan){
				echo "Rekanan Belum dipilih";
			}elseif(null ==$rekanan->file_siup){
				echo "Rekanan Belum memasukkan file siup";
			}else{
				echo "ok";
			}	
		}
	}
	function cek_npwp($id){
		if(Request::ajax()){
			$pengadaan = $this->get_pengadaan($id);
			$rekanan = Rekanan::where('id_rkn',$pengadaan->id_rekanan)->first();

			if(null ==$pengadaan->id_rekanan){
				echo "Rekanan Belum dipilih";
			}elseif(null ==$rekanan->file_npwp){
				echo "Rekanan Belum memasukkan file NPWP";
			}else{
				echo "ok";
			}	
		}
	}
	function cek_tdp($id){
		if(Request::ajax()){
			$pengadaan = $this->get_pengadaan($id);
			$rekanan = Rekanan::where('id_rkn',$pengadaan->id_rekanan)->first();

			if(null ==$pengadaan->id_rekanan){
				echo "Rekanan Belum dipilih";
			}elseif(null ==$rekanan->file_tdp){
				echo "Rekanan Belum memasukkan file TDP";
			}else{
				echo "ok";
			}	
		}
	}
	function cek_rkt($id){
		if(Request::ajax()){
			$pengadaan = $this->get_pengadaan($id);
			$rekanan = Rekanan::where('id_rkn',$pengadaan->id_rekanan)->first();

			if(null ==$pengadaan->id_rekanan){
				echo "Rekanan Belum dipilih";
			}elseif(null ==$rekanan->file_rkt){
				echo "Rekanan Belum memasukkan file SKT";
			}else{
				echo "ok";
			}	
		}
	}
	function cek_ktp($id){
		if(Request::ajax()){
			$pengadaan = $this->get_pengadaan($id);
			$rekanan = Rekanan::where('id_rkn',$pengadaan->id_rekanan)->first();

			if(null ==$pengadaan->id_rekanan){
				echo "Rekanan Belum dipilih";
			}elseif(null ==$rekanan->file_ktp){
				echo "Rekanan Belum memasukkan file KTP";
			}else{
				echo "ok";
			}	
		}
	}
	function cek_sampul_penawaran($id){
		if(Request::ajax()){
			$pengadaan = $this->get_pengadaan($id);
			$rekanan = Rekanan::where('id_rkn',$pengadaan->id_rekanan)->first();

			if(null ==$pengadaan->id_rekanan){
				echo "Rekanan Belum dipilih";
			}else{
				echo "ok";
			}	
		}
	}
	function cek_penawaran_rekanan($id){
		if(Request::ajax()){
			$pengadaan = $this->get_pengadaan($id);

			if(null ==$pengadaan->id_rekanan){
				echo "Rekanan Belum dipilih";
			}elseif(null ==$pengadaan->hps_rkn){
				echo "Rekanan Belum memasukan Penawaran Pengadaan";
			}else{
				echo "ok";
			}	
		}
	}

	function cek_lampiran_rekanan($id){
		if(Request::ajax()){
			$pengadaan = $this->get_pengadaan($id);

			if(null ==$pengadaan->id_rekanan){
				echo "Rekanan Belum dipilih";
			}elseif(null == $pengadaan->hps_rkn){
				echo "Rekanan Belum memasukan Penawaran Pengadaan";
			}else{
				echo "ok";
			}	
		}
	}
	function cek_baepl($id){
		if(Request::ajax()){
			$pengadaan = $this->get_pengadaan($id);
			$jadwal = $this->get_jadwal($id);

			if(null ==$pengadaan->id_rekanan){
				echo "Rekanan Belum dipilih";
			}elseif(null==$pengadaan->hps_rkn){
				echo "Rekanan belum memasukan penawaran pengadaan";
			}elseif(null==$jadwal->thp4_dari or null==$jadwal->thp4_dari){
				echo "jadwal Pengadaan belum diisi";
			}elseif(null == $pengadaan->no_srt6){
				echo "No Surat Belum diisi";
			}else{
				echo "ok";
			}	
		}
	}

	function cek_lampiran_evaluasi_tawar($id){
		if(Request::ajax()){
			$pengadaan = $this->get_pengadaan($id);
			$jadwal = $this->get_jadwal($id);
			$rekanan = $this->get_rekanan($pengadaan->id_rekanan);
			$pajak = $this->get_pajak($id);

			if(null ==$pengadaan->id_rekanan){
				echo "Rekanan Belum dipilih";
			}elseif(null==$pengadaan->hps_rkn){
				echo "Rekanan belum memasukan penawaran pengadaan";
			}elseif(null==$rekanan->file_siup){
				echo "Rekanan belum memasukkan file SIUP";
			}elseif(null==$rekanan->file_npwp){
				echo "Rekanan belum memasukkan file NPWP";
			}elseif(null==$rekanan->file_akte){
				echo"rekanan belum memasukkan file akta";
			}elseif(null==$jadwal->thp4_dari or null==$jadwal->thp4_dari){
				echo "jadwal Pengadaan belum diisi";
			}elseif(count($pajak)==0){
				echo "Rekanan belum mengisikan data pajak 3 bulan";
			}elseif(null == $pengadaan->no_srt6){
				echo "No Surat Belum diisi";
			}else{
				echo "ok";
			}	
		}
	}

	function cek_ba_klarifikasi($id){
		if(Request::ajax()){
			$pengadaan = $this->get_pengadaan($id);
			$jadwal = $this->get_jadwal($id);
			$pengurus = $this->get_pengurus2($pengadaan->id_rekanan);

			if(null ==$pengadaan->id_rekanan){
				echo "Rekanan Belum dipilih";
			}elseif(null==$jadwal->thp5_dari or null==$jadwal->thp5_smp){
				echo "Anda belum memasukan jadwal Klarifikasi Teknis";
			}elseif(null==$jadwal->thp4_dari or null==$jadwal->thp4_smp){
				echo "Anda belum memasukan jadwal Pembukaan , Penawaran dan evaluasi";
			}elseif(count($pengurus)==0){
				echo "Pengurus Rekanan belum diisi oleh rekanan";
			}elseif(null == $pengadaan->no_srt6){
				echo "No Surat Evaluasi Penawaran belum diisi";
			}elseif(null == $pengadaan->no_srt15){
				echo "No Surat Pengguna Anggaran Belum diisi";
			}else{
				echo "ok";
			}	
		}
	}

	function cek_ba_negosiasi($id){
		if(Request::ajax()){
			$pengadaan = $this->get_pengadaan($id);
			$jadwal = $this->get_jadwal($id);
			$pengurus = $this->get_pengurus2($pengadaan->id_rekanan);

			if(null ==$pengadaan->id_rekanan){
				echo "Rekanan Belum dipilih";
			}elseif(null==$jadwal->thp6_dari or null==$jadwal->thp6_smp){
				echo "Anda Belum Mengisi Jadwal Negosiasi";
			}elseif(null==$pengadaan->hps_rkn){
				echo "Rekanan Belum memasukkan penawaran";
			}elseif(null==$pengadaan->hps_deal){
				echo "Data negosisiasi belum diisi";
			}elseif(count($pengurus)==0){
				echo "Pengurus Rekanan belum diisi oleh rekanan";
			}elseif(null == $pengadaan->no_srt8){
				echo "No Surat Negosiasi belum diisi";
			}elseif(null == $pengadaan->no_srt15){
				echo "No Surat Pengguna Anggaran Belum diisi";
			}else{
				echo "ok";
			}	
		}
	}
	function cek_lampiran_negosiasi($id){
		if(Request::ajax()){
			$pengadaan = $this->get_pengadaan($id);
			$jadwal = $this->get_jadwal($id);
			

			if(null ==$pengadaan->id_rekanan){
				echo "Rekanan Belum dipilih";
			}elseif(null==$jadwal->thp6_dari or null==$jadwal->thp6_smp){
				echo "Anda Belum Mengisi Jadwal Negosiasi";
			}elseif(null==$pengadaan->hps_rkn){
				echo "Rekanan Belum memasukkan penawaran";
			}elseif(null==$pengadaan->hps_deal){
				echo "Data negosisiasi belum diisi";
			}elseif(null == $pengadaan->no_srt8){
				echo "No Surat Negosiasi belum diisi";
			}else{
				echo "ok";
			}	
		}
	}
	function cek_bahpl($id){
		if(Request::ajax()){
			$pengadaan = $this->get_pengadaan($id);
			$jadwal = $this->get_jadwal($id);
			

			if(null ==$pengadaan->id_rekanan){
				echo "Rekanan Belum dipilih";
			}elseif(null==$jadwal->thp7_dari or null==$jadwal->thp7_smp){
				echo "Anda Belum Mengisi Jadwal Berita acara hasil pengadaan langsung";
			}elseif(null==$pengadaan->hps_rkn){
				echo "Rekanan Belum memasukkan penawaran";
			}elseif(null==$pengadaan->hps_deal){
				echo "Data negosisiasi belum diisi";
			}elseif(null == $pengadaan->no_srt9){
				echo "No Surat BAHPL belum diisi";
			}elseif(null == $pengadaan->no_srt6){	
				echo "No Surat Evaluasi Penawaran belum diisi";
			}elseif(null == $pengadaan->no_srt7){	
				echo "No Surat Klarifikasi belum diisi";
			}elseif(null == $pengadaan->no_srt8){	
				echo "No Surat Negosiasi belum diisi";
			}elseif(null == $pengadaan->no_srt15){	
				echo "No Surat Pengguna Anggara Belum diisi";
			}else{
				echo "ok";
			}	
		}
	}

	function cek_ba_penetapan($id){
		if(Request::ajax()){
			$pengadaan = $this->get_pengadaan($id);
			$jadwal = $this->get_jadwal($id);
			

			if(null ==$pengadaan->id_rekanan){
				echo "Rekanan Belum dipilih";
			}elseif(null==$jadwal->thp8_dari or null==$jadwal->thp8_smp){
				echo "Anda Belum mengisi jadwal penetapan penyedia barang";
			}elseif(null==$jadwal->thp4_dari or null==$jadwal->thp4_smp){
				echo "Anda Belum mengisi jadwal evaluasi";
			}elseif(null==$jadwal->thp7_dari or null==$jadwal->thp7_smp){
				echo "Anda Belum mengisi jadwal penetapan penyedia barang";
			}elseif(null==$pengadaan->hps_rkn){
				echo "HPS awal belum diisi datanya";
			}elseif(null==$pengadaan->hps_rkn){
				echo "Rekanan Belum memasukkan penawaran";
			}elseif(null==$pengadaan->hps_deal){
				echo "Data negosisiasi belum diisi";
			}elseif(null == $pengadaan->no_srt6){
				echo "No Surat BA Evaluasi Penawaran belum diisi";
			}elseif(null == $pengadaan->no_srt8){
				echo "No Surat Negosiasi belum diisi";
			}elseif(null == $pengadaan->no_srt9){
				echo "No Surat BAHPL belum diisi";
			}elseif(null == $pengadaan->no_srt10){
				echo "No Surat penetapan belum diisi";
			}else{
				echo "ok";
			}	
		}
	}

	function cek_lampiran_penetapan($id){
		if(Request::ajax()){
			$pengadaan = $this->get_pengadaan($id);
			$jadwal = $this->get_jadwal($id);
			

			if(null ==$pengadaan->id_rekanan){
				echo "Rekanan Belum dipilih";
			}elseif(null ==$pengadaan->hps_deal){
				echo "Data Negosiasi belum diisi";
			}elseif(null==$jadwal->thp7_dari or null==$jadwal->thp7_smp){
				echo "Anda Belum mengisi jadwal penetapan penyedia barang";
			}elseif(null == $pengadaan->no_srt10){
				echo "No Surat Penetapan Penyedia belum diisi";
			}else{
				echo "ok";
			}	
		}
	}

	function cek_ba_penyerahan($id){
		if(Request::ajax()){
			$pengadaan = $this->get_pengadaan($id);
			$jadwal = $this->get_jadwal($id);
			

			if(null ==$pengadaan->id_rekanan){
				echo "Rekanan Belum dipilih";
			}elseif(null==$jadwal->thp9_dari or null==$jadwal->thp9_smp){
				echo "Anda Belum mengisi jadwal penyerahan dokumen belum diisi";
			}elseif(null == $pengadaan->no_srt11){
				echo "No Surat Penyerahan Dokumen belum diisi";
			}else{
				echo "ok";
			}	
		}
	}
	function cek_surat_penunjukan($id){
		if(Request::ajax()){
			$pengadaan = $this->get_pengadaan($id);
			$jadwal = $this->get_jadwal($id);
			

			if(null ==$pengadaan->id_rekanan){
				echo "Rekanan Belum dipilih";
			}elseif(null==$jadwal->thp10_dari or null==$jadwal->thp10_smp){
				echo "Anda Belum mengisi jadwal penyerahan dokumen belum diisi";
			}elseif(null == $pengadaan->no_srt12){
				echo "No Surat Penunjukan Penyedia belum diisi";
			}else{
				echo "ok";
			}	
		}
	}

}
