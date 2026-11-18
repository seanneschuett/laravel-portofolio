<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'problem',
        'goal',
        'role',
        'features',
        'image',
        'link',
        'github_url',
        'documentation',
        'category',
        'is_featured',
        'sort_order',
        'tags',
    ];

    protected $casts = [
        'features' => 'array',
        'is_featured' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function feedbacks()
    {
        return $this->hasMany(ProjectFeedback::class);
    }
}
