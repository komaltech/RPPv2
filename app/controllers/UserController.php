<?php

class UserController extends BaseController {

	public function __construct(){
		$this->beforeFilter('csrf',array('on'=>'post'));
	}

	public function login()
	{
		if(Auth::check()){
			if(null !== Session::get('url')){
				Redirect::to(Session::get('url'));	
			}else{
				return Redirect::to("/admin/beranda");
			}
			
			
		}else{
			return View::make('login');
		}	
	}

	public function dologout(){
		Auth::logout();
		Session::flush();
		Session::flash('messages','
					<div class="alert alert-success alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Peringatan...</strong><br>
                    			Anda berhasil logout
                    		</div>
				');		
		return Redirect::to('/')->withInput(Input::except('password'));		
		
	}
	public function dologin()
	{
		$rules = array(
				'username'=>'required',
				'password'=>'required'
			);
		$message = array(
				'required'=>'Data :attribute harus diisi',
				'min'=>'Data :attribute minimal diisi :min karakter'
			);
		$validator = Validator::make(Input::all(),$rules,$message);

		if($validator->fails()){
			return Redirect::to('/')->withErrors($validator)->withInput(Input::except('password'));
		}
		else
		{
			$data = array('username'=>Input::get('username'),'password'=>Input::get('password'));
			if(Auth::attempt($data))
			{
				$data = DB::table('user')
				->select('user_id','level_user','username')
				->where('username', '=', Input::get('username'))
				->first();
				//print_r($data);
				//echo $data->id_users;
				Session::put('user_id',$data->user_id);
				Session::put('level',$data->level_user);
				Session::put('username',$data->username);
				
				//print_r(Session::all());
				
				return Redirect::to("/admin/beranda");
			}
			else
			{
				Session::flash('messages','
					<div class="alert alert-danger alert-dismissable" >
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Peringatan...</strong><br>
                    			Username dan password belum terdaftar pada sistem !
                    		</div>
				');		
				return Redirect::to('/')->withInput(Input::except('password'));		
			}
		}
	}
}
