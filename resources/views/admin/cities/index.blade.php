<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Manage Cities
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto space-y-6">
        {{-- Add New City Button --}}
        <div class="flex justify-end">
            <a href="{{ route('admin.cities.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700 transition">
                + Add New City
            </a>
        </div>

        {{-- Cities Table --}}
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">All Cities</h3>

            <table class="min-w-full text-sm text-left whitespace-nowrap">
                <thead>
                    <tr class="border-b text-gray-600">
                        <th class="px-3 py-2">ID</th>
                        <th class="px-3 py-2">City Name</th>
                        <th class="px-3 py-2">Status</th>
                        <th class="px-3 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cities as $city)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-3 py-2">{{ $city->id }}</td>
                            <td class="px-3 py-2">{{ $city->name }}</td>
                            <td class="px-3 py-2">
                                <span
                                    class="inline-block px-2 py-1 text-xs rounded
                                            {{ $city->is_visible ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $city->is_visible ? 'Visible' : 'Hidden' }}
                                </span>
                            </td>
                            <td class="px-3 py-2 space-x-2">
                                {{-- Toggle Visibility --}}
                                <form action="{{ route('admin.cities.toggle', $city->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="text-sm px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                        {{ $city->is_visible ? 'Hide' : 'Show' }}
                                    </button>
                                </form>

                                {{-- Edit --}}
                                <a href="{{ route('admin.cities.edit', $city->id) }}"
                                    class="text-sm px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                    Edit
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('admin.cities.destroy', $city->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-sm px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-gray-500 py-4">No cities found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
