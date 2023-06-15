<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
