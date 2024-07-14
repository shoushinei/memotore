<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exercise;
use App\Models\User;

class MuscleArea extends Model
{
    use HasFactory;
    
    public function users()   
    {
        return $this->belongsToMany(User::class);
    }
    public function exercises()   
    {
        return $this->hasMany(Exercise::class);
    }
}
