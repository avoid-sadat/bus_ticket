<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function create()
    {
        $locations = Location::all();
        return view('trips.create', compact('locations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'location_id' => 'required|exists:locations,id',
        ]);

        Trip::create([
            'date' => $request->input('date'),
            'location_id' => $request->input('location_id'),
        ]);

        return redirect('/trips/create')->with('success', 'Trip created successfully!');
    }
}
