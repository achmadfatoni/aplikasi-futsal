<?php

class JamTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('jam')->truncate();

		$jam = array(
			Jam::create(array(
				'nama' => '8 - 9',
			)),
			Jam::create(array(
				'nama' => '9 - 10',
			)),
			Jam::create(array(
				'nama' => '10 - 11',
			)),
			Jam::create(array(
				'nama' => '11 - 12',
			)),
			Jam::create(array(
				'nama' => '12 - 13',
			)),
			Jam::create(array(
				'nama' => '13 - 14',
			)),
			Jam::create(array(
				'nama' => '14 - 15',
			)),
			Jam::create(array(
				'nama' => '15 - 16',
			)),
			Jam::create(array(
				'nama' => '16 - 17',
			)),
			Jam::create(array(
				'nama' => '17 - 18',
			)),Jam::create(array(
				'nama' => '18 - 19',
			)),
			Jam::create(array(
				'nama' => '19 - 20',
			)),
			Jam::create(array(
				'nama' => '20 - 21',
			)),
			Jam::create(array(
				'nama' => '21 - 22',
			)),
			Jam::create(array(
				'nama' => '22 - 23',
			)),
			Jam::create(array(
				'nama' => '23 - 00',
			)),
			Jam::create(array(
				'nama' => '00 - 01',
			)),
			Jam::create(array(
				'nama' => '01 - 02',
			)),


		);

		// Uncomment the below to run the seeder
//		 DB::table('jam')->insert($jam);
	}

}
