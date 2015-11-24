<?php

class PegawaiController extends BaseController {

	public function __construct(){
		$this->beforeFilter('csrf',array('on'=>'post'));
		
	}

	public function index(){	
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.pegawai.list'));
	}

	public function listAjax(){
		$data = DB::table('pegawai')
				->join('satker', 'pegawai.id_satker', '=', 'satker.id_satker')
				->select('satker.nama_satker', 'pegawai.nama','pegawai.nip','pegawai.alamat','pegawai.level','pegawai.golongan','pegawai.phone','pegawai.mobile_phone');


		return Datatables::of($data)
					->remove_column('nama_satker')
					->remove_column('alamat')
					->remove_column('phone')
					->remove_column('mobile_phone')
					->edit_column('level','
						@if($level == "1")
                            Pejabat Pembuat Komitmen
                        @elseif($level =="2")
                            Sekretariat ULP
                        @elseif($level =="3")
							Kepala ULP
						@elseif($level =="4")
							POKJA
						@elseif($level =="5")
							Pengguna Anggaran
						@elseif($level =="0")
                            Administrator
                        @endif
					')
					->edit_column('nama','
						<strong>{{$nama}}</strong><br>
						<strong>{{$nama_satker}}</strong><br>
						<small>{{$alamat}}</small><br>
						<small>{{$phone}} {{$mobile_phone}}</small>
					')
					->add_column(null,'
							<a href="{{ URL::to("admin/pegawai/edit/".$nip) }}" id="tooltip" class="btn btn-warning btn-circle" data-toggle="tooltip" data-placement="bottom" title="Edit data"><i class="fa fa-pencil" ></i></a>
							<a href="{{ URL::to("admin/pegawai/delete/".$nip) }}" id="del" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="bottom" title="Hapus data"><i class="fa fa-times"  ></i></a>
							<a href="{{ URL::to("admin/pegawai/detil/".$nip) }}" class="btn btn-primary btn-circle" data-toggle="tooltip" data-placement="bottom" title="Detil Pegawai"><i class="fa fa-th-list"  ></i></a>
					')
					->make();
	}
	public function detil($id){
		$data = DB::table('pegawai')
				->join('satker', 'pegawai.id_satker', '=', 'satker.id_satker')
				->select('satker.nama_satker', 'pegawai.nama','pegawai.nip','pegawai.alamat','pegawai.jabatan','pegawai.golongan','pegawai.level','pegawai.phone','pegawai.mobile_phone','pegawai.email')
				->where('pegawai.nip', '=', $id)
				->get();
				
		//print_r($data);		
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.pegawai.detil'))->with('data',$data);
	}
	public function del($id){
	
		
		$pegawai = Pegawai::find($id);
		$user = DB::table('user')-> where ('user.user_id', '=', $id)-> delete();
		$pegawai->delete();
		

		Session::flash('messages','
					<div class="alert alert-info alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Informasi...</strong><br>
                    			Data berhasil dihapus
                    		</div>
				');		
		return Redirect::to('admin/pegawai');
	}
	public function edit($id){
		$data = DB::table('pegawai')
				->join('satker', 'pegawai.id_satker', '=', 'satker.id_satker')
				->join('user', 'pegawai.nip', '=', 'user.user_id')
				->select('user.username','satker.nama_satker', 'pegawai.nama','pegawai.nip','pegawai.alamat','pegawai.phone','pegawai.mobile_phone','pegawai.id_satker','pegawai.jabatan','pegawai.golongan','pegawai.level','pegawai.email')
				->where('pegawai.nip', '=', $id)
				->first();
		$satker = DB::table('satker')->get();
		//$data->satker = $satker;
		foreach($satker as $row){
			$data->satker[$row->id_satker] = $row->nama_satker;
		}	
		
		$data->page='form';
		
		
		//print_r($data);
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.pegawai.form'))->with('data',$data);
	}
	public function update($id){
		$rules = array(
				'username'=>'required',
				'nama'=>'required',
				'nip'=>'required|numeric',
				'alamat'=>'required',
				'phone'=>'required',
				'mobile_phone'=>'required',
				'id_satker'=>'required',
				'jabatan'=>'required',
				'golongan'=>'required',
				'level'=>'required',
				'email'=>'required'
			);

		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails()){
			return Redirect::to('admin/pegawai/edit/'.$id)
					->withErrors($validator)->withInput();
		}else{
				
			
				$pegawai = Pegawai::find($id);
				$pegawai->nama=Input::get('nama');
				$pegawai->nip=Input::get('nip');
				$pegawai->alamat=Input::get('alamat');
				$pegawai->phone=Input::get('phone');
				$pegawai->mobile_phone=Input::get('mobile_phone');
				$pegawai->id_satker=Input::get('id_satker');
				$pegawai->jabatan=Input::get('jabatan');
				$pegawai->golongan=Input::get('golongan');
				$pegawai->level=Input::get('level');
				$pegawai->email=Input::get('email');
				$pegawai->save();
				

				
				if(empty(Input::get('password'))){
					$user = DB::table('user')->where('user_id', '=', $id)->update(array(
																						'user_id' => Input::get('nip'), 
																						'username' => Input::get('username'),
																						'level_user' => Input::get('level')
																						));
				}
				else{
					$user = DB::table('user')->where('user_id', '=', $id)->update(array(
																						'user_id' => Input::get('nip'), 
																						'username' => Input::get('username'),
																			'password' => Hash::make(Input::get('password')),
																						'level_user' => Input::get('level')
																						));
				}
				

				Session::flash('messages','
					<div class="alert alert-info alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Informasi...</strong><br>
                    			data pegawai '.Input::get('nama').' berhasil Update
                    		</div>
				');		
				return Redirect::to('admin/pegawai');

		}
	}

	public function save(){
		$rules = array(
				'username'=>'required',
				'password'=>'required',
				'nama'=>'required',
				'nip'=>'required|numeric',
				'alamat'=>'required',
				'phone'=>'required',
				'mobile_phone'=>'required',
				'id_satker'=>'required',
				'level'=>'required',
				'jabatan'=>'required',
				'golongan'=>'required',
				'email'=>'required'
			);

		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails()){
			return Redirect::to('admin/pegawai/add')
					->withErrors($validator)->withInput();
		}else{
				
				$pegawai = new Pegawai();
				$pegawai->nama=Input::get('nama');
				$pegawai->nip=Input::get('nip');
				$pegawai->alamat=Input::get('alamat');
				$pegawai->phone=Input::get('phone');
				$pegawai->mobile_phone=Input::get('mobile_phone');
				$pegawai->id_satker=Input::get('id_satker');
				$pegawai->level=Input::get('level');
				$pegawai->jabatan=Input::get('jabatan');
				$pegawai->golongan=Input::get('golongan');
				$pegawai->email=Input::get('email');
				$pegawai->save();

				$data = new User();
				$data->user_id=Input::get('nip');
				$data->username=Input::get('username');
				$data->password=Hash::make(Input::get('password'));
				$data->level_user=Input::get('level');
				$data->save();

				Session::flash('messages','
					<div class="alert alert-info alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Informasi...</strong><br>
                    			data pegawai '.Input::get('nama').' berhasil disimpan
                    		</div>
				');		
				return Redirect::to('admin/pegawai');

		}
	}
}
