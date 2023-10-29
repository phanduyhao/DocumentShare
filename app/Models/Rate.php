<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;
    public function Document()
    {
        return $this->belongsTo( Document::class, 'document_id','id');
    }
    public function User()
    {
        return $this->belongsTo( User::class, 'user_id','id');
    }
}
