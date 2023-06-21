<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'notification_title', 'notification_body'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
