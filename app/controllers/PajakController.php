<?php

class PajakController extends BaseController {

	public function index($id){	
		$data = new stdclass();
		$data=DB::table('pengadaans')->select('id','desk_kegiatan','lokasi_kegiatan','hps','hps_rkn')->where('id',$id)->first();
		$data->id=$id;
		$data->page ="new";
		return View::make('master',array('menu'=>'admin.rekanan_menu','page'=>'admin.rekanan.form_npwp'))->with('data',$data);		
	}

	function edit_npwp($id){
		$data = new stdclass();
		$data=DB::table('pengadaans')->select('id','desk_kegiatan','lokasi_kegiatan','hps','hps_rkn')->where('id',$id)->first();
		$data->id=$id;
		$data->page ="edit";
		return View::make('master',array('menu'=>'admin.rekanan_menu','page'=>'admin.rekanan.form_npwp'))->with('data',$data);			
	}

	function listAjax($id){
		$data = DB::table('pajak')
					->select('id_pajak','no_pajak','jenis_pajak','tgl_pajak','file_pajak')
					->where('id_pengadaan','=',$id);

		return Datatables::of($data)
					->remove_column('id_pajak')
					->remove_column('no_pajak')
					->edit_column('tgl_pajak','
						{{ $no_pajak }}<br>{{ $tgl_pajak }}
					')
					->edit_column('file_pajak','
						<i class="fa fa-check"></i>
					')
					->add_column('aksi','
						<a href="{{ URL::to("admin/rekanan/pajak/hapus/".$id_pajak) }}" id="hapus" class="btn btn-circle btn-danger" id="edit"><i class="fa fa-times" ></i></a>
					')
					->make();
	}

	function npwpAjax($id){
		$data = DB::table('pajak')
					->select('id_pajak','id_pengadaan','no_pajak','jenis_pajak','tgl_pajak','file_pajak')
					->where('id_pengadaan','=',$id);

		return Datatables::of($data)
					->remove_column('id_pajak')
					->remove_column('id_pengadaan')
					->remove_column('no_pajak')
					->edit_column('tgl_pajak','
						{{ $no_pajak }}<br>{{ date("d F Y",strtotime($tgl_pajak)) }}
					')
					->edit_column('file_pajak','
						<a href="{{ URL::to("asset/img/pajak/".$id_pengadaan."/".$file_pajak) }}" class="btn btn-primary"><i class="fa fa-file-picture-o" style="margin-right:10px;"></i>lihat Gambar</a>
					')
					->make();
	}
	

	function hapus($id){
		$pajak = Pajak::where("id_pajak",$id)->first();
		File::delete(public_path('/asset/img/pajak/'.$pajak->id_pengadaan.'/'.$pajak->file_pajak));


		$data = Pajak::find($id);
		
		if($data->delete()){
			echo "ok";
		}else{
			echo "error";
		}

	}

	function getCount($id){
		$data = Pajak::where("id_pengadaan",$id)->get();
		return count($data);
	}

	function simpan($id){

		if($this->getCount($id) > 6){
			echo "not";
		}else{
			$pajak = new Pajak();
			$pajak->id_pengadaan = $id;
			$pajak->jenis_pajak = Input::get('jenis_pajak');
			$pajak->no_pajak = Input::get("no_pajak");
			$pajak->tgl_pajak = date('Y-m-d',strtotime(Input::get('tanggal')));
			$pajak->save();
			$id_pajak = $pajak->id_pajak;

			if(!File::isDirectory(public_path().'/asset/img/pajak/'.$id)){
				File::makeDirectory(public_path().'/asset/img/pajak/'.$id);
			}
			$filenpwp = Input::file('file_npwp');
			$newnpwp = $id.'_'.$id_pajak.'.'.$filenpwp->guessClientExtension();
			Image::make($filenpwp->getRealPath())->save(public_path('/asset/img/pajak/'.$id.'/'.$newnpwp));

			$data = Pajak::find($id_pajak);
			$data->file_pajak=$newnpwp;

			if($data->save()){
				echo"ok";
			}else{
				echo"error";
			}
		}
		
	}

	function saveall($id){
		$pengadaan  = Proyek::find($id);
		$pengadaan->status = 2;
		$pengadaan->aksi = 2;
		$pengadaan->save();

		$data = new stdclass();
		$row=DB::table('pengadaans')->select('desk_kegiatan','id_rekanan')->where('id',$id)->first();
		$rekanan= DB::table('rekanans')->select('nama_rkn')->where('id_rkn',$row->id_rekanan)->first();
		$data->judul = $row->desk_kegiatan;
		$data->id = $id;
		$data->rekanan = $rekanan->nama_rkn;


		return View::make('master',array('menu'=>'admin.rekanan_menu','page'=>'admin.rekanan.form4'))->with('data',$data);		
	}
	
}
