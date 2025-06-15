<div class="mb-4">
    <a href="{{ route('admin.cities.index') }}"
        class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Go to Manage Cities
    </a>
</div>


<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Summary Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-gray-500 text-sm">Total Bookings</h3>
                    <p class="text-2xl font-bold text-gray-800">{{ $totalBookings }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-gray-500 text-sm">Pending</h3>
                    <p class="text-2xl font-bold text-yellow-600">{{ $pendingCount }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-gray-500 text-sm">Completed</h3>
                    <p class="text-2xl font-bold text-green-600">{{ $completedCount }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow">
                    <h3 class="text-gray-500 text-sm">Revenue</h3>
                    <p class="text-2xl font-bold text-blue-600">PKR {{ number_format($totalRevenue) }}</p>
                </div>
            </div>

            {{-- Filter Section --}}
            <form method="GET" action="{{ route('dashboard') }}"
                class="mb-6 flex flex-col sm:flex-row sm:items-end gap-4">
                <div>
                    <label for="date" class="block text-sm text-gray-600 mb-1">Select Date</label>
                    <input type="date" name="date" id="date" value="{{ request('date') }}"
                        class="border-gray-300 rounded-md shadow-sm text-sm">
                </div>
                <div>
                    <label for="status" class="block text-sm text-gray-600 mb-1">Booking Status</label>
                    <select name="status" id="status" class="border-gray-300 rounded-md shadow-sm text-sm">
                        <option value="">All</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed
                        </option>
                    </select>
                </div>
                <div>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white text-sm rounded-md hover:bg-blue-700 transition">
                        Filter
                    </button>
                </div>
            </form>

            {{-- Latest Bookings Table --}}
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold mb-4">Latest Bookings</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left whitespace-nowrap">
                        <thead>
                            <tr class="border-b text-gray-600">
                                <th class="px-3 py-2">ID</th>
                                <th class="px-3 py-2">Customer</th>
                                <th class="px-3 py-2">Pickup</th>
                                <th class="px-3 py-2">Dropoff</th>
                                <th class="px-3 py-2">Car</th>
                                <th class="px-3 py-2">Fare</th>
                                <th class="px-3 py-2">Pickup Time</th>
                                <th class="px-3 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="px-3 py-2">{{ $booking->id }}</td>
                                    <td class="px-3 py-2">
                                        {{ $booking->user_full_name }}<br>
                                        <span class="text-xs text-gray-500">{{ $booking->user_phone }}</span>
                                    </td>
                                    <td class="px-3 py-2">{{ $booking->fromCity->name ?? 'N/A' }}</td>
                                    <td class="px-3 py-2">{{ $booking->toCity->name ?? 'N/A' }}</td>
                                    <td class="px-3 py-2">{{ $booking->car->name ?? 'N/A' }}</td>
                                    <td class="px-3 py-2">PKR {{ number_format($booking->fare) }}</td>
                                    <td class="px-3 py-2">
                                        {{ \Carbon\Carbon::parse($booking->booking_time)->format('d M Y, h:i A') }}
                                    </td>
                                    <td class="px-3 py-2">
                                        <form action="{{ route('booking.updateStatus', $booking->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <div class="relative">
                                                <select name="status" onchange="this.form.submit()"
                                                    class="w-full border text-sm px-2 py-1 pr-8 rounded appearance-none
                                                                        {{ $booking->status === 'pending' ? 'bg-red-100 text-red-700 border-red-300' : '' }}
                                                                        {{ $booking->status === 'completed' ? 'bg-green-100 text-green-700 border-green-300' : '' }}"
                                                    style="background-image: none; -webkit-appearance: none; -moz-appearance: none;">
                                                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="completed" {{ $booking->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                                </select>

                                                <!-- Custom arrow icon -->
                                                <div
                                                    class="pointer-events-none absolute inset-y-0 right-2 flex items-center text-gray-500">
                                                    <svg class="h-4 w-4" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </svg>
                                                </div>
                                            </div>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="mt-4">
                    {{ $bookings->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
