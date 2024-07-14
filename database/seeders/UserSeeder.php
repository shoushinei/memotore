<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
                'name' => 'sa',
                'email' => 'shoushinei9@gmail.com',
                'password' => '$2y$12$y72prCakWOt1sAEoS00izuMyaGTzrNUXsmBaH/ZFQ28lHlIWtiIUO',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);//
    }
}
