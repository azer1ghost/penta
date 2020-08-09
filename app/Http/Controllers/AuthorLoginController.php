<?php

namespace App\Http\Controllers;

use App\Mail\PassReset;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
                'message' => trans('lang.login.failed'),
                'url' => null
            ];
        }
    }

    public function resetPass(Request $request)
    {
        $credentials = $request->only('email');

        $rules = [
            'email' => 'required|string|email|exists:users,email'
        ];

        $messages = trans('lang.login.messages');

        $validator = Validator::make($credentials, $rules, $messages);

        if ($validator->fails()) {

            return [
                'status' => false,
                'message' => $validator->errors()->first(),
                'url' => null
            ];
        } else {

            //Mail
            Mail::send(
                "email.test",
                ["name" => "Deneme"],
                function($message) use ($request) {
                         $message ->to($request->email, "User Name")
                                  ->subject("Password Reset");
                }
            );

            return [
                'status' => false,
                'message' => "Reset Email sended",
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
