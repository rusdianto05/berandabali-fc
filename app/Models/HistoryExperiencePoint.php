<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryExperiencePoint extends Model
{
    CONST STATUS_ACTIVE = 'ACTIVE';
    use HasFactory;

    protected $fillable = [
        'user_id',
        'xp',
        'status',
        'note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
