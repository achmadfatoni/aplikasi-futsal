<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        Eloquent::unguard();

        // $this->call('UserTableSeeder');
        $this->call('PageTableSeeder');
        $this->call('AdministratorTableSeeder');
        $this->call('CustomerTableSeeder');
        $this->call('PangkatTableSeeder');
        $this->call('KaryawanTableSeeder');
        $this->call('LapanganTableSeeder');
    }

}
