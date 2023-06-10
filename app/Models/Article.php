<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */

    protected $fillable = [
        'category_article_id',
        'title',
        'slug',
        'content',
        'image',
        'total_view',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     */

    public function categoryArticle()
    {
        return $this->belongsTo(CategoryArticle::class);
    }
}
