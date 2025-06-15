<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::latest()->paginate(10);
        return view('admin.cities.index', compact('cities'));
    }

    public function create()
    {
        return view('admin.cities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cities,name',
        ]);

        City::create([
            'name' => $request->name,
            'is_visible' => $request->has('is_visible'), // ✅ Corrected
        ]);

        return redirect()->route('admin.cities.index')->with('success', 'City created successfully.');
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('admin.cities.edit', compact('city'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $city = City::findOrFail($id);
        $city->update([
            'name' => $request->name,
            'is_visible' => $request->has('is_visible'),
        ]);

        return redirect()->route('admin.cities.index')->with('success', 'City updated successfully.');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('admin.cities.index')->with('success', 'City deleted.');
    }

    public function toggle(City $city)
    {
        $city->is_visible = !$city->is_visible;
        $city->save();

        return redirect()->route('admin.cities.index')->with('success', 'City visibility updated.');
    }
}
