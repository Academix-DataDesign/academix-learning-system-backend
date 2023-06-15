<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'type_id',
        'first_name',
        'last_name',
        'email',
        'password',
        'avatar',
        'license',
        'bio',
        'town',
        'country',
        'short_bio',
        'portfolio_url',
        'instagram_url',
        'linkedin_url',
        'github_url',
        'twitter_url',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
