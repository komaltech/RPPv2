<?php

	class Paket extends Eloquent{
		protected $table='paket';
		protected $primaryKey = 'id';	
		

		public function kategori(){
			return $this->belongsTo('Kategori','id_cat');
		}



		
	}
?>