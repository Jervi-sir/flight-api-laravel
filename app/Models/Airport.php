<?php

namespace App\Models;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Airport extends Model
{
    use HasFactory;

    public function arrivingFlights()
    {
        return $this->hasMany(Flight::class, 'arrivalAirport_id');
    }

    public function departingFlights()
    {
        return $this->hasMany(Flight::class, 'departureAirport_id');
    }
}
