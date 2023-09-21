<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
      public function run(): void
    {
        DB::table('roles')->insert([[
            'name' => 'B2B Customer',
            'guard_name' => 'web',            
            'created_at' => date('Y-m-d H:i:s'),   
            'updated_at' => date('Y-m-d H:i:s'),   
        ],[
            'name' => 'B2C Customer',
            'guard_name' => 'web',            
            'created_at' => date('Y-m-d H:i:s'),   
            'updated_at' => date('Y-m-d H:i:s'),   
        ],[
            'name' => 'super_admin',
            'guard_name' => 'web',            
            'created_at' => date('Y-m-d H:i:s'),   
            'updated_at' => date('Y-m-d H:i:s'),   
        ]]);
    }
}
