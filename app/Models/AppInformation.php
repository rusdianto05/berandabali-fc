<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppInformation extends Model
{
    use HasFactory;

    protected $fillable = [
        'privacy_policy',
        'term_and_condition',
        'about_us',
    ];
}
