<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Edit Car
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto">
        <div class="bg-white p-6 rounded-lg shadow">
            <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')

                {{-- Car Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Car Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $car->name) }}" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Current Image --}}
                @if ($car->image)
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Current Image</label>
                        <img src="{{ asset('storage/' . $car->image) }}" class="mt-1 h-20 w-auto rounded shadow" alt="Car Image">
                    </div>
                @endif

                {{-- Upload New Image --}}
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Upload New Image (optional)</label>
                    <input type="file" name="image" id="image"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                {{-- Visibility --}}
                <div class="flex items-center space-x-2">
                    {{-- Hidden input to ensure value is always sent --}}
                    <input type="hidden" name="is_visible" value="0">
                    <input type="checkbox" name="is_visible" id="is_visible" value="1"
                        class="rounded text-blue-600"
                        {{ old('is_visible', $car->is_visible) ? 'checked' : '' }}>
                    <label for="is_visible" class="text-sm text-gray-700">Visible</label>
                </div>

                {{-- Submit --}}
                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.cars.index') }}" class="text-sm text-gray-600 hover:underline">← Back to list</a>

                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700 transition">
                        Update Car
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
