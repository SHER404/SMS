<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class fee_headsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fee_heads')->insert([
            'campus_id' => '1',
            'fee_head' => 'Tuition Fee',
            'head_amount' => '3000',
            'fee_type' => 'Monthly',
            'created_at' => now(),
            
        ]);
    }
}
