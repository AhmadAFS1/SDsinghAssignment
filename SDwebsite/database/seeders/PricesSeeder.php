<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prices')->insert([
            'state' => 'TX',
            'price' => 2.00,
        ]);
        DB::table('prices')->insert([
            'state' => 'Others',
            'price' => 3.00,
        ]);
    }
}
