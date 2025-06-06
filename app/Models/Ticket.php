<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'flight_id',
        'zone',
        'seat',
    ];

    public function flight()
    {
        return $this->belongsTo(\App\Models\Flight::class, 'flight_id');
    }
}
