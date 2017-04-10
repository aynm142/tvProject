<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function test()
    {
        dd(1);
    }

    public function api(Request $request)
    {
        $data = $request->All();
        $login = $data['login'];
        $password = $data['password'];
        $token = $data['token'];
        $isLoginTrue = false;
        $isPasswordTrue = false;

        // Check the login
        if (User::where('email', $login)->count()) {
            $isLoginTrue = true;
        } else {
            return response()->json(['response' => 'Login not found'], 404);
        }

        // check the password
        $userInfo = User::where('email', $login)->get();
        if(isset($userInfo[0])) {
            if (password_verify($password, $userInfo[0]->password)) {
                $isPasswordTrue = true;
            } else {
                return response()->json(['response' => 'Wrong password'], 404);
            }
        }

        // Generate new device token
        if ($isLoginTrue && $isPasswordTrue) {
            $userInfo[0]->device_token = $token;
            $userInfo[0]->save();
            return response()->json(['response' => 'All right!'], 200);
        }
        else {
            return response()->json(['response' => 'Something wrong'], 404);
        }
    }
}
