<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoryRun extends Model
{
    CONST MODE_WALK = "WALK";
    CONST MODE_RUN = "RUN";
    CONST MODE_BIKE = "BIKE";
    CONST TYPE_FREE = "FREE";
    CONST TYPE_JAKPOLE = "HALTE";
    CONST TYPE_MAPS = "MAPS";
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'mode',
        'type',
        'title',
        'caption',
        'start_at',
        'finish_at',
        'range',
        'calory',
        'point',
        'location',
        'duration',
        'history_routes',
        'background_image',
        'pace',
        'step',
        'station_destination_id',
        'start_location',
        'start_lat',
        'start_long',
        'finish_location',
        'finish_lat',
        'finish_long',
        'route',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function laps()
    {
        return $this->hasMany(Lap::class);
    }

    public function runStations()
    {
        return $this->hasMany(RunStation::class);
    }

    public function stationDestination()
    {
        return $this->belongsTo(Station::class, 'station_destination_id');
    }
}
