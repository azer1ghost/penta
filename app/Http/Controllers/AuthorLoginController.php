<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorLoginController extends Controller
{
    public function index()
    {
        return view('frontend.sections.authors.authorLogin');
    }

    public function register()
    {
        return view('frontend.sections.authors.authorLogin');
    }

    public function authenticate(Request $request)
    {

        $credentials = $request->only('email', 'password');

        $rules = [
            'email'     => 'required|string|email|exists:users,email',
            'password'  => 'required|string',
        ];
        
        $messages = trans('lang.login.messages');

        $validator = Validator::make($credentials, $rules, $messages);

        if ($validator->fails()) {

            return [
                'status' => false,
                'message' => $validator->errors()->first(),
                'url' => null
            ];
        }

        $remember = $request->remember_me ? true : false;

        if (Auth::attempt($credentials, $remember)) {

            return [
                'status' => true,
                'message' => null,
                'url' => redirect()->intended()->getTargetUrl()
            ];
        } else {

            return [
                'status' => false,
                'message' => 'Password is bad',
                'url' => null
            ];
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
