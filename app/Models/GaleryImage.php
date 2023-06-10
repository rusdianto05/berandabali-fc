<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleryImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'galery_id',
        'image',
    ];

    public function galery()
    {
        return $this->belongsTo(Galery::class);
    }
}
