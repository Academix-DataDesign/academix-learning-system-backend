<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Newsletter extends Model
{
    use HasFactory;
    protected $table = 'newsletter';

    protected $fillable = ['student_id'];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
