<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'exercise_name',
    ];

    public function training(){
        return $this->belongsToMany(Training::class, 'exercise_training');
    }

    
}
