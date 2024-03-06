<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Muhammad Zaki',
            'email' => 'zaki@gmail.com',
            'first_name' => 'Muhammad',
            'last_name' => 'Zaki',
            'phone_num' => '0112456378',
        ]);

        DB::table('users')->insert([
            'name' => 'zulfadzli',
            'email' => 'zulfadzli@gmail.com',
            'first_name' => 'zulfadzli',
            'last_name' => null,
            'phone_num' => '0112456378',
        ]);
    }
}
