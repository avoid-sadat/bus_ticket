<x-app-layout>
    <h1>Create Trip</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="/trips/store">
        @csrf

        <label for="date">Select Date:</label>
        <input type="date" name="date" required>

        <label for="location_id">Select Location:</label>
        <select name="location_id" required>
            @foreach($locations as $location)
                <option value="{{ $location->id }}">{{ $location->name }}</option>
            @endforeach
        </select>

        <button type="submit">Create Trip</button>
    </form>
    </x-app-layout>
