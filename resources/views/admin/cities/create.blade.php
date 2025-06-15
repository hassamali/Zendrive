<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">
            Add New City
        </h2>
    </x-slot>

    <div class="py-6 max-w-2xl mx-auto">
        <div class="bg-white p-6 rounded-lg shadow">
            <form action="{{ route('admin.cities.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">City Name</label>
                    <input type="text" name="name" id="name" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('admin.cities.index') }}" class="text-sm text-gray-600 hover:underline">← Back to
                        list</a>

                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-700 transition">
                        Save City
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
