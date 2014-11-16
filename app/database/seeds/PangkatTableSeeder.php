<?php

class PangkatTableSeeder extends Seeder {
    public function run() {
        // Uncomment the below to wipe the table clean before populating
         DB::table('pangkat')->truncate();

        $pangkat = array(
            '0' => array(
                'id' => 1,
                'name' => 'Admin',
                'gaji' => 4000000,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            '1' => array(
                'id' => 2,
                'name' => 'Kasir',
                'gaji' => 3000000,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            '2' => array(
                'id' => 3,
                'name' => 'Cleaning Service',
                'gaji' => 2500000,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            '3' => array(
                'id' => 4,
                'name' => 'Jaga Parkir',
                'gaji' => 2000000,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
        );

        // Uncomment the below to run the seeder
         DB::table('pangkat')->insert($pangkat);
    }

}
