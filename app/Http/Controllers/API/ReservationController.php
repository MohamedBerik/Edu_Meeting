<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        return response()->json([
            'data' => Reservation::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'persons' => 'required|integer|min:1',
            'date' => 'required|date',
            'time' => 'required',
            'message' => 'nullable|string',
        ]);

        $reservation = Reservation::create([
        'name'    => $request->name,
        'email'   => $request->email,
        'persons' => $request->persons,
        'date'    => $request->date,
        'time'    => $request->time,
        'message' => $request->message,
        'status'  => 'pending',
]);


        return response()->json([
            'message' => 'Reservation created successfully',
            'reservation' => $reservation
        ], 201);
    }
}
