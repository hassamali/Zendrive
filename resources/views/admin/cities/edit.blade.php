<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Edit City
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto">
        <div class="bg-white p-6 rounded-lg shadow">
            <form action="{{ route('admin.cities.update', $city->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">City Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $city->name) }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm text-sm" required>
                </div>

                <div class="flex items-center gap-2">
                    <input type="checkbox" name="is_visible" id="is_visible" value="1" {{ $city->is_visible ? 'checked' : '' }}>
                    <label for="is_visible" class="text-sm text-gray-700">Visible</label>
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('admin.cities.index') }}"
                        class="text-sm px-4 py-2 rounded-md bg-gray-200 hover:bg-gray-300 text-gray-800">
                        Cancel
                    </a>
                    <button type="submit"
                        class="ml-2 text-sm px-4 py-2 rounded-md bg-blue-600 hover:bg-blue-700 text-white">
                        Update City
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
