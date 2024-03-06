<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('department')->insert([
            'name' => 'IT',
            'description' => 'Information Technology Department',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('department')->insert([
            'name' => 'HR',
            'description' => 'Human Resource Department',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
