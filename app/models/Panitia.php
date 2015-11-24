<?php

	class Panitia extends Eloquent{
		protected $table='panitia';
		protected $primaryKey = 'id_pnt';	
		
	/*	public function satker(){
			return $this->belongsTo('Satker','id_satker');
		} */
		
	/*	public function pegawai(){
			return $this->belongsToMany('Pegawai','anggota_panitia','id_pnt','nip');
		} */
	}
?>