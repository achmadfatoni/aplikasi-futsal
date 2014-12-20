<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddHargaToLapanganJam extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lapangan_jam', function(Blueprint $table) {
			$table->unsignedBigInteger('harga')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lapangan_jam', function(Blueprint $table) {
			$table->dropColumn('harga');
		});
	}

}
