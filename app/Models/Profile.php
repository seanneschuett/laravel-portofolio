<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
        'about_photo',
        'cv_file',
        'career_goal',
        'interests',
        'education',
        'instagram',
        'github',
        'linkedin',
        'whatsapp',
    ];

    public function linkFor(string $field): ?string
    {
        $value = trim((string) ($this->{$field} ?? ''));

        if ($value === '') {
            return null;
        }

        if (Str::startsWith($value, ['http://', 'https://', 'mailto:'])) {
            return $value;
        }

        $base = match ($field) {
            'github' => 'https://github.com/',
            'linkedin' => 'https://www.linkedin.com/in/',
            'instagram' => 'https://www.instagram.com/',
            default => null,
        };

        return $base ? $base.ltrim($value, '@') : $value;
    }
}
