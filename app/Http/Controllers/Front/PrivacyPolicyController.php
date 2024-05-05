<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $privacy_data = Page::where('id',1)->first();
        return view('front.privacy_policy',compact('privacy_data'));
    }
}
