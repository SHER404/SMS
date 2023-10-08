<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
        // PermissionsSeeder::class
        // UsersSeeder::class
        // CampusesSeeder::class
        // accedmic_sessionsSeeder::class
        // fee_headsSeeder::class
 ]);
    
    }
}
//  The seed that uh want to run is commented out. Uncomment it and run the command again.