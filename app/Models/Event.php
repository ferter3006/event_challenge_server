<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'organization',
        'adress',
        'adress_adds',
        'province',
        'city',
        'country',
        'init_time',
        'end_time',
        'day',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function inscritos()
    {
        return $this->hasMany(Inscritos::class);
    }
}
