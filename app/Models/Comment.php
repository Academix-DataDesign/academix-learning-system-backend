<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['status_id', 'comment_text'];

    public function status()
    {

        return $this->belongsTo(CommentStatus::class);
    }
}
