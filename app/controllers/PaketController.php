<?php

class PaketController extends BaseController {

	public function index(){

		$data = new stdclass();
		$kategori = DB::table('kategori')->get();
		$data->kategori[""] = "--Pilih Kategori--";
		foreach($kategori as $row){
			$data->kategori[$row->id_cat] = $row->cat_nama;
		}
		$data->page = "add";
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.paket.form'))->with('data',$data);

	}
	public function paketajax(){
		//$userid = Session::get('user_id');
		$data = DB::table('paket')
				->join('kategori','paket.id_cat','=','kategori.id_cat')
				->select('paket.user_id','paket.nama_paket','kategori.cat_nama','paket.status','paket.pagu','paket.aksi')
				->where('user_id',Session::get("user_id"));

		if(count($data)>0){
			//$data->where('user_id','=',$userid);
			return Datatables::of($data)
					->remove_column('user_id')
					->remove_column('cat_nama')
					->edit_column('nama_paket','
						<strong>{{$nama_paket}}</strong><br>
						<small><p>Kategori : <strong>{{$cat_nama}}</strong></p></small><br>
					')
					->edit_column('pagu','{{ String::formatMoney($pagu,"Rp.") }}')
					->edit_column('status','
							@if($status == "0")
								<h4><span class="label label-warning">Draft</span></h4>
							@elseif($status == "1")
								<h4><span class="label label-info">TerVerifikasi Layanan</span></h4>
							@elseif($status == "2")
								<h4><span class="label label-primary">TerVerifikasi Ka. ULP</span></h4>
							@elseif($status == "3")
								<h4><span class="label label-Primary">TerVerifikasi Pokja</span></h4>
							@elseif($status == "4")
								<h4><span class="label label-success">Paket Diumumkan</span></h4>
							@elseif($status == "5")
								<h4><span class="label label-success">Paket Ditolak</span></h4>
							@endif
						')
					->edit_column('aksi','
						<div class="btn-group" >
						<a href="{{ URL::to("admin/paket/detil-list/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-th-list"></i></a>
						@if($aksi == "0")
								<a href="{{ URL::to("admin/paket/cetak/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-print"></i></a>
								<a href="{{ URL::to("admin/paket/edit/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-edit"></i></a>
								<a href="{{ URL::to("admin/paket/del/".$id) }}" class="btn btn-danger" data-toggle="tooltip" ><i class="fa fa-trash-o"></i></a>
						@elseif($aksi =="4")
							<a href="{{ URL::to("admin/paket/cetak/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-print"></i></a>
						@endif
						</div>
					')
					->make();

		}

		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.paket.list'));
	}
	public function detil_paket($id){
		$data = new stdclass();
		$data =  DB::table('paket')
				->join('kategori','paket.id_cat','=','kategori.id_cat')
				->select(
					'paket.id','paket.nama_paket','paket.sumber_dana','paket.thn_anggaran','paket.pagu','paket.kode.rek','paket.kode_rup','paket.jenis_bayar','paket.status','paket.aksi','kategori.cat_nama'
					)
				->where('paket.id','=',$id)->first();

		$data->id=$id;
		$data->page="paket";

		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.paket.detil'))->with('data',$data);
	}


	public function add(){
		$data->page = "add";
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.paket.form'))->with('data',$data);
	}

	public function del($id){
		$data = Paket::find($id);
		$data->delete();
	}

	public function paket_edit($id){
		$data = new stdclass();

		$data = Paket::where('id',$id)->first();

		$kategori = Kategori::lists('cat_nama','id_cat');
		$data->kategori = $kategori;

		/*print_r($data->kategori);
		exit;*/

		$data->page="edit";
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.paket.form'))->with('data',$data);
	}

	public function paket_update($id){
		$paket = Paket::find($id);

		$paket->user_id = Session::get('user_id');
		$paket->id_cat = Input::get('jenis');
		$paket->nama_paket = Input::get('nama_paket');
		$paket->sumber_dana = Input::get('sumber_dana');
		$paket->thn_anggaran = Input::get('thn_anggaran');
		$paket->pagu = Input::get('pagu');
		$paket->kode_rek = Input::get('kode_rek');
		$paket->kode_rup = Input::get('kode_rup');
		$paket->jenis_bayar = Input::get('jenis_bayar');
		$paket->save();

		return Redirect::to('admin/paket/add/'.$paket->id);
	}

	public function tambah_dok($id) {

			$file = Request::file('dokumen');
			$extension = $file->getClientOriginalExtension();
			$destinationPath = public_path().'/upload';
			$filename = $file->getClientOriginalName();
			$file->move($destinationPath, $filename);
			$dokumen = new Dokumen();
			$dokumen->id_paket = Input::get("id");
			$dokumen->mime = $file->getClientMimeType();
			$dokumen->original_filename = $file->getClientOriginalName();
			$dokumen->filename = $file->getFilename().'.'.$extension;
			$dokumen->jenis = Input::get("jenis");
			$dokumen->save();

			return Redirect::to('admin/paket/add/'.$id);

		}

		public function get($original_filename){


			$data = Dokumen::where('original_filename', '=', $original_filename)->firstOrFail();
			$destinationPath = public_path().'/upload';
			$file = $destinationPath->get($data->filename);

			return (new Response($file, 200))
	              ->header('Content-Type', $data->mime);

		}

	public function simpan_dok($id){
		$data = Dokumen::where('id_paket','=',$id)->first();
		if(count($data)<1){
			Session::flash('messages','
					<div class="alert alert-danger alert-dismissable" style="margin-top:20px;">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<h4><i class="fa fa-exclamation" ></i> Peringatan...</strong></h4>
                    			Data Dokumen harus diisi
                		</div>
				');

			return Redirect::to('admin/paket/add/'.$id);
		}else{

			$dokumen = DB::table('paket')->select('id_rekanan')->where('id',$id)->first();

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

	public function paket_simpan(){

		$id = DB::table('paket')->insertGetId(array(
				'user_id' => Session::get('user_id'),
				'id_cat' => Input::get('jenis'),
				'nama_paket' => Input::get('nama_paket'),
				'sumber_dana' => Input::get('sumber_dana'),
				'thn_anggaran' => Input::get('thn_anggaran'),
				'pagu' => Input::get('pagu'),
				'kode_rek'=> Input::get('kode_rek'),
				'kode_rup' => Input::get('kode_rup'),
				'jenis_bayar' => Input::get('jenis_bayar'),
				'status' =>0,
				'aksi' =>0)
			);

		return Redirect::to('admin/paket/add/'.$id);
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
		$dokumen = new Dokumen();
		$dokumen->id = $id;

		return  View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.paket.form2'))->with('data',$dokumen);
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
		$data = DB::table('paket')->select('id','desk_kegiatan','lokasi_kegiatan','pagu','hps')->where('id',$id)->first();
		return  View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.permintaan.cetak'))->with('data',$data);
	}

	function cetak_sk($id){
		$data = new stdclass();
		$data = DB::table('paket')
				->leftjoin('jadwals','paket.id','=','jadwals.id_table')
				->leftjoin('kategori','paket.id_cat','=','kategori.id_cat')
				->select('paket.no_srt_permintaan','kategori.cat_nama',
						'paket.desk_kegiatan','paket.lokasi_kegiatan','paket.hps',
						'paket.alamat_pengerjaan','paket.id_users','paket.pagu'
						)
				->where('paket.id',$id)->first();
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
		return DB::table('paket')->select('desk_kegiatan','id_users','hps','id_users')->where('id',$id)->first();
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
