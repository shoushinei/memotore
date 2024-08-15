<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Auth\Events\Registered;
use App\Models\User;

class CreateDefaultMuscleAreaUsers
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
        $user = $event->user;
        $muscleareacount = DB::table('muscle_areas')->count();
        
        DB::table('muscle_area_user')->insert([
                'user_id' => $user->id,
                'muscle_area_id' => $muscleareacount-7,
         ]);
        DB::table('muscle_area_user')->insert([
                'user_id' => $user->id,
                'muscle_area_id' => $muscleareacount-6,
         ]);
        DB::table('muscle_area_user')->insert([
                'user_id' => $user->id,
                'muscle_area_id' => $muscleareacount-5,
         ]);
        DB::table('muscle_area_user')->insert([
                'user_id' => $user->id,
                'muscle_area_id' => $muscleareacount-4,
         ]);
        DB::table('muscle_area_user')->insert([
                'user_id' => $user->id,
                'muscle_area_id' => $muscleareacount-3,
         ]); 
        DB::table('muscle_area_user')->insert([
                'user_id' => $user->id,
                'muscle_area_id' => $muscleareacount-2,
         ]);
        DB::table('muscle_area_user')->insert([
                'user_id' => $user->id,
                'muscle_area_id' => $muscleareacount-1,
         ]);
        DB::table('muscle_area_user')->insert([
                'user_id' => $user->id,
                'muscle_area_id' => $muscleareacount,
         ]);//
    }
}
