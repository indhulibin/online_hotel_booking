<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    public function index()
    {
        $all_photo = Photo::orderBy('id','desc')->paginate(12);
        return view('front.photo',compact('all_photo'));
    }
}
