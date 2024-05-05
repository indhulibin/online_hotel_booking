<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password =Hash::make('1234');
        DB::table('admins')->insert([
            'name'=>'indhu',
            'email'=>'indhu@gmail.com',
            'password'=> $password,
            'photo'=>'admin.jpg',
            'token'=>1
        ]);
    }
}
