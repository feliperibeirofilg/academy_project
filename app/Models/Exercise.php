<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'name',
    ];

    public function training(){
        return $this->belongsToMany(Training::class, 'name')
        ->withPivot('series', 'repetitions', 'weight')
                ->withTimestamps();;
    }

    
}
