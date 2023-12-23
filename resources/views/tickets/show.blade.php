
<x-app-layout>
    <div class="container mx-auto mt-8 p-4 bg-gray-100">
        <h1 class="text-3xl mb-4">{{ $trip->date }} - {{ $trip->location->name }}</h1>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 border border-green-600 py-2 px-4 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-200 text-red-800 border border-red-600 py-2 px-4 mb-4 rounded">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($availableSeats as $seat)
                <div class="bg-white p-4 shadow-md rounded-md">
                    <h2 class="text-xl mb-4">Seat {{ $seat }}</h2>
                    <!-- Add any additional information or styling for each seat card -->
                </div>
            @endforeach
        </div>

        <form method="POST" action="/tickets/purchase" class="mt-4">
            @csrf
            <input type="hidden" name="trip_id" value="{{ $trip->id }}">

            <div class="mb-4">
                <label for="seat_number" class="block text-sm font-medium text-gray-700">Select Seat Number:</label>
                <input type="number" name="seat_number" class="mt-1 p-2 border rounded-md w-full" min="1" max="36" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700">Purchase Ticket</button>
        </form>
    </div>
</x-app-layout>
