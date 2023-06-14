<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['course_id', 'notification_title', 'notification_body'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
