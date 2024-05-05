<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class TermConditionController extends Controller
{
    public function index()
    {
        $terms_data = Page::where('id',1)->first();
        return view('front.terms_condition',compact('terms_data'));
    }
}
