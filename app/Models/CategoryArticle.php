<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryArticle extends Model
{
    use HasFactory, SoftDeletes;
    
    /**
     * The attributes that are mass assignable.
     */

    protected $fillable = [
        'name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     */

     public function articles()
     {
         return $this->hasMany(Article::class);
     }
}
