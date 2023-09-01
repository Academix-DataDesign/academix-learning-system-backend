<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens;
    protected $guarded = [];

    protected $hidden = [
        'created_at',
        'updated_at',
        'password',
        'remember_token',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function enrollments()
    {
        return $this->belongsToMany(Course::class, 'enrollments', 'student_id', 'id');
    }
    
    public function courses()
    {
        return $this->hasMany(Course::class, 'instructor_id');
    }
}
