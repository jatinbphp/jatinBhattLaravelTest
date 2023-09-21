<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          DB::table('products')->insert([[
            'name' => 'B2B',
            'description' => 'Product for B2B',
            'price' => 100.00,
            'stripe_plan' => 'price_1NsRR3B3CRQo5hkDNPQybROv',
        ],[
            'name' => 'B2C',
            'description' => 'Product for B2C',
            'price' => 90.00,
            'stripe_plan' => 'price_1NsRRVB3CRQo5hkDWDkfkbJE',
        ]]);
    }
}
