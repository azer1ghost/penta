<?php

namespace App\Http\Controllers;

use App\Model\Users;
use Illuminate\Http\Request;
use App\Mail\PassReset;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class AuthorController extends Controller
{
    public function authors()
    {
        $variable['authors'] = Users::whereNotNull('email_verified_at')
                            ->offset(0) //selectable from articles
                            ->limit(10) //selectable from articles
                            ->get();

        return view('frontend.sections.authors.authorsList', compact('variable'));
    }

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

        $locale = $request->input('locale');

        App::setLocale($locale);

        $rules = [
            'email'     => 'required|email:rfc,dns|exists:users,email',
            'password'  => 'required|string'
        ];

        $messages = [
            'email.required' =>  trans('email.required'),
            'email.email'    =>  trans('email.email'),
            'email.exists'   =>  trans('email.exists'),
        ];

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
                'message' => trans('login.failed'),
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
