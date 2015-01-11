<?php

class LapanganJamTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
//		 DB::table('lapangan_jam')->truncate();
		$faker = \Faker\Factory::create();
		$lapangans = Lapangan::all();
		foreach($lapangans as $lapangan){
			$lapanganId = $lapangan->id;
			$jams = Jam::all();
			foreach($jams as $jam){
				$jamId = $jam->id;
				Lapanganjam::create(
					array(
						'lapangan_id' => $lapanganId,
						'jam_id' => $jamId,
						'harga' => $faker->randomNumber(2) . '000',
					)
				);
			}
		}
		// Uncomment the below to run the seeder
		// DB::table('lapanganjam')->insert($lapanganjam);
	}

}
