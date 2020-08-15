<?php

namespace App\Http\Controllers;

use App\Model\Pages;
use Illuminate\Http\Request;
use App\Classes\FrontMenu;

class PageController extends Controller
{
    public function index()
    {
        // echo FrontMenu::getLinks()
         return view('frontend.index');
    }

    public function getPage($slug)
    {
        $page = Pages::where('slug', $slug)->first();
        return view('frontend.sections.pages.pageViewer',['page' => $page]);
    }
}
