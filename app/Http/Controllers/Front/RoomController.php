<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomPhoto;

class RoomController extends Controller
{


    public function index()
    {
        $allrooms = Room::paginate(12);
        return view('front.allrooms',compact('allrooms'));
    }
    public function singleroom($id)
    {
        $roomDetails = Room::with('rRoomPhoto')->where('id',$id)->first();
        // $roomPhoto = RoomPhoto::where('room_id',$id)->get();
        $existing_amenities = array();
        if($roomDetails->amenities)
        {
            $existing_amenities = explode(',',$roomDetails->amenities);
        }
        return view('front.room_details',compact('roomDetails','existing_amenities'));
    }

}
