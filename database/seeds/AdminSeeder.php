<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // insert data ke table pegawai
        DB::table('users')->insert([
            'name' => 'admin',
            'admin'=>1,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'operator',
            'admin'=> 0,
            'email' => 'operator@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => now()
        ]);

    }
}
