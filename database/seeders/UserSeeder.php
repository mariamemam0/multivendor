<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'mariam',
            'email'=>'mam@gl.ps',
            'password'=>Hash::make('password'),
            'phone_number'=>'01011',

        ]);
        DB::table('users')->insert([
            'name'=>'mariam',
            'email'=>'ma@gml.ps',
            'password'=>Hash::make('password'),
            'phone_number'=>'88634',

        ]);
    }
}
