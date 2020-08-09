<?php

namespace App\Http\Controllers;

use App\Model\Articles;
use App\Model\Categories;
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
       
        $article = Articles::where('slug', $slug)->first();

        return view('frontend.sections.articles.articleRead',['article' => $article]);
        //return view('frontend.articleRead', compact('variable'));
    }

    public function create()
    {
        return view('frontend.sections.articles.articleCreate');
    }

    
}
