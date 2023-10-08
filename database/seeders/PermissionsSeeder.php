<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
           ['name' => 'students', 'guard_name' => 'web','created_at'=>now()],
           ['name' => 'classes', 'guard_name' => 'web','created_at'=>now()],
           ['name' => 'class-sections', 'guard_name' => 'web','created_at'=>now()],
           ['name' => 'employees', 'guard_name' => 'web','created_at'=>now()],
           ['name' => 'parents', 'guard_name' => 'web','created_at'=>now()],
           ['name' => 'academic_sessions', 'guard_name' => 'web','created_at'=>now()],
           ['name' => 'campuses', 'guard_name' => 'web','created_at'=>now()],
           ['name' => 'country', 'guard_name' => 'web','created_at'=>now()],
           ['name' => 'city', 'guard_name' => 'web','created_at'=>now()],
           ['name' => 'families', 'guard_name' => 'web','created_at'=>now()],
           ['name' => 'fee-head', 'guard_name' => 'web','created_at'=>now()],
           ['name' => 'town', 'guard_name' => 'web','created_at'=>now()],
           ['name' => 'all-fees', 'guard_name' => 'web','created_at'=>now()],
           ['name' => 'user-management', 'guard_name' => 'web','created_at'=>now()],
           ['name' => 'permission-managment', 'guard_name' => 'web','created_at'=>now()],
           ['name' => 'reports', 'guard_name' => 'web','created_at'=>now()]



        ]);
    }
}
