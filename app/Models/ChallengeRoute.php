<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChallengeRoute extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'radius_max',
        'start_location',
        'finish_location',
        'start_latitude',
        'start_longitude',
        'finish_latitude',
        'finish_longitude',
        'route',
    ];

    protected $casts = [
        'route' => 'array',
    ];

    public function challenges()
    {
        return $this->hasMany(Challenge::class);
    }
}
