<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperiencePoint extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'walk',
        'run',
        'bike',
    ];

    protected $casts = [
        'walk' => 'integer',
        'run' => 'integer',
        'bike' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
