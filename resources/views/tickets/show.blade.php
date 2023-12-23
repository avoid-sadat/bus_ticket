<x-app-layout>
    <h1>{{ $trip->date }} - {{ $trip->location->name }}</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

      <div>
          @foreach($availableSeats as $seat)
              <li>{{ $seat }}</li>
          @endforeach
      </div>

    <form method="POST" action="/tickets/purchase">
        @csrf
        <input type="hidden" name="trip_id" value="{{ $trip->id }}">

        <label for="seat_number">Select Seat Number:</label>
        <input type="number" name="seat_number" min="1" max="36" required>

        <button type="submit">Purchase Ticket</button>
    </form>
    </x-app-layout>
