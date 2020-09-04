<?php

namespace App\Http\Controllers;

use App\Model\Articles;
use App\Model\Categories;
use Illuminate\Support\Facades\App;
//use App\Model\Users;
//use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    public function index(){

        $variable['articles'] = Articles::where('status', 'PUBLISHED')
                            ->offset(0) //selectable from articles
                            ->limit(10) //selectable from articles
                            ->get();

        $variable['total'] = Articles::count();

        // $variable['categories'] = Categories::all();


        $variable['categories'] = Categories::withCount('articles')->get();

        return view('frontend.sections.articles.articles', compact('variable'));
    }



    public function read($slug){

        // Loads current locale translations
        $locale = App::getLocale();
        $article = Articles::withTranslation($locale)->where('slug', $slug)->first();
        $article = $article->translate($locale);

        return view('frontend.sections.articles.articleRead',['article' => $article]);

    }

    public function create()
    {
        $categories = Categories::all();
        return view('frontend.sections.articles.articleCreate',compact('categories'));
    }


}
