<?php

	class Pegawai extends Eloquent{
		protected $table='pegawai';
		protected $primaryKey = 'nip';

/*	public function panitia() {
		return $this->belongsToMany('Panitia','anggota_panitia','nip','id_pnt')
	} */
	
	}
?>