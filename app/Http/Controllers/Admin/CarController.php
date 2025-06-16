<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->paginate(10);
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'is_visible' => 'nullable|boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('cars', 'public');
        }

        $data['is_visible'] = $request->has('is_visible');

        Car::create($data);

        return redirect()->route('admin.cars.index')->with('success', 'Car added successfully.');
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'is_visible' => 'nullable|boolean',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($car->image) {
                Storage::disk('public')->delete($car->image);
            }

            $data['image'] = $request->file('image')->store('cars', 'public');
        }

        $data['is_visible'] = $request->has('is_visible');

        $car->update($data);

        return redirect()->route('admin.cars.index')->with('success', 'Car updated successfully.');
    }

    public function destroy(Car $car)
    {
        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }

        $car->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Car deleted successfully.');
    }

    public function toggleVisibility(Car $car)
    {
        $car->is_visible = !$car->is_visible;
        $car->save();

        return redirect()->route('admin.cars.index')->with('success', 'Car visibility updated.');
    }
}
