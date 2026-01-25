<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Mail\ReservationConfirmed;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::latest()->get();
        return view('reservation.index', ['reservations' => $reservations]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Reservation::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => now(),
        ]);

        return back()->with('success', 'تم إرسال رسالتك بنجاح!');
    }

    public function confirm($id)
    {
        $reservation = Reservation::findOrFail($id);

        if ($reservation->status !== 'pending') {
            return back()->with('success', 'Reservation already processed');
        }

        $reservation->update(['status' => 'confirmed']);

        Mail::to($reservation->email)
            ->send(new ReservationConfirmed($reservation));

        return back()->with('success', 'Reservation confirmed and email sent');
    }

    public function cancel($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['status' => 'cancelled']);

        return back()->with('success', 'Reservation cancelled');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return back()->with('success', 'Reservation deleted successfully');
    }
}
