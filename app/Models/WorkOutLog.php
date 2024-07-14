<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\User;
use App\Models\Exercise;

class WorkOutLog extends Model
{
    use HasFactory;
    
    public function user()   
    {
        return $this->belongsTo(User::class);
    }
    public function tags()   
    {
        return $this->belongsToMany(Tag::class);
    }
    public function exercises()   
    {
        return $this->belongsTo(Exercise::class);
    }
}
