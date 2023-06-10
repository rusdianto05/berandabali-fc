<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RunSavedTrack extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'history_run_id',
        'name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function historyRun()
    {
        return $this->belongsTo(HistoryRun::class);
    }
}
