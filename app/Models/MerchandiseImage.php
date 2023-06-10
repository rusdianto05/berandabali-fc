<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchandiseImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchandise_id',
        'image',
        'is_primary',
    ];

    public function merchandise()
    {
        return $this->belongsTo(Merchandise::class);
    }
}
