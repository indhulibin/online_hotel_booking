<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Feature;
use App\Models\Testimonial;
use App\Models\Post;
use App\Models\Room;
use DB;


class HomeController extends Controller
{
    public function index()
    {
        $slide_all = Slider::get();
        $feature_all = Feature::get();
        $testimonial_all = Testimonial::get();
        $post_all = Post::orderBy('id','desc')->limit(3)->get();
        $room_all = Room::get();
        //room availibility checking
        // Fetch booked dates where the room is fully booked
        $booked_dates = DB::table('booked_rooms')
        ->select('room_id', 'booking_date')
        ->groupBy('room_id', 'booking_date')
        ->havingRaw('COUNT(*) >= (SELECT total_rooms FROM rooms WHERE rooms.id = booked_rooms.room_id)')
        ->get();
        //dd($booked_dates);
        return view('front.home',compact('slide_all','feature_all','testimonial_all','post_all','room_all','booked_dates'));
    }
}
