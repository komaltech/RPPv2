<?php

class KategoriController extends BaseController {

	public function __construct(){
		$this->beforeFilter('csrf',array('on'=>'post'));
		
	}

	public function index(){	
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.kategori.list'));
	}

	public function listAjax(){
		$data = DB::table('kategori')->select('id_cat','cat_nama');
		return Datatables::of($data)
					->remove_column('id_cat')
					->edit_column('cat_nama','
						<span data="{{ $id_cat }}">{{$cat_nama}}</span>
					')
					->add_column(null,'
							<a href="{{ URL::to("admin/kategori/edit/".$id_cat) }}" id="edit" class="btn btn-warning" data-toggle="tooltip" data-placement="bottom" title="Edit data"><i class="fa fa-pencil" ></i></a>							
					')
					->make();
	}
	public function detil($id){
		$data = Pegawai::find($id);	
		return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.pegawai.detil'))->with('data',$data);
	}

	public function update($id){
		if(Request::ajax()){
			$data = Kategori::find($id);
			$data->cat_nama = Input::get("kategori");
			$data->save();

			return "berhasil";	
		}
	}

	public function save(){
		if(Request::ajax()){
			$data = new Kategori();
			$data->cat_nama = Input::get("kategori");
			$data->save();

			return "berhasil";	
		}
		
	}
}
