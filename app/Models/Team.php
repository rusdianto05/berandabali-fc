<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    const TYPE_PLAYER = 'Pemain';
    const TYPE_COACH = 'Pelatih';
    const TYPE_STAFF = 'Staff';
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'position',
        'image',
        'type',
        'born_place',
        'born_date',
        'height',
        'weight',
        'joined_date',
        'number',
        'goal',
        'assist',
        'apperances',
        'clean_sheet',
        'saves',
    ];
}
