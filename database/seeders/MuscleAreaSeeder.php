<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class MuscleAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('muscle_areas')->insert([
                'name' => '胸',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('muscle_areas')->insert([
                'name' => '背中',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('muscle_areas')->insert([
                'name' => '脚',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('muscle_areas')->insert([
                'name' => '肩',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('muscle_areas')->insert([
                'name' => '腕',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('muscle_areas')->insert([
                'name' => 'コア',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('muscle_areas')->insert([
                'name' => '有酸素運動',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
        DB::table('muscle_areas')->insert([
                'name' => 'その他',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
        ]);
    }
}
