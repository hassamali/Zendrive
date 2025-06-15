<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['name', 'image', 'is_visible'];

    public function fares()
    {
        return $this->hasMany(Fare::class);
    }
}
