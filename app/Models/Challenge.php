<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Challenge extends Model
{
    CONST MODE_WALK = "WALK";
    CONST MODE_RUN = "RUN";
    CONST MODE_BIKE = "BIKE";
    CONST TYPE_FREE = "FREE";
    CONST TYPE_HALTE = "HALTE";
    CONST TYPE_MAPS = "MAPS";
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'min_pace',
        'max_pace',
        'max_join',
        'max_failed',
        'min_distance',
        'max_time',
        'point',
        'xp',
        'location',
        'description',
        'image',
        'is_active',
        'mode',
        'type',
        'challenge_route_id',
        'min_step',
    ];


    public function challengeLevels()
    {
        return $this->hasMany(ChallengeLevel::class);
    }

    public function challengeCategories()
    {
        return $this->hasMany(ChallengeCategory::class);
    }

    public function challengeStations()
    {
        return $this->hasMany(ChallengeStation::class);
    }

    public function challengeRoutes()
    {
        return $this->hasMany(ChallengeRoute::class);
    }
}
