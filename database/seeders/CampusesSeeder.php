<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('campuses')->insert([
        'campus_name' => 'Rills 1',
        'campus_address' => 'Johr town Lahore',
        'campus_phone' => '111-22-333',
        'created_at' => now(),
        'updated_at' => now(),
        'campus_code' => '01',
        'campus_bank_detail' => '111-33-444',
        'campus_whattsapp' => '1234567',
        'active_session' => '1', 
        'campus_status' => 'Active',
        'currency' => 'PKR',
        'currency_symble' => 'rupees',


        ]);
    }
}
