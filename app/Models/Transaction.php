<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'team_match_id',
        'name',
        'phone',
        'total_price',
        'payment_url',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teamMatch()
    {
        return $this->belongsTo(TeamMatch::class);
    }
}
