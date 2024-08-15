<?php

namespace App\Listeners;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use DateTime;

class CreateDefaultTags
{
    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        $user = $event->user; // 登録されたユーザー

        // デフォルトのタグを作成
        DB::table('tags')->insert([
            [
                'comment' => '力尽き',
                'user_id' => $user->id,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'comment' => '震え',
                'user_id' => $user->id,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'comment' => 'フォーム崩れ',
                'user_id' => $user->id,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'comment' => 'めまい',
                'user_id' => $user->id,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'comment' => 'ベルトなし',
                'user_id' => $user->id,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
            [
                'comment' => '余裕あり',
                'user_id' => $user->id,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ],
        ]);
    }
}

