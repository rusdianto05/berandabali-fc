<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HistoryPoint extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'point',
        'status',
        'note',
    ];

    protected $attributes = [
        'status' => 'ACTIVE'
     ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
