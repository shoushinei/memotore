<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class MuscleAreaUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('muscle_area_user')->insert([
                'user_id' => 1,
                'muscle_area_id' => 1,
         ]);
        DB::table('muscle_area_user')->insert([
                'user_id' => 1,
                'muscle_area_id' => 2,
         ]);
        DB::table('muscle_area_user')->insert([
                'user_id' => 1,
                'muscle_area_id' => 3,
         ]);
        DB::table('muscle_area_user')->insert([
                'user_id' => 1,
                'muscle_area_id' => 4,
         ]);
        DB::table('muscle_area_user')->insert([
                'user_id' => 1,
                'muscle_area_id' => 5,
         ]); 
        DB::table('muscle_area_user')->insert([
                'user_id' => 1,
                'muscle_area_id' => 6,
         ]);
        DB::table('muscle_area_user')->insert([
                'user_id' => 1,
                'muscle_area_id' => 7,
         ]);
        DB::table('muscle_area_user')->insert([
                'user_id' => 1,
                'muscle_area_id' => 8,
         ]); //
    }
}
