<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseCurrency extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'currency_id'];
    public $timestamps = false;

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
}
