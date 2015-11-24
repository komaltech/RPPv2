<?php

	class Rekanan extends Eloquent{
		protected $table='rekanans';
		protected $primaryKey = 'id_rkn';	
		protected $guarded ='id_rkn';

		public function pengadaans(){
			return $this->hasMany('Pengadaan','id_rekanan');
		}
	}
?>