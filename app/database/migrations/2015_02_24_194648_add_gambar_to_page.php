<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddGambarToPage extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('page', function(Blueprint $table) {
			$table->string('gambar1');
			$table->string('gambar2');
			$table->string('gambar3');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('page', function(Blueprint $table) {
			$table->dropColumn('gambar1');
			$table->dropColumn('gambar2');
			$table->dropColumn('gambar3');
		});
	}

}
