<?php

class SettingController extends BaseController {

	public function __construct(){
		$this->beforeFilter('csrf',array('on'=>'post'));
		
	}

	public function index(){	
		$data = DB::table('settings')->first();

		if (count($data)>0) {
			$data->page = "edit";
			return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.setting.form'))->with("data",$data);
		} else {
			# code...
			$data->page = "add";
			return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.setting.form'))->with("data",$data);
		}
		
		
	}
	public function save(){
			$data = new Setting();
			$data->email_sender=Input::get('email');
			$data->protokol=Input::get('protokol');
			$data->port=Input::get('port');
			$data->host=Input::get('host');
			$data->user_email=Input::get('user');
			$data->pass_email=Input::get('pass');
			$data->enkripsi=Input::get('enkripsi');
			if($data->save()){
				Session::flash('messages','
					<div class="alert alert-info alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Keterangan</strong><br>
                    			Setting berhasil disimpan
                		</div>
				');		
				
			}else{
				Session::flash('messages','
					<div class="alert alert-danger alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Peringatan...</strong><br>
                    			Settig gagal disimpan
                		</div>
				');		
			}

			return Redirect::to('admin/setting/email');	

		

	}

	public function update($id){
		
			$data = Setting::find($id);
			$data->email_sender=Input::get('email');
			$data->protokol=Input::get('protokol');
			$data->port=Input::get('port');
			$data->host=Input::get('host');
			$data->user_email=Input::get('user');
			$data->pass_email=Input::get('pass');
			$data->save();

			if($data->save()){
				Session::flash('messages','
					<div class="alert alert-info alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Keterangan</strong><br>
                    			Setting berhasil disimpan
                		</div>
				');		
				
			}else{
				Session::flash('messages','
					<div class="alert alert-danger alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Peringatan...</strong><br>
                    			Settig gagal disimpan
                		</div>
				');		
			}

			return Redirect::to('admin/setting/email');	
	}

	
}
