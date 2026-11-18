<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'full_name',
        'nickname',
        'class',
        'major',
        'school',
        'location',
        'email',
        'phone',
        'bio',
        'about',
        'photo',
        'cv_file',
        'career_goal',
        'interests',
        'education',
        'instagram',
        'github',
        'linkedin',
        'whatsapp',
    ];
}
