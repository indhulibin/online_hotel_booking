<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomPhoto;
use App\Models\Amenity;
use DB;

class AdminRoomController extends Controller
{
    public function index()
    {
        $rooms_data = Room::get();
        return view('admin.room_view',compact('rooms_data'));
    }

    public function add()
    {
        $all_amenities = Amenity::get();
        return view('admin.room_add',compact('all_amenities'));
    }

    public function store(Request $request)
    {
        //dd($request->arr_amenities);
        $amenities ='';
        $i = 0 ;
        if(isset($request->arr_amenities))
        {
            foreach($request->arr_amenities as $item)
            {
                if($i==0)
                {
                    $amenities .= $item;
                }
                else
                {
                    $amenities .= ','.$item;
                }
                $i++;
            }
           
        }
       
        
       $request->validate([
            'featured_photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'total_rooms' => 'required',
            'arr_amenities' => 'required',
            'size' => 'required',
            'total_beds' => 'required',
            'total_bathrooms' => 'required',
            'total_balconies' => 'required',
            'total_guests' => 'required',
            'video_id' => 'required',
        ]);

        $ext = $request->file('featured_photo')->extension();
        $final_name = time().".".$ext;
        $request->file('featured_photo')->move(public_path('uploads/'), $final_name);

        $obj = new Room();
        $obj->featured_photo = $final_name;
        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->price = $request->price;
        $obj->total_rooms = $request->total_rooms;
        $obj->amenities = $amenities;
        $obj->size = $request->size;
        $obj->total_beds = $request->total_beds;
        $obj->total_bathrooms = $request->total_bathrooms;
        $obj->total_balconies = $request->total_balconies;
        $obj->total_guests = $request->total_guests;
        $obj->video_id = $request->video_id;
        $obj->save();
        return redirect()->back()->with('success','Room details is added successfully');
    }

    public function edit($id)
    {
        $all_amenities = Amenity::get();
        $room_data = Room::where('id',$id)->first();

        $existing_amenities = array();
        if($room_data->amenities)
        {
            $existing_amenities = explode(',',$room_data->amenities);
        }
        return view('admin.room_edit',compact('all_amenities','room_data','existing_amenities'));
    }

    public function update(Request $request,$id)
    {

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'total_rooms' => 'required',
            'arr_amenities' => 'required',
            'size' => 'required',
            'total_beds' => 'required',
            'total_bathrooms' => 'required',
            'total_balconies' => 'required',
            'total_guests' => 'required',
            'video_id' => 'required',
        ]);
       $obj = Room::where('id',$id)->first();
       if($request->hasfile('featured_photo'))
       {
            $request->validate([
                'featured_photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);
            unlink(public_path('uploads/'.$obj->featured_photo));
            $ext = $request->file('featured_photo')->extension();
            $final_name = time().".".$ext;

            $request->file('featured_photo')->move(public_path('uploads/'),$final_name);

            $obj->featured_photo = $final_name;
       }

       $amenities ='';
        $i = 0 ;
        if(isset($request->arr_amenities))
        {
            foreach($request->arr_amenities as $item)
            {
                if($i==0)
                {
                    $amenities .= $item;
                }
                else
                {
                    $amenities .= ','.$item;
                }
                $i++;
            }
           
        }

        $obj->name = $request->name;
        $obj->description = $request->description;
        $obj->price = $request->price;
        $obj->total_rooms = $request->total_rooms;
        $obj->amenities = $amenities;
        $obj->size = $request->size;
        $obj->total_beds = $request->total_beds;
        $obj->total_bathrooms = $request->total_bathrooms;
        $obj->total_balconies = $request->total_balconies;
        $obj->total_guests = $request->total_guests;
        $obj->video_id = $request->video_id;
        $obj->update();
       return redirect()->back()->with('success','Room details is updated successfully');
    }

    public function delete($id)
    {
        $single_data = Room::where('id',$id)->first();
        unlink(public_path('uploads/'.$single_data->featured_photo));
        $single_data->delete();
        $single_data_1 = RoomPhoto::where('room_id',$id)->get();
        foreach( $single_data_1 as $item)
        {
            unlink(public_path('uploads/'.$item->photo));
            $item->delete();
        }
        return redirect()->back()->with('success','Room is deleted successfully');
    }

    public function add_gallery($id)
    {
       
        $room_data = Room::where('id',$id)->first();
        $room_photo_data = RoomPhoto::where('room_id',$id)->get();
        return view('admin.add_room_photo_gallery',compact('room_data','room_photo_data'));
    }

    public function store_gallery(Request $request,$id)
    { 
        $request->validate([
            'photo' => 'required',
            'photo.*' => 'image|mimes:jpg,jpeg,png,gif'
        ]); 
                 
       if($photos = $request->file('photo'))
       {
            foreach($photos as $key => $item)
            {
                $ext = $item->extension();
                $final_name = $key."-".time().".".$ext;

                $item->move(public_path('uploads/'),$final_name);
                $obj = new RoomPhoto();
                $obj->room_id = $id;
                $obj->photo = $final_name;
                $obj->save();
            }
       }
       
       return redirect()->back()->with('success','Room photo is added successfully');
       
    }

    public function delete_gallery($id)
    {
        $single_data = RoomPhoto::where('id',$id)->first();
        unlink(public_path('uploads/'.$single_data->photo));
        $single_data->delete();
        return redirect()->back()->with('success','Room photo is deleted successfully');
    }

   

}
