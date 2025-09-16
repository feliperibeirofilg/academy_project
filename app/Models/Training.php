<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Training extends Model
{
    protected $fillable = [
        'training',
    ];

    public function profile():BelongsTo{
        return $this->belongTo(Profile::class);
    }

    public function exercises():belongsToMany{
        return $this->belongsToMany(Exercise::class, 'exercise_training')
        ->withPivot('series', 'repetitions', 'weight', 'date')
        ->withTimestamps();
    }
}
