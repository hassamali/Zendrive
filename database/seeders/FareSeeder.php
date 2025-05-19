<?php

namespace Database\Seeders;
use App\Models\Fare;
use App\Models\Car;
use App\Models\City;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = Car::all();
        $cities = City::all();

        foreach ($cars as $car) {
            foreach ($cities as $fromCity) {
                foreach ($cities as $toCity) {
                    if ($fromCity->id !== $toCity->id) {
                        Fare::create([
                            'car_id' => $car->id,
                            'from_city_id' => $fromCity->id,
                            'to_city_id' => $toCity->id,
                            'fare' => rand(2000, 6000), // was 'price' before
                        ]);
                    }
                }
            }
        }
    }
}
