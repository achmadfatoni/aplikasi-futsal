<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBooking extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('booking', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedInteger('customer_id');
			$table->date('tanggal');
			$table->unsignedInteger('lapangan_id');
			$table->unsignedInteger('jam_id');
			$table->timestamps();
			$table->foreign('customer_id')->references('id')->on('customers');
			$table->foreign('lapangan_id')->references('id')->on('lapangan');
			$table->foreign('jam_id')->references('id')->on('jam');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('booking');
	}

}
