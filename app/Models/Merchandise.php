<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Merchandise extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_merchandise_id',
        'name',
        'slug',
        'price',
        'description',
        'link_marketplace',
    ];

    public function categoryMerchandise()
    {
        return $this->belongsTo(CategoryMerchandise::class);
    }

    public function merchandiseImages()
    {
        return $this->hasMany(MerchandiseImage::class);
    }
}
