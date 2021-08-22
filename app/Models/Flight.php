<?php

namespace App\Models;

use App\Models\Airport;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Flight extends Model
{
    use HasFactory;

    public function arrivalAirport()
    {
        return $this->belongsTo(Airport::class, 'arrivalAirport_id');
    }

    public function departureAirport()
    {
        return $this->belongsTo(Airport::class, 'departureAirport_id');
    }

    public function passengers()
    {
        return $this->belongsToMany(Customer::class, 'flight_customer');
    }
}
