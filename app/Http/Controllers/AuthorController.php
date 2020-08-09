<?php

namespace App\Http\Controllers;

use App\Model\Users;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        
        $variable['authors'] = Users::whereNotNull('email_verified_at')
                            ->offset(0) //selectable from articles
                            ->limit(10) //selectable from articles
                            ->get();

        return view('frontend.sections.authors.authors', compact('variable'));
    }
}
