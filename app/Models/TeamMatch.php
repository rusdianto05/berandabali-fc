<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamMatch extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'opponent_name',
        'opponent_logo',
        'match_date',
        'match_location',
        'team_score',
        'opponent_score',
        'status',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
