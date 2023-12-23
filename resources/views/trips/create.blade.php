<x-app-layout>
    <div class="container mx-auto mt-8 p-4 bg-white rounded-md shadow-md">
        <h1 class="text-3xl mb-4 font-semibold">Create Trip</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 border border-green-400 py-2 px-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="/trips/store" class="mb-4">
            @csrf

            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700">Select Date:</label>
                <input type="date" name="date" class="mt-1 p-2 border rounded-md w-full" required>
            </div>

            <div class="mb-4">
                <label for="location_id" class="block text-sm font-medium text-gray-700">Select Location:</label>
                <select name="location_id" class="mt-1 p-2 border rounded-md w-full" required>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}">{{ $location->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Create Trip</button>
        </form>
    </div>
</x-app-layout>
