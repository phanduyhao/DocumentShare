<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Events\RateCreated;

class Rate extends Model
{
    use HasFactory;
    public function document()
    {
        return $this->belongsTo( Document::class, 'document_id','id');
    }
    public function User()
    {
        return $this->belongsTo( User::class, 'user_id','id');
    }
    protected $dispatchesEvents = [
        'created' => RateCreated::class,
    ];
}
