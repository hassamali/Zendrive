<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Car;



class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            ['name' => 'Toyota Corolla', 'model' => '2022', 'seats' => 4],
            ['name' => 'Honda Civic', 'model' => '2021', 'seats' => 4],
            ['name' => 'Suzuki Wagon R', 'model' => '2023', 'seats' => 4],
            ['name' => 'Toyota Hiace', 'model' => '2020', 'seats' => 12],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
