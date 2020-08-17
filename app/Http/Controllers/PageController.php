<?php

namespace App\Http\Controllers;

use App\Model\Pages;
use Illuminate\Http\Request;
use App\Classes\FrontMenu;
use Illuminate\Support\Facades\App;

class PageController extends Controller
{
    public function index()
    {
        // echo FrontMenu::getLinks()
         return view('frontend.index');
    }

    public function getPage($slug)
    {
        $locale = App::getLocale();
        $page = Pages::withTranslation($locale)->where('slug', $slug)->first();
        $page = $page->translate($locale);

        return view('frontend.sections.pages.pageViewer',['page' => $page]);
    }
}
