<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Add New Car
        </h2>
    </x-slot>

    <div class="py-6 max-w-xl mx-auto">
        <div class="bg-white p-6 rounded-lg shadow">
            <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-4">
                @csrf

                {{-- Car Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Car Name</label>
                    <input type="text" name="name" id="name"
                        class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200"
                        required>
                </div>

                {{-- Image Upload --}}
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Car Image (optional)</label>
                    <input type="file" name="image" id="image"
                        class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200">
                </div>

                {{-- Submit Button --}}
                <div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Save Car
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
