<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
//		$this->call('AdministratorTableSeeder');
		$this->call('CustomerTableSeeder');
		$this->call('PangkatTableSeeder');
		$this->call('KaryawanTableSeeder');
	}

}
