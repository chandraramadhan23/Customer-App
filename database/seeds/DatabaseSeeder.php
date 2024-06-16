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
            'name' => 'Taufan Fajar',
            'email' => 'taufan@gmail.com',
            'status' => 'NEW CUSTOMER',
        ]);

        Customer::create([
            // 'user_id' => 7690,
            'name' => 'Jajang',
            'email' => 'jajang@gmail.com',
            'status' => 'NEW CUSTOMER',
        ]);

        Customer::create([
            // 'user_id' => 3435,
            'name' => 'Ramadhan',
            'email' => 'ramadhan@gmail.com',
            'status' => 'LOYAL CUSTOMER',
        ]);

        Customer::create([
            // 'user_id' => 3435,
            'name' => 'Tukijem',
            'email' => 'tukijem@gmail.com',
            'status' => 'NEW CUSTOMER',
        ]);

        User::create([
            'username' => 'chandra',
            'name' => 'M Chandra Ramadhan',
            'password'=> bcrypt('chandra'),
        ]);

        User::create([
            'username' => 'meleni',
            'name' => 'Meleni Alfianti',
            'password'=> bcrypt('meleni'),
        ]);
    }
}
