<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;


class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            ['name' => 'Karachi'],
            ['name' => 'Lahore'],
            ['name' => 'Islamabad'],
            ['name' => 'Faisalabad'],
            ['name' => 'Multan'],
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
