<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pegawai', function(Blueprint $table)
		{
			
			$table->integer('nip',18);
			$table->string('nama',100);
			$table->string('alamat',100);
			$table->string('phone',15);
			$table->string('mobile_phone',25);
			$table->string('id_satker',25);
			$table->string('jabatan',255);
			$table->string('golongan',25);
			$table->string('level',2);
			$table->string('email',25);
			$table->string('foto',255);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pegawai', function(Blueprint $table)
		{
			//
		});
	}

}
