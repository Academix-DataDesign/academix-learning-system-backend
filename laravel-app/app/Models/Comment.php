<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['status_id', 'comment_text'];

    public function status()
    {
        return $this->belongsTo(CommentStatus::class);
    }
}
