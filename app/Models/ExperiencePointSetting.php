<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExperiencePointSetting extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'min_pace',
        'max_pace',
        'xp',
    ];
}
