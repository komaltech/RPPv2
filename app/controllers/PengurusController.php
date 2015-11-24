<?php

class PengurusController extends BaseController {

	public function index($id_rkn){
		
		$data = new stdclass();
		$data = Rekanan::where('id_rkn','=',$id_rkn)->first();

		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.rekanan.form_pengurus'))->with('data',$data);
	}

	function listAjax($id_rkn){
		$data = DB::table('rekanan_pengurus')
					->select('id_pengurus','id_rekanan','alamat','nama_pengurus','jabatan','telp','prosentase_shm')
					->where('id_rekanan','=',$id_rkn);

		return Datatables::of($data)
					->remove_column('id_pengurus')
					->remove_column('id_rekanan')
					->remove_column('alamat')
					->remove_column('telp')
					->edit_column('nama_pengurus','
						<p>{{ $nama_pengurus }} <br><small>Alamat : {{ $alamat }}</small><br><small>No Handphone / Telp : {{ $telp }}</p>
					')
					->edit_column('jabatan','<b> {{ $jabatan }} </b>')
					->edit_column('prosentase_shm','<p> {{ $prosentase_shm }} % </p>')
					->add_column('aksi','
						<a href="{{ URL::to("admin/rekanan/pengurus/edit/".$id_pengurus) }}" class="btn btn-circle btn-primary" id="edit"><i class="fa fa-edit" ></i></a>
						<a href="{{ URL::to("admin/rekanan/pengurus/hapus/".$id_pengurus) }}" class="btn btn-circle btn-danger" id="hapus"><i class="fa fa-trash-o" ></i></a>
					')
					->make();
	}

	function listPengurus($id_rkn){
		$data = DB::table('rekanan_pengurus')
					->select('id_pengurus','id_rekanan','alamat','nama_pengurus','jabatan','telp','prosentase_shm')
					->where('id_rekanan','=',$id_rkn);

		return Datatables::of($data)
					->remove_column('id_pengurus')
					->remove_column('id_rekanan')
					->remove_column('alamat')
					->remove_column('telp')
					->edit_column('nama_pengurus','
						<p>{{ $nama_pengurus }} <br><small>Alamat : {{ $alamat }}</small><br><small>No Handphone / Telp : {{ $telp }}</p>
					')
					->edit_column('jabatan','<b> {{ $jabatan }} </b>')
					->edit_column('prosentase_shm','<p> {{ $prosentase_shm }} % </p>')
					/*->add_column('aksi','
						<a href="{{ URL::to("admin/rekanan/pengurus/edit/".$id_pengurus) }}" class="btn btn-circle btn-primary" id="edit"><i class="fa fa-edit" ></i></a>
						<a href="{{ URL::to("admin/rekanan/pengurus/hapus/".$id_pengurus) }}" class="btn btn-circle btn-danger" id="hapus"><i class="fa fa-trash-o" ></i></a>
					')*/
					->make();
	}

	function save($id_rkn){

		$data = new Pengurus();

		$data->id_rekanan = $id_rkn;
		$data->nama_pengurus = Input::get('nama');
		$data->nik = Input::get('nik');
		if(Input::get('jabatan')=="Lain"){
			$data->jabatan=Input::get('jabatan_lainnya');
		}else{
			$data->jabatan =Input::get('jabatan');
		}
		$data->alamat = Input::get('alamat');
		$data->telp = Input::get('telp');
		$data->prosentase_shm = Input::get('saham');

		if($data->save()){
			echo "ok";
		}else{
			echo "error";
		}
		
	}
	function hapus($id){
		$data =Pengurus::find($id);
		if($data->delete()){
			echo "ok";
		}else{
			echo "error";
		}

	}
	function selesai($id_rkn){
		$data = Pengurus::where('id_rekanan',"=",$id_rkn)->get();
		
		if(count($data)<1){
			Session::flash('messages','
					<div class="alert alert-danger alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Peringatan...</strong><br>
                    			Anda harus mengisi Kepengurusan dalam perusahaan.
                		</div>
				');		
			return Redirect::to('/admin/rekanan/add/pengurus/'.$id_rkn);
		}else{
			return Redirect::to('/admin/rekanan/beranda');
		}


		
	}
	function update($id){
		if(Input::get('jabatan')== "Lain"){
			$jabatan =Input::get('jabatan_lainnya');
		}else{
			$jabatan = Input::get('jabatan');
			
		}
		$data = DB::table('rekanan_pengurus')
				->where('id_pengurus','=',$id)
				->update(array(
					'nama_pengurus'=>Input::get('nama'),
					'nik'=>Input::get('nik'),
					'jabatan'=>$jabatan,
					'alamat'=>Input::get('alamat'),
					'telp'=>Input::get('telp'),
					'prosentase_shm'=>Input::get('saham'),
				));
		echo "ok";
	}

	function edit($id){
		$data = Pengurus::where('id_pengurus','=',$id)->first();
		return Response::json($data);

	}
	
}
