<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\WorkOutLog;

class Tag extends Model
{
    use HasFactory;
    
    public function user()   
    {
        return $this->belongsTo(User::class);
    }
    public function work_out_logs()   
    {
        return $this->belongsToMany(WorkOutLog::class);
    }
}
