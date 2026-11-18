<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name',
        'category',
        'percentage',
        'sort_order',
    ];

    protected $casts = [
        'percentage' => 'integer',
        'sort_order' => 'integer',
    ];
}
