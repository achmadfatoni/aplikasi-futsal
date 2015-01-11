<?php

class KaryawanTableSeeder extends Seeder {

    public function run() {
        // Uncomment the below to wipe the table clean before populating
//        DB::table('karyawan')->truncate();

        $faker = \Faker\Factory::create();

        foreach (range(1, 10) as $index) {
            Karyawan::create(array(
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'pangkat_id' => $faker->numberBetween(1, 4),
            ));
        }
    }
}