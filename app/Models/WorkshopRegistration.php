<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkshopRegistration extends Model
{
    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'enterprise_name',
        'registered_at'
    ];

    protected $casts = [
        'registered_at' => 'datetime'
    ];
}
