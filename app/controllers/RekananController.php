<?php

class RekananController extends BaseController {

	public function __construct(){
		$this->beforeFilter('csrf',array('on'=>'post'));
		
	}

	public function index(){	
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.rekanan.list'));
	}

	public function listAjax(){
		$data = DB::table('rekanans')->select('id_rkn','nama_rkn','alamat_rkn','mobile_phone_rkn','telp_rkn')->where('is_active',"1");
		return Datatables::of($data)
					->remove_column('id_rkn')
					->remove_column('alamat_rkn')
					->edit_column('nama_rkn','
						<strong>{{$nama_rkn}}</strong><br>
						<small>{{$alamat_rkn}}</small>
					')
					->add_column(null,'
						
							<a href="{{ URL::to("admin/rekanan/delete/".$id_rkn) }}" id="del" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="bottom" title="Hapus data"><i class="fa fa-times"  ></i></a>
							<a href="{{ URL::to("admin/rekanan/detil/".$id_rkn) }}" class="btn btn-primary btn-circle" data-toggle="tooltip" data-placement="bottom" title="Detil rekanan"><i class="fa fa-th-list"  ></i></a>
							
					')
					->make();
	}

	public function detil($id){
		$data = Rekanan::find($id);	
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.rekanan.detil'))->with('data',$data);
	}

	public function del($id){
		$data = Rekanan::find($id);
		$data->is_active = 0;
		$data->save();	

		//$user = User::where('id_users',$id)->delete();
		//$pengurus  = Pengurus::where("id_rekanan",$id)->delete();

		Session::flash('messages','
					<div class="alert alert-info alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Informasi...</strong><br>
                    			data berhasil dihapus
                    		</div>
				');		
		return Redirect::to('admin/rekanan');
	}
	function add(){
		
		$data = new stdclass();
		$data->page="add";
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.rekanan.form'))->with('data',$data);
		
	}

	public function edit($id){
		$data = Rekanan::find($id);
		return View::make('master',array('menu'=>'admin.rekanan_menu','page'=>'admin.rekanan.form'))->with('data',$data);
	}

	function save(){
		//if(Request::ajax()){
			$rekanan = new Rekanan();
			$rekanan->nama_rkn = Input::get('nama');
			$rekanan->telp_rkn = Input::get('telp');
			$rekanan->mobile_phone_rkn = Input::get('mobile');
			$rekanan->email_rkn = Input::get('email');
			$rekanan->is_active = 1;
			if($rekanan->save()){
				echo "ok";
			}else{
				echo "error";
			}

		//}

	}

	public function update($id){
		$rules = array(
				'nama'=>'required',
				'alamat'=>'required',
				'telp'=>'required',
				'mobile'=>'required|numeric',
				'email'=>'required|email',
				'npwp'=>'required|numeric',
				'file_npwp'=>'image|mimes:jpeg,png,jpg',
				'file_kop'=>'image|mimes:jpeg,png,jpg',
				'no_siup'=>'required',
				'tgl_siup'=>'required|date',
				'instansi_siup'=>'required',
				'file_siup'=>'image|mimes:jpeg,png,jpg',
				'masa_siup'=>'required',
				'no_tdp'=>'required',
				'tgl_tdp'=>'required|date',
				'masa_tdp'=>'required|date',
				'instansi_tdp'=>'required',
				'file_tdp'=>'image|mimes:jpeg,png,jpg',
				'no_akte'=>'required',
				'tgl_akte'=>'required|date',
				'notaris'=>'required',
				'file_akte'=>'mimes:pdf',
				'deskripsi'=>'required',

			);

		$message = array(
				'required'=>'Data :attribute harus diisi',
				'min'=>'Data :attribute minimal diisi :min karakter',
				'image'=>':attribute harus berupa file gambar',
				'mimes'=>'gambar :attribute harus berekstensi *.jpeg dan *.png',
				'date'=>'Format :attribute harus diisikan dengan benar',
				'email'=>'Format :attribute harus diisikan dengan benar',
				'numeric'=>'Data :attribute harus diisikan dengan angka',
			);

		$validator = Validator::make(Input::all(),$rules,$message);
		$id_pengadaan = Input::get('id_pengadaan');
		if($validator->fails()){
			return Redirect::to('admin/rekanan/form_fik/'.$id_pengadaan)
					->withErrors($validator)->withInput();
		}else{
			$filesiup = Input::file('file_siup');
			$filekop = Input::file('file_kop');
			$filetdp = Input::file('file_tdp');
			$fileakte = Input::file('file_akte');
			$filenpwp = Input::file('file_npwp');
			$filektp = Input::file('file_ktp');
			$fileskt = Input::file('file_skt');



			$rekanan =Rekanan::find($id);
			$rekanan->nama_rkn = Input::get('nama');
			$rekanan->alamat_rkn = Input::get('alamat');
			$rekanan->telp_rkn = Input::get('telp');
			$rekanan->fax_rkn = Input::get('fax');
			$rekanan->mobile_phone_rkn = Input::get('mobile');
			$rekanan->status_rekanan = Input::get('status');
			$rekanan->npwp_rkn = Input::get('npwp');
			$rekanan->email_rkn = Input::get('email');
			$rekanan->ius_no = Input::get('no_siup');
			$rekanan->ius_berlaku = Input::get('masa_siup');
			$rekanan->ius_instansi = Input::get('instansi_siup');
			$rekanan->tgl_ius = date('Y-m-d',strtotime(Input::get('tgl_siup')));
			$rekanan->deskripsi_rkn= Input::get('deskripsi');
			$rekanan->no_akte = Input::get('no_akte');
			$rekanan->tgl_akte = date('Y-m-d',strtotime(Input::get('tgl_akte')));
			$rekanan->notaris_akte = Input::get('notaris');
			$rekanan->no_tdp = Input::get('no_tdp');
			$rekanan->tgl_tdp = date('Y-m-d',strtotime(Input::get('tgl_tdp')));
			$rekanan->masa_tdp = date('Y-m-d',strtotime(Input::get('masa_tdp')));
			$rekanan->instansi_tdp = Input::get('instansi_tdp');
			
			$rekanan->save();

			$id_rekanan = $rekanan->id_rkn;

			if(!File::isDirectory(public_path().'/asset/img/rekanan/'.$id_rekanan)){
				File::makeDirectory(public_path().'/asset/img/rekanan/'.$id_rekanan);
				$rekanan = rekanan::find($id_rekanan);
				$rekanan->direktori = $id_rekanan;
			}
		
		

			if(null!==$filekop){
				$newkop = $id_rekanan.'_kop.'.$filekop->guessClientExtension();
				Image::make($filekop->getRealPath())->save(public_path('/asset/img/rekanan/'.$id_rekanan.'/'.$newkop));
				$rekanan->file_kop =$newkop;
			}

			if(null!==$filesiup){
				$newsiup = $id_rekanan.'_siup.'.$filesiup->guessClientExtension();
				Image::make($filesiup->getRealPath())->save(public_path('/asset/img/rekanan/'.$id_rekanan.'/'.$newsiup));
				$rekanan->file_siup =$newsiup;
			}

			if(null!==$filenpwp){
				$newnpwp = $id_rekanan.'_tdp.'.$filenpwp->guessClientExtension();
				Image::make($filenpwp->getRealPath())->save(public_path('/asset/img/rekanan/'.$id_rekanan.'/'.$newnpwp));
				$rekanan->file_npwp =$newnpwp;
			}

			if(null!==$filetdp){
				$newtdp = $id_rekanan.'_akte.'.$filetdp->guessClientExtension();
				Image::make($filetdp->getRealPath())->save(public_path('/asset/img/rekanan/'.$id_rekanan.'/'.$newtdp));
				$rekanan->file_tdp =$newtdp;
			}

			if(null!==$filektp){
				$newktp = $id_rekanan.'_ktp.'.$filektp->guessClientExtension();
				Image::make($filektp->getRealPath())->save(public_path('/asset/img/rekanan/'.$id_rekanan.'/'.$newktp));
				$rekanan->file_ktp =$newktp;
			}

			if(null!==$fileskt){
				$newskt = $id_rekanan.'_skt.'.$fileskt->guessClientExtension();
				Image::make($fileskt->getRealPath())->save(public_path('/asset/img/rekanan/'.$id_rekanan.'/'.$newskt));
				$rekanan->file_rkt =$newskt;
			}

			if(null!==$fileakte){
				$newakte = $id_rekanan.'_npwp.'.$fileakte->guessClientExtension();
				$fileakte->move(public_path().'/asset/img/rekanan/'.$id_rekanan.'/',$newakte);
				$rekanan->file_akte =$newakte;
			}

			
			
			
			$rekanan->save();

			Session::flash('messages','
				<div class="alert alert-info alert-dismissable" id="notif">
                		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                		<strong>Informasi...</strong><br>
                			data rekanan '.Input::get('nama').' berhasil disimpan
                		</div>
			');		

			$id_pengadaan = Input::get('id_pengadaan');
			$page = Input::get("page");

			if($page=="new"){
				return Redirect::to('admin/rekanan/form_npwp/'.$id_pengadaan);
			}else{
				return Redirect::to('admin/rekanan/beranda');
			}
			

		}
	}


	public function save_user_rekanan($id){
		
			$data = Rekanan::find($id);
			$data->email_rkn = Input::get('username');
			$data->save();
				
			
			
			if(!empty(Input::get('password'))){
				$password = Input::get('password');
				/*$user->password = Hash::make($password);
				$user->get_pass = $password;*/

				$user = user::where('id_users',$id)->update(array('password'=>Hash::make($password),'username'=>Input::get('username'),'get_pass'=>$password));
			}else{
				$user = user::where('id_users',$id)->update(array('username'=>Input::get('username')));
			}

			
			if($user>0){
				echo "ok";
			}else{
				echo "error";
			}
	}

	function jadwal($id){
		
		$data = new stdclass();
		$pengadaan = DB::table("pengadaans")->select('desk_kegiatan')->where("id",$id)->first();
		$jadwal = Jadwal::where('id_table',$id)->where('jenis_jadwal','rekanan')->first();
		$data->id = $id;
		$data->thp1_dari = Date::parse($jadwal->thp1_dari)->format('j F Y');
		$data->thp1_smp = Date::parse($jadwal->thp1_smp)->format('j F Y');
		$data->thp2_dari = Date::parse($jadwal->thp2_dari)->format('j F Y');
		$data->thp2_smp = Date::parse($jadwal->thp2_smp)->format('j F Y');
		$data->thp3_dari = Date::parse($jadwal->thp3_dari)->format('j F Y');
		$data->thp3_smp = Date::parse($jadwal->thp3_smp)->format('j F Y');
		$data->thp4_dari = Date::parse($jadwal->thp4_dari)->format('j F Y');
		$data->thp4_smp = Date::parse($jadwal->thp4_smp)->format('j F Y');
		$data->judul = $pengadaan->desk_kegiatan;
		return View::make('master',array('menu'=>'admin.rekanan_menu','page'=>'admin.rekanan.form_jadwal'))->with('data',$data);
	}

	function jadwal_simpan($id){
		$data = DB::table('jadwals')
					->where('id_table','=',$id)
					->where('jenis_jadwal','rekanan')
					->update(array(
						'thp1_dari'=>date('Y-m-d',strtotime(Input::get("thp1_dari"))),
						'thp1_smp'=>date('Y-m-d',strtotime(Input::get("thp1_smp"))),
						'thp2_dari'=>date('Y-m-d',strtotime(Input::get("thp2_dari"))),
						'thp2_smp'=>date('Y-m-d',strtotime(Input::get("thp2_smp"))),
						'thp3_dari'=>date('Y-m-d',strtotime(Input::get("thp3_dari"))),
						'thp3_smp'=>date('Y-m-d',strtotime(Input::get("thp3_smp"))),
						'thp4_dari'=>date('Y-m-d',strtotime(Input::get("thp4_dari"))),
						'thp4_smp'=>date('Y-m-d',strtotime(Input::get("thp4_smp"))))
					);

		$pengadaan=Proyek::find($id);
		$pengadaan->status = 4;
		$pengadaan->aksi = 4;

		if($pengadaan->save()){
			echo "ok";
		}else{
			echo "error";
		}
	}

	
	function detil_pengadaan($idrkn){
		$pengadaan = DB::table('pengadaans')
						->select('id','desk_kegiatan','lokasi_kegiatan','status')
						->where('id_rekanan','=',$idrkn);

		return Datatables::of($pengadaan)
					->remove_column('lokasi_kegiatan')
					->remove_column('id')
					->edit_column('desk_kegiatan','
						<p><strong>Judul Pengadaan :</strong><br>{{ $desk_kegiatan }}<br><small>Lokasi :<br>{{ $lokasi_kegiatan }}</small></p>
					')
					->edit_column('status','
						@if(Session::get("level")==3)
							@if($status=="1")
								<a href="{{ URL::to("admin/rekanan/proses/".$id) }}" class="btn btn-warning" data-placement="bottom" title="Edit data">Proses <i class="fa fa-chevron-right" style="margin-left:10px;font-size:12px" ></i></a>
							@elseif($status=="2")
								<a href="{{ URL::to("admin/rekanan/edit_fik/".$id) }}" class="btn btn-info" data-placement="bottom" title="Edit data" style="margin-bottom:5px;"><i class="fa fa-edit" style="margin-right:10px;font-size:12px" ></i>Edit FIK</a>
								<a href="{{ URL::to("admin/rekanan/edit_npwp/".$id) }}" class="btn btn-primary" data-placement="bottom" title="Edit data"><i class="fa fa-edit" style="margin-right:10px;font-size:12px" ></i>Edit Pajak</a>
							@elseif($status=="3")
								<a href="{{ URL::to("admin/rekanan/jadwal/".$id) }}" class="btn btn-info" data-placement="bottom" title="Edit data"><i class="fa fa-table" style="margin-right:10px;font-size:12px" ></i>Atur Jadwal</a>
							@else
								<h4><span class="label label-warning">Pengadaan Selesai</span></h4>
							@endif
						@else
							@if($status=="1")
								<h4><span class="label label-warning">Baru</span></h4>
							@elseif($status=="2")
								<h4><span class="label label-warning">Pengisian FIK</span></h4>
							@elseif($status=="3")
								<h4><span class="label label-warning">Pengisian Jadwal Rekanan</span></h4>
							@else
								<h4><i class="fa fa-check"></i></h4>
							@endif
						@endif
						
						
					')					
					->make();
	}

	function proses($id){
		$data = DB::table('pengadaans')
					->select('id','desk_kegiatan','lokasi_kegiatan',
							 'alamat_pengerjaan','hps','hps_rkn','sumber_dana'		
							)->where('id',$id)->first();
		
		return View::make('master',array('menu'=>'admin.rekanan_menu','page'=>'admin.rekanan.form2'))->with('data',$data);
	}


	function generate_pass(){
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	    return substr(str_shuffle($chars),6,6);
	}



	function cekemail(){
		$email = Input::get('email');
		
		$data = Rekanan::where('email_rkn','=',$email)->first();


		if(count($data) > 0){
			echo "false";
		}else{
			echo "true";
		}
	}
}
