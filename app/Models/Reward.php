<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reward extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_reward_id',
        'name',
        'image',
        'value',
        'description',
        'point',
        'is_active',
        'how_to_use',
        'type',
        'merchant_id',
    ];

    public function categoryReward()
    {
        return $this->belongsTo(CategoryReward::class);
    }

    public function RewardItem()
    {
        return $this->hasMany(RewardItem::class);
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
