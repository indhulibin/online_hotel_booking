<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookedRoom;
use App\Models\Room;

class AdminDateWiseController extends Controller
{
    public function index()
    {
        return view('admin.date_wise_room');
    }

    public function show(Request $request)
    {
        $request->validate([
            'selected_date' => 'required',
        ]);

        //$booked_details=BookedRoom::where('booking_date','$request->selected_date')->get();
        $selected_date = $request->selected_date;
        $rooms = Room::get();
        return view('admin.date_wise_room_details',compact('selected_date','rooms'));
        
    }
}
