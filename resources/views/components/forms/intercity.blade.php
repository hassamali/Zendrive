<form method="POST" action="{{ route('booking.details') }}" class="bg-white p-4 rounded shadow text-sm text-gray-800">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <input name="pickup_city" type="text" placeholder="Pickup City" class="border rounded px-3 py-2" required>
        <input name="dropoff_city" type="text" placeholder="Drop Off City" class="border rounded px-3 py-2" required>
        <input name="pickup_date" type="text" placeholder="Pickup Date" x-ref="interPickupDate"
            class="border rounded px-3 py-2" required>
        <input name="pickup_time" type="text" placeholder="Pickup Time" x-ref="interPickupTime"
            class="border rounded px-3 py-2" required>
        <input name="dropoff_date" type="text" placeholder="Drop Off Date" x-ref="interDropoffDate"
            class="border rounded px-3 py-2" required>
        <input name="dropoff_time" type="text" placeholder="Drop Off Time" x-ref="interDropoffTime"
            class="border rounded px-3 py-2" required>
    </div>

    <button type="submit" class="mt-4 bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">
        Next
    </button>
</form>
