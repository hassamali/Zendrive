<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'car_id',
        'fare_id',
        'from_city_id',
        'to_city_id',
        'booking_time',
        'user_full_name',
        'user_phone',
        'pickup_address',
        'fare',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function fromCity()
    {
        return $this->belongsTo(City::class, 'from_city_id');
    }

    public function toCity()
    {
        return $this->belongsTo(City::class, 'to_city_id');
    }


}
