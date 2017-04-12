<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.newuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create($request->all());
        return redirect('/user/showAll');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.userprofile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.useredit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect('/user/showAll');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/user/showAll');
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
            return response()->json(['response' => 'Login not found'], 401);
        }

        // check the password
        $userInfo = User::where('email', $login)->get();
        if(isset($userInfo[0])) {
            if (password_verify($password, $userInfo[0]->password)) {
                $isPasswordTrue = true;
            } else {
                return response()->json(['response' => 'Wrong password'], 401);
            }
        }

        // Generate new device token
        if ($isLoginTrue && $isPasswordTrue) {
            $userInfo[0]->device_token = $token;
            $userInfo[0]->save();
            return response()->json(['response' => 'All right!'], 200);
        }
        else {
            return response()->json(['response' => 'Something wrong'], 401);
        }
    }

    public function showAllUsers()
    {
        $users = User::all();
        return view("users.showusers", compact("users"));
    }
}
