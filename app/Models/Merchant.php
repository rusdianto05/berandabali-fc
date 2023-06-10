<?php

namespace App\Models;

use App\Models\Reward;
use Location\Coordinate;
use Location\Distance\Vincenty;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Merchant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_merchant_id',
        'name',
        'description',
        'logo',
        'address',
        'phone',
        'link',
        'latitude',
        'longitude',
        'is_active',
    ];

    // protected $appends = [
    //     'distance',
    // ];

    public function reward()
    {
        return $this->hasMany(Reward::class);
    }

    public function categoryMerchant()
    {
        return $this->belongsTo(CategoryMerchant::class);
    }

    // public function getDistanceAttribute()
    // {
    //     $coordinate1 = new Coordinate($this->latitude, $this->longitude);
    //     $coordinate2 = new Coordinate(request()->latitude, request()->longitude);
    //     $distance = $coordinate1->getDistance($coordinate2, new Vincenty());
    //     return $distance;
    // }
}
