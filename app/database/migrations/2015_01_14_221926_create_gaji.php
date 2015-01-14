<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGaji extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('gaji', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('periode_gaji_id')->unsigned();
			$table->integer('karyawan_id')->unsigned();
			$table->decimal('nominal', 8 , 0);
			$table->integer('status');
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
		Schema::drop('gaji');
	}

}
