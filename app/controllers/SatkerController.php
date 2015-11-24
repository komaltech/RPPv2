<?php

class SatkerController extends BaseController {

	public function __construct(){
		$this->beforeFilter('csrf',array('on'=>'post'));
		
	}

	public function index(){	
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.satker.list'));
	}

	public function listAjax(){
		$data = DB::table('satker')->select('id_satker','nama_satker');
		return Datatables::of($data)
					->remove_column('id_satker')
					->edit_column('nama_satker','
						<span data="{{ $id_satker }}">{{$nama_satker}}</span>
					')
					->add_column(null,'
							<a href="{{ URL::to("admin/satker/edit/".$id_satker) }}" id="edit" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit data"><i class="fa fa-pencil" ></i></a>							
					')
					->make();
	}
	/*public function detil($id){
		$data = Pegawai::find($id);	
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.pe.detil'))->with('data',$data);
	}
	public function del($id){
		$data = Pegawai::find($id);
		$data->delete();	

		Session::flash('messages','
					<div class="alert alert-info alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Informasi...</strong><br>
                    			data berhasil dihapus
                    		</div>
				');		
		return Redirect::to('admin/pegawai');
	} */
	

	public function update($id){
		if(Request::ajax()){
			$data = satker::find($id);
			$data->nama_satker = Input::get("satker");
			$data->save();

			return "berhasil";	
		}
	}

	public function save(){
		//if(Request::ajax()){
			$data = new satker();
			$data->nama_satker = Input::get("satker");
			$data->save();

			Session::flash('messages','
					<div class="alert alert-info alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Informasi...</strong><br>
                    			data berhasil disimpan
                    		</div>
				');		
			return Redirect::to('admin/satker');
		//}
		
	}
}
