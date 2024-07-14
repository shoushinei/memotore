<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('exercises')->insert([
                'name' => 'ベンチプレス',
                'muscle_area_id' => '1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        
        DB::table('exercises')->insert([
                'name' => 'インクラインベンチプレス',
                'muscle_area_id' => '1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'チェストプレス',
                'muscle_area_id' => '1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'ダンベルプレス',
                'muscle_area_id' => '1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'インクラインベンチプレス',
                'muscle_area_id' => '1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'ペクトラルフライ',
                'muscle_area_id' => '1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'ダンベルフライ',
                'muscle_area_id' => '1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'ベンチプレス',
                'muscle_area_id' => '1',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'ベントオーバーロウ',
                'muscle_area_id' => '2',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'ラットプルダウン',
                'muscle_area_id' => '2',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'デッドリフト',
                'muscle_area_id' => '2',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'チンニング',
                'muscle_area_id' => '2',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'シーテッド・ローイング',
                'muscle_area_id' => '2',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'ワンハンドローイング',
                'muscle_area_id' => '2',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'ブルガリアンスクワット',
                'muscle_area_id' => '3',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'スクワット',
                'muscle_area_id' => '3',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'レッグプレス',
                'muscle_area_id' => '3',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'レッグエクステンション',
                'muscle_area_id' => '3',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'レッグカール',
                'muscle_area_id' => '3',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'サイドレイズ',
                'muscle_area_id' => '4',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'ショルダープレス',
                'muscle_area_id' => '4',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'フロントレイズ',
                'muscle_area_id' => '4',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'トライセラトップエクステンション',
                'muscle_area_id' => '5',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'バイセップカール',
                'muscle_area_id' => '5',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'プッシュダウン',
                'muscle_area_id' => '5',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'アブドミナル',
                'muscle_area_id' => '6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        //
     }
}
