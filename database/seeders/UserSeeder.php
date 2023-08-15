<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'B N Manish',
            'email' => 'bnmanish006@gmail.com',
            'user_name' => 'bnmanish',
            'password' => Hash::make('12345'),
            'mobile'    =>  '8116648011',
            'role'  =>  'admin',
            'email_verified'    =>  '1',
            'mobile_verified'   =>  '1',
            'status'    =>  '1',
        ]);

        DB::table('users')->insert([
            'name' => 'Ram Lal',
            'email' => 'ramlal@gmail.com',
            'user_name' => 'ramlal',
            'password' => Hash::make('12345'),
            'mobile'    =>  '9708669045',
            'role'  =>  'user',
            'email_verified'    =>  '1',
            'mobile_verified'   =>  '1',
            'status'    =>  '1',
        ]);
    }
}
