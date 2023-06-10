<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RunStation extends Model
{
    use HasFactory;

    protected $fillable = [
        'history_run_id',
        'station_id',
    ];

    public function historyRun()
    {
        return $this->belongsTo(HistoryRun::class);
    }
}
