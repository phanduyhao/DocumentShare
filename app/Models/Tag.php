<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    public function Category()
    {
        return $this->belongsTo( Category::class, 'cate_id','id');
    }
    public function Document()
    {
        return $this->belongsTo( Document::class, 'document_id','id');
    }
}
