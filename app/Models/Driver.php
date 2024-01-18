<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_name',
        'driver_email',
        'driver_address',
        'driver_phone',
        'driver_vehical',
        'vehical_number_plate',
        'driver_picture',
    ];
}
