<x-app-layout>
    <div class="container mx-auto mt-8 p-4 bg-white rounded-md shadow-md">
        <h1 class="text-3xl mb-4 font-semibold">Available Trips</h1>

        @foreach($trips as $trip)
            <div class="bg-gray-100 p-4 rounded-md mb-4">
                <p class="text-lg">
                    <a href="/tickets/show?trip_id={{ $trip->id }}" class="text-blue-500 hover:underline">
                        {{ $trip->date }} - {{ $trip->location->name }}
                    </a>
                </p>
            </div>
        @endforeach
    </div>
</x-app-layout>
