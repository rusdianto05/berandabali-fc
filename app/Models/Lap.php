<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lap extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'history_run_id',
        'start_at',
        'finish_at'
    ];

    public function historyRun()
    {
        return $this->belongsTo(HistoryRun::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
