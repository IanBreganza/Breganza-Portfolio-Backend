<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'tech_stack',
        'priority_score',
        'external_link',
        'visible',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'visible'    => 'boolean',
    ];
}
