<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'training',
        'weighy',
        'date',
    ];

    public function profile():BelongsTo{
        return $this->belongTo(Profile::class);
    }
}
