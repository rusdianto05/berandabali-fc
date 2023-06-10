<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'challenge_id',
        'level_id'
    ];

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
