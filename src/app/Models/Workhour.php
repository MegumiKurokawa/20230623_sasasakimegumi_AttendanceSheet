<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workhour extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'date',
        'start_time',
        'end_time'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function breaktime()
    {
        return $this->hasMany(Breaktime::class);
    }
}
