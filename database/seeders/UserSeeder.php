<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "B N Manish",
            'email' => 'bnmanish006@gmail.com',
            'password' => Hash::make('12345'),
            'contact' => '8116648011',
            'is_email_verified' => 1,
            'is_contact_verified' => 1,
            'status' =>  1,
            'user_type' =>  'admin',
        ]);
    }
}
