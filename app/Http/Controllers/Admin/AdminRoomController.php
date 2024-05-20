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
        return redirect()->back()->with('success','Room is deleted successfully');
    }

    public function add_gallery($id)
    {
       
        $room_data = Room::where('id',$id)->first();
        $roomPhotos = RoomPhoto::where('room_id',$id)->get();
         $allPhotos = [];
         if ($roomPhotos->isNotEmpty()) 
        {
            // Iterate over the fetched room photos and merge them
            foreach ($roomPhotos as $photo) {
            $allPhotos = array_merge($allPhotos, explode(',', $photo->photo));
            }

            // Create the final merged array
            $mergedArray = [
                "id" => $roomPhotos->first()->id, // Assuming you want the ID of the first photo
                "room_id" => $id,
                "photo" => implode(',', $allPhotos),
                "created_at" => $roomPhotos->first()->created_at, // Assuming you want the created_at of the first photo
                "updated_at" => $roomPhotos->last()->updated_at, // Assuming you want the updated_at of the most recent photo
            ];
            $array = explode(',',$mergedArray['photo']);
        } else {
        // Handle the case where there are no photos
        $mergedArray = [
            "id" => null,
            "room_id" => $id,
            "photo" => '',
            "created_at" => null,
            "updated_at" => null,
        ];

        // Empty array since there are no photos
        $array = [];
        }
        return view('admin.add_room_photo_gallery',compact('room_data','array','id'));
    }

    public function store_gallery(Request $request,$id)
    { 
       
        $obj = new RoomPhoto();
        if ($request->hasfile('photo')) {
            $photos ='';
            $i = 0 ;
            if ($request->hasfile('photo'))
            {
                foreach ($request->file('photo') as $file)
                {
                    if($i==0)
                    {
                        $final_name = time().".".$file->extension();
                        $photos .=  $final_name;
                        $file->move(public_path('uploads/'),$final_name);
                    }
                    else
                    {
                        $final_name = time().".".$file->extension();
                        $photos .= ','.$final_name;
                        $file->move(public_path('uploads/'),$final_name);
                    }
                    $i++;
                }
               
            }
           
             
               $obj->photo = $photos;
               $obj->room_id = $id;
               $obj->save();
            
        }
        return redirect()->back()->with('success','Room photos are added successfully');
    }

    public function delete_gallery($id,$photo)
    {

        // Fetch the room data
        $room = DB::table('room_photos')->where('room_id', $id)->first();

        if ($room) {
            // Get the existing photos
            $photos = explode(',', $room->photo);

            // Remove the specified photo
            $photos = array_filter($photos, function($value) use ($photo) {
                return $value != $photo;
            });

            // Update the room's photos
            DB::table('room_photos')
                ->where('room_id', $id)
                ->update(['photo' => implode(',', $photos)]);
                unlink(public_path('uploads/'.$photo));
            // Optionally, delete the actual photo file from storage
            // Storage::delete('public/' . $photo);
        }

        return redirect()->back()->with('success', 'Photo deleted successfully.');
    }

}
