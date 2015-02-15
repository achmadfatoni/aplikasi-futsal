<?php

class CustomerTableSeeder extends Seeder {

    public function run() {
        // Uncomment the below to wipe the table clean before populating
//        DB::table('customers')->truncate();
        $faker = \Faker\Factory::create();
        foreach (range(1, 10) as $index) {
            $name = $faker->userName;
            $customer = Customer::create(array(
                'nama' => $name,
                'alamat' => $faker->address,
                'no_telp' => $faker->phoneNumber,
                'team' => $faker->word,
                'jenis_customer' => $faker->numberBetween(1, 2),
            ));

            if($customer){
                $user['username'] = $name;
                $user['password'] = Hash::make('1234');
                $user['user_identity'] = $customer->id;
                $jenisCustomer = $customer->jenis_customer;

                if($jenisCustomer == CUSTOMER_GOLD){
                    $roleId = USER_GOLD;
                }else{
                    $roleId = USER_SILVER;
                }

                $user['role_id'] = $roleId;
                User::create($user);
            }
        }
    }

}
