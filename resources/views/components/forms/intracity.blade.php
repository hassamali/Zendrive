<form method="POST" action="{{ route('available.cars') }}" class="bg-white p-4 rounded shadow text-sm text-gray-800">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <select name="from_city_id" required class="border rounded px-3 py-2">
            <option value="">Select From City</option>
            @foreach(\App\Models\City::all() as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>

        <select name="to_city_id" required class="border rounded px-3 py-2">
            <option value="">Select To City</option>
            @foreach(\App\Models\City::all() as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
        </select>

        <input name="date" type="text" placeholder="Pickup Date" x-ref="pickupDate" class="border rounded px-3 py-2"
            required>
        <input name="time" type="text" placeholder="Pickup Time" x-ref="pickupTime" class="border rounded px-3 py-2"
            required>
    </div>

    <button type="submit" class="mt-4 bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
        Next
    </button>
</form>
