<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RewardItem extends Model
{
    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_CLAIMED = 'CLAIMED';
    const STATUS_USED = 'USED';
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'reward_id',
        'user_id',
        'code',
        'status',
        'claimed_at',
        'used_at',
        'expired_at',
    ];

    public function reward()
    {
        return $this->belongsTo(Reward::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
