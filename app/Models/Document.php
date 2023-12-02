<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    protected $table = 'documents';

    protected $fillable = [
        'user_id',
    ];
    protected $casts = [
        'created_at' => 'datetime:d/m/Y', // Định dạng ngày tháng năm
    ];
    public function getCreatedAtAttribute($value)
    {
        return date('d/m/Y', strtotime($value)); // Định dạng theo 'Ngày/Tháng/Năm'
    }
    public function User()
    {
        return $this->belongsTo( User::class, 'user_id','id');
    }
    public function Category()
    {
        return $this->belongsTo( Category::class, 'cate_id','id');
    }
    public function Status()
    {
        return $this->belongsTo( status::class, 'status','id');
    }
    public function Tag()
    {
        return $this->belongsTo( Tag::class, 'tag_id','id');
    }
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
    public function views()
    {
        return $this->hasMany(View::class, 'document_id', 'id');
    }
    public function downloads()
    {
        return $this->hasMany(Download::class, 'document_id', 'id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'document_id', 'id');
    }
}
