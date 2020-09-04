<?php

namespace App\Http\Controllers;

use App\Model\Users;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthorController extends Controller
{
    public function index()
    {
        return view('frontend.sections.authors.authorLogin');
    }

    public function authenticate(Request $request)
    {
        App::setLocale($request->input('locale'));

        $credentials = $request->only('email', 'password');

        $rules = [
            'email' => 'required|email:rfc,dns|exists:users,email',
            'password' => 'required|string'
        ];

        $messages = [
            'email.required' => 1,
            'email.email'    => 2,
            'email.exists'   => 3,
        ];

        $validator = Validator::make($credentials, $rules, $messages);

        if ($validator->fails()) {

            return [
                'status' => false,
                'message' => $validator->errors()->first(),
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
                'message' => 4,
            ];
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }

    public function authors()
    {
        $variable['authors'] = Users::whereNotNull('email_verified_at')
            ->offset(0) //selectable from articles
            ->limit(10) //selectable from articles
            ->get();

        return view('frontend.sections.authors.authorsList', compact('variable'));
    }

    public function recover(Request $request){

        App::setLocale($request->input('locale'));

        $credentials = $request->only('email' );

        $rules = [
            'email' => 'required|email:rfc,dns|exists:users,email'
        ];

        $messages = [
            'email.required' => 1,
            'email.email'    => 2,
            'email.exists'   => 3,
        ];

        $validator = Validator::make($credentials, $rules, $messages);

        if ($validator->fails()) {

            return [
                'status' => false,
                'message' => $validator->errors()->first(),
            ];
        }
        /////////////////////

        //Create Password Reset Token
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(60),
            'created_at' => Carbon::now()
        ]);

        //Get the token just created above
        $tokenData = DB::table('password_resets')
                        ->where('email', $request->email)
                        ->first();

        if ($this->sendResetEmail($request->email, $tokenData->token)) {
            return [
                'status' => true,
                'email' => $request->email,
            ];
        } else {
            return [
                'status' => false,
                'message' => 4,
            ];
        }
    }

    public function resetPassword(Request $request)
    {
        //Validate input
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|confirmed',
            'token'    => 'required' ]);

        //check if payload is valid before moving on
        if ($validator->fails()) {
            return redirect()->back()->withErrors(['email' => 'Please complete the form']);
        }

        $password = $request->password;
        // Validate the token
        $tokenData = DB::table('password_resets')
            ->where('token', $request->token)->first();
        // Redirect the user back to the password reset request form if the token is invalid
        if (!$tokenData) return view('frontend.sections.authors.authorLogin');

        $user = Users::where('email', $tokenData->email)->first();
        // Redirect the user back if the email is invalid
        if (!$user) return redirect()->back()->withErrors(['email' => 'Email not found']);
        //Hash and update the new password
        $user->password = \Hash::make($password);
        $user->update(); //or $user->save();

        //login the user immediately they change password successfully
        Auth::login($user);

        //Delete the token
        DB::table('password_resets')->where('email', $user->email)
            ->delete();

        //Send Email Reset Success Email
        if ($this->sendSuccessEmail($tokenData->email)) {
            return view('index');
        } else {
            return redirect()->back()->withErrors(['email' => trans('A Network Error occurred. Please try again.')]);
        }

    }

    private function sendResetEmail($email, $token)
    {
        //Retrieve the user from the database
        $user = DB::table('users')->where('email', $email)->select('name', 'email')->first();
        //Generate, the password reset link. The token generated is embedded in the link
        $link = env('APP_URL', 'http://localhost') . '/author/setpassword/' . $token . '/' . urlencode($user->email);

        try {
            //Here send the link with CURL with an external email API

                //Mail
                Mail::send(
                    "email.test",
                    ["link" => $link],
                    function($message) use ($user) {
                        $message ->to($user->email, "User Name")
                            ->subject("Password Reset");
                    }
                );

                return true;

        } catch (Exception $e) {
            return false;
        }
    }
}
