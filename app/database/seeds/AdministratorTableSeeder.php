<?php

class AdministratorTableSeeder extends Seeder {

    public function run() {
        $user = new User();
        $user->username = 'Administrator';
        $user->password = Hash::make('1234');
        $user->role_id = USER_ADMINISTRATOR;
        $user->save();
    }

}
