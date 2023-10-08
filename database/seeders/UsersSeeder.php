<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'admin',
            'email'=>'admin@mail.com',
            'password'=> bcrypt(value:'f17@AYDS'),
            'campus_id'=>'1',
            'created_at'=>now(),
            'user_type'=>'Super admin',
            'status'=>'Active',
        ]);
    }
}
