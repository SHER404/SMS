<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class accedmic_sessionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  
    public function run()
    {

        $now=now();
        $starting_year = $now->toDateTimeString();
        $ending_year = $now->addYears(1)->toDateTimeString();
        

        DB::table('academic_sessions')->insert([
            'starting_year'=> $starting_year,
            'ending_year'=> $ending_year,
            'campus_id'=> '1',
            'created_at' => now(),

        ]);
    }
}
