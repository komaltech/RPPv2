<?php

class PermintaanController extends BaseController {

	public function index(){

		$data = new stdclass();
		$kategori = DB::table('kategori')->get();
		$data->kategori[""] = "--Pilih Kategori--";
		foreach($kategori as $row){
			$data->kategori[$row->id_cat] = $row->cat_nama;
		}	
		$data->page = "add";
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.permintaan.form'))->with('data',$data);

	}
	public function permintaanajax(){	
		$data = DB::table('pengadaans')
				->join('kategori','pengadaans.id_cat','=','kategori.id_cat')
				->select('pengadaans.id','pengadaans.no_srt_permintaan',
							'pengadaans.lokasi_kegiatan',
							'pengadaans.status','pengadaans.pagu',
							'pengadaans.hps','kategori.cat_nama','pengadaans.desk_kegiatan',
							'pengadaans.aksi'
						)->where('id_users',Session::get("id_user"));

		if(count($data)>0){
			return Datatables::of($data)
					->remove_column('id')
					->remove_column('lokasi_kegiatan')
					->remove_column('alamat_pengerjaan')
					->remove_column('cat_nama')
					->remove_column('desk_kegiatan')
					->edit_column('no_srt_permintaan','
						<h5>{{$desk_kegiatan}}</h5>
						<small>
						<p><strong>Kategori :</strong>{{$cat_nama}}</p>
						<p>
							<strong>Lokasi Kegiatan</strong><br>
							{{ $lokasi_kegiatan }}
						</p></small>
					')
					->edit_column('pagu','{{ String::formatMoney($pagu,"Rp.") }}')
					->edit_column('hps','{{ String::formatMoney($hps,"Rp.") }}')
					->edit_column('status','
							@if($status=="0")
								<h4><span class="label label-warning">Belum Divalidasi</span></h4>
							@elseif($status =="1")
								<h4><span class="label label-info">Rekanan Dipilih</span></h4>
							@elseif($status=="2")
								<h4><span class="label label-primary">Form Kualifikasi dikirim</span></h4>
							@elseif($status=="3")
								<h4><span class="label label-primary">Pengadaan Diproses</span></h4>
							@else
								<h4><span class="label label-success">Pengadaan Selesai</span></h4>
							@endif
						'
					)
					->edit_column('aksi','
						<div class="btn-group" >
						<a href="{{ URL::to("admin/permintaan/detil-list/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-th-list"></i></a>
						@if($aksi == "0")
								<a href="{{ URL::to("admin/permintaan/cetak/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-print"></i></a>
								<a href="{{ URL::to("admin/permintaan/edit/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-edit"></i></a>
								<a href="{{ URL::to("admin/permintaan/del/".$id) }}" class="btn btn-danger" data-toggle="tooltip" ><i class="fa fa-trash-o"></i></a>
						@elseif($aksi =="4")
							<a href="{{ URL::to("admin/permintaan/cetak/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-print"></i></a>
						@endif
						</div>
					')
					->make();

		}
		
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.permintaan.list'));
	}
	public function detil_permintaan($id){
		$data = new stdclass();
		$data =  DB::table('pengadaans')
				->leftjoin('rekanans','pengadaans.id_rekanan','=','rekanans.id_rkn')
				->join('kategori','pengadaans.id_cat','=','kategori.id_cat')
				->select(
					'pengadaans.id','pengadaans.no_srt_permintaan','pengadaans.desk_kegiatan',
					'pengadaans.lokasi_kegiatan','pengadaans.alamat_pengerjaan','pengadaans.telp_lokasi_pengerjaan',
					'pengadaans.website','pengadaans.pagu','pengadaans.hps','pengadaans.hps_deal','pengadaans.status','pengadaans.hps_rkn',
					'pengadaans.aksi','kategori.cat_nama','rekanans.nama_rkn','pengadaans.id_rekanan'
					)
				->where('pengadaans.id','=',$id)->first();

		$data->id=$id;
		$data->page="permintaan";

		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.pengadaan.detil'))->with('data',$data);
	}


	public function add(){
		$data->page = "add";
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.permintaan.form'))->with('data',$data);	
	}

	public function del($id){
		$data = Proyek::find($id);
		$data->delete();
	}

	public function pengadaan_edit($id){
		$data = new stdclass();

		$data = Proyek::where('id',$id)->first();
		
		$kategori = Kategori::lists('cat_nama','id_cat');
		$data->kategori = $kategori;
	
		/*print_r($data->kategori);
		exit;*/

		$data->page="edit";
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.permintaan.form'))->with('data',$data);
	}

	public function pengadaan_update($id){
		$pengadaan = Proyek::find($id);

		$pengadaan->no_srt_permintaan = Input::get('no_permintaan');
		$pengadaan->id_users = Session::get('id_user');
		$pengadaan->id_cat = Input::get('jenis');
		$pengadaan->sifat = Input::get('sifat');
		$pengadaan->desk_kegiatan = Input::get('desk_keg');
		$pengadaan->lokasi_kegiatan = Input::get('lokasi');
		$pengadaan->alamat_pengerjaan = Input::get('alamat');
		$pengadaan->telp_lokasi_pengerjaan = Input::get('telp');
		$pengadaan->website = Input::get('website');
		$pengadaan->sumber_dana = Input::get('sumber_dana');
		$pengadaan->thn_anggaran = Input::get('tahun');
		$pengadaan->pagu = Input::get('pagu');

		$pengadaan->save();


		return Redirect::to('admin/permintaan/add/'.$pengadaan->id);
	}

	public function save_all($id){
		$data = detil_pengadaan::where('id_pengadaan','=',$id)->first();
		if(count($data)<1){
			Session::flash('messages','
					<div class="alert alert-danger alert-dismissable" style="margin-top:20px;">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<h4><i class="fa fa-exclamation" ></i> Peringatan...</strong></h4>
                    			Data spesifikasi pada tabel penawaran harus diisi
                		</div>
				');		

			return Redirect::to('admin/permintaan/add/'.$id);
		}else{

			$rekanan = DB::table('pengadaans')->select('id_rekanan')->where('id',$id)->first();

			$pengadaan = Proyek::find($id);
			
			if(empty($rekanan)){
				
				$pengadaan->status = 0;
				$pengadaan->aksi = 0;
				
			}
			$pengadaan->hps = $this->get_hps($id);
			$pengadaan->save();
			return Redirect::to('admin/permintaan/');
		}

	}

	public function pengadaan_simpan(){
		
		$id = DB::table('pengadaans')->insertGetId(array(
				'no_srt_permintaan' => Input::get('no_permintaan'),
				'id_users' => Session::get('id_user'),
				'sifat' => Input::get('sifat'),
				'desk_kegiatan' => Input::get('desk_keg'),
				'id_cat' => Input::get('jenis'),
				'lokasi_kegiatan' => Input::get('lokasi'),
				'alamat_pengerjaan' => Input::get('alamat'),
				'telp_lokasi_pengerjaan'=> Input::get('telp'),
				'website' => Input::get('website'),
				'sumber_dana' => Input::get('sumber_dana'),
				'thn_anggaran' => Input::get('tahun'),
				'pagu' => Input::get('pagu'),
				'status' =>0,
				'aksi' =>0)
			);
		/*$pengadaan = new Proyek();

		$pengadaan->no_srt_permintaan = Input::get('no_permintaan');
		$pengadaan->id_users = Session::get('id_user');
		$pengadaan->sifat = Input::get('sifat');
		$pengadaan->desk_kegiatan = Input::get('desk_keg');
		$pengadaan->id_cat = Input::get('jenis');
		$pengadaan->lokasi_kegiatan = Input::get('lokasi');
		$pengadaan->alamat_pengerjaan = Input::get('alamat');
		$pengadaan->telp_lokasi_pengerjaan = Input::get('telp');
		$pengadaan->website = Input::get('website');
		$pengadaan->sumber_dana = Input::get('sumber_dana');
		$pengadaan->thn_anggaran = Input::get('tahun');
		$pengadaan->pagu = Input::get('pagu');
		$pengadaan->status ="0";
		$pengadaan->aksi ="0";
		$pengadaan->save();
		*/
		$jadwal = new Jadwal();
		$jadwal->id_table = $id;
		$jadwal->jenis_jadwal = "pengadaan";
		$jadwal->thp1_dari = date('Y-m-d');
		$jadwal->thp1_smp = date('Y-m-d');
		$jadwal->save();


	
		return Redirect::to('admin/permintaan/add/'.$id);		
	}

	public function detil_edit($id){
		$data = Detil_pengadaan::find($id);
		$data->id=$data->id_pengadaan;
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.permintaan.form_edit_detail'))->with('data',$data);	
			
	}

	function detil_delete($id){
		if(Request::ajax()){
			$data = Detil_pengadaan::find($id);
			
			if($data->delete()){
				echo "ok";
			}else{
				echo "error";
			}	
		}
	
	}

	function get_hps($id){
		return DB::table('detil_pengadaan')->where('id_pengadaan',$id)->sum('total_hrg_hps');
	}

	public function form2($id){
		$data = new stdclass();
		$data->total = $this->get_hps($id);
		$data->id = $id;

		return  View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.permintaan.form2'))->with('data',$data);
	}

	public function detil_update($id){
		$data = Detil_pengadaan::find($id);

		$id_pengadaan= Input::get("id");
		$data->nama_brg = Input::get("nama_brg");
		$data->spesifikasi = Input::get("spesifikasi");
		$data->kebutuhan= Input::get("kebutuhan");
		$data->hrg_satuan_hps= Input::get("hrg_satuan");
		$data->total_hrg_hps= Input::get("total_hrg");	
		$data->save();
	
		return Redirect::to('admin/permintaan/add/'.$id_pengadaan);	
	}

	public function detil_ajaxadd(){
		if(Request::ajax()){
			$data = new detil_pengadaan();
			$data->id_pengadaan = Input::get("id");
			$data->nama_brg = Input::get("nama_brg");
			$data->spesifikasi = Input::get("spesifikasi");
			$data->kebutuhan= Input::get("kebutuhan");
			$data->hrg_satuan_hps= Input::get("hrg_satuan");
			$data->total_hrg_hps= Input::get("total_hrg");
			$data->save();
			return Input::get("hrg_satuan");
		}
		
	}
	public function listAjax($id){
		$data = DB::table('detil_pengadaan')
				->select('id_detil','nama_brg','spesifikasi','kebutuhan','hrg_satuan_hps','total_hrg_hps')
				->where('id_pengadaan',$id);

		if(count($data)>0){
			return Datatables::of($data)
					->remove_column('id_detil')
					->remove_column('spesifikasi')
					->edit_column('nama_brg','<strong>{{ $nama_brg }}</strong><br>{{ $spesifikasi }}')
					->edit_column('hrg_satuan_hps','{{ String::formatMoney($hrg_satuan_hps,"Rp.") }}')
					->edit_column('total_hrg_hps','{{ String::formatMoney($total_hrg_hps,"Rp.") }}')
					->add_column(null,'
						<div class="btn-group">
							
							<a href="{{ URL::to("admin/permintaan/detil/del/".$id_detil) }}" id="del" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="bottom" title="Hapus data"><i class="fa fa-times"  ></i></a>
						</div>	
					')
					->make();

		}
		
	}

	function cetak($id){
		$data = DB::table('pengadaans')->select('id','desk_kegiatan','lokasi_kegiatan','pagu','hps')->where('id',$id)->first();
		return  View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.permintaan.cetak'))->with('data',$data);
	}

	function cetak_sk($id){
		$data = new stdclass();
		$data = DB::table('pengadaans')
				->leftjoin('jadwals','pengadaans.id','=','jadwals.id_table')
				->leftjoin('kategori','pengadaans.id_cat','=','kategori.id_cat')
				->select('pengadaans.no_srt_permintaan','kategori.cat_nama',
						'pengadaans.desk_kegiatan','pengadaans.lokasi_kegiatan','pengadaans.hps',
						'pengadaans.alamat_pengerjaan','pengadaans.id_users','pengadaans.pagu'
						)
				->where('pengadaans.id',$id)->first();
		$user =  $this->get_user($data->id_users);		
		$data->pegawai =$user->nama;
		$data->departement = $this->get_departement($user->id_departement)->nama_departement;
		$data->tanggal = date('d F Y',strtotime($this->get_jadwal($id)->thp1_dari));
		//print_r($data);
		//return View::make('admin.report.surat_sk_permintaan')->with('data',$data);
		
		$html = View::make('admin.report.surat_sk_permintaan')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->stream('sk_permintaan');
	}

	function cetak_hps($id){
		$data = new stdclass();
		$data->detil = DB::table('detil_pengadaan')
				->select('nama_brg','spesifikasi','kebutuhan','hrg_satuan_hps','total_hrg_hps')
				->where('id_pengadaan',$id)->get();

		$pengadaan = $this->get_desk($id);
		$user =  $this->get_user($pengadaan->id_users);
		$data->nik = $pengadaan->id_users;
		$data->hps = $pengadaan->hps;
		$data->huruf =$this->convert($pengadaan->hps);		
		$data->deskripsi = $pengadaan->desk_kegiatan;
		$data->pegawai =$user->nama;
		$data->departement = $this->get_departement($user->id_departement)->nama_departement;
		$data->tanggal = date('d F Y',strtotime($this->get_jadwal($id)->thp1_dari));
		$data->no = 0;

		$html = View::make('admin.report.surat_hps')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->stream('hps.pdf');
	}

	function get_jadwal($id){
		return DB::table('jadwals')->select('thp1_dari')->where('id_table',$id)->where('jenis_jadwal','pengadaan')->first();
	}

	function get_desk($id){
		return DB::table('pengadaans')->select('desk_kegiatan','id_users','hps','id_users')->where('id',$id)->first();
	}

	function get_user($user){
		return DB::table('pegawai')->select('nama','id_departement')->where('nik',$user)->first();
	}
	function get_departement($id){
		return DB::table('departements')->select('nama_departement')->where('id_departement',$id)->first();
	}
	

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
}
