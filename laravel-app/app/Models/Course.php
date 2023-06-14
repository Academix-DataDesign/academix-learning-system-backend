<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'category_id',
        'status_id',
        'language_id',
        'instructor_id',
        'level_id',
        'title',
        'description',
        'thumbnail_path',
        'duration',
        'wishes',
        'price',
        'certification',
        'bestseller',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function level()
    {
        return $this->belongsTo(CourseLevel::class);
    }

    public function topics()
    {
        return $this->hasMany(CourseTopic::class);
    }

    public function requirements()
    {
        return $this->hasMany(CourseRequirement::class);
    }

    // Define other relationships and methods as needed
}
