<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->get();
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image',
            'visible' => 'boolean',
        ]);

        $car = new Car($request->only(['name', 'visible']));

        // Upload image if present
        if ($request->hasFile('image')) {
            $car->image = $request->file('image')->store('cars', 'public');
        }

        $car->save();

        return redirect()->route('admin.cars.index')->with('success', 'Car created successfully.');
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image',
            'visible' => 'boolean',
        ]);

        $car->fill($request->only(['name', 'visible']));

        if ($request->hasFile('image')) {
            $car->image = $request->file('image')->store('cars', 'public');
        }

        $car->save();

        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return back()->with('success', 'Car deleted.');
    }
}
