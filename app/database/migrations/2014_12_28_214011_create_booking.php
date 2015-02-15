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
            $table->integer('status')->nullable();
            $table->softDeletes();
            $table->timestamps();
			$table->foreign('customer_id')->references('id')
                ->on('customers')
                ->onDelete('cascade');
			$table->foreign('lapangan_id')->references('id')
                ->on('lapangan')
                ->onDelete('cascade');
			$table->foreign('jam_id')->references('id')
                ->on('jam')
                ->onDelete('cascade');
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
