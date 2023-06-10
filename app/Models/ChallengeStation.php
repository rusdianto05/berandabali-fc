<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeStation extends Model
{
    use HasFactory;

    protected $fillable = [
        'challenge_id',
        'station_id'
    ];

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }
}
