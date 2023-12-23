<x-app-layout>

        <h1>Available Trips</h1>

        @foreach($trips as $trip)
            <p>
                <a href="/tickets/show?trip_id={{ $trip->id }}">{{ $trip->date }} - {{ $trip->location->name }}</a>
            </p>
        @endforeach

</x-app-layout>
