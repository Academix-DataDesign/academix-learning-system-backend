<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSocial extends Model
{
    use HasFactory;
    protected $table = 'user_socials';

    protected $fillable = ['user_id', 'social_id'];
}
