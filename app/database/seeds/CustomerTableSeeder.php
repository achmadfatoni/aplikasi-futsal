<?php

class CustomerTableSeeder extends Seeder {

    public function run() {
        // Uncomment the below to wipe the table clean before populating
        DB::table('customers')->truncate();
        $faker = \Faker\Factory::create();
        foreach (range(1, 100) as $index) {
            Customer::create(array(
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'no_telp' => $faker->phoneNumber,
                'team' => $faker->word,
                'jenis_customer' => $faker->numberBetween(1, 2),
            ));
        }
    }

}
