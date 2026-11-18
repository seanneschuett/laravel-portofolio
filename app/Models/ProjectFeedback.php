<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectFeedback extends Model
{
    protected $table = 'project_feedback';

    protected $fillable = [
        'project_id',
        'name',
        'message',
        'rating',
        'is_approved',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_approved' => 'boolean',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
