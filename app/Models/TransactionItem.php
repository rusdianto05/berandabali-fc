<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_id',
        'ticket_id',
        'team_match_id',
        'quantity'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id', 'id');
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function teamMatch()
    {
        return $this->belongsTo(TeamMatch::class);
    }
}
