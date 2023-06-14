<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseCurrency extends Model
{
    protected $table = 'course_currencies';

    protected $fillable = ['course_id', 'currency_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
