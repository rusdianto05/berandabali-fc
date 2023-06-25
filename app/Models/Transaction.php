<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    const STATUS_PENDING = 'PENDING';
    const STATUS_SUCCESS = 'SUCCESS';
    const STATUS_FAILED = 'FAILED';
    const STATUS_EXPIRED = 'EXPIRED';

    use HasFactory;

    protected $fillable = [
        'user_id',
        'booking_id',
        'team_match_id',
        'name',
        'phone',
        'total_price',
        'payment_url',
        'status',
        'is_exchange',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teamMatch()
    {
        return $this->belongsTo(TeamMatch::class);
    }

    public function transactionDetails()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    public function transactionItems()
    {
        return $this->hasMany(TransactionItem::class);
    }
}
