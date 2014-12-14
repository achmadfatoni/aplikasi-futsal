<?php

class LapanganTableSeeder extends Seeder {

    public function run() {
        // Uncomment the below to wipe the table clean before populating
        DB::table('lapangan')->truncate();

        $lapangan = array(
            '0' => array(
                'id' => 1,
                'nama' => 'Lapangan 1',
                'harga_siang' => 40000,
                'harga_malam' => 50000,
                'jenis_lapangan_id' => LAPANGAN_SINTESIS,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            '1' => array(
                'id' => 2,
                'nama' => 'Lapangan 2',
                'harga_siang' => 40000,
                'harga_malam' => 50000,
                'jenis_lapangan_id' => LAPANGAN_MATRAS,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            '2' => array(
                'id' => 3,
                'nama' => 'Lapangan 3',
                'harga_siang' => 40000,
                'harga_malam' => 50000,
                'jenis_lapangan_id' => LAPANGAN_SINTESIS,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            '3' => array(
                'id' => 4,
                'nama' => 'Lapangan 4',
                'harga_siang' => 40000,
                'harga_malam' => 50000,
                'jenis_lapangan_id' => LAPANGAN_MATRAS,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
            ),
            
        );

        // Uncomment the below to run the seeder
        DB::table('lapangan')->insert($lapangan);
    }

}
