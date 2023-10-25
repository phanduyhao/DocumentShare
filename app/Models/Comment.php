<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function User()
    {
        return $this->belongsTo( User::class, 'user_id','id');
    }
    public function Document()
    {
        return $this->belongsTo( Document::class, 'document_id','id');
    }
    public function Parent()
    {
        return $this->belongsTo(Comment::class, 'parent_comment_id');
    }
    public function hasChildren()
    {
        return $this->hasMany(Comment::class, 'parent_comment_id')->exists();
    }
}
