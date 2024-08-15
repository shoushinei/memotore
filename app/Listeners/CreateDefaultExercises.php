<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Auth\Events\Registered;
use App\Models\User;

class CreateDefaultExercises
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        $muscleareacount = DB::table('muscle_areas')->count();
        
        DB::table('exercises')->insert([
                'name' => 'ベンチプレス',
                'muscle_area_id' => $muscleareacount-7,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        
        DB::table('exercises')->insert([
                'name' => 'インクラインベンチプレス',
                'muscle_area_id' => $muscleareacount-7,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'チェストプレス',
                'muscle_area_id' => $muscleareacount-7,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'ダンベルプレス',
                'muscle_area_id' => $muscleareacount-7,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'ペクトラルフライ',
                'muscle_area_id' => $muscleareacount-7,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'ダンベルフライ',
                'muscle_area_id' => $muscleareacount-7,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'ベントオーバーロウ',
                'muscle_area_id' => $muscleareacount-6,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'ラットプルダウン',
                'muscle_area_id' => $muscleareacount-6,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'デッドリフト',
                'muscle_area_id' => $muscleareacount-6,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'チンニング',
                'muscle_area_id' => $muscleareacount-6,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'シーテッド・ローイング',
                'muscle_area_id' => $muscleareacount-6,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'ワンハンドローイング',
                'muscle_area_id' => $muscleareacount-6,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'ブルガリアンスクワット',
                'muscle_area_id' => $muscleareacount-5,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'スクワット',
                'muscle_area_id' => $muscleareacount-5,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'レッグプレス',
                'muscle_area_id' => $muscleareacount-5,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'レッグエクステンション',
                'muscle_area_id' => $muscleareacount-5,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'レッグカール',
                'muscle_area_id' => $muscleareacount-5,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'サイドレイズ',
                'muscle_area_id' => $muscleareacount-4,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'ショルダープレス',
                'muscle_area_id' => $muscleareacount-4,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'フロントレイズ',
                'muscle_area_id' => $muscleareacount-4,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'トライセラトップエクステンション',
                'muscle_area_id' => $muscleareacount-3,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'バイセップカール',
                'muscle_area_id' => $muscleareacount-3,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'プッシュダウン',
                'muscle_area_id' => $muscleareacount-3,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);
        DB::table('exercises')->insert([
                'name' => 'アブドミナル',
                'muscle_area_id' => $muscleareacount-2,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
         ]);//
    }
}
