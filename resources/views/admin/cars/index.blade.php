<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Manage Cars
        </h2>
    </x-slot>

    <div class="py-6 max-w-4xl mx-auto space-y-6">
        {{-- Add New Car Button --}}
        <div class="flex justify-end">
            <a href="{{ route('admin.cars.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700 transition">
                + Add New Car
            </a>
        </div>

        {{-- Cars Table --}}
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold mb-4">All Cars</h3>

            <table class="min-w-full text-sm text-left whitespace-nowrap">
                <thead>
                    <tr class="border-b text-gray-600">
                        <th class="px-3 py-2">ID</th>
                        <th class="px-3 py-2">Name</th>
                        <th class="px-3 py-2">Image</th>
                        <th class="px-3 py-2">Status</th>
                        <th class="px-3 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($cars as $car)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-3 py-2">{{ $car->id }}</td>
                            <td class="px-3 py-2">{{ $car->name }}</td>
                            <td class="px-3 py-2">
                                @if ($car->image)
                                    <img src="{{ asset('storage/' . $car->image) }}" class="h-12 w-20 object-cover rounded" />
                                @else
                                    <span class="text-xs text-gray-400">No image</span>
                                @endif
                            </td>
                            <td class="px-3 py-2">
                                <span
                                    class="inline-block px-2 py-1 text-xs rounded
                                        {{ $car->is_visible ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ $car->is_visible ? 'Visible' : 'Hidden' }}
                                </span>
                            </td>
                            <td class="px-3 py-2 space-x-2">
                                {{-- Toggle Visibility --}}
                                <form action="{{ route('admin.cars.toggleVisibility', $car->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="text-sm px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                        {{ $car->is_visible ? 'Hide' : 'Show' }}
                                    </button>
                                </form>

                                {{-- Edit --}}
                                <a href="{{ route('admin.cars.edit', $car->id) }}"
                                    class="text-sm px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">
                                    Edit
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('admin.cars.destroy', $car->id) }}" method="POST"
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
                            <td colspan="5" class="text-center text-gray-500 py-4">No cars found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $cars->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
