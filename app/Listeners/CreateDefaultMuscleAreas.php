<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Auth\Events\Registered;
use App\Models\User;

class CreateDefaultMuscleAreas
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
        ]);//
    }
}
