<?php

use App\Customer;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            // 'user_id' => 1218,
            'name' => 'Chandra Ramadhan',
            'email' => 'chandraramadhan@gmail.com',
            'status' => 'NEW CUSTOMER',
        ]);

        Customer::create([
            // 'user_id' => 7690,
            'name' => 'Daru',
            'email' => 'daru@gmail.com',
            'status' => 'NEW CUSTOMER',
        ]);

        Customer::create([
            // 'user_id' => 3435,
            'name' => 'Ramadhan',
            'email' => 'ramadhan@gmail.com',
            'status' => 'LOYAL CUSTOMER',
        ]);

        User::create([
            'username' => 'user1',
            'password'=> '123',
        ]);

        User::create([
            'username' => 'user2',
            'password'=> '123',
        ]);
    }
}
