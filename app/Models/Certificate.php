<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'name',
        'organization',
        'date_issued',
        'expiration',
        'credential_url',
        'thumbnail',
        'visible',
    ];

    protected $casts = [
        'date_issued' => 'date',
        'expiration'  => 'date',
        'visible'     => 'boolean',
    ];
}
