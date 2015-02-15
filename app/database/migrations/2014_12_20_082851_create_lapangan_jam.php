<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLapanganJam extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lapangan_jam', function(Blueprint $table) {
            $table->integer('lapangan_id')->unsigned();
			$table->foreign('lapangan_id')->references('id')
                ->on('lapangan')
                ->onDelete('cascade');
			$table->integer('jam_id')->unsigned();
			$table->foreign('jam_id')->references('id')
                ->on('jam')
                ->onDelete('cascade');
            $table->unsignedBigInteger('harga')->nullable();
            $table->timestamps();
			$table->primary(array('lapangan_id', 'jam_id'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lapangan_jam');
	}

}
