<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/



	//--------------------------bagian beranda----------------

	Route::get('admin/beranda/',array('before'=>'auth','uses'=>'BerandaController@index'));
	Route::get('admin/beranda/listAjax/','BerandaController@listAjax');
	Route::get('admin/user/edit/{id}',array('before'=>'auth','uses'=>'BerandaController@edit_user'));
	Route::post('admin/user/save/{id}','BerandaController@save');


	//--------------------bagian user---------------------*/
	Route::get('/','UserController@login');

	Route::post('/login','UserController@dologin');

	Route::get('/admin/logout',array('before'=>'auth','uses'=>'UserController@dologout'));


	//--------------------bagian paket-------------------------------------------------- */
	Route::get('/admin/paket',function(){
		if(!Auth::check()){
			Session::flash('messages','
					<div class="alert alert-danger alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Peringatan...</strong><br>
                    			Untuk mengakses halaman ini anda harus login terlebih dahulu !
                		</div>
				');
			return Redirect::to('/')->withInput(Input::except('password'));
		}else{

			return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.paket.list'));
		}
	});

	Route::get('/admin/paket/proses/{id}',array('before'=>'auth','uses'=>'PaketController@proses'));
	Route::get('/admin/paket/detil/{id}',array('before'=>'auth','uses'=>'PaketController@detil'));
	Route::get('/admin/paket/pilih/{id}',array('before'=>'auth','uses'=>'PaketController@pilih'));
	Route::get('/admin/paket/detilFull/{id}','PaketController@detilFull');
	Route::get('/admin/paket/batal/{id}','PaketController@batalPilih');

	Route::get('/admin/paket/add',array('before'=>'auth','uses'=>'PaketController@index'));

	Route::post('/admin/paket/save','PaketController@paket_simpan');
	Route::post('/admin/paket/simpan_dok/{id}','PaketController@simpan_dok');
	Route::post('/admin/paket/tambah_dok/{id}','PaketController@tambah_dok');
	Route::post('/admin/paket/update/{id}','PaketController@paket_update');
	Route::get('/admin/paket/edit/{id}',array('before'=>'auth','uses'=>'PaketController@paket_edit'));
	Route::get('/admin/paket/add/{id}',array('before'=>'auth','uses'=>'PaketController@form2'));
	Route::get('/admin/paketajax',array('before'=>'auth','uses'=>'PaketController@paketajax'));
	Route::get('/admin/paket/detilajax/{id}','PaketController@listajax');
	Route::get('/admin/paket/detil/del/{id}','PaketController@detil_delete');
	Route::get('/admin/paket/detilajax/del/{id}',array('before'=>'auth','uses'=>'PaketController@detil_delete'));
	Route::get('/admin/paket/detil-list/{id}','PaketController@detil_paket');
	Route::get('/admin/paket/get/{$original_filename}', [
			'as' => 'getentry', 'uses' => 'PaketController@get']);

	// **-----------------------------------Bagian Pegawai ** // */
	Route::get('/admin/pegawai',function(){
		if(!Auth::check()){
			Session::flash('messages','
					<div class="alert alert-danger alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Peringatan...</strong><br>
                    			Untuk mengakses halaman ini anda harus login terlebih dahulu !
                		</div>
				');
			return Redirect::to('/')->withInput(Input::except('password'));
		}else{

			return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.pegawai.list'));
		}
	});
	Route::get('/admin/pegawai/add',function(){
		if(!Auth::check()){
			Session::flash('messages','
					<div class="alert alert-danger alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Peringatan...</strong><br>
                    			Untuk mengakses halaman ini anda harus login terlebih dahulu !
                		</div>
				');
			return Redirect::to('/')->withInput(Input::except('password'));
		}else{
			$data = new stdclass();
			$satker = DB::table('satker')->get();
				$data->satker[]="- Pilih Satuan Kerja -";
			foreach($satker as $row){
				$data->satker[$row->id_satker] = $row->nama_satker;
			}


			$data->page="add";
			return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.pegawai.form'))->with('data',$data);
		}
	});

	Route::post('/admin/pegawai/save','PegawaiController@save');
	Route::get('/admin/pegawai/delete/{id}','PegawaiController@del');
	Route::get('/admin/pegawai/edit/{id}',array('before'=>'auth','uses'=>'PegawaiController@edit'));
	Route::post('/admin/pegawai/update/{id}','PegawaiController@update');
	Route::get('/admin/pegawai/detil/{id}','PegawaiController@detil');
	Route::get('/admin/pegawaiajax','PegawaiController@listAjax');

	// **---------------------------------Bagian Panitia-----------------** //
	Route::get('/admin/panitia',function(){
		if(!Auth::check()){
			Session::flash('messages','
					<div class="alert alert-danger alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Peringatan...</strong><br>
                    			Untuk mengakses halaman ini anda harus login terlebih dahulu !
                		</div>
				');
			return Redirect::to('/')->withInput(Input::except('password'));
		}else{

			return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.panitia.list'));
		}
	});
	Route::get('/admin/panitia/tambah',function(){
	if(!Auth::check()){
			Session::flash('messages','
					<div class="alert alert-danger alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Peringatan...</strong><br>
                    			Untuk mengakses halaman ini anda harus login terlebih dahulu !
                		</div>
				');
			return Redirect::to('/')->withInput(Input::except('password'));
		}else{
			$data = new stdclass();
			$satker = DB::table('satker')->get();
				$data->satker[]="- Pilih Satuan Kerja -";
			foreach($satker as $row){
				$data->satker[$row->id_satker] = $row->nama_satker;
			}


			$data->page="tambah";
			return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.panitia.form'))->with('data',$data);
		}
	});
	Route::get('/admin/panitia/listAjax','PanitiaController@listAjax');
	Route::post('/admin/panitia/save','PanitiaController@save');
	Route::post('/admin/panitia/update/{id}','PanitiaController@update');
	Route::get('/admin/panitia/edit/{id}',array('before'=>'auth','uses'=>'PanitiaController@edit'));
	Route::get('/admin/panitia/detil/{id}','PanitiaController@detil');
	Route::get('/admin/panitia/delete/{id}',array('before'=>'auth','uses'=>'PanitiaController@del'));
	Route::get('/admin/panitia/anggotaAjax','PanitiaController@anggotaAjax');
	Route::get('/admin/panitia/detilanggota/{id}','PanitiaController@detilanggota');
	Route::get('/admin/panitia/pilihanggota/{id}',array('before'=>'auth','uses'=>'PanitiaController@pilihanggota'));
	Route::post('/admin/panitia/saveanggota/{id}','PanitiaController@saveanggota');
	Route::get('/admin/panitia/deleteanggota/{id}',array('before'=>'auth','uses'=>'PanitiaController@delanggota'));

	// **-----------------------------------Bagian Kategori ** //
	Route::get('/admin/kategori',function(){
		if(!Auth::check()){
			Session::flash('messages','
					<div class="alert alert-danger alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Peringatan...</strong><br>
                    			Untuk mengakses halaman ini anda harus login terlebih dahulu !
                		</div>
				');
			return Redirect::to('/')->withInput(Input::except('password'));
		}else{
			return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.kategori.list'));
		}
	});

	Route::post('/admin/kategoriajax/add','KategoriController@save');
	Route::post('/admin/kategori/update/{id}','KategoriController@update');
	Route::get('/admin/kategoriajax','KategoriController@listajax');

	// **-----------------------------------Bagian satuan kerja ** //
	Route::get('/admin/satker',function(){
		if(!Auth::check()){
			Session::flash('messages','
					<div class="alert alert-danger alert-dismissable" id="notif">
                    		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    		<strong>Peringatan...</strong><br>
                    			Untuk mengakses halaman ini anda harus login terlebih dahulu !
                		</div>
				');
			return Redirect::to('/')->withInput(Input::except('password'));
		}else{
			return View::make('master',array('menu'=>'admin.admin_menu','page'=>'admin.satker.list'));
		}
	});

	Route::post('/admin/satkerajax/add','SatkerController@save');
	Route::get('/admin/satker/delete/{id}','SatkerController@del');
	Route::post('/admin/satker/update/{id}','SatkerController@update');
	Route::get('/admin/satkerajax','SatkerController@listajax');


	/*---------------------------------Bagian Setting----------------------------*/
	/*Route::get('/admin/setting/email',array('before'=>'auth','uses'=>'SettingController@index'));
	Route::post('/admin/setting/email/save',array('before'=>'auth','uses'=>'SettingController@save'));
	Route::post('/admin/setting/email/save/{id}',array('before'=>'auth','uses'=>'SettingController@update'));*/

?>
