<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $fillable = [
        'role',
        'company',
        'location',
        'date_range',
        'responsibilities',
        'display_order',
    ];

    protected $casts = [
        'responsibilities' => 'array',
    ];
}
