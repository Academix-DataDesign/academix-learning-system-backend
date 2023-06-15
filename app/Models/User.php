<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory;
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
