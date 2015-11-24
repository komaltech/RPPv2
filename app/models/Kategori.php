<?php

	class Kategori extends Eloquent{
		protected $table='kategori';
		protected $primaryKey = 'id_cat';	


		public function paket(){
			return $this->hasMany('Paket','id_cat');
		}
	}
?>