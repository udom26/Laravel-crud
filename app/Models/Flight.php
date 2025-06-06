<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'airport_id',
        'destination_airport_id',
        'flight_number',
    ];

    // ความสัมพันธ์กับ Airport
    public function post()
    {
        return $this->belongsTo(Post::class, 'airport_id');
    }
    public function destinationRelation()
    {
        return $this->belongsTo(\App\Models\Post::class, 'destination_airport_id');
    }
}