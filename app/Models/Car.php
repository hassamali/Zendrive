<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function fares()
    {
        return $this->hasMany(Fare::class);
    }

}
