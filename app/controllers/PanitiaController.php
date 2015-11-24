<?php

class PanitiaController extends BaseController {

	public function __construct(){
		$this->beforeFilter('csrf',array('on'=>'post'));
	}
	
	public function index()
	{
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.panitia.list'));
	}

public function listAjax(){
		$data = DB::table('panitia')
				->join('satker', 'panitia.id_satker', '=', 'satker.id_satker')
				->select('panitia.nama_pnt','panitia.id_pnt','satker.nama_satker');


		return Datatables::of($data)
					->remove_column('id_pnt')
					->edit_column('nama_pnt','
						<strong>{{$nama_pnt}}</strong><br>
					')
					->edit_column('nama_satker','
						<strong>{{$nama_satker}}</strong><br>
					')
					->add_column(null,'
							<a href="{{ URL::to("admin/panitia/edit/".$id_pnt) }}" id="tooltip" class="btn btn-warning btn-circle" data-toggle="tooltip" data-placement="bottom" title="Edit data"><i class="fa fa-pencil" ></i></a>
							<a href="{{ URL::to("admin/panitia/delete/".$id_pnt) }}" id="del" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="bottom" title="Hapus data"><i class="fa fa-times"  ></i></a>
							<a href="{{ URL::to("admin/panitia/detil/".$id_pnt) }}" class="btn btn-primary btn-circle" data-toggle="tooltip" data-placement="bottom" title="Detil Panitia"><i class="fa fa-th-list"  ></i></a>
					')
					->make();
	}
	
	

public function save(){
		$rules = array(
				'nama_pnt'=>'required',
				'id_satker'=>'required',
			);

		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails()){
			return Redirect::to('admin/panitia/tambah')
					->withErrors($validator)->withInput();
		}else{
				
				$panitia = new Panitia();
				$panitia->nama_pnt=Input::get('nama_pnt');
				$panitia->id_satker=Input::get('id_satker');
				$panitia->save();

				Session::flash('messages','
					<div class="alert alert-info alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Informasi...</strong><br>
                    			data panitia '.Input::get('nama_pnt').' berhasil disimpan
                    		</div>
				');		
				return Redirect::to('admin/panitia');

		}
	}
	
	public function edit($id){
		$data = DB::table('panitia')
				->join('satker', 'panitia.id_satker', '=', 'satker.id_satker')
				->select('satker.nama_satker', 'panitia.nama_pnt','panitia.id_pnt','panitia.id_satker')
				->where('panitia.id_pnt', '=', $id)
				->first();
		$satker = DB::table('satker')->get();
		//$data->satker = $satker;
		foreach($satker as $row){
			$data->satker[$row->id_satker] = $row->nama_satker;
		}	
		
		$data->page='form';
		
		
		//print_r($data);
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.panitia.form'))->with('data',$data);
	}
	
	
	public function update($id){
		$rules = array(
				'nama_pnt'=>'required',
				'id_satker'=>'required'
			);

		$validator = Validator::make(Input::all(),$rules);

		if($validator->fails()){
			return Redirect::to('admin/panitia/edit/'.$id)
					->withErrors($validator)->withInput();
		}else{
				
			
				$panitia = Panitia::find($id);
				$panitia->nama_pnt=Input::get('nama_pnt');
				$panitia->id_satker=Input::get('id_satker');
				$panitia->save();
				
				
				Session::flash('messages','
					<div class="alert alert-info alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Informasi...</strong><br>
                    			data panitia '.Input::get('nama_pnt').' berhasil Update
                    		</div>
				');		
				return Redirect::to('admin/panitia');

		}
	}
	
	public function detil($id){
		$data = DB::table('panitia')
				->join('satker', 'panitia.id_satker', '=', 'satker.id_satker')
				->select('satker.nama_satker', 'panitia.nama_pnt','panitia.id_pnt')
				->where('panitia.id_pnt', '=', $id)
				->get();
				
		//print_r($data);		
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.panitia.detil'))->with('data',$data);
	}

	public function detilanggota($id){
		$data = DB::table('anggota_panitia')
				->join('panitia', 'anggota_panitia.id_pnt', '=', 'panitia.id_pnt')
				->join('pegawai', 'anggota_panitia.nip', '=', 'pegawai.nip')
				->select('anggota_panitia.id','pegawai.nama','anggota_panitia.nip','anggota_panitia.agp_jabatan');
				


		return Datatables::of($data)
					->remove_column('id')
					->edit_column('nama','
						<strong>{{$nama}}</strong><br>
					')
					->edit_column('nip','
						<strong>{{$nip}}</strong><br>
					')
					->edit_column('agp_jabatan','
						<strong>
						@if($agp_jabatan == "K")
                            Ketua
                        @elseif($agp_jabatan =="W")
                            Wakil Ketua
                        @elseif($agp_jabatan =="S")
							Sekretaris
						@elseif($agp_jabatan =="A")
							Anggota
						@endif</strong><br>
					')
					->make();
	
			}
	
	public function del($id){
	
		$panitia = Panitia::find($id);
		$panitia->delete();
		

		Session::flash('messages','
					<div class="alert alert-info alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Informasi...</strong><br>
                    			Data berhasil dihapus
                    		</div>
				');		
		return Redirect::to('admin/panitia');
	}
	
	public function anggotaAjax(){
		$data = DB::table('anggota_panitia')
				->join('panitia', 'anggota_panitia.id_pnt', '=', 'panitia.id_pnt')
				->join('pegawai', 'anggota_panitia.nip', '=', 'pegawai.nip')
				->select('anggota_panitia.id','pegawai.nama','anggota_panitia.nip','anggota_panitia.agp_jabatan');
				


		return Datatables::of($data)
					->remove_column('id')
					->edit_column('nama','
						<strong>{{$nama}}</strong><br>
					')
					->edit_column('nip','
						<strong>{{$nip}}</strong><br>
					')
					->edit_column('agp_jabatan','
						<strong>
						@if($agp_jabatan == "K")
                            Ketua
                        @elseif($agp_jabatan =="W")
                            Wakil Ketua
                        @elseif($agp_jabatan =="S")
							Sekretaris
						@elseif($agp_jabatan =="A")
							Anggota
						@endif</strong><br>
					')
					->add_column(null,'
						<a href="{{ URL::to("admin/panitia/deleteanggota/".$id) }}" id="del" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="bottom" title="Hapus data"><i class="fa fa-times"  ></i></a>
						
					')
					->make();
	}
	
		public function delanggota($id){
	
		$panitia = AnggotaPanitia::find($id);
		$panitia->delete();
		

		Session::flash('messages','
					<div class="alert alert-info alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Informasi...</strong><br>
                    			Data berhasil dihapus
                    		</div>
				');		
		return Redirect::to('admin/panitia');
	}

	public function pilihanggota($id){

		//if(Request::ajax()){
			$panitia = Panitia::find($id);
			$data = new stdclass();
			$panitia =DB::table('panitia')
			->where('id_pnt',$id)
			->get();
			$data->panitia[$id]="";
			foreach($panitia as $row){
				$data->panitia[$row->id_pnt] = $row->nama_pnt;
			}
			$pegawai = DB::table('pegawai')
			->where('level','=',"4")
			->get();
				$data->pegawai[]="- Pilih pegawai -";
			foreach($pegawai as $row){
				$data->pegawai[$row->nip] = $row->nama;
			}	

			//$data=('id_pnt','=',$id)
			$data->page="tambahanggota";
		
		
		//print_r($data);
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.panitia.anggota'))->with('data',$data);
	}
	
	public function saveanggota(){
		$rules = array(
				'id_pnt'=>'required',
				'nip'=>'required',
				'agp_jabatan'=>'required'
			);
				$anggota_panitia = DB::table('anggota_panitia');
				$anggota_panitia = new AnggotaPanitia();
				$anggota_panitia->id_pnt=Input::get('id_pnt');
				$anggota_panitia->nip=Input::get('nip');
				$anggota_panitia->agp_jabatan=Input::get('agp_jabatan');
				$anggota_panitia->save();

				Session::flash('messages','
					<div class="alert alert-info alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Informasi...</strong><br>
                    			data panitia '.Input::get('nama_pnt').' berhasil disimpan
                    		</div>
				');		
				return Redirect::to('admin/panitia');

		}
	
	
}
