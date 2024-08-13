<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\ChatLog;
use App\Models\Exercise;
use App\Models\MuscleArea;
use App\Models\Tag;
use App\Models\WorkOutLog;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
        public function chat_logs()   
        {
            return $this->hasMany(ChatLog::class);
        }
        public function exercises()   
        {
            return $this->belongsToMany(Exercise::class);
        }
        public function muscle_areas()   
        {
            return $this->belongsToMany(MuscleArea::class);
        }
        public function tags()   
        {
            return $this->hasMany(Tag::class);
        }
        public function work_out_logs()   
        {
            return $this->hasMany(WorkOutLog::class);
        }
}
