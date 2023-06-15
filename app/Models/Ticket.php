<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_match_id',
        'name',
        'price',
        'quantity',
        'image',
        'is_active',
    ];

    public function teamMatch()
    {
        return $this->belongsTo(TeamMatch::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
