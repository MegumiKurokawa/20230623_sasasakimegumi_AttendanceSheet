<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breaktime extends Model
{
    use HasFactory;

    protected $fillable = [
        'workhours_id',
        'start_time',
        'end_time',
    ];

    public function workhour()
    {
        return $this->belongsTo(Workhour::class);
    }
}
