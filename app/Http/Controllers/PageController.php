<?php

namespace App\Http\Controllers;

use App\Model\Pages;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {   
        return view('frontend.index');
    }

    public function getPage($slug)
    {
        $page = Pages::where('slug', $slug)->first();
        return view('frontend.pageViewer',['page' => $page]);
    }
}
