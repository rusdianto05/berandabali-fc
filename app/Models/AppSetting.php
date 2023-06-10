<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'android_version',
        'android_force_update',
        'android_update_message',
        'ios_version',
        'ios_force_update',
        'ios_update_message',
    ];
}
