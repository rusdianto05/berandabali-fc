<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChallengeCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'challenge_id',
        'category_challenge_id'
    ];


    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }

    public function categoryChallenge()
    {
        return $this->belongsTo(CategoryChallenge::class);
    }
}
