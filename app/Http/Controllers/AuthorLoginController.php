<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorLoginController extends Controller
{
    public function index()
    {
        return view('frontend.authorLogin');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email','password');
        $remember = $request->remember_me ? true : false;

        if (Auth::attempt($credentials, $remember)){

            return redirect()->intended('');

        } else{
            echo "no";
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
