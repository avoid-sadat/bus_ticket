<?php

namespace App\Http\Controllers;

use App\Models\SeatAllocation;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{

    public function index()
    {
        $trips = Trip::all();
        return view('tickets.index', compact('trips'));
    }

    public function show(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
        ]);

        $trip = Trip::findOrFail($request->input('trip_id'));
        $availableSeats = $this->getAvailableSeats($trip);

        return view('tickets.show', compact('trip', 'availableSeats'));
    }

    public function purchase(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'seat_number' => 'required|integer|min:1|max:36',
        ]);

        $trip = Trip::findOrFail($request->input('trip_id'));
        $seatNumber = $request->input('seat_number');

        // Check if the seat is available
        if ($this->isSeatAvailable($trip, $seatNumber)) {
            // Reserve the seat and associate it with the authenticated user
            SeatAllocation::create([
                'trip_id' => $trip->id,
                'user_id' => Auth::id(),
                'seat_number' => $seatNumber,
            ]);

            return redirect('/tickets')->with('success', 'Ticket purchased successfully!');
        } else {
            return redirect('/tickets')->with('error', 'Seat not available. Please choose another seat.');
        }
    }

    private function getAvailableSeats(Trip $trip)
    {
        $reservedSeats = $trip->seatAllocations->pluck('seat_number')->toArray();
        $availableSeats = array_diff(range(1, 36), $reservedSeats);

        return $availableSeats;
    }

    private function isSeatAvailable(Trip $trip, $seatNumber)
    {
        $reservedSeats = $trip->seatAllocations->pluck('seat_number')->toArray();
        return !in_array($seatNumber, $reservedSeats);
    }

}
