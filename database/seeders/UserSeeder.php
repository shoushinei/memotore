<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
                'id' => 1,
                'name' => 'shou',
                'email' => 'shoushinei9@gmail.com',
                // 'password' => '$2y$12$y72prCakWOt1sAEoS00izuMyaGTzrNUXsmBaH/ZFQ28lHlIWtiIUO',
                'password'=> Hash::make('qwer1234'),
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);//
    }
}
