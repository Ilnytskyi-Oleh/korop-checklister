<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
           'name'=> 'Admin',
           'email'=> 'admin@mail.com',
           'password'=> \Hash::make('123456789'),
            'is_admin' => true
        ]);
    }
}
