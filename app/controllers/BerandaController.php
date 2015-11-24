<?php

class BerandaController extends BaseController {

	public function __construct(){
		$this->beforeFilter('csrf',array('on'=>'post'));
	}

	public function index(){
		$level = Session::get('level');
		$userid = Session::get('user_id');
		$data =DB::table('pegawai')
				->join('satker', 'pegawai.id_satker', '=', 'satker.id_satker')
				->join('user', 'pegawai.nip', '=', 'user.user_id')
				->select('user.username','satker.nama_satker', 'pegawai.nama','pegawai.nip','pegawai.email','pegawai.level','pegawai.alamat','pegawai.jabatan','pegawai.golongan','pegawai.phone','pegawai.mobile_phone','pegawai.foto')
				->where('pegawai.nip', '=', $userid)
				->first();

			Session::put('foto',$data->foto);
		
			return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.beranda.detil'))->with('data',$data);
		}
	
	 public function listAjax(){

		$userid = Session::get('user_id');
	 	$data = DB::table('paket')
				->leftjoin('kategori','paket.id_cat','=','kategori.id_cat')
					->select('kategori.cat_nama','paket.nama_paket','paket.id','paket.status',
							'paket.pagu','paket.thn_anggaran','paket.aksi');

	 	if(Session::get('level')=="1"){
	 	$data->where('user_id','=',$userid);
			return Datatables::of($data)
						->remove_column('id')
						->remove_column('cat_nama')
						->edit_column('nama_paket','
						<strong>{{$nama_paket}}</strong><br>
						<small><p>Kategori : <strong>{{$cat_nama}}</strong></p></small><br>
						')
						->edit_column('status','
							@if($status == "0")
								<h4><span class="label label-warning">Draft</span></h4>
							@elseif($status == "1")
								<h4><span class="label label-info">Verifikasi Layanan</span></h4>
							@elseif($status == "2")
								<h4><span class="label label-primary">Verifikasi Ka. ULP</span></h4>
							@elseif($status == "3")
								<h4><span class="label label-Primary">Verifikasi Pokja</span></h4>
							@elseif($status == "4")
								<h4><span class="label label-success">Paket Diumumkan</span></h4>
							@elseif($status == "5")
								<h4><span class="label label-success">Paket Ditolak</span></h4>
							@endif
						')
						->edit_column('pagu','{{ String::formatMoney($pagu,"Rp.") }}')
						->edit_column('thn_anggaran','<strong>{{$thn_anggaran}}</strong><br>')
						->edit_column('aksi','
							<div class="btn-group">
									<a href="{{ URL::to("admin/paket/detil-list/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-th-list"></i></a>
								@if($aksi=="0")
									<a href="{{ URL::to("admin/paket/proses/".$id) }}" class="btn btn-primary" data-toggle="tooltip" >Kirim Ke ULP<i class="fa fa-angle-double-right" ></i></a>
									<a href="{{ URL::to("admin/paket/edit/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-edit"></i></a>
									<a href="{{ URL::to("admin/paket/del/".$id) }}" class="btn btn-danger" data-toggle="tooltip" ><i class="fa fa-trash-o"></i></a>
								@elseif($aksi=="1")
									<a href="{{ URL::to("admin/paket/edit/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-edit"></i></a>
									<a href="{{ URL::to("admin/paket/batal/".$id) }}" class="btn btn-primary" data-toggle="tooltip" > Batal <i class="fa fa-times" ></i></a>
								@endif
							</div>	
						')
						->make();
	 	}elseif(Session::get('level')=="2"){
			$data->where('status','>','0');
	 		return Datatables::of($data)
						->remove_column('id')
						->remove_column('cat_nama')
						->edit_column('status','
							@if($status =="1")
								<h4><span class="label label-info">Verifikasi Layanan</span></h4>
							@elseif($status=="2")
								<h4><span class="label label-primary">Verifikasi Ka. ULP</span></h4>
							@elseif($status=="3")
								<h4><span class="label label-Primary">Verifikasi Pokja</span></h4>
							@elseif($status == "4")
								<h4><span class="label label-success">Paket Diumumkan</span></h4>
							@elseif($status == "5")
								<h4><span class="label label-success">Paket Ditolak</span></h4>
							@endif
						')
						->edit_column('pagu','{{ String::formatMoney($pagu,"Rp.") }}')
						->edit_column('thn_anggaran','<strong>{{$thn_anggaran}}</strong><br>')
						->edit_column('aksi','
						<div class="btn-group" >
									<a href="{{ URL::to("admin/permintaan/detil-list/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-th-list"></i></a>
							@if($aksi == "0")
									<a href="{{ URL::to("admin/permintaan/cetak/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-print"></i></a>
									<a href="{{ URL::to("admin/permintaan/edit/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-edit"></i></a>
									<a href="{{ URL::to("admin/permintaan/del/".$id) }}" class="btn btn-danger" data-toggle="tooltip" ><i class="fa fa-trash-o"></i></a>
							@elseif($aksi =="3")
								<a href="{{ URL::to("admin/permintaan/cetak/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-print"></i></a>
							@else
								<a href="{{ URL::to("admin/permintaan/cetak/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-print"></i></a>
								<a href="{{ URL::to("admin/permintaan/edit/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-edit"></i> Edit</a>
							@endif
							</div>
						')
						->make();
	 	}elseif(Session::get('level')>"2"){
	 		$data->where('status','>','0');
	 		return Datatables::of($data)
						->remove_column('id')
						->remove_column('cat_nama')
						->edit_column('status','
							@if($status =="1")
								<h4><span class="label label-info">TerVerifikasi Layanan</span></h4>
							@elseif($status=="2")
								<h4><span class="label label-primary">TerVerifikasi Ka. ULP</span></h4>
							@elseif($status=="3")
								<h4><span class="label label-Primary">TerVerifikasi Pokja</span></h4>
							@elseif($status == "4")
								<h4><span class="label label-success">Paket Diumumkan</span></h4>
							@elseif($status == "5")
								<h4><span class="label label-success">Paket Ditolak</span></h4>
							@endif
						')
						->edit_column('pagu','{{ String::formatMoney($pagu,"Rp.") }}')
						->edit_column('thn_anggaran','<strong>{{$thn_anggaran}}</strong><br>')
						->edit_column('aksi','
						<div class="btn-group" >
									<a href="{{ URL::to("admin/permintaan/detil-list/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-th-list"></i></a>
							@if($aksi == "0")
									<a href="{{ URL::to("admin/permintaan/cetak/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-print"></i></a>
									<a href="{{ URL::to("admin/permintaan/edit/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-edit"></i></a>
									<a href="{{ URL::to("admin/permintaan/del/".$id) }}" class="btn btn-danger" data-toggle="tooltip" ><i class="fa fa-trash-o"></i></a>
							@elseif($aksi =="3")
								<a href="{{ URL::to("admin/permintaan/cetak/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-print"></i></a>
							@else
								<a href="{{ URL::to("admin/permintaan/cetak/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-print"></i></a>
								<a href="{{ URL::to("admin/permintaan/edit/".$id) }}" class="btn btn-info" data-toggle="tooltip" ><i class="fa fa-edit"></i> Edit</a>
							@endif
							</div>
						')
						->make();
	 	}
	 }

	 public function edit_user($id){
	 	$data = DB::table('pegawai')
				->join('satker', 'pegawai.id_satker', '=', 'satker.id_satker')
				->join('user', 'pegawai.nip', '=', 'user.user_id')
				->select('satker.nama_satker','user.username', 'pegawai.nama','pegawai.email','pegawai.nip','pegawai.alamat','pegawai.id_satker','pegawai.level','pegawai.jabatan','pegawai.golongan','pegawai.phone','pegawai.mobile_phone')
				->where('pegawai.nip', '=', $id)
				->first();
		
		$user = DB::table('user')
				->select('user.user_id','user.username')
				->where('user.user_id','=', $id)
				->first();
		$data->username =  $user->username;
		//echo $id;
		/*echo $id;
		print_r($user);
		print_r($data);*/
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.beranda.edit_user'))->with('data',$data);
	 }

	 public function save($id){
	 	$rules = array(
				'username'=>'required',
				'nip'=>'required|numeric',
				'nama'=>'required',
				'alamat'=>'required',
				'phone'=>'required',
				'mobile_phone'=>'required',
				'jabatan'=>'required',
				'golongan'=>'required',
				'email'=>'required',
				'foto'=>'max:200000|image|mimes:jpeg,jpg,png'
			);
	 	$message = array(
				'required'=>'Data :attribute harus diisi',
				'min'=>'Data :attribute minimal diisi :min karakter',
				'image'=>':attribute harus berupa file gambar',
				'mimes'=>'gambar :attribute harus berekstensi *.jpeg dan *.png'
			);

		$validator = Validator::make(Input::all(),$rules,$message);

		if($validator->fails()){
			return Redirect::to('admin/user/edit/'.Session::get('user_id'))
					->withErrors($validator)->withInput();
		}else{
			$image = Input::file('foto');
			if(null == $image){
				$pegawai = Pegawai::find($id);
				$pegawai->nama=Input::get('nama');
				$pegawai->alamat=Input::get('alamat');
				$pegawai->phone=Input::get('phone');
				$pegawai->mobile_phone=Input::get('mobile_phone');
				$pegawai->jabatan=Input::get('jabatan');
				$pegawai->golongan=Input::get('golongan');
				$pegawai->email=Input::get('email');
				$pegawai->save();
				
				
				
				if(empty(Input::get('password'))){
					$user = DB::table('user')->where('user_id', '=', $id)->update(array(
																						'username' => Input::get('username')
																						
																						));
				}else{
					$user = DB::table('user')->where('user_id', '=', $id)->update(array(
																						'username' => Input::get('username'),
																						'password' => Hash::make(Input::get('password'))	
																						
																						));
				}
			}else{
				
				$new_name = $id.".".$image->guessClientExtension();
				if(Image::make($image->getRealPath())->resize(183,190)->save(public_path('/asset/img/foto_user/'.$new_name))){
					
					Image::make($image->getRealPath())->resize(80,80)->save(public_path('/asset/img/foto_user/thumbnail/'.$new_name));

					$pegawai = Pegawai::find($id);
					$pegawai->nama=Input::get('nama');
					$pegawai->alamat=Input::get('alamat');
					$pegawai->phone=Input::get('phone');
					$pegawai->mobile_phone=Input::get('mobile_phone');
					$pegawai->jabatan=Input::get('jabatan');
					$pegawai->golongan=Input::get('golongan');
					$pegawai->email=Input::get('email');
					$pegawai->foto = $new_name;
					$pegawai->save();
					
					
					
					if(empty(Input::get('password'))){
						$user = DB::table('user')->where('user_id', '=', $id)->update(array(
																							'username' => Input::get('username')
																							
																							));
					}else{
						$user = DB::table('user')->where('user_id', '=', $id)->update(array(
																							'username' => Input::get('username'),
																				'password' => Hash::make(Input::get('password'))
																							
																							));
					}
				}else{
					echo "gagal";
					exit;
				}
			}
				
				

				Session::flash('messages','
					<div class="alert alert-info alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Informasi...</strong><br>
                    			data User '.Input::get('nama').' berhasil Update
                    		</div>
				');		

				return Redirect::to('admin/user/edit/'.Session::get('user_id'));

		}
	 }
}
