<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'title', 'content'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
