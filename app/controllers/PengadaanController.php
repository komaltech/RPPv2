<?php

class PengadaanController extends BaseController {

	public function pengadaanajax(){	
		$data = DB::table('pengadaans')
				->leftjoin('kategori','pengadaans.id_cat','=','kategori.id_cat')
				->select('pengadaans.id','pengadaans.no_srt_permintaan',
							'pengadaans.lokasi_kegiatan','pengadaans.status','pengadaans.pagu',
							'pengadaans.hps','kategori.cat_nama','pengadaans.desk_kegiatan',
							'pengadaans.aksi'
						);
			

		
			return Datatables::of($data)
					->remove_column('id')
					->remove_column('lokasi_kegiatan')
					->remove_column('alamat_pengerjaan')
					->remove_column('cat_nama')
					->remove_column('desk_kegiatan')
					->edit_column('no_srt_permintaan','
						<h5>{{$desk_kegiatan}}</h5>
						<small>
						<p><strong>Kategori :&nbsp;</strong>{{$cat_nama}}</p>
						<p>
							<strong>Lokasi Kegiatan :</strong><br>
							{{ $lokasi_kegiatan }}
						</p></small>
					')
					->edit_column('status','
							@if($status=="0")
								<h4><span class="label label-warning">Belum Divalidasi</span></h4>
							@elseif($status =="1")
								<h4><span class="label label-info">Rekanan Dipilih</span></h4>
							@elseif($status=="2")
								<a href="{{ URL::to("admin/pengadaan/detilFik/".$id) }}" class="btn btn-primary" data-toggle="tooltip" ><i class="fa fa-check-square-o" ></i> Cek FIK </a>
							@elseif($status=="3")
								<h4><span class="label label-primary">Pengadaan Diproses</span></h4>
							@else
								<h4><span class="label label-success">Pengadaan Selesai</span></h4>
							@endif
					')
					->edit_column('pagu','{{ String::formatMoney($pagu,"Rp.") }}')
					->edit_column('hps','{{ String::formatMoney($hps,"Rp.") }}')
					->edit_column('aksi','
						<div class="btn-group">
							<a href="{{ URL::to("admin/pengadaan/detil/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-th-list"></i></a>
							<a href="{{ URL::to("admin/pengadaan/no_surat/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-print"></i></a>
							@if($aksi=="0")
								<a href="{{ URL::to("admin/pengadaan/proses/".$id) }}" class="btn btn-primary" data-toggle="tooltip" >Proses <i class="fa fa-angle-double-right" ></i></a>
							@elseif($aksi=="1")
								<a href="{{ URL::to("admin/pengadaan/jadwal/edit/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-calendar"></i></a>
								<a href="{{ URL::to("admin/pengadaan/pilih/".$id) }}" class="btn btn-primary" data-toggle="tooltip" ><i class="fa fa-envelope-square" ></i> Kirim Email </a>
							@elseif($aksi=="2")
								<a href="{{ URL::to("admin/pengadaan/jadwal/edit/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-calendar"></i></a>
								<a href="{{ URL::to("admin/pengadaan/negosiasi/".$id) }}" class="btn btn-primary" data-toggle="tooltip" > Negosiasi <i class="fa fa-chevron-right" style="margin-left:10px;font-size:12px;" ></i></a>
							@else
								<a href="{{ URL::to("admin/pengadaan/fik/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-check-square-o" style="margin-right:10px;"></i>FIK</a>
							@endif
						</div>	
					')
					->make();

		
		//return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.transaksi.list'));
	}


	public function detil($id){
		$data = new stdclass();
		$data =  DB::table('pengadaans')
				->leftjoin('rekanans','pengadaans.id_rekanan','=','rekanans.id_rkn')
				->leftjoin('kategori','pengadaans.id_cat','=','kategori.id_cat')
				->select(
					'pengadaans.id','pengadaans.id_rekanan','pengadaans.no_srt_permintaan','pengadaans.desk_kegiatan',
					'pengadaans.lokasi_kegiatan','pengadaans.alamat_pengerjaan','pengadaans.telp_lokasi_pengerjaan',
					'pengadaans.website','pengadaans.pagu','pengadaans.hps','pengadaans.hps_rkn','pengadaans.hps_deal','pengadaans.status',
					'pengadaans.aksi','kategori.cat_nama','rekanans.nama_rkn'
					)
				->where('pengadaans.id','=',$id)->first();

		$data->id=$id;
		$data->page="pengadaan";
		
		
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.pengadaan.detil'))->with('data',$data);

	}
	public function detilFull($id){
		$data = DB::table('detil_pengadaan')
				->select('id_detil','nama_brg','spesifikasi','kebutuhan','hrg_satuan_hps','total_hrg_hps',
					'hrg_satuan_rkn','total_hrg_rkn','hrg_satuan_deal','total_hrg_deal')
				->where('id_pengadaan',$id);
		//print_r($data);
		//exit;

		if(Session::get('level') <3 ){
			return Datatables::of($data)
				->remove_column('id_detil')
				->remove_column('spesifikasi')
				->edit_column('nama_brg','{{$nama_brg}}<br>{{$spesifikasi}}')
				->edit_column('hrg_satuan_hps','{{ isset($hrg_satuan_hps)?String::formatMoney($hrg_satuan_hps,"Rp."):"Rp. 0" }}')
				->edit_column('total_hrg_hps','{{ isset($total_hrg_hps)?String::formatMoney($total_hrg_hps,"Rp."):"Rp. 0" }}')
				->edit_column('hrg_satuan_rkn','{{ isset($hrg_satuan_rkn)?String::formatMoney($hrg_satuan_rkn,"Rp."):"Rp. 0" }}')
				->edit_column('total_hrg_rkn','{{ isset($total_hrg_rkn)?String::formatMoney($total_hrg_rkn,"Rp."):"Rp. 0" }}')
				->edit_column('hrg_satuan_deal','{{ isset($hrg_satuan_deal)?String::formatMoney($hrg_satuan_deal,"Rp."):"Rp. 0" }}')
				->edit_column('total_hrg_deal','{{ isset($total_hrg_deal)?String::formatMoney($total_hrg_deal,"Rp."):"Rp. 0" }}')
				->make();
		}else{
			return Datatables::of($data)
				->remove_column('id_detil')
				->remove_column('spesifikasi')
				->remove_column('hrg_satuan_deal')
				->remove_column('total_hrg_deal')
				->edit_column('nama_brg','{{$nama_brg}}')
				->edit_column('hrg_satuan_hps','{{ isset($hrg_satuan_hps)?String::formatMoney($hrg_satuan_hps,"Rp."):"Rp. 0" }}')
				->edit_column('total_hrg_hps','{{ isset($total_hrg_hps)?String::formatMoney($total_hrg_hps,"Rp."):"Rp. 0" }}')
				->edit_column('hrg_satuan_rkn','{{ isset($hrg_satuan_rkn)?String::formatMoney($hrg_satuan_rkn,"Rp."):"Rp. 0" }}')
				->edit_column('total_hrg_rkn','{{ isset($total_hrg_rkn)?String::formatMoney($total_hrg_rkn,"Rp."):"Rp. 0" }}')
				->add_column('aksi','
					<a href="{{ URL::to("admin/rekanan/add_harga/".$id_detil) }}" class="btn btn-info" id="pilih" data-id="{{ $id_detil }}"><i class="fa fa-pencil" style="margin-right:10px;" ></i>Input harga</a>
				')
				->make();

		}
		

	
	}
	function detilFik($id){
		$data = new stdclass();
		$id_rekanan= $this->get_pengadaan($id)->id_rekanan;
		$data = Rekanan::where('id_rkn',$id_rekanan)->first();
		$data->id = $id;
		$data->page = "add";

		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.rekanan.detil_fik'))->with('data',$data);
	}
	function fik($id){
		$data = new stdclass();
		$id_rekanan= $this->get_pengadaan($id)->id_rekanan;
		$data = Rekanan::where('id_rkn',$id_rekanan)->first();
		$data->id = $id;
		$data->page = "edit";

		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.rekanan.detil_fik'))->with('data',$data);
	}

	function getHps_rekanan($id){
		return DB::table('detil_pengadaan')->where('id_pengadaan',$id)->sum('total_hrg_rkn');
	}
	function getBarang($id){
		if(Request::ajax()){
			$data=detil_pengadaan::where('id_detil',$id)->first();
			return Response::json($data);	
		}
	}

	function simpan_hps_rekanan($id){
		

		if($data->save()){
			echo "ok";
		}else{
			echo "error";
		}
	}

	function negoSimpan($id){
		$cek = $this->get_nego_null($id);

		

		if($cek >1){
			Session::flash('messages','
					<div class="alert alert-danger alert-dismissable" style="margin-bottom:-20px;">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Peringatan...</strong><br>
                    			Masih terdapat <strong>'.$cek.' barang</strong> yang belum diisi harganya
                		</div>
				');		

			//echo Input::get('hps_rekanan');
			return Redirect::to('/admin/pengadaan/negosiasi/'.$id);	
			
		}else{
			$pengadaan = Proyek::find($id);
			$pengadaan->hps_deal=Input::get('hps_negosiasi');
			$pengadaan->status = 3;
			$pengadaan->aksi = 3;
			$pengadaan->save();

			$jadwal = Jadwal::where('id_table',$id)->where('jenis_jadwal','rekanan')->get();

			if(count($jadwal)==0){
				$data = new Jadwal();
				$data->id_table = $id;
				$data->jenis_jadwal = "rekanan";
				$data->save();	
			}
			
			
			Session::flash('messages','
					<div class="alert alert-info alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Informasi...</strong><br>
                    			Negosiasi sudah di simpan
                		</div>
				');		
			return Redirect::to('admin/pengadaan/');
		}
	}

	function simpanLanjut($id){
		$cek = $this->get_null_detil($id);

		echo Input::get('hps_rekanan');

		$pengadaan = Proyek::find($id);
		$pengadaan->hps_rkn=Input::get('hps_rekanan');
		$pengadaan->save();

		if($cek >1){
			Session::flash('messages','
					<div class="alert alert-danger alert-dismissable" style="margin-bottom:-20px;">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Peringatan...</strong><br>
                    			Masih terdapat '.$cek.' barang yang belum diisi harganya
                		</div>
				');		
			return Redirect::to('/admin/rekanan/proses/'.$id);	
		}else{
			return Redirect::to('admin/rekanan/form_fik/'.$id);
		}
	}

	

	function edit_fik($id){
		$data = new stdclass();
		$pengadaan =$this->get_pengadaan($id);
		$rekanan = $pengadaan->id_rekanan;
		$data = Rekanan::where('id_rkn',$rekanan)->first();
		$data->page ="edit";
		$data->id = $id;
		$data->desk_kegiatan = $pengadaan->desk_kegiatan;	

		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.rekanan.form_fik'))->with('data',$data);
	}
	function form_fik($id){
		$data = new stdclass();
		$pengadaan =$this->get_pengadaan($id);
		$rekanan = $pengadaan->id_rekanan;
		$data = Rekanan::where('id_rkn',$rekanan)->first();
		$data->page ="new";
		$data->id = $id;
		$data->desk_kegiatan = $pengadaan->desk_kegiatan;	

		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.rekanan.form_fik'))->with('data',$data);
	}

	function get_null_detil($id){
		$data=detil_pengadaan::where('id_pengadaan',$id)->get();
		$i = 0;
		foreach($data as $row){
			if(null == $row->hrg_satuan_rkn){
				$i = $i +1;
			}
		}
		return $i;
			
	}

	function get_nego_null($id){
		$data=detil_pengadaan::where('id_pengadaan',$id)->get();
		$i = 0;
		foreach($data as $row){
			if(null == $row->hrg_satuan_deal){
				$i = $i +1;
			}
		}
		return $i;
	}

	function updateHrgRkn($id){
		if(Request::ajax()){
			$data =detil_pengadaan::find($id);
			$data->hrg_satuan_rkn = Input::get('hrg_rkn');
			$data->total_hrg_rkn = Input::get('total_rkn');
			if($data->save()){
				echo "ok";
			}else{
				echo "no";
			}
		}
	}
	function updateHrgNego($id){
		if(Request::ajax()){
			$data =detil_pengadaan::find($id);
			$data->hrg_satuan_deal = Input::get('hrg');
			$data->total_hrg_deal = Input::get('total');
			if($data->save()){
				echo "ok";
			}else{
				echo "no";
			}
		}
	}

	public function pilih($id){
		$data = new stdclass();
		$data->id = $id;
		
		$row =  DB::table('pengadaans')
				->join('rekanans','pengadaans.id_rekanan','=','rekanans.id_rkn')
				->select('pengadaans.id','pengadaans.desk_kegiatan','rekanans.nama_rkn')
				->where('pengadaans.id','=',$id)->first();
		$data->judul = $row->desk_kegiatan;
		$data->rekanan = $row->nama_rkn;

		if (count(Jadwal::where('id_table','=',$id)->where('jenis_jadwal','=','pengadaan')->first())==0) {
			
			$jadwal = new jadwal();
			$jadwal->id_table = $id;
			$jadwal->jenis_jadwal = "pengadaan";
			$jadwal->save();
		} 
		
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.pengadaan.form4'))->with('data',$data);

	}

	public function pilihRekanan($id){

		//if(Request::ajax()){
			$pengadaan = Proyek::find($id);
			
			$setting  = DB::table('settings')->first();
			$rekanan =DB::table('pengadaans')
						->join('rekanans','pengadaans.id_rekanan','=','rekanans.id_rkn')
						->select('rekanans.email_rkn','rekanans.id_rkn',
								'pengadaans.desk_kegiatan','pengadaans.lokasi_kegiatan',
								'pengadaans.alamat_pengerjaan','pengadaans.hps','rekanans.nama_rkn'
								)
						->where('pengadaans.id','=',$id)->first();

			$email_rkn = $rekanan->email_rkn;
			$data = array("email"=>$email_rkn);
			

    		Config::set('mail.driver',$setting->protokol);
    		Config::set('mail.host',$setting->host);
			Config::set('mail.port',$setting->port);
			Config::set('mail.form',$setting->email_sender);
			Config::set('mail.username',$setting->user_email);
			Config::set('mail.password',$setting->pass_email);
			Config::set('mail.encryption',$setting->enkripsi);

			set_time_limit(600);

			$pengadaan->status = "1";
			$pengadaan->aksi = "1";
			$pengadaan->save();

			$user = User::where('id_users','=',$rekanan->id_rkn)->where('level_users','=','3')->first();
			//echo count($user);
			//exit;
			
			if(count($user) < 1){
				$password_rkn = $this->generate_pass();
				$user_rkn = new User();
				$user_rkn->id_users = $rekanan->id_rkn;
				$user_rkn->username = $rekanan->email_rkn;
				$user_rkn->password = Hash::make($password_rkn);
				$user_rkn->get_pass = $password_rkn;
				$user_rkn->level_users = 3;
				$user_rkn->save();

				$pass = $password_rkn;

			}else{
				$password = DB::table('users')->select("get_pass")->where('id_users','=',$rekanan->id_rkn)->where('level_users','=','3')->first();
				$pass = $password->get_pass;
			}

			$data = array(
						"rekanan"=>$rekanan->nama_rkn,
						"desk"=>$rekanan->desk_kegiatan,
						"lokasi"=>$rekanan->lokasi_kegiatan,
						"alamat"=>$rekanan->alamat_pengerjaan,
						"hps"=>$rekanan->hps,
						"username"=>$rekanan->email_rkn,
						"password"=>$pass
						);

			$row['email']=$rekanan->email_rkn;
			$row['sender']=$setting->email_sender;

			try {

				$mail_msg = Mail::send('admin.pengadaan.email',$data,function($message)use($row){
					$message->from($row['sender'],'Sistem Pengadaan Langsung Kab. Pasuruan');
					$message->to($row['email'])->subject('Email Penunjukan rekanan Pengadaan Langsung Kab. Pasuruan');
				});
				echo "berhasil";	
			} catch (\Swift_TransportException $e) {
				echo "gagal";	
			}
			
		//}
		
	}

	public function proses($id){
		$data = new stdclass();
		$row = Proyek::find($id)->first();
		$data->judul=$row->desk_kegiatan;

		$data->id = $id;

		
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.pengadaan.form2'))->with('data',$data);
	}

	function jadwal($id,$rekanan){
		$data = new stdclass();
		$row = Proyek::find($id)->first();

		$pengadaan = Proyek::find($id);
		$pengadaan->id_rekanan = $rekanan;
		$pengadaan->save();
		$jadwal = Jadwal::where('id_table',$id)->where('jenis_jadwal','pengadaan')->first();
		$data->thp1_dari = Date::parse($jadwal->thp1_dari)->format('j F Y');
		$data->thp1_smp = Date::parse($jadwal->thp1_smp)->format('j F Y');

		$data->judul=$row->desk_kegiatan;
		$data->id = $id;
		$data->page = "add";

		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.pengadaan.form3'))->with('data',$data);
	}

	public function jadwalEdit($id){
		$data = new stdclass();
		$row = Proyek::find($id)->first();
		$jadwal= Jadwal::where('id_table','=',$id)->where('jenis_jadwal','=','pengadaan')->first();
		$data->judul=$row->desk_kegiatan;
		$data->thp1_dari = Date::parse($jadwal->thp1_dari)->format('j F Y');
		$data->thp1_smp = Date::parse($jadwal->thp1_smp)->format('j F Y');
		$data->thp2_dari = Date::parse($jadwal->thp2_dari)->format('j F Y');
		$data->thp2_smp = Date::parse($jadwal->thp2_smp)->format('j F Y');
		$data->thp3_dari = Date::parse($jadwal->thp3_dari)->format('j F Y');
		$data->thp3_smp = Date::parse($jadwal->thp3_smp)->format('j F Y');
		$data->thp4_dari = Date::parse($jadwal->thp4_dari)->format('j F Y');
		$data->thp4_smp = Date::parse($jadwal->thp4_smp)->format('j F Y');
		$data->thp5_dari = Date::parse($jadwal->thp5_dari)->format('j F Y');
		$data->thp5_smp = Date::parse($jadwal->thp5_smp)->format('j F Y');
		$data->thp6_dari = Date::parse($jadwal->thp6_dari)->format('j F Y');
		$data->thp6_smp = Date::parse($jadwal->thp6_smp)->format('j F Y');
		$data->thp7_dari = Date::parse($jadwal->thp7_dari)->format('j F Y');
		$data->thp7_smp = Date::parse($jadwal->thp7_smp)->format('j F Y');
		$data->thp8_dari = Date::parse($jadwal->thp8_dari)->format('j F Y');
		$data->thp8_smp = Date::parse($jadwal->thp8_smp)->format('j F Y');
		$data->thp9_dari = Date::parse($jadwal->thp9_dari)->format('j F Y');
		$data->thp9_smp = Date::parse($jadwal->thp9_smp)->format('j F Y');
		$data->thp10_dari = Date::parse($jadwal->thp10_dari)->format('j F Y');
		$data->thp10_smp = Date::parse($jadwal->thp10_smp)->format('j F Y');
		$data->thp11_dari = Date::parse($jadwal->thp11_dari)->format('j F Y');
		$data->thp11_smp = Date::parse($jadwal->thp11_smp)->format('j F Y');
		$data->id = $id;
		$data->page ="edit";
		/*echo $data->page;
		exit;*/

		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.pengadaan.form3'))->with('data',$data);
	}

	public function jadwalSimpan($id){
		$page = Input::get('page');
		if ($page=="add"){ 

			$jadwal = Jadwal::where('id_table','=',$id)->where('jenis_jadwal','=','pengadaan')->update(
				array(
					'thp1_dari'=>date('Y-m-d',strtotime(Input::get('thp1_dari'))),
					'thp1_smp'=>date('Y-m-d',strtotime(Input::get('thp1_smp'))),

					'thp2_dari'=>date('Y-m-d',strtotime(Input::get('thp2_dari'))),
					'thp2_smp'=>date('Y-m-d',strtotime(Input::get('thp2_smp'))),

					'thp3_dari'=>date('Y-m-d',strtotime(Input::get('thp3_dari'))),
					'thp3_smp'=>date('Y-m-d',strtotime(Input::get('thp3_smp'))),

					'thp4_dari'=>date('Y-m-d',strtotime(Input::get('thp4_dari'))),
					'thp4_smp'=>date('Y-m-d',strtotime(Input::get('thp4_smp'))),

					'thp5_dari'=>date('Y-m-d',strtotime(Input::get('thp5_dari'))),
					'thp5_smp'=>date('Y-m-d',strtotime(Input::get('thp5_smp'))),

					'thp6_dari'=>date('Y-m-d',strtotime(Input::get('thp6_dari'))),
					'thp6_smp'=>date('Y-m-d',strtotime(Input::get('thp6_smp'))),

					'thp7_dari'=>date('Y-m-d',strtotime(Input::get('thp7_dari'))),
					'thp7_smp'=>date('Y-m-d',strtotime(Input::get('thp7_smp'))),

					'thp8_dari'=>date('Y-m-d',strtotime(Input::get('thp8_dari'))),
					'thp8_smp'=>date('Y-m-d',strtotime(Input::get('thp8_smp'))),

					'thp9_dari'=>date('Y-m-d',strtotime(Input::get('thp9_dari'))),
					'thp9_smp'=>date('Y-m-d',strtotime(Input::get('thp9_smp'))),

					'thp10_dari'=>date('Y-m-d',strtotime(Input::get('thp10_dari'))),
					'thp10_smp'=>date('Y-m-d',strtotime(Input::get('thp10_smp'))),

					'thp11_dari'=>date('Y-m-d',strtotime(Input::get('thp11_dari'))),
					'thp11_smp'=>date('Y-m-d',strtotime(Input::get('thp11_smp')))
					
				)
			);
			return Redirect::to("/admin/pengadaan/pilih/".$id);
		}else{
			$jadwal = Jadwal::where('id_table','=',$id)->where('jenis_jadwal','=','pengadaan')->update(
				array(
					'thp1_dari'=>date('Y-m-d',strtotime(Input::get('thp1_dari'))),
					'thp1_smp'=>date('Y-m-d',strtotime(Input::get('thp1_smp'))),

					'thp2_dari'=>date('Y-m-d',strtotime(Input::get('thp2_dari'))),
					'thp2_smp'=>date('Y-m-d',strtotime(Input::get('thp2_smp'))),

					'thp3_dari'=>date('Y-m-d',strtotime(Input::get('thp3_dari'))),
					'thp3_smp'=>date('Y-m-d',strtotime(Input::get('thp3_smp'))),

					'thp4_dari'=>date('Y-m-d',strtotime(Input::get('thp4_dari'))),
					'thp4_smp'=>date('Y-m-d',strtotime(Input::get('thp4_smp'))),

					'thp5_dari'=>date('Y-m-d',strtotime(Input::get('thp5_dari'))),
					'thp5_smp'=>date('Y-m-d',strtotime(Input::get('thp5_smp'))),

					'thp6_dari'=>date('Y-m-d',strtotime(Input::get('thp6_dari'))),
					'thp6_smp'=>date('Y-m-d',strtotime(Input::get('thp6_smp'))),

					'thp7_dari'=>date('Y-m-d',strtotime(Input::get('thp7_dari'))),
					'thp7_smp'=>date('Y-m-d',strtotime(Input::get('thp7_smp'))),

					'thp8_dari'=>date('Y-m-d',strtotime(Input::get('thp8_dari'))),
					'thp8_smp'=>date('Y-m-d',strtotime(Input::get('thp8_smp'))),

					'thp9_dari'=>date('Y-m-d',strtotime(Input::get('thp9_dari'))),
					'thp9_smp'=>date('Y-m-d',strtotime(Input::get('thp9_smp'))),

					'thp10_dari'=>date('Y-m-d',strtotime(Input::get('thp10_dari'))),
					'thp10_smp'=>date('Y-m-d',strtotime(Input::get('thp10_smp'))),

					'thp11_dari'=>date('Y-m-d',strtotime(Input::get('thp11_dari'))),
					'thp11_smp'=>date('Y-m-d',strtotime(Input::get('thp11_smp')))
					
				)
			);
			$pengadaan = DB::table('pengadaans')->select('desk_kegiatan')->where('id','=',$id)->first();

			Session::flash('messages','
					<div class="alert alert-info alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<p style="font-size:18px"><i class="fa fa-check" ></i> Informasi : Data Jadwal Berhasil di Update </p>
                    		<p>Judul Pengadaan : '.$pengadaan->desk_kegiatan.' </p>
                		</div>
				');		

			return Redirect::to("/admin/pengadaan/");
		}
		
	}

	function noSurat($id){
		$data = DB::table("pengadaans")
					->select("id","desk_kegiatan","no_srt1","no_srt2","no_srt3","no_srt4","no_srt5","no_srt6","no_srt7","no_srt8","no_srt9","no_srt10","no_srt11","no_srt12","no_srt13","no_srt14","no_srt15")
					->where("id",$id)->first();
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.pengadaan.form_no_surat'))->with('data',$data);
	}

	function noSurat_simpan($id){
		$pengadaan = Proyek::find($id);
		$pengadaan->no_srt1 = Input::get("srt1");
		$pengadaan->no_srt2 = Input::get("srt2");
		$pengadaan->no_srt3 = Input::get("srt3");
		$pengadaan->no_srt4 = Input::get("srt4");
		$pengadaan->no_srt5 = Input::get("srt5");
		$pengadaan->no_srt6 = Input::get("srt6");
		$pengadaan->no_srt7 = Input::get("srt7");
		$pengadaan->no_srt8 = Input::get("srt8");
		$pengadaan->no_srt9 = Input::get("srt9");
		$pengadaan->no_srt10 = Input::get("srt10");
		$pengadaan->no_srt11 = Input::get("srt11");
		$pengadaan->no_srt12 = Input::get("srt12");
		$pengadaan->no_srt13 = Input::get("srt13");
		$pengadaan->no_srt14 = Input::get("srt14");
		$pengadaan->no_srt15 = Input::get("srt15");
		if($pengadaan->save()){
			echo "ok";
		}else{
			echo "error";
		}
	}

	function rekananAjax(){
		
		$data = DB::table('rekanans')->select('id_rkn','nama_rkn','alamat_rkn','mobile_phone_rkn','telp_rkn')->where('is_active',"1");
		
		//print_r($data);
		return Datatables::of($data)
					->remove_column('id_rkn')
					->remove_column('alamat_rkn')
					->edit_column('nama_rkn','
						<strong>{{$nama_rkn}}</strong><br>
						<small>{{$alamat_rkn}}</small>
					')
					->add_column(null,'
						<div class="btn-group" >
							<a href="{{ URL::to("admin/rekanan/detil/".$id_rkn) }}" id="tooltip" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Detil rekanan"><i class="fa fa-list-alt" ></i></a>
							<a href="" id="pilih" class="btn btn-primary" data-id="{{ $id_rkn }}" data-toggle="tooltip" data-placement="bottom" title="Pilih rekanan"> Pilih Rekanan<i class="fa fa-chevron-right" style="margin-left:6px;font-size:11px;"></i></a>
						</div>
					')
					->make();
		
	}

	function batalPilih($id){
		$pajak = Pajak::where('id_pengadaan',$id)->delete();

		File::deleteDirectory(public_path('/asset/img/pajak/'.$id));

		$pengadaan = Proyek::find($id);
		$pengadaan->id_rekanan ="";
		$pengadaan->hps_rkn ="";
		$pengadaan->hps_deal ="";
		$pengadaan->id_rekanan ="";
		$pengadaan->status =0;
		$pengadaan->aksi =0;
		if($pengadaan->save()){
			$pajak=Pajak::where('id_pengadaan',$id);
			$pajak->delete();
		}

		Session::flash('messages','
					<div class="alert alert-info alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<p style="font-size:18px"><i class="fa fa-check" ></i> Informasi : Rekanan Berhasil di batalkan </p>
                    		<p>Silahkan pilih rekanan yang baru dan sesuai dengan kualifikasi</p>
                		</div>
				');		

		return Redirect::to("/admin/pengadaan/");

	}

	function negosiasi($id){
		$data = new stdclass();

		$data = DB::table('pengadaans')
					->select('id','desk_kegiatan','lokasi_kegiatan','id_rekanan',
							 'alamat_pengerjaan','hps','hps_rkn','sumber_dana'		
							)->where('id',$id)->first();
		$data->rekanan = $this->get_rekanan($data->id_rekanan)->nama_rkn;
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.pengadaan.form_nego'))->with('data',$data);
	}

	function negosiasiAjax($id){
		if(Request::ajax()){
			$data = DB::table('detil_pengadaan')
				->select('id_detil','nama_brg','spesifikasi','kebutuhan','hrg_satuan_hps','total_hrg_hps',
					'hrg_satuan_rkn','total_hrg_rkn','hrg_satuan_deal','total_hrg_deal')
				->where('id_pengadaan',$id);
		
			return Datatables::of($data)
				->remove_column('id_detil')
				->remove_column('spesifikasi')
				->edit_column('nama_brg','{{$nama_brg}}')
				->edit_column('hrg_satuan_hps','{{ isset($hrg_satuan_hps)?String::formatMoney($hrg_satuan_hps,"Rp."):"Rp. 0" }}')
				->edit_column('total_hrg_hps','{{ isset($total_hrg_hps)?String::formatMoney($total_hrg_hps,"Rp."):"Rp. 0" }}')
				->edit_column('hrg_satuan_rkn','{{ isset($hrg_satuan_rkn)?String::formatMoney($hrg_satuan_rkn,"Rp."):"Rp. 0" }}')
				->edit_column('total_hrg_rkn','{{ isset($total_hrg_rkn)?String::formatMoney($total_hrg_rkn,"Rp."):"Rp. 0" }}')
				->edit_column('hrg_satuan_deal','{{ isset($hrg_satuan_deal)?String::formatMoney($hrg_satuan_deal,"Rp."):"Rp. 0" }}')
				->edit_column('total_hrg_deal','{{ isset($total_hrg_deal)?String::formatMoney($total_hrg_deal,"Rp."):"Rp. 0" }}')
				->add_column('aksi','
					<a href="{{ URL::to("admin/pengadaan/negosiasi/add_harga/".$id_detil) }}" class="btn btn-info" id="pilih" data-id="{{ $id_detil }}"><i class="fa fa-pencil" ></i></a>
				')
				->make();
		}
			
	}

	function get_hps_nego($id){
		if(Request::ajax()){
			return DB::table('detil_pengadaan')->where('id_pengadaan',$id)->sum('total_hrg_deal');	
		}
		
	}

	function generate_pass(){
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	    return substr(str_shuffle($chars),6,6);
	}

	function convert_number_to_words($number) {
	    
	    $hyphen      = '-';
	    $conjunction = ' and ';
	    $separator   = ', ';
	    $negative    = 'negative ';
	    $decimal     = ' point ';
	    $dictionary  = array(
	        0                   => 'zero',
	        1                   => 'one',
	        2                   => 'two',
	        3                   => 'three',
	        4                   => 'four',
	        5                   => 'five',
	        6                   => 'six',
	        7                   => 'seven',
	        8                   => 'eight',
	        9                   => 'nine',
	        10                  => 'ten',
	        11                  => 'eleven',
	        12                  => 'twelve',
	        13                  => 'thirteen',
	        14                  => 'fourteen',
	        15                  => 'fifteen',
	        16                  => 'sixteen',
	        17                  => 'seventeen',
	        18                  => 'eighteen',
	        19                  => 'nineteen',
	        20                  => 'twenty',
	        30                  => 'thirty',
	        40                  => 'fourty',
	        50                  => 'fifty',
	        60                  => 'sixty',
	        70                  => 'seventy',
	        80                  => 'eighty',
	        90                  => 'ninety',
	        100                 => 'hundred',
	        1000                => 'thousand',
	        1000000             => 'million',
	        1000000000          => 'billion',
	        1000000000000       => 'trillion',
	        1000000000000000    => 'quadrillion',
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
	        return $negative . convert_number_to_words(abs($number));
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
	                $string .= $hyphen . $dictionary[$units];
	            }
	            break;
	        case $number < 1000:
	            $hundreds  = $number / 100;
	            $remainder = $number % 100;
	            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
	            if ($remainder) {
	                $string .= $conjunction . convert_number_to_words($remainder);
	            }
	            break;
	        default:
	            $baseUnit = pow(1000, floor(log($number, 1000)));
	            $numBaseUnits = (int) ($number / $baseUnit);
	            $remainder = $number % $baseUnit;
	            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
	            if ($remainder) {
	                $string .= $remainder < 100 ? $conjunction : $separator;
	                $string .= convert_number_to_words($remainder);
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

	function cetakPi_rekanan($id){
		$data = new stdclass();
		$pengadaan = $this->get_pengadaan($id);
		$id_rekanan = $pengadaan->id_rekanan;
		$data = Pengurus::where('id_rekanan',$id_rekanan)->where('jabatan','Direktur')->first();
		$data->nama_rekanan=$this->get_rekanan($id_rekanan)->nama_rkn;
		$data->desk_kegiatan = $pengadaan->desk_kegiatan;
		$data->tanggal = date("d F Y",strtotime($this->get_jadwal($id)->thp2_dari));


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
		$data->tanggal = date("d F Y",strtotime($this->get_jadwal($id)->thp2_dari));

		//print_r($data);
		$html = View::make('admin.report.fik_rekanan')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->stream('fik_rekanan.pdf');
	}
	function cetakPengalaman_rekanan($id){
		$data = new stdclass();
		$pengadaan = $this->get_pengadaan($id);
		$data = Rekanan::where('id_rkn',$pengadaan->id_rekanan)->first();
		$data->tanggal = date("d F Y",strtotime($this->get_jadwal($id)->thp2_dari));
		$pengurus = $this->get_pengurus($pengadaan->id_rekanan);
		$data->pemilik = $pengurus->nama_pengurus;
		$data->jabatan = $pengurus->jabatan;

		$html = View::make('admin.report.data_pengalaman_rekanan')->with('data',$data);
		return PDF::loadHTML($html)->setPaper('legal')->setOrientation('landscape')->stream('pengalaman_perusahaan.pdf');
	}
	function cetakPenawaran_rekanan($id){
		return PDF::loadView('admin.report.surat_penawaran_rekanan')->setPaper('legal')->setOrientation('portrait')->stream('penawaran_rekanan.pdf');
	}
	function cetakLampiran_penawaran_rekanan($id){
		return PDF::loadView('admin.report.lampiran_penawaran_rekanan')->setPaper('legal')->setOrientation('portrait')->stream('Lampiran_penawaran_rekanan.pdf');
	}
	function cetakBa_epl($id){
		return PDF::loadView('admin.report.ba_eppl')->setPaper('legal')->setOrientation('portrait')->stream('baeppl.pdf');
	}
	function cetakBa_klarifikasi($id){
		return PDF::loadView('admin.report.ba_klarifikasi')->setPaper('legal')->setOrientation('portrait')->stream('baeppl.pdf');
	}
	function cetakBa_negosiasi($id){
		return PDF::loadView('admin.report.ba_negosiasi')->setPaper('legal')->setOrientation('portrait')->stream('baeppl.pdf');
	}
	function cetakLampiran_negosiasi($id){
		return PDF::loadView('admin.report.lampiran_negosiasi')->setPaper('legal')->setOrientation('portrait')->stream('baeppl.pdf');
	}
	function cetakLampiran_penetapan($id){
		return PDF::loadView('admin.report.lampiran_penetapan')->setPaper('legal')->setOrientation('portrait')->stream('baeppl.pdf');
	}
	function cetakLampiran_pesanan($id){
		return PDF::loadView('admin.report.lampiran_pesanan')->setPaper('legal')->setOrientation('portrait')->stream('baeppl.pdf');
	}

	function get_pengadaan($id){
		return DB::table("pengadaans")->select('id_rekanan','desk_kegiatan','id_users')->where('id',$id)->first();
	}

	function get_rekanan($id_rkn){
		return DB::table('rekanans')->select('nama_rkn')->where('id_rkn',$id_rkn)->first();
	}

	function get_jadwal($id){
		return jadwal::where('id_table',$id)->where('jenis_jadwal','pengadaan')->first();
	}

	function get_pegawai($id_user){
		return DB::table('pegawai')->select('nik','nama')->where('nik',$id_user)->first();
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

}
