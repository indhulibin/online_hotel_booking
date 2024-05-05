<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $post_data = Post::orderBy('id','desc')->paginate(9);
        return view('front.blog',compact('post_data'));
    }

    public function singlePost($id)
    {
        $single_data = Post::where('id',$id)->first();
        $single_data->total_view = $single_data->total_view+1;
        $single_data->update();
        return view('front.post',compact('single_data'));
    }
}
