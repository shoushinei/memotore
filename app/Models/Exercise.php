<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\MuscleArea;
use App\Models\WorkOutLog;

class Exercise extends Model
{
    use HasFactory;
    
    public function users()   
    {
        return $this->belongsToMany(User::class);
    }
    public function muscle_area()   
    {
        return $this->belongsTo(MuscleArea::class);
    }
    public function work_out_logs()   
    {
        return $this->hasMany(WorkOutLog::class);
    }
}
